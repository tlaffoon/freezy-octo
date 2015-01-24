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

        $notification = new Notification();
        $notification->user_id = 1;
        $notification->subject = 'Application Approved.';
        $notification->body = 'This is an example notification.';
        $notification->object_id = 100;
        $notification->object_type = 'application_approved';
        $notification->sent_at = $date;
        $notification->save();

        $notification = new Notification();
        $notification->user_id = 1;
        $notification->subject = 'Message Sent!';
        $notification->body = 'This is an example notification.';
        $notification->object_id = 100;
        $notification->object_type = 'message';
        $notification->sent_at = $date;
        $notification->save();

    }

}