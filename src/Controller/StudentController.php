<?php


namespace App\Controller;

use App\Entity\Student;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use JMS\Serializer\SerializerBuilder;

class StudentController extends AbstractController
{
    /*
     * checkData
     */
    /*
     * request->query->get("name")
     * request->getContent
     */

    public function createStudent(Request $_request){

        $name = $_request->query->get("name");
        if(is_string($name)){
            $entityManager = $this->getDoctrine()->getManager();
            $student = new Student();
            $student->setName($name);
            $entityManager->persist($student);
            $entityManager->flush();
            return new JsonResponse($student->getId());
        }

        return new Response('Invalid data', '422');
    }

    public function getStudent($id){

        $repository = $this->getDoctrine()->getRepository(Student::class);
        $student = $repository->find($id);

        if (!$student) {
            return new Response("Not Found", 404);
        }

        $serializer = SerializerBuilder::create()->build();
        $jsonContent = $serializer->serialize($student, 'json');

        return JsonResponse::fromJsonString($jsonContent);
    }

    public function updateStudent(int $id, Request $_request){
        $name = $_request->query->get("name");

        if(is_string($name)){
            $entityManager = $this->getDoctrine()->getManager();
            $repository = $this->getDoctrine()->getRepository(Student::class);
            $student = $repository->find($id);
            $student = $student->setName($name);
            $entityManager->persist($student);
            $entityManager->flush();

            $serializer = SerializerBuilder::create()->build();
            $jsonContent = $serializer->serialize($student, 'json');

            return JsonResponse::fromJsonString($jsonContent);
        }

        return new Response('Invalid data', 422);
    }

    public function deleteStudent(int $id){

        $entityManager = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()->getRepository(Student::class);
        $student = $repository->find($id);

        if (!$student) {
            return new Response('Not found', 404);
        }

        $entityManager->remove($student);
        $entityManager->flush();

        return new Response('OK', 200);
    }

    public function getStudents(){

        $repository = $this->getDoctrine()->getRepository(Student::class);
        $students = $repository->findAll();

        $serializer = SerializerBuilder::create()->build();
        $jsonContent = $serializer->serialize($students, 'json');

        return JsonResponse::fromJsonString($jsonContent);
    }

}