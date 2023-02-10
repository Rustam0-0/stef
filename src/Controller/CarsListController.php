<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CarRepository;

class CarsListController extends AbstractController
{
    /**
     * @Route("/cars", name="cars")
     */
    public function index(CarRepository $cars): Response
    {
        return $this->render('cars_list/index.html.twig', [
            'cars'=> $cars->findAll()
        ]);
    }
}
