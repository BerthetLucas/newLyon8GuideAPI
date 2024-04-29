<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class ApiLoginController extends AbstractController
{
    #[Route('/api/login', name: 'api_login', methods: ['POST'])]
    public function index(Request $request, TokenStorageInterface $tokenStorage): Response
    {
        /** @var UserInterface|null $user */
        $user = $this->getUser();

        if (null === $user) {
            return $this->json([
                'message' => 'Identifiants manquants',
            ], Response::HTTP_UNAUTHORIZED);
        }

        // Logique pour générer ou récupérer le jeton ici
        $token = ''; // Remplacez ceci par votre logique pour générer ou récupérer le jeton

        return $this->json([
            'user' => $user->getUserIdentifier(),
            'token' => $token,
        ]);
    }
}
