<?php


namespace App\Controller;

use App\Entity\Subject;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use JMS\Serializer\SerializerBuilder;

class SubjectController extends AbstractController
{
    public function createSubject(Request $_request){

        $name = $_request->query->get("name");
        if(is_string($name)){
            $entityManager = $this->getDoctrine()->getManager();
            $subject = new Subject();
            $subject->setName($name);
            $entityManager->persist($subject);
            $entityManager->flush();
            return new JsonResponse($subject->getId());
        }

        return new Response('Invalid data', '422');
    }

    public function getSubject($id){

        $repository = $this->getDoctrine()->getRepository(Subject::class);
        $subject = $repository->find($id);

        if (!$subject) {
            return new Response("Not Found", 404);
        }

        $serializer = SerializerBuilder::create()->build();
        $jsonContent = $serializer->serialize($subject, 'json');

        return JsonResponse::fromJsonString($jsonContent);
    }

    public function updateSubject(int $id, Request $_request){
        $name = $_request->query->get("name");

        if(is_string($name)){
            $entityManager = $this->getDoctrine()->getManager();
            $repository = $this->getDoctrine()->getRepository(Subject::class);
            $subject = $repository->find($id);
            $subject = $subject->setName($name);
            $entityManager->persist($subject);
            $entityManager->flush();

            $serializer = SerializerBuilder::create()->build();
            $jsonContent = $serializer->serialize($subject, 'json');

            return JsonResponse::fromJsonString($jsonContent);
        }

        return new Response('Invalid data', 422);
    }

    public function deleteSubject(int $id){

        $entityManager = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()->getRepository(Subject::class);
        $subject = $repository->find($id);

        if (!$subject) {
            return new Response('Not found', 404);
        }

        $entityManager->remove($subject);
        $entityManager->flush();

        return new Response('OK', 200);
    }

    public function getSubjects(){

        $repository = $this->getDoctrine()->getRepository(Subject::class);
        $subjects = $repository->findAll();

        $serializer = SerializerBuilder::create()->build();
        $jsonContent = $serializer->serialize($subjects, 'json');

        return JsonResponse::fromJsonString($jsonContent);
    }

}