<?php

namespace App\Http\Services;

use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;
use LaravelFCM\Message\Topics;

class FCMService 
{
    public static function sendPushNotificationToTopic($title, $body, $topicName, $data, $sound = "default")
    {
        $notificationBuilder = new PayloadNotificationBuilder($title);
        $notificationBuilder->setBody($body)
                            ->setSound($sound);

        $notification = $notificationBuilder->build();

        $topic = new Topics();
        $topic->topic($topicName);

        $topicResponse = FCM::sendToTopic($topic, null, $notification, $data);

        $topicResponse->isSuccess();
        $topicResponse->shouldRetry();
        $topicResponse->error();
    }
}
