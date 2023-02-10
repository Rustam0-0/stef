<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\TireRepository;

class TireDetController extends AbstractController
{
    /**
     * @Route("/tire_det/{id}", name="tire_det")
     */
    public function index(TireRepository $tire, $id): Response
    {
        return $this->render('tire_det/index.html.twig', [
            'tire'=>$tire->find($id)
        ]);
    }
}
