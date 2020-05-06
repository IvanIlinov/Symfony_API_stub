<?php


namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class CreateUserController extends AbstractController
{
    public function create(Request $request)
    {
        return $response = new JsonResponse(
            [
                'token' => 'fsjkhSDLFHsdhjjgkdfjcmVhdGUsdXBkYXRlLGRlbGV0ZTtWYWNhbmN5OmNyZWF0ZSx1cGRhdGUsZGVsZXRl'
            ]);
    }
}