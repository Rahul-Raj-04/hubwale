<?php

namespace App\Http\Controllers\Livewire\ECommerce\Order;

use Livewire\Component;
use App\Models\ECommerceOrder;
use App\Models\ECommerceOrderItem;
use App\Models\ECommerceStatus;

class Edit extends Component
{
    public $order;
    public $orderId;
    public $paymentStatuses = [];
    public $orderStatuses = [];

    public $paymentStatus;
    public $orderStatus;

    public function render()
    {
        return view('livewire.e-commerce.order.edit')->extends('livewire.e-commerce.app');
    }

    public function mount()
    {
        $this->order = ECommerceOrder::find($this->orderId);
        if ($this->order->company_id != auth()->user()->company_id) {
            abort(403, 'Unauthorized');
        }
        $this->paymentStatuses = ECommerceStatus::where(['company_id' => auth()->user()->company_id, 'type' => 'payment_status'])->get();
        $this->orderStatuses = ECommerceStatus::where(['company_id' => auth()->user()->company_id, 'type' => 'order_status'])->get();
        $this->paymentStatus = $this->order->payment_status->id ?? null;
        $this->orderStatus = $this->order->order_status->id ?? null;
    }

    public function changePaymentStatus($id)
    {
        $this->order->payment_status_id = $id;
        foreach ($this->order->items as $item) {
            $item->payment_status_id = $id;
            $item->save();
        }
        $this->order->save();
        return redirect()->route('e-commerce.order.edit', $this->order->id);
    }

    public function changeOrderStatus($id)
    {
        $this->order->order_status_id = $id;
        foreach ($this->order->items as $item) {
            $item->order_status_id = $id;
            $item->save();
        }
        $this->order->save();
        return redirect()->route('e-commerce.order.edit', $this->order->id);
    }

    public function changeVariationDeliveryStatus($statusId, $id)
    {
        $orderItem = ECommerceOrderItem::find($id);
        $orderItem->order_status_id = $statusId;
        $orderItem->save();
    }

    public function changeVariationPaymentStatus($statusId, $id)
    {
        $orderItem = ECommerceOrderItem::find($id);
        $orderItem->payment_status_id = $statusId;
        $orderItem->save();
    }
    
    public function changeDiscount($discount, $itemId)
    {
        $orderItem = ECommerceOrderItem::find($itemId);
        $orderItem->discount = (int) $discount ?? 0;
        $orderItem->save();
    }

    public function pageRefresh()
    {
        $this->order = ECommerceOrder::find($this->orderId);
    }
}
