<?php

namespace App\Controller\Api;

use App\Entity\Character;
use App\Repository\CharacterRepository;
use App\Repository\MembershipRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/api/characters", name="api_list", methods="GET")
     */
    public function getAll(CharacterRepository $characterRepository): Response
    {
        $characters = $characterRepository->findAll();

        return $this->json($characters, Response::HTTP_OK, [], ['groups' => 'characters_get']);
    }

    /**
     * @Route("/api/characters/{id}", name="api_show", methods="GET")
     */
    public function show(Character $character): Response
    {
        return $this->json($character, Response::HTTP_OK, [], ['groups' => 'characters_get']);
    }
}
