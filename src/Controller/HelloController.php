<?php

namespace App\Controller;

use App\Service\HelloService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloController extends AbstractController{

    /**
     * @Route("helloService")
     *
     * @param HelloService $helloService
     * 
     * @return Response
     */
    public function helloService(HelloService $helloService)
    {
        $result =  $helloService->hello();

        return new Response($result);
    }
    /**
     * @Route({
     *      "fr": "bonjour",
     *      "en": "hello"
     * })
     *
     * @param Request $request
     * 
     * @return Response
     */
    public function helloLocale(Request $request)
    {
        $locale = $request->getLocale();

        return new Response('hello, locale : '.$locale);
    }

    /**
     * @Route("hello/{name}" , name="helloWithName")
     *
     * @param string $name
     * 
     * @return Response
     */
    public function helloWithName($name)
    {
        return new Response("hello " . $name);
    }

    /**
     * @Route("helloName")
     *
     * @return Response
     */
    public function helloName()
    {
        return $this->render('helloName.html.twig');
    }
    /**
     * @Route("helloParam/{id}", requirements={"id"="\d+"}, methods={"GET"})
     *
     * @return Response
     */
    public function helloParam($id)
    {
        $title = "Param Request";
        dump($id);
        return $this->render('helloParam.html.twig', ["titre" => $title,"type" => "int", "param" => $id]);
    }
    
    /**
     * @Route("helloParam/{id}", methods={"GET"})
     *
     * @return Response
     */
    public function helloParam2($id)
    {
        $title = "Param Request";
        dump($id);
        return $this->render('helloParam.html.twig', ["titre" => $title,"type" => "Any", "param" => $id]);
    }
    /**
     * @Route("helloRequest")
     *
     * @return Response
     */
    public function helloRequest(Request $request)
    {
        $params = $request->query->all();
        dump($params);
        return $this->render('base.html.twig');
    }
    /**
     * @Route("baseTwig")
     *
     * @return Response
     */
    public function baseTwig()
    {
        $titre = "MOn super Titre";
        $params = [
            "olivier",
            "nicolas",
            "Marie",
        ];
        dump($params);
        return $this->render('hello.html.twig', ["title"=> $titre, "items" => $params]);
    }

    /**
     * @Route("hello", name="hello")
     *
     * @return Response
     */
    public function index()
    {
        return new Response('Hello world bis !');
    }
}