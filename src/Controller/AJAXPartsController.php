<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

    /**
     * @Route("/ajax")
     */
class AJAXPartsController extends AbstractController
{
    /**
     * @Route("/getOptAd360", name="getOptAd360", methods={"POST"})
     */
    public function index(Request $request): Response
    {
        $json = json_decode($request->getContent());
        $url = "https://api.optad360.com/get?key=HJGHcZvJHZhjgew6qe67q6GHcZv3fdsAqxbvB33fdV&startDate=2021-08-11&endDate=2021-08-11&output=json";

        return new Response (file_get_contents($url));

        /*return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);*/
    }
}
