<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class FizjoController extends AbstractController
{
    /**
     * @var Environment
     */
    private $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;

    }
    /**
     * @Route ("/", name="fizjo_index")
     */
    public function index()
    {
        $html = $this->twig->render('index.html.twig');

        return new Response($html);
    }
}
