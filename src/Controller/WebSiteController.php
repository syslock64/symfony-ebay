<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class WebSiteController extends Controller
{
    public function test()
    {
        return $this->render('web\index.html.twig');
    }
}
