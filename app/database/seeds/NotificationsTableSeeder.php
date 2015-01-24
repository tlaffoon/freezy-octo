<?php

use Carbon\Carbon;

class NotificationsTableSeeder extends Seeder {

    public function run ()
    {

        $date = Carbon::now()->toDateTimeString();

        $notification = new Notification();
        $notification->user_id = 1;
        $notification->subject = 'New Note Added!';
        $notification->body = 'This is an example notification.';
        // $notification->object_id = '';
        $notification->object_type = 'note';
        $notification->sent_at = $date;
        $notification->save();

        $notification = new Notification();
        $notification->user_id = 1;
        $notification->subject = 'New Application Submitted!';
        $notification->body = 'This is an example notification.';
        $notification->object_id = 100;
        $notification->object_type = 'application';
        $notification->sent_at = $date;
        $notification->save();

    }

}