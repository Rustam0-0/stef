<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CarRepository;

class CarDetController extends AbstractController
{
    /**
     * @Route("/car_det/{id}", name="car_det")
     */
    public function index(CarRepository $car, $id): Response
    {
        return $this->render('car_det/index.html.twig', [
            'car'=>$car->find($id)
        ]);
    }
}
