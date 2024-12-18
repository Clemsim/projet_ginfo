<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Formation;
use App\Entity\Formateur;
class DebugController extends AbstractController
{
    #[Route('/debug', name: 'app_debug')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $forma_repo = $entityManager->getRepository(Formation::class);
        $formations = $forma_repo->findAll();
        $formateur_repo = $entityManager->getRepository(Formateur::class);
        $formateurs = $formateur_repo->findAll();
        return $this->render('debug/index.html.twig', [
            'controller_name' => 'DebugController',
            'formations' => $formations,
            'formateurs' => $formateurs,
        ]);
    }
}
