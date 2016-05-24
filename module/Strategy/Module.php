<?php
namespace Strategy;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;

use Strategy\Model\Context;
use Strategy\Model\ConcreteStrategyA;

class Module implements AutoloaderProviderInterface, ConfigProviderInterface
 {
     public function getAutoloaderConfig()
     {
         return array(
             'Zend\Loader\ClassMapAutoloader' => array(
                 __DIR__ . '/autoload_classmap.php',
             ),
             'Zend\Loader\StandardAutoloader' => array(
                 'namespaces' => array(
                     __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                 ),
             ),
         );
     }

     public function getConfig()
     {
         return include __DIR__ . '/config/module.config.php';
     }

	  public function getServiceConfig()
     {
         return array(
             'factories' => array(
                				 'Strategy\Model\Context' =>  function($sm) {
                					 $concretestrategya = new ConcreteStrategyA();
                                     $context = new context($concretestrategya);
                                     return $context;
                                 },
                             ),
                      );
     }
	 
 }
