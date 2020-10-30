<?php

namespace App\Controller;

use App\Entity\UserDoctrine;
use App\Form\UserDoctrineType;
use App\Repository\UserDoctrineRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/user/doctrine")
 */
class UserDoctrineController extends AbstractController
{
    /**
     * @Route("/", name="user_doctrine_index", methods={"GET"})
     */
    public function index(UserDoctrineRepository $userDoctrineRepository): Response
    {
        return $this->render('user_doctrine/index.html.twig', [
            'user_doctrines' => $userDoctrineRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="user_doctrine_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $userDoctrine = new UserDoctrine();
        $form = $this->createForm(UserDoctrineType::class, $userDoctrine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($userDoctrine);
            $entityManager->flush();

            return $this->redirectToRoute('user_doctrine_index');
        }

        return $this->render('user_doctrine/new.html.twig', [
            'user_doctrine' => $userDoctrine,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="user_doctrine_show", methods={"GET"})
     */
    public function show(UserDoctrine $userDoctrine): Response
    {
        return $this->render('user_doctrine/show.html.twig', [
            'user_doctrine' => $userDoctrine,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="user_doctrine_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, UserDoctrine $userDoctrine): Response
    {
        $form = $this->createForm(UserDoctrineType::class, $userDoctrine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('user_doctrine_index');
        }

        return $this->render('user_doctrine/edit.html.twig', [
            'user_doctrine' => $userDoctrine,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="user_doctrine_delete", methods={"DELETE"})
     */
    public function delete(Request $request, UserDoctrine $userDoctrine): Response
    {
        if ($this->isCsrfTokenValid('delete'.$userDoctrine->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($userDoctrine);
            $entityManager->flush();
        }

        return $this->redirectToRoute('user_doctrine_index');
    }
}
