<?php

namespace App\MessageHandler;

use App\Message\SendNotification;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class SendNotificationHandler implements MessageHandlerInterface
{
    public function __invoke(SendNotification $message)
    {
        foreach ($message->getUser() as $user) {
            echo "Send notification to..." . $user . "<br>";
        }
    }
}
