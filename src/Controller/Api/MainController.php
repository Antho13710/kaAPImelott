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
     * Display all characters order by alpha
     * @Route("/api/characters", name="api_list", methods="GET")
     * @param CharacterRepository $characterRepository
     * @return Response
     */
    public function getAll(CharacterRepository $characterRepository): Response
    {
        $characters = $characterRepository->findAllWithMembership();

        return $this->json($characters, Response::HTTP_OK, [], ['groups' => 'characters_get']);
    }

    /**
     * Display one character
     * @Route("/api/characters/{id}", name="api_show", methods="GET")
     * @param Character|null $character
     * @return Response
     */
    public function show(Character $character = null): Response
    {
        if ($character === null) {
            return $this->json(['message'=>'C\'est pas faux !'], Response::HTTP_NOT_FOUND);
        }

        return $this->json($character, Response::HTTP_OK, [], ['groups' => 'characters_get']);
    }
}

