<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SaleEntry extends Model
{
    use HasFactory, SoftDeletes;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'party_ac_id',
        'sale_ac_id',
        'erp_product_id',
        'group_id',
        'company_id',
        'type',
        'cash_debit',
        'invoice_type_id',
        'bill_no',
        'bill_date',
        'doc_no',
        'doc_date',
        'original_bill_no',
        'original_bill_date',
        'qty',
        'rate',
        'amount',
        'narration',
        'tax_bill_of_supply',
    ];

    public function party_ac()
    {
        return $this->belongsTo(Account::class);
    }

    public function invoice_type()
    {
        return $this->belongsTo(ErpSetupInvoiceType::class);
    }

    public function sale_purchase_taxe()
    {
        return $this->hasOne(SalePurchaseTax::class, 'sale_entry_id');
    }

    public function erp_product()
    {
        return $this->belongsTo(ErpProduct::class);
    }

    public function getTotalAmountAttribute()
    {
        $saleEntry = SaleEntry::find($this->id);
        $amount = $saleEntry->amount + $saleEntry->sale_purchase_taxe->central_tax + $saleEntry->sale_purchase_taxe->state_ut_tax;
        return $amount;
    }

    public function getTotalInvoiceValueAttribute()
    {
        $saleEntries = SaleEntry::where('group_id', $this->group_id)->get();
        $amount = 0;
        foreach($saleEntries as $saleEntry){
            $amount = $amount + $saleEntry->amount + $saleEntry->sale_purchase_taxe->central_tax + $saleEntry->sale_purchase_taxe->state_ut_tax; 
        }

        return $amount;
    }

    public function getTotalTaxableValueAttribute()
    {
        $saleEntries = SaleEntry::where('group_id', $this->group_id)->get();
        $amount = 0;
        foreach($saleEntries as $saleEntry){
            $amount = $amount + $saleEntry->sale_purchase_taxe->central_tax + $saleEntry->sale_purchase_taxe->state_ut_tax; 
        }

        return $amount;
    }

    public function getTotalIntegratedTaxAttribute()
    {
        $saleEntries = SaleEntry::where('group_id', $this->group_id)->get();
        $amount = 0;
        foreach($saleEntries as $saleEntry){
            $amount = $amount +  $saleEntry->sale_purchase_taxe->integrated_tax;
        }

        return $amount;
    }

    public function getTotalCentralTaxAttribute()
    {
        $saleEntries = SaleEntry::where('group_id', $this->group_id)->get();
        $amount = 0;
        foreach($saleEntries as $saleEntry){
            $amount = $amount +  $saleEntry->sale_purchase_taxe->central_tax;
        }

        return $amount;
    }

    
    public function getTotalStateUtTaxAttribute()
    {
        $saleEntries = SaleEntry::where('group_id', $this->group_id)->get();
        $amount = 0;
        foreach($saleEntries as $saleEntry){
            $amount = $amount +  $saleEntry->sale_purchase_taxe->state_ut_tax;
        }

        return $amount;
    }
}
