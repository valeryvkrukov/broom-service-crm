<?php

namespace BroomService\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class MainController extends AbstractController
{
    private $security;
    private $jwtManager;
    private $tokenStorageInterface;

    public function __construct(Security $security, TokenStorageInterface $tokenStorageInterface, JWTTokenManagerInterface $jwtManager)
    {
        $this->security = $security;
        $this->jwtManager = $jwtManager;
        $this->tokenStorageInterface = $tokenStorageInterface;
    }

    #[Route('/', name: 'app_root')]
    #[Route('/{page<.+>}', name: 'app_main', requirements: ['page' => '^(?!api).*'])]
    public function index($page = ''): Response
    {
        $components = [];

        if (trim($page) !== 'sign-in') {
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
            'security' => $this->jwtManager,
            'page' => $page,
        ]);
    }
}
