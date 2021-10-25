<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FizjoController extends AbstractController
{
    /**
     * @Route ("/", name="fizjo_index")
     */
    public function index(){
        return $this->render('base.html.twig');
    }
}
