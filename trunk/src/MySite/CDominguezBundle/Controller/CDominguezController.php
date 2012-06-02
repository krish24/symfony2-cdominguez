<?php

namespace MySite\CDominguezBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;

use Base\EJSTreeGridBundle\Framework\GridOptionsGenerator,
    Base\EJSTreeGridBundle\Framework\GridLayoutGenerator,
    Base\EJSTreeGridBundle\Framework\GridDataFormatter;

class CDominguezController extends Controller
{
    /**
     * @Route("/i", name="cd_index")
     * @Template("MySiteCDominguezBundle::CDominguez/index.html.twig")
     */
    public function indexAction()
    {
        return array();
    }
    
    /**
     * @Route("/addGasto", name="cd_add_gasto")
     */
    public function addGasto(){
        $request      = $this->getRequest();
        $categoria    = $request->request->get('_categoria');
        $addCategoria = $request->request->get('add_categoria');
        $gasto        = $request->request->get('_gasto');
        $addGasto     = $request->request->get('add_gasto');
        $cantidad     = $request->request->get('_cantidad');
        return new Response('done');
    }
}
