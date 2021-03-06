<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Twig\Environment;

class SecurityController
{
    /**
     * @var Environment
     */
    private $twig;

    public function __construct(Environment $twig){
        $this->twig = $twig;
    }

    /**
     * @Route ("/login", name="security_login")
     */
    public function login(AuthenticationUtils $utils): Response
    {
        return new Response($this->twig->render(
            'security/login.html.twig',
            [
                'last_username' =>$utils->getLastUsername(),
                'error' =>$utils->getLastAuthenticationError()
            ]
        ));
    }

    /**
     * @Route ("/logout", name="security_logout")
     */
    public function logout(){

    }
}