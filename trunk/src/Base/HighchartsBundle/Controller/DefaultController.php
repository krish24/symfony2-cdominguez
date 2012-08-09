<?php

namespace Base\HighchartsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('BaseHighchartsBundle:Default:index.html.twig', array('name' => $name));
    }
}
