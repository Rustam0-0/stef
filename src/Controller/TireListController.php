<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\TireRepository;
use App\Repository\WidthRepository;
use App\Repository\HeightRepository;
use App\Repository\DiameterRepository;

use App\Entity\Tire;
use App\Form\TireType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class TireListController extends AbstractController
{
    /**
     * @Route("/tires", name="tires")
     */
    public function index(TireRepository $tiresRepository, WidthRepository $widths, HeightRepository $heights, DiameterRepository $diameters, Request $request): Response
    {
        if($request->get("search_width")){
            $tires = $tiresRepository->findBy(['width'=>$request->get("search_width")]);
        }
        elseif($request->get("search_height")){
            $tires = $tiresRepository->findBy(['height'=>$request->get("search_height")]);
        }
        elseif($request->get("search_diameter")){
            $tires = $tiresRepository->findBy(['diameter'=>$request->get("search_diameter")]);
        }
        else{
            $tires = $tiresRepository->findAll();
        }

        return $this->render('tire_list/index.html.twig', [
            'tires'=>$tires,
            'widths'=>$widths->findAll(),
            'heights'=>$heights->findAll(),
            'diameters'=>$diameters->findAll(),
        ]);
    }

    /**
     * @Route("/search_prod", name="search_prod", methods={"GET", "POST"})
     */
    public function search(TireRepository $TireRepository, WidthRepository $widths, Request $request): Response
    {
        $value = $request->get('value');

        if ($TireRepository->findBySearch($value)) {
            $this->addFlash('success', 'Resultat de votre recherche pour: '.$value);
        }
        else {
            $this->addFlash('warning', "Oups, on n'a rien trouvé pour: ".$value);
        }
        return $this->render('tire_list/index.html.twig', [
            'tires' => $TireRepository->findBySearch($value),
            'widths'=>$widths->findAll(),
        ]);
    }
}
