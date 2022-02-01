<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AcademieController extends AbstractController
{
    #[Route('/academie', name: 'academie')]
    public function index(): Response
    {
        return $this->render('academie/index.html.twig');
    }
}
