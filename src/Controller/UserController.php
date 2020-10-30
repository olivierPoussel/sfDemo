<?php

namespace App\Controller;

// use App\Entity\User;
use App\Entity\UserDoctrine;
use App\Form\UserType;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController{

    /**
     * @Route("user")
     *
     * @param Request $request
     * 
     * @return Response
     */
    public function user(Request $request)
    {
        $user = new UserDoctrine();

        $form = $this->createForm(UserType::class, $user); 
        
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            /** @var ObjectManager */
            $em = $this->getDoctrine()->getManager();
            $em->persist($form->getData());
            $em->flush();

            return $this->redirect('hello');
            // return new Response("Formulaire validé");
        }

        return $this->render('userForm.html.twig', ['formulaire' => $form->createView()]);
    }


}