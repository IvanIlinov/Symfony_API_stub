<?php


namespace App\Controller;



use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class StudentController extends AbstractController
{
    public function createStudent(){
        return new Response('OK', 200);
    }

    public function getStudent($id){

        return $response = new JsonResponse(
            [
                'student' =>
                    [
                        'id' => $id,
                        'name' => 'Jhon Watson',
                    ]
            ]
        );
    }

    public function updateStudent($_id){
        return new Response('OK', 200);
    }

    public function deleteStudent($_id){
        return new Response('OK', 200);
    }

    public function getStudents(){
        return $response = new JsonResponse(
            [
                '0' =>
                    [
                        'id' => '0',
                        'name' => 'Jhon Watson',
                    ],
                '1' =>
                    [
                        'id' => '1',
                        'name' => 'Bilbo Begins',
                    ]
            ]
        );
    }
}