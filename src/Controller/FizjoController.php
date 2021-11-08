<?php

namespace App\Controller;

use App\Repository\FizjoterapyRepository;
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

    /**
     * @var FizjoterapyRepository
     */
    private $fizjoterapyRepository;

    public function __construct(
        Environment $twig,
        FizjoterapyRepository $fizjoterapyRepository
    )

    {
        $this->twig = $twig;
        $this->fizjoterapyRepository = $fizjoterapyRepository;
    }
    /**
     * @Route ("/", name="index")
     */
    public function index(): Response
    {
        $html = $this->twig->render('front_page/index.html.twig');
        return new Response($html);
    }

    //TO DO nie działą redirect. Czemu?
    /**
     * @Route ("/procedure", name="procedure")
     */
    public function procedure() : Response
    {
        $html = $this->twig->render('fizjoterapy/procedure.html.twig',[
            'methods' => $this->fizjoterapyRepository->findAll()
        ]);
        return new Response($html);
    }

    /**
     * @Route ("/add", name="add_procedure")
     */
    public function add()
    {
        return new Response(
          $this->twig->render('fizjoterapy/add.procedure.html.twig')
        );
    }
}
