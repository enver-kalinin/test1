<?php

namespace App\Module2\Controller;

use App\Module2\Module2Service;
use App\Modules\Entity\Module;
use App\Modules\ModuleManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(
    name: 'module2_',
    host: '{subdomain<[a-z-\d]+>}.%base_host%',
    condition: "request.attributes.get('module_name') == 'Module2'"
)]
class Module2Controller extends AbstractController
{
    private Module $module;

    private Module2Service $service;

    public function __construct(ModuleManager $module_manager)
    {
        $this->module = $module_manager->getModule();

        $this->service = new Module2Service($this->module);
    }

    #[Route(
        '/',
        name: 'main'
    )]
    public function index(): Response
    {
        $response_message = sprintf('Hello %s', $this->module->getName());

        return new Response($response_message, 200, [
            'Content-type: text/plain;'
        ]);
    }

    #[Route(
        '/def',
        name: 'module_own_route'
    )]
    public function abc(): Response
    {
        $response_message = sprintf('D-E-F page of %s', $this->module->getName());

        return new Response($response_message, 200, [
            'Content-type: text/plain;'
        ]);
    }
}
