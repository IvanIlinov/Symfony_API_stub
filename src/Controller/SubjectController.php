<?php


namespace App\Controller;



use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use JMS\Serializer\SerializerBuilder;

class SubjectController extends AbstractController
{
    public function createSubject(){
        return new Response('OK', 200);
    }

    public function getSubject($id){
        return $response = new JsonResponse(
            [
                'subject' =>
                    [
                        'id' => $id,
                        'name' => 'Alchemy',
                    ]
            ]
        );
    }

    public function updateSubject($_id){
        return new Response('OK', 200);
    }

    public function deleteSubject($_id){
        return new Response('OK', 200);
    }

    public function getSubjects(){
        return $response = new JsonResponse(
            [
                '0' =>
                    [
                        'id' => '0',
                        'name' => 'Potions',
                    ],
                '1' =>
                    [
                        'id' => '1',
                        'name' => 'Learn to learn',
                    ]
            ]
        );
    }

}