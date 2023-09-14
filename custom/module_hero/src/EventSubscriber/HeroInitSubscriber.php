<?php
namespace Drupal\module_hero\EventSubscriber;

use Drupal\config_collection_install_test\EventSubscriber;
use Drupal\Core\Config\ConfigCrudEvent;
use Drupal\Core\Config\ConfigEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\KernelEvent;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * Our event subscriber
 */
class HeroInitSubscriber implements EventSubscriberInterface{

    public function __construct(){

    }
    public function onRequest($events){
        // kint("hello form our events");
        // die();
        var_dump('Hello from our events here');
    }
    public static function getSubscribedEvents()
    {
        $events[KernelEvents::REQUEST][] = array('onRequest');
        return $events;

    }

}