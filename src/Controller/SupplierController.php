<?php

namespace App\Controller;

use App\Repository\SupplierRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SupplierController extends AbstractController
{
    /**
     * @Route("/suppliers/{filter}", name="show_supplier",requirements={"filter"="local|import"})
     */
    public function FunctionName(SupplierRepository $repo,$filter): Response
    {
        if ($filter == 'local'){
            $f = 0;
       } else if($filter == 'import'){
            $f = 1;
       }
        $sup = $repo->findSupplier($f);
        return $this->render('supplier/index.html.twig', [
            'sup'=>$sup
        ]);
    }
}
