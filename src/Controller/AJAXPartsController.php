<?php

namespace App\Controller;

use App\ApiKey;
use App\Entity\OptAd;
use App\Entity\SavedIMGWMeasurement;
use App\Entity\SavedLanguageRecognitionDetection;
use App\Entity\SavedLanguageRecognitionRequest;
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
    public function getOptAd360(Request $request): Response
    {
        $json = json_decode($request->getContent());
        $url = "https://api.optad360.com/get?key=HJGHcZvJHZhjgew6qe67q6GHcZv3fdsAqxbvB33fdV&startDate=2021-08-11&endDate=2021-08-11&output=json&currency=".$json->currency;

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
    }

    /**
     * @Route("/getIMGW", name="getIMGW", methods={"POST"})
     */
    public function getIMGW(Request $request): Response
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
        $measurement->setStationId($apiJson->id_stacji)
            ->setStation($apiJson->stacja)
            ->setDate($apiJson->data_pomiaru." ".$apiJson->godzina_pomiaru)
            ->setTemp($apiJson->temperatura)
            ->setWindDir($apiJson->kierunek_wiatru)
            ->setWindSpeed($apiJson->predkosc_wiatru)
            ->setRelativeHumidity($apiJson->wilgotnosc_wzgledna)
            ->setDropSum($apiJson->suma_opadu)
            ->setPressure(isset($apiJson->cisnienie) ? $apiJson->cisnienie : 'unknown');
        
        $em->persist($measurement);
        $em->flush();
        
        return new JsonResponse ($data);
    }


    /**
     * @Route("/getLng", name="getLng", methods={"POST"})
     */
    public function getLng(Request $request): Response
    {
        header('Content-Type: application/json');
        $ch = curl_init('https://ws.detectlanguage.com/0.2/detect');
        $authorization = "Authorization: Bearer ".ApiKey::KEY; // Delegate key to separate class file due to avoid of exposing it on GitHub
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $request->getContent());
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        $result = curl_exec($ch);
        curl_close($ch);

        $apiJson = json_decode($result);
        $em = $this->getDoctrine()->getManager();

        
        $savedRequest = new SavedLanguageRecognitionRequest;
        $savedRequest->setSourceText(json_decode($request->getContent())->q);
        
        foreach ($apiJson->data->detections as $detection) 
        {
            $detectionE = new SavedLanguageRecognitionDetection;
            $detectionE->setRecognizedLang($detection->language);
            $detectionE->setIsReliable($detection->isReliable);
            $detectionE->setConfidenceScore($detection->confidence);
            $em->persist($detectionE);
            $savedRequest->addRecognition($detectionE);
        }
        
        $em->persist($savedRequest);
        $em->flush();
        
        return new JsonResponse($result);
    }

}
