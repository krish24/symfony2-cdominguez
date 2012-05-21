<?php

namespace Base\JQueryUIBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;

class JQueryUIController extends Controller
{
    /**
    * @Route("/", name="jq_ui_index")
    * @Template()
    */
    public function indexAction()
    {
        return $this->render('BaseJQueryUIBundle:Default:index.html.twig', array('name' => 'JQueryBundle'));
    }
    
    /**
    * @Route("/Demos", name="jq_ui_demos")
    * @Template("BaseJQueryUIBundle:Demos:demos.html.twig")
    */
    public function demosAction() {
        $response = $this->render("BaseJQueryUIBundle:Demos:demos.html.twig");
        $url = $response->getContent();
        return $this->redirect($url);
    }
}
