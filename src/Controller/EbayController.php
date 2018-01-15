<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EbayController extends Controller
{
    /**
     * @Route("/ebay", name="ebay")
     */
    public function index()
    {
        return $this->render('ebay\index.html.twig');
        // replace this line with your own code!
//        return $this->render('@Maker/demoPage.html.twig', [ 'path' => str_replace($this->getParameter('kernel.project_dir').'/', '', __FILE__) ]);
    }

    public function sellerItemAdd()
    {
        return $this->render('ebay\seller.item.add.html.twig',
        [
            'title'=>'Articulo 1',
            'search_keyword'=>'search_keyword 1',
        ]);
    }
}
