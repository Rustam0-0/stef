<?php

namespace App\Controller;

use App\Entity\Tire;
use App\Form\TireType;
use App\Repository\TireRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tire")
 */
class TireController extends AbstractController
{
    /**
     * @Route("/", name="app_tire_index", methods={"GET"})
     */
    public function index(TireRepository $tireRepository): Response
    {
        return $this->render('tire/index.html.twig', [
            'tires' => $tireRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_tire_new", methods={"GET", "POST"})
     */
    public function new(Request $request, TireRepository $tireRepository, EntityManagerInterface $entityManager): Response
    {
        $tire = new Tire();
        $form = $this->createForm(TireType::class, $tire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $tireRepository->add($tire, true);

            $tire->setDateAdd(new \DateTime());

            $aMimeTypes = array("image/gif", "image/jpeg", "image/jpg",
            "image/png", "image/x-png", "image/tiff");
            $objfichier = $request->files->get('tire');
            $fichier = $objfichier['picture'];
            if (!empty($fichier)) {
                if (in_array($fichier->getClientmimeType(), $aMimeTypes)) {
                    if ($fichier->move('assets/images/TIRE/',
                        $fichier->getClientOriginalName())) {
                        $tire->setPicture($fichier->getClientOriginalName());
                    }
                }
            }
            
            $aMimeTypes = array("image/gif", "image/jpeg", "image/jpg",
            "image/png", "image/x-png", "image/tiff");
            $objfichier = $request->files->get('tire');
            $fichier = $objfichier['picture2'];
            if (!empty($fichier)) {
                if (in_array($fichier->getClientmimeType(), $aMimeTypes)) {
                    if ($fichier->move('assets/images/TIRE/',
                        $fichier->getClientOriginalName())) {
                        $tire->setPicture2($fichier->getClientOriginalName());
                    }
                }
            }
            $aMimeTypes = array("image/gif", "image/jpeg", "image/jpg",
            "image/png", "image/x-png", "image/tiff");
            $objfichier = $request->files->get('tire');
            $fichier = $objfichier['picture3'];
            if (!empty($fichier)) {
                if (in_array($fichier->getClientmimeType(), $aMimeTypes)) {
                    if ($fichier->move('assets/images/TIRE/',
                        $fichier->getClientOriginalName())) {
                        $tire->setPicture3($fichier->getClientOriginalName());
                    }
                }
            }

            $entityManager->persist($tire); //insertion
            $entityManager->flush(); //exécute la requête
            $this->addFlash('success', 'Pneus sont ajoutés');

            return $this->redirectToRoute('app_tire_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('tire/new.html.twig', [
            'tire' => $tire,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_tire_show", methods={"GET"})
     */
    public function show(Tire $tire): Response
    {
        return $this->render('tire/show.html.twig', [
            'tire' => $tire,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_tire_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Tire $tire, TireRepository $tireRepository, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(TireType::class, $tire);
        $form->handleRequest($request);
        $tire->setPicture($tire->getPicture());
        $tire->setPicture2($tire->getPicture2());
        $tire->setPicture3($tire->getPicture3());

        if ($form->isSubmitted() && $form->isValid()) {
            $tireRepository->add($tire, true);

            $aMimeTypes = array("image/gif", "image/jpeg", "image/jpg", "image/png", "image/x-png", "image/tiff");
            $objfichier = $request->files->get('tire');

            $fichier = $objfichier['picture'];
            if (!empty($fichier)&& in_array($fichier->getClientmimeType(), $aMimeTypes)) {
                if ($fichier->move('assets/images/TIRE/', $fichier->getClientOriginalName())) {
                    $tire->setPicture($fichier->getClientOriginalName());
                }
            }
            $fichier = $objfichier['picture2'];
            if (!empty($fichier)&& in_array($fichier->getClientmimeType(), $aMimeTypes)) {
                if ($fichier->move('assets/images/TIRE/', $fichier->getClientOriginalName())) {
                    $tire->setPicture2($fichier->getClientOriginalName());
                }
            }
            $fichier = $objfichier['picture3'];
            if (!empty($fichier)&& in_array($fichier->getClientmimeType(), $aMimeTypes)) {
                if ($fichier->move('assets/images/TIRE/', $fichier->getClientOriginalName())) {
                    $tire->setPicture3($fichier->getClientOriginalName());
                }
            }

            $tire->setDateUpdate(new \DateTime());
            $entityManager->flush();
            $this->addFlash('success', 'Pneus sont edités');

            return $this->redirectToRoute('app_tire_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('tire/edit.html.twig', [
            'tire' => $tire,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_tire_delete", methods={"POST"})
     */
    public function delete(Request $request, Tire $tire, TireRepository $tireRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tire->getId(), $request->request->get('_token'))) {
            $tireRepository->remove($tire, true);
        }

        return $this->redirectToRoute('app_tire_index', [], Response::HTTP_SEE_OTHER);
    }

    // /**
    //  * @Route("/search_prod", name="search_prod", methods={"GET", "POST"})
    //  */
    // public function search(TireRepository $TireRepository, Request $request): Response
    // {
    //     $value = $request->get('value');

    //     // dump($request->get('value'));

    //     if ($request->get('value')) {
    //         $tire = $tireRepository->findBySearch($value);
    //         $this->addFlash('success', 'Resultat de votre recherche pour: '.$value);
    //     }
    //     else {
    //         $tire = $TireRepository->findAll();
    //         $this->addFlash('warning', "Oups, on n'a rien trouvé pour: ".$value);
    //     }

    //     return $this->render('tire/index.html.twig', [
    //         'tires' => $tire
    //     ]);
    // }
}
