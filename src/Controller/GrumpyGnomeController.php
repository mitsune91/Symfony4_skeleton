<?php

namespace App\Controller;


use App\Repository\ArtisteRepository;
use App\Repository\EvenementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GrumpyGnomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(ArtisteRepository $artiste, EvenementRepository $evenement)
    {
        return $this->render('grumpy_gnome/index.html.twig', [
             'evenement' => $evenement->findAll(),'artiste' => $artiste->findBy(['id'=>'RAND'])
        ]);
    }
}
