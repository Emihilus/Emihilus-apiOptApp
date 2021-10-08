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

        $url = "https://danepubliczne.imgw.pl/api/data/synop";

        $json = json_decode(file_get_contents($url));

        $stations = [];
        foreach ($json as $row) 
        {
            array_push($stations, [$row->stacja." (id: ".$row->id_stacji.")", $row->id_stacji]);
        }

        return $this->render('main/second.html.twig', [
            'controller_name' => 'MainController',
            'opts' => $opts,
            'stations' => $stations
        ]);
    }
}
