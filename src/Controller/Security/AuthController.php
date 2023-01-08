<?php

namespace BroomService\Controller\Security;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuthController extends AbstractController
{
    #[Route('/api/auth', name: 'app_security_auth')]
    public function index(): Response
    {
        return $this->render('security/auth/index.html.twig', [
            'controller_name' => 'AuthController',
        ]);
    }
}
