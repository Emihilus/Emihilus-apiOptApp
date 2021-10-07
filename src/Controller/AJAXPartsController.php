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
        $url = "https://api.optad360.com/get?key=HJGHcZvJHZhjgew6qe67q6GHcZv3fdsAqxbvB33fdV&startDate=2021-08-11&endDate=2021-08-11&output=json&currency=".$json->currency;
        dump($url);
        $data = file_get_contents($url);
        dump(json_decode($data));
        dump($json->currency);
        return new Response ($data);

        /*return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);*/
    }

    /* CZARNE PAPIEROSY
    {# {% for offer in auction.offers|filter(offer => offer.byUser != null) %} #}
        {#<tr {#% if loop.index == 1 %}class="table-warning"{% endif %#}>
            <th class="throw" scope="row">{#{ loop.index }#}</th>
            <td>{#{offer.value/100}#} PLN</td>
            <td>{#{offer.byUser.username}#}</td>
            <td>{#{offer.createdAt|date('H:m d-m-Y')}#}</td>
        </tr>#}
    {#% endfor %#}*/
}
