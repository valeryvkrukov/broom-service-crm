<?php

namespace BroomService\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    #[Route('/{page}', name: 'app_main', requirements: ['page' => '^(?!api).*'])]
    public function index($page = ''): Response
    {
        $components = [];

        if ($this->security->isGranted('ROLE_USER')) {
            $components[] = ['name' => 'Header', 'params' => [],
                'rootCssClass' => 'navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow'
            ];
            $components[] = ['name' => 'Main', 'params' => [],
                'rootCssClass' => 'container-fluid'
            ];
        } else {
            $components[] = ['name' => 'Auth/Login', 'params' => [],
                'rootCssClass' => 'container-fluid'
            ];
        }

        return $this->render('main/index.html.twig', [
            'components' => $components
        ]);
    }
}
