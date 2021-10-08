<?php

namespace App\Controller;

use App\Entity\OptAd;
use App\Entity\SavedIMGWMeasurement;
use App\Entity\SavedLanguageRecognitionRequest;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {

        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController'
        ]);
    }

    /**
     * @Route("/first", name="first")
     */
    public function indexs(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $opts = $em->getRepository(OptAd::class)->findAll();

        return $this->render('main/first.html.twig', [
            'opts' => $opts
        ]);
    }

    /**
     * @Route("/sec", name="second")
     */
    public function sec(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $measurements = $em->getRepository(SavedIMGWMeasurement::class)->findAll();

        $url = "https://danepubliczne.IMGW.pl/api/data/synop";

        $json = json_decode(file_get_contents($url));

        $stations = [];
        foreach ($json as $row) 
        {
            array_push($stations, [$row->stacja." (id: ".$row->id_stacji.")", $row->id_stacji]);
        }

        return $this->render('main/second.html.twig', [
            'measurements' => $measurements,
            'stations' => $stations
        ]);
    }

    /**
     * @Route("/thrid", name="thrid")
     */
    public function thr(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $recs = $em->getRepository(SavedLanguageRecognitionRequest::class)->findAllWithRecognitions();

        return $this->render('main/thrid.html.twig', [
            'recs' => $recs
        ]);
    }
}
