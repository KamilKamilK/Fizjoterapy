<?php

namespace App\Controller;

use App\Entity\Fizjoterapy;
use App\Form\MethodsType;
use App\Repository\FizjoterapyRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\RouterInterface;
use Twig\Environment;


class MethodController extends AbstractController
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * @var FizjoterapyRepository
     */
    private $fizjoRepository;

    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @var RouterInterface
     */
    private $router;

    /**
     * @var FlashBagInterface
     */
    private $flashBag;

    public function __construct(
        Environment            $twig,
        FizjoterapyRepository  $fizjoRepository,
        FormFactoryInterface   $formFactory,
        EntityManagerInterface $entityManager,
        RouterInterface        $router,
        FlashBagInterface      $flashBag
    )

    {
        $this->twig = $twig;
        $this->fizjoRepository = $fizjoRepository;
        $this->formFactory = $formFactory;
        $this->entityManager = $entityManager;
        $this->router = $router;
        $this->flashBag = $flashBag;
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
     * @Route ("/methods", name="methods")
     */
    public function methods(): Response
    {
//        $newestMetod = $this->fizjoterapyRepository->findOneBy(, 'DESC');
//        $newestMetod = $this->fizjoterapyRepository->findLastInserted();
        $html = $this->twig->render('public/methods.html.twig', [
            'methods' => $this->fizjoRepository->findAll()
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
     * @Route ("/adm/methods/index", name="method_index")
     */
    public function methodsIndex(): Response
    {
        $methods = $this->fizjoRepository->findAllMethodsDESC();

        $html = $this->twig->render('admin/methods/index.html.twig', [
            'methods' => $methods]);
        return new Response($html);
    }

    /**
     * @Route ("/admin/method/add", name="add_method")
     */
    public function add(Request $request): Response
    {
        $fizjoterapy = new Fizjoterapy();
        $fizjoterapy->setTime(new \DateTime());

        $form = $this->formFactory->create(MethodsType::class, $fizjoterapy);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($fizjoterapy);
            $this->entityManager->flush();

            $this->flashBag->add('notice', 'Stworzyłaś nową metodę o nazwie "' . $fizjoterapy->name . '"');

            return new RedirectResponse(
                $this->router->generate('method_index')
            );
        }
        return new Response(
            $this->twig->render('admin/methods/add.html.twig',
                ['form' => $form->createView()])
        );
    }

    /**
     * @Route ("/admin/method/{id}", name="edit_method")
     */
    public function edit(Fizjoterapy $fizjoterapy)
    {
        $method = $this->fizjoRepository->find($fizjoterapy);
        return new Response(
            $this->twig->render('admin/methods/edit.html.twig', [
                'method' => $method
            ])
        );
    }

    /**
     * @Route ("/admin/method/update/{id}", name="update_method")
     */
    public function update(Fizjoterapy $fizjoterapy, Request $request): Response
    {
        $editedMethod = $this->fizjoRepository->find($fizjoterapy);

        $form = $this->formFactory->create(MethodsType::class, $editedMethod);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->flush();

            $this->flashBag->add('notice', 'Zmiany w metodzie "' . $editedMethod->name . '" zostały zapisane');

            return new RedirectResponse(
                $this->router->generate('method_index')
            );
        }
        return new Response(
            $this->twig->render('admin/methods/update.html.twig',
                ['form' => $form->createView()])
        );
    }


    /**
     * @Route ("/admin/method/delete/{id}", name="delete_method")
     */
    public function delete(Fizjoterapy $fizjoterapy)
    {
        $this->entityManager->remove($fizjoterapy);
        $this->entityManager->flush();

        $this->flashBag->add('notice', 'Metoda została usunięta');

        return new RedirectResponse(
            $this->router->generate('method_index')
        );
    }
}
