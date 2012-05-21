<?php

namespace MySite\OldSiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('MySiteOldSiteBundle:Default:index.html.twig', array('name' => $name));
    }
}
