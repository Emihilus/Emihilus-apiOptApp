<?php

namespace App\Controller;

use App\ApiKey;
use App\Entity\OptAd;
use App\Entity\SavedIMGWMeasurement;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
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
        try
        {
            $data = file_get_contents($url);
        }
        catch(\Exception $e)
        {
            return new Response('0');
        }

        $em = $this->getDoctrine()->getManager();
        $apiJson = json_decode($data);
        foreach ($apiJson->data as $row) 
        {
            $opt = new OptAd;
            $opt->setCurrency($json->currency);
            $opt->setUrls($row[0]);
            $opt->setTags($row[1]);
            $opt->setDate($row[2]);
            $opt->setEstimatedRevenue($row[3]);
            $opt->setAdImpressions($row[4]);
            $opt->setAdEcpm($row[5]);
            $opt->setClicks($row[6]);
            $opt->setAdCtr($row[7]);
            
            $em->persist($opt);
        }


        $em->flush();
        


        return new Response ($data);

        /*return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);*/
    }

    /**
     * @Route("/getIMGW", name="getIMGW", methods={"POST"})
     */
    public function indexa(Request $request): Response
    {
        $json = json_decode($request->getContent());
        $url = "https://danepubliczne.IMGW.pl/api/data/synop/id/".$json->stationid;
        try
        {
            $data = file_get_contents($url);
        }
        catch(\Exception $e)
        {
            return new Response('0');
        }

        $apiJson = json_decode($data);
        $em = $this->getDoctrine()->getManager();
        
        $measurement = new SavedIMGWMeasurement;
        $measurement->setStationId($apiJson->id_stacji);
        $measurement->setStation($apiJson->stacja);
        $measurement->setDate($apiJson->data_pomiaru." ".$apiJson->godzina_pomiaru);
        $measurement->setTemp($apiJson->temperatura);
        $measurement->setWindDir($apiJson->kierunek_wiatru);
        $measurement->setWindSpeed($apiJson->predkosc_wiatru);
        $measurement->setRelativeHumidity($apiJson->wilgotnosc_wzgledna);
        $measurement->setDropSum($apiJson->suma_opadu);
        $measurement->setPressure($apiJson->cisnienie);
        
        $em->persist($measurement);
        $em->flush();
        
        return new JsonResponse ($data);
    }


    /**
     * @Route("/lng", name="lng", methods={"POST"})
     */
    public function indeaxa(Request $request): Response
    {
        header('Content-Type: application/json');
        $ch = curl_init('https://ws.detectlanguage.com/0.2/detect');
        $authorization = "Authorization: Bearer ".ApiKey::KEY; // Delegate key to separate class file due to avoid of exposing it on GitHub
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization )); // Inject the token into the header
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, 1); // Specify the request method as POST
        curl_setopt($ch, CURLOPT_POSTFIELDS, $request->getContent()); // Set the posted fields
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // This will follow any redirects
        $result = curl_exec($ch); // Execute the cURL statement
        curl_close($ch); // Close the cURL connection
        
        return new JsonResponse($result);
    }

}
