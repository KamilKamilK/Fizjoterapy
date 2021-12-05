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
        $html = $this->twig->render('public/index.html.twig');
        return new Response($html);
    }

    /**
     * @Route ("/procedures", name="procedures")
     */
    public function procedure() : Response
    {
        $html = $this->twig->render('public/procedures.html.twig',[
            'methods' => $this->fizjoterapyRepository->findAll()
        ]);
        return new Response($html);
    }

    /**
     * @Route ("/adm/index", name="admin_index")
     */
    public function adminIndex(): Response
    {
        return new Response(
            $this->twig->render('admin/index.html.twig')
        );
    }

    /**
     * @Route ("/admin/add_procedure", name="add_procedure")
     */
    public function add()
    {
        return new Response(
            $this->twig->render('admin/procedures/add.html.twig')
        );
    }

    /**
     * @Route ("/admin/edit", name="edit_procedure")
     */
    public function edit()
    {
        return new Response(
            $this->twig->render('admin/procedures/edit.html.twig')
        );
    }

    /**
     * @Route ("/admin/update", name="update_procedure")
     */
    public function update()
    {
        return new Response(
            $this->twig->render('admin/procedures/update.html.twig')
        );
    }

    /**
     * @Route ("/admin/delete", name="delete_procedure")
     */
    public function delete()
    {
        $this->redirect(
            $this->twig->render('admin/index.html.twig')
        );
    }
}
