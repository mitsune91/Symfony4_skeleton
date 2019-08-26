<?php

namespace App\Controller;


use App\Hello\HelloWorld;
use App\Repository\ArtisteRepository;
use App\Repository\EvenementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class GrumpyGnomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(ArtisteRepository $artiste, EvenementRepository $evenement, HelloWorld $hello )
    {
        return $this->render('grumpy_gnome/index.html.twig', [
            'evenement' => $evenement->findAll(),
            'artiste' => $artiste->findBy(['id' => 'RAND']),
            'message' => $hello->yoUpper()
        ]);
    }
}
