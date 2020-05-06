<?php


namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class GetTokenController extends AbstractController
{
    public function get_token(Request $request)
    {

        return $response = new JsonResponse(
            [
                'user' =>
                    [
                        'email' => '123@gmail.com',
                        'id' => '0',
                        'token' => '1234gdgfg22vwrfegd2f2',
                    ]
            ]
        );
    }
}