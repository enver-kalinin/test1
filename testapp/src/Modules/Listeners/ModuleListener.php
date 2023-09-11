<?php

namespace App\Modules\Listeners;

use App\Modules\Entity\Module;
use App\Modules\ModuleManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ModuleListener
{
    private EntityManagerInterface $em;

    private ContainerBagInterface $params;

    private ModuleManager $module_manager;

    public function __construct(EntityManagerInterface $em, ContainerBagInterface $params, ModuleManager $module_manager)
    {
        $this->em = $em;

        $this->params = $params;

        $this->module_manager = $module_manager;
    }

    public function onKernelRequest(RequestEvent $event): void
    {
        $request = $event->getRequest();

        $host = $request->getHost();
        $base_host = $this->params->get('base_host');
        
        if (!preg_match('/^([a-z\d]+).' . $base_host . '$/i', $host, $host_parts)) {
            return;
        }

        $subdomain = $host_parts[1];

        $module = $this->em
            ->getRepository(Module::class)
            ->findOneBy([
                'subdomain' => $subdomain
            ]);
        
        if (null === $module) {
            throw new NotFoundHttpException(sprintf('Subdomain "%s" does not found', $subdomain));
        }

        // Add custom attribute for conditions check in module routes annotation
        $request->attributes->set('module_name', $module->getName());

        $this->module_manager->setModule($module);
    }
}
