<?php

namespace App\Controller\Api;

use App\Entity\Character;
use App\Repository\CharacterRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * Affiche tout les personnages par ordre alphabétique
     * @Route("/api/characters", name="api_list", methods="GET")
     */
    public function getAll(CharacterRepository $characterRepository): Response
    {
        $characters = $characterRepository->findAllWithMembership();

        return $this->json($characters, Response::HTTP_OK, [], ['groups' => 'characters_get']);
    }

    /**
     * Affiche un personnage
     * @Route("/api/characters/{id}", name="api_show", methods="GET")
     */
    public function show(Character $character = null): Response
    {
        if($character === null)
        {   
            // Si character n'existe pas retourne une erreur 404 JSON
            return $this->json(['message'=>'C\'est pas faux !'], Response::HTTP_NOT_FOUND);
        }

        return $this->json($character, Response::HTTP_OK, [], ['groups' => 'characters_get']);
    }
}
