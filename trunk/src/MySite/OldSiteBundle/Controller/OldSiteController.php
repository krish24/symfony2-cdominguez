<?php

namespace MySite\OldSiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;

class OldSiteController extends Controller
{        
    /**
     * @Route("/", name="old_site_index")
     */
    public function indexAction() {
        $response = $this->render("MySiteOldSiteBundle:OldSite:index.html.twig");
        $url = $response->getContent();
        return $this->redirect($url);
    }
    
    /**
     * @Route("/Test", name="old_test")
     * @Template()
     */
    public function testAction()
    {
        return $this->render('MySiteOldSiteBundle:Default:index.html.twig', array('name' => 'OldSite'));
    }

}
