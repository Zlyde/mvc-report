<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MeControllerTwig extends AbstractController
{
    #[Route("/", name: "me")]
    public function number(): Response
    {
        return $this->render('me.html.twig');
    }

    #[Route("/about", name: "about")]
    public function about(): Response
    {
        return $this->render('about.html.twig');
    }

    #[Route("/report", name: "report")]
    public function home(): Response
    {
        return $this->render('report.html.twig');
    }

    #[Route("/lucky", name: "lucky")]
    public function lucky(): Response
    {
        $number = random_int(0, 100);

        $data = [
            'number' => $number
        ];

        return $this->render('lucky.html.twig', $data);
    }

    #[Route("/api", name: "api")]
    public function api(): Response
    {
        return $this->render('api.html.twig');
    }

    #[Route("/api/quote", name: "quote")]
    public function jsonQuote(): Response
    {
        $number = random_int(1, 3);
        $quote = "";
        $origin = "";

        if ($number == 1) {
            $quote = "I came, I saw, I conquered.";
            $origin = "Julius Ceasar";
        } elseif ($number == 2) {
            $quote = "Life is like riding a bicycle. To keep your balance, you must keep moving.";
            $origin = "Albert Einstein";
        } else {
            $quote = "I like pigs. Dogs look up to us. Cats look down on us. Pigs treat us as equals.";
            $origin = "Winston Churchill";
        }

        $data = [
            'todays-quote' => $quote,
            'quote-origin' => $origin,
            'todays-date' => date('Y-m-d'),
            'timestamp' => time()
        ];

        $response = new JsonResponse($data);
        $response->setEncodingOptions(
            $response->getEncodingOptions() | JSON_PRETTY_PRINT
        );
        return $response;
    }
}
