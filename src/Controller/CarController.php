<?php

namespace App\Controller;

use App\Entity\Car;
use App\Entity\Carsup;
use App\Form\CarsupType;
use App\Repository\CarRepository;
use App\Repository\CarsupRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CarController extends AbstractController
{
        /**
         * @Route("/",name="car_index")
         */
        public function index(CarRepository $repo): Response
        {
            $cars = $repo->findAll();
            return $this->render('car/index.html.twig', [
                'cars' => $cars
            ]);
        }
        /**
         * Finds and displays a car entity.
         *
         * @Route("/car/{id}", name="car_show",requirements={"id"="\d+"})
         */
        public function showAction(Car $car)
        {
            return $this->render('car/show.html.twig', array(
            'car' => $car,
            ));
        }

        // Get all cars from make provided in the URL 
        /**
         * @Route("/sup/{id}", name="cả_sup")
         */
        public function carSupAction(CarsupRepository $repo, int $id): Response
        {
            //127.0.0.1:8000/sup/1
            $car = $repo->findBySupp($id);

            return $this->json($car);
        }

        /**
         * @Route("/addsup", name="addsup")
         */
        public function addSupAction(CarsupRepository $repo, Request $req): Response
        {
            $c = new Carsup();
            $form = $this->createForm(CarsupType::class, $c);
            $form->handleRequest($req);
            if($form->isSubmitted()&&$form->isValid()){
                $repo->add($c, true);
                return $this->json($c->getId());
            }

            return $this->render('car/new.html.twig', [
                'form'=>$form->createView()
            ]);
        }
      
}
