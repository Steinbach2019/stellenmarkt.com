<?php
/**
 * YAWIK
 *
 * @filesource
 * @license MIT
 * @copyright  2013 - 2018 Cross Solution <http://cross-solution.de>
 */
  
/** */
namespace Stellenmarkt\Factory\Controller\Plugin;

use Stellenmarkt\Controller\Plugin\CreateSingleJob;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;


/**
 * Factory for \Stellenmarkt\Controller\Plugin\CreateSingleJob
 * 
 * @author Mathias Gelhausen <gelhausen@cross-solution.de>
 * @todo write test  
 */
class CreateSingleJobFactory implements FactoryInterface
{
    
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $repositories = $container->get('repositories');
        $jobRepository= $repositories->get('Jobs');
        $orderRepository = $repositories->get('Orders');
        $templateImageRepository = $repositories->get('Stellenmarkt/TemplateImage');
        $orderOptions = $container->get('Orders/Options/Module');
        $mailer = $container->get('Core/MailService');
        $plugin = new CreateSingleJob($jobRepository, $orderRepository, $templateImageRepository, $orderOptions, $mailer);

        return $plugin;
    }
    
}
