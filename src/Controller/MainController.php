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
        /*$url = "https://api.optad360.com/get?key=HJGHcZvJHZhjgew6qe67q6GHcZv3fdsAqxbvB33fdV&startDate=2021-08-11&endDate=2021-08-11&output=json";

        dump(file_get_contents($url));*/
        $em = $this->getDoctrine()->getManager();
        $opts = $em->getRepository(OptAd::class)->findAll();

        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
            'opts' => $opts
        ]);
    }
}
