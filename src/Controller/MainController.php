<?php

namespace App\Controller;

use App\Entity\OptAd;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="main")
     */
    public function index(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $opts = $em->getRepository(OptAd::class)->findAll();

        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
            'opts' => $opts
        ]);
    }

    /**
     * @Route("/sec", name="second")
     */
    public function sec(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $opts = $em->getRepository(OptAd::class)->findAll();

        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
            'opts' => $opts
        ]);
    }
}
