<?php

namespace Base\EJSTreeGridBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;

class EJSTreeGridController extends Controller
{
    /**
     * @Route("/", name="tg_index")
     * @Template()
     */
    public function indexAction()
    {
        return $this->render('BaseEJSTreeGridBundle:Default:index.html.twig', array('name' => 'EJSTreeBundle'));
    }
    
    /**
     * @Route("/Demos", name="tg_demos")
     * @Template("BaseEJSTreeGridBundle:Demos:demos.html.twig")
     */
    public function demosAction() {
        $response = $this->render("BaseEJSTreeGridBundle:Demos:demos.html.twig");
        $url = $response->getContent();
        return $this->redirect($url);
    }
}
