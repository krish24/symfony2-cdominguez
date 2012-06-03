<?php

namespace MySite\CDominguezBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use MySite\DataBaseBundle\Entity\Gasto;
use MySite\DataBaseBundle\Entity\GastoDetalle;
use MySite\DataBaseBundle\Entity\Categoria;

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
        $em = $this->getDoctrine()->getEntityManager();
        $categorias = $em->getRepository('Categoria')->findAll();
        $detalles = array();
        
        return array(
            'categorias' => $categorias,
            'detalles'   => $detalles
        );
    }
    
    /**
     * @Route("/addGasto", name="cd_add_gasto")
     */
    public function addGasto(){
        $response       = new Response("error");
        $request        = $this->getRequest();
        $idCategoria    = $request->request->get('_categoria');
        $addCategoria   = $request->request->get('add_categoria');
        $idGastoDetalle = $request->request->get('_gasto');
        $addGasto       = $request->request->get('add_gasto');
        $cantidad       = $request->request->get('_cantidad');
        $em             = $this->getDoctrine()->getEntityManager();
        
        $objGasto = new Gasto();
        
        if($addCategoria != ''){
            $objCategoria = new Categoria();
            $objCategoria->setDescripcion($addCategoria);
            $em->persist($objCategoria);
        }else{
            $objCategoria = $em->getRepository('Categoria')->findOneBy(array('id' => $idCategoria)); 
        }
        
        if($addGasto != ''){
            $objDetalle = new GastoDetalle();
            $objDetalle->setDescripcion($addGasto);
            $em->persist($objDetalle);
        }else{
            $objDetalle = $em->getRepository('GastoDetalle')->findOneBy(array('id' => $idGastoDetalle)); 
        }
        
        $objDetalle->setCategoria($objCategoria);
        $objGasto->setDetalle($objDetalle);
        $objGasto->setCantidad($cantidad);
        $em->persist($objGasto);
        $em->flush();
        $response->setContent('done');
        
        return $response;
    }
}
