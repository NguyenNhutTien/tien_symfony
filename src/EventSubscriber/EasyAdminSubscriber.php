<?php

namespace App\EventSubscriber;

use App\Entity\Post;
use App\Utils\StringHelper;
use Symfony\Component\EventDispatcher\GenericEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class EasyAdminSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            'easy_admin.pre_persist' => ['setPostSlug'],
        ];
    }

    public function setPostSlug(GenericEvent $event)
    {
        $entity = $event->getSubject();

        if (!($entity instanceof Post)) {
            return;
        }

        $slug = StringHelper::slugify($entity->getTitle());
        $entity->setSlug($slug);

        $event['entity'] = $entity;
    }
}
