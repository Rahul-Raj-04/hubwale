<?php

namespace App\Filament\Resources\NotificationResource\Pages;

use App\Filament\Resources\NotificationResource;
use App\Models\Notification;
use App\Models\NotificationUser;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateNotification extends CreateRecord
{
    protected static string $resource = NotificationResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        $notification = new Notification;
        $notification->campaign_name = $data['campaign_name'];
        $notification->title = $data['title'];
        $notification->message = $data['message'];
        $notification->url = $data['url'];
        $notification->send_to_all = true;
        $notification->module = serialize($data['modules']);
        $notification->save();

        if (!$data['send_to_all']){
            $notification->send_to_all = false;
            foreach ($data['users'] as $user_id) {
                NotificationUser::create([
                    "user_id" => $user_id,
                    "notification_id" => $notification->id
                ]);
            }
        }
        $notification->save();
        return $notification;
    }
}
