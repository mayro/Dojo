<?php

namespace AppBundle\Services;

use Doctrine\ORM\Events;
use JMS\Serializer\EventDispatcher\ObjectEvent;


/**
 * Class CategorySubscriber
 *
 * @package ABTasty\WidgetBundle\Serializter
 *
 */

class CategorySubscriber
{

    /**
     * @inheritdoc
     */
    public static function getSubscribedEvents()
    {
        return [
            [
                'event' =>  Events::postPersist,
                'method' => 'onPostSerialize',
                'class' => Calculator::class
            ]
        ];
    }

    /**
     * @param ObjectEvent $event
     *
     */
    public function onPostSerialize(ObjectEvent $event)
    {
        if (!$event->getObject() instanceof Calculator) {
            return;
        }

        return $this->addTranslationToSerialize($event);
    }

    public function addTranslationToSerialize(ObjectEvent $event)
    {
        return [];
    }
}
