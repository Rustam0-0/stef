<?php

namespace App\Controller;

use App\Entity\Car;
use App\Form\CarType;
use App\Repository\CarRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/car")
 */
class CarController extends AbstractController
{
    /**
     * @Route("/", name="app_car_index", methods={"GET"})
     */
    public function index(CarRepository $carRepository): Response
    {
        return $this->render('car/index.html.twig', [
            'cars' => $carRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_car_new", methods={"GET", "POST"})
     */
    public function new(Request $request, CarRepository $carRepository, EntityManagerInterface $entityManager): Response
    {
        $car = new Car();
        $form = $this->createForm(CarType::class, $car);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $carRepository->add($car, true);

            $car->setDateAdd(new \DateTime());

            $aMimeTypes = array("image/gif", "image/jpeg", "image/jpg",
            "image/png", "image/x-png", "image/tiff");
            $objfichier = $request->files->get('car');
            $fichier = $objfichier['picture'];
            if (!empty($fichier)) {
                if (in_array($fichier->getClientmimeType(), $aMimeTypes)) {
                    if ($fichier->move('assets/images/CAR/',
                        $fichier->getClientOriginalName())) {
                        $car->setPicture($fichier->getClientOriginalName());
                    }
                }
            }
            
            $aMimeTypes = array("image/gif", "image/jpeg", "image/jpg",
            "image/png", "image/x-png", "image/tiff");
            $objfichier = $request->files->get('car');
            $fichier = $objfichier['picture2'];
            if (!empty($fichier)) {
                if (in_array($fichier->getClientmimeType(), $aMimeTypes)) {
                    if ($fichier->move('assets/images/CAR/',
                        $fichier->getClientOriginalName())) {
                        $car->setPicture2($fichier->getClientOriginalName());
                    }
                }
            }
            $aMimeTypes = array("image/gif", "image/jpeg", "image/jpg",
            "image/png", "image/x-png", "image/tiff");
            $objfichier = $request->files->get('car');
            $fichier = $objfichier['picture3'];
            if (!empty($fichier)) {
                if (in_array($fichier->getClientmimeType(), $aMimeTypes)) {
                    if ($fichier->move('assets/images/CAR/',
                        $fichier->getClientOriginalName())) {
                        $car->setPicture3($fichier->getClientOriginalName());
                    }
                }
            }
            $aMimeTypes = array("image/gif", "image/jpeg", "image/jpg",
            "image/png", "image/x-png", "image/tiff");
            $objfichier = $request->files->get('car');
            $fichier = $objfichier['picture4'];
            if (!empty($fichier)) {
                if (in_array($fichier->getClientmimeType(), $aMimeTypes)) {
                    if ($fichier->move('assets/images/CAR/',
                        $fichier->getClientOriginalName())) {
                        $car->setPicture4($fichier->getClientOriginalName());
                    }
                }
            }
            $aMimeTypes = array("image/gif", "image/jpeg", "image/jpg",
            "image/png", "image/x-png", "image/tiff");
            $objfichier = $request->files->get('car');
            $fichier = $objfichier['picture5'];
            if (!empty($fichier)) {
                if (in_array($fichier->getClientmimeType(), $aMimeTypes)) {
                    if ($fichier->move('assets/images/CAR/',
                        $fichier->getClientOriginalName())) {
                        $car->setPicture5($fichier->getClientOriginalName());
                    }
                }
            }

            $entityManager->persist($car); //insertion
            $entityManager->flush(); //exécute la requête
            $this->addFlash('success', 'Véhicule est ajouté');

            return $this->redirectToRoute('app_car_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('car/new.html.twig', [
            'car' => $car,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_car_show", methods={"GET"})
     */
    public function show(Car $car): Response
    {
        return $this->render('car/show.html.twig', [
            'car' => $car,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_car_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Car $car, CarRepository $carRepository, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CarType::class, $car);
        $form->handleRequest($request);
        $car->setPicture($car->getPicture());
        $car->setPicture2($car->getPicture2());
        $car->setPicture3($car->getPicture3());
        $car->setPicture4($car->getPicture4());
        $car->setPicture5($car->getPicture5());

        if ($form->isSubmitted() && $form->isValid()) {
            $carRepository->add($car, true);

            $aMimeTypes = array("image/gif", "image/jpeg", "image/jpg", "image/png", "image/x-png", "image/tiff");
            $objfichier = $request->files->get('car');

            $fichier = $objfichier['picture'];
            if (!empty($fichier)&& in_array($fichier->getClientmimeType(), $aMimeTypes)) {
                if ($fichier->move('assets/images/CAR/', $fichier->getClientOriginalName())) {
                    $car->setPicture($fichier->getClientOriginalName());
                }
            }
            $fichier = $objfichier['picture2'];
            if (!empty($fichier)&& in_array($fichier->getClientmimeType(), $aMimeTypes)) {
                if ($fichier->move('assets/images/CAR/', $fichier->getClientOriginalName())) {
                    $car->setPicture2($fichier->getClientOriginalName());
                }
            }
            $fichier = $objfichier['picture3'];
            if (!empty($fichier)&& in_array($fichier->getClientmimeType(), $aMimeTypes)) {
                if ($fichier->move('assets/images/CAR/', $fichier->getClientOriginalName())) {
                    $car->setPicture3($fichier->getClientOriginalName());
                }
            }
            $fichier = $objfichier['picture4'];
            if (!empty($fichier)&& in_array($fichier->getClientmimeType(), $aMimeTypes)) {
                if ($fichier->move('assets/images/CAR/', $fichier->getClientOriginalName())) {
                    $car->setPicture4($fichier->getClientOriginalName());
                }
            }
            $fichier = $objfichier['picture5'];
            if (!empty($fichier)&& in_array($fichier->getClientmimeType(), $aMimeTypes)) {
                if ($fichier->move('assets/images/CAR/', $fichier->getClientOriginalName())) {
                    $car->setPicture5($fichier->getClientOriginalName());
                }
            }

            $car->setDateUpdate(new \DateTime());
            $entityManager->flush();
            $this->addFlash('success', 'Véhicule est edité');

            return $this->redirectToRoute('app_car_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('car/edit.html.twig', [
            'car' => $car,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_car_delete", methods={"POST"})
     */
    public function delete(Request $request, Car $car, CarRepository $carRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$car->getId(), $request->request->get('_token'))) {
            $carRepository->remove($car, true);
        }

        return $this->redirectToRoute('app_car_index', [], Response::HTTP_SEE_OTHER);
    }
}
