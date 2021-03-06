<?php
/**
 * YAWIK
 *
 * @filesource
 * @license MIT
 * @copyright  2013 - 2018 Cross Solution <http://cross-solution.de>
 */

/** */
namespace Stellenmarkt\Controller;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Factory for \Stellenmarkt\Controller\RedirectExternalJobs
 *
 * @author Mathias Gelhausen <gelhausen@cross-solution.de>
 * @todo write test
 */
class RedirectExternalJobsFactory implements FactoryInterface
{

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $validators = $container->get('ValidatorManager');
        $validator  = $validators->get(\Stellenmarkt\Validator\IframeEmbeddableUri::class);
        $service    = new RedirectExternalJobs($validator);

        return $service;
    }
}
