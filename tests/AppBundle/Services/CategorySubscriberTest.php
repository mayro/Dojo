<?php

namespace Tests\AppBundle\Services;

use AppBundle\Services\Calculator;
use AppBundle\Services\CategorySubscriber;
use Doctrine\ORM\Events;
use JMS\Serializer\EventDispatcher\ObjectEvent;
use PHPUnit\Framework\TestCase;
use Prophecy\Argument;

class CategorySubscriberTest extends TestCase
{
    public function testGetSubscribedEvents()
    {
        $subscribedEvent = CategorySubscriber::getSubscribedEvents();
        $this->assertArrayHasKey("event", $subscribedEvent[0]);
        $this->assertSame([
            [
                'event' =>  Events::postPersist,
                'method' => 'onPostSerialize',
                'class' => Calculator::class
            ]
        ], $subscribedEvent);
    }

    public function testonPostSerializeTestCalculator()
    {
        $subscriber = new CategorySubscriber();
        $objectEvent = $this->prophesize(ObjectEvent::class);
        $objectEvent->getObject()
            ->willReturn(new Calculator())
            ->shouldBeCalled();

        $this->assertSame([], $subscriber->onPostSerialize($objectEvent->reveal()));

    }
}
