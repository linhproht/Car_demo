<?php

namespace App\Controller;

use App\Repository\CustomerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CustomerController extends AbstractController
{
    /**
     * @Route("/customers/{order}", name="cus_show")
     */
    public function cusShowAction(CustomerRepository $repo,$order): Response
    {
       
        $cus = $repo->showAll($order);
        return $this->render('customer/index.html.twig', [
            'cus'=>$cus
        ]);
    }
}
