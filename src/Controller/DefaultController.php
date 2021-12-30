<?php
// src/Controller/DefaultController.php
namespace App\Controller;

use App\Repository\VoitureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
    * @Route("/")
    */
class DefaultController extends AbstractController
{ 
    /**
     * @Route("/", name="homepage", methods={"GET"})
     */
    public function index(VoitureRepository $voitureRepository): Response
    {
        return $this->render('homepage.html.twig', [
            "voitures" => $voitureRepository->findBy([], null, 3, null)
        ]);
    }
}