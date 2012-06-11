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

/**
 * @Route("")
 */
class InicioController extends Controller
{
    /** 
     * @Route("/", name="cd_index")
     * @Template("MySiteCDominguezBundle::CDominguez/index.html.twig")
     */
    public function indexAction()
    {
        $request    = $this->getRequest();
        $s          = $request->query->get('s');
        $em         = $this->getDoctrine()->getEntityManager();
        $categorias = $em->getRepository('MySiteDataBaseBundle:Categoria')->findAll();
        $detalles   = array();
        return array(
            'categorias' => $categorias,
            'detalles'   => $detalles,
            'saveData'   => $s
        );
    }
    
    /**
     * @Route("/AddGasto", name="cd_add_gasto")
     */
    public function addGasto(){
        $request        = $this->getRequest();
        $idCategoria    = $request->query->get('_categoria');
        $addCategoria   = $request->query->get('add_categoria');
        $idGastoDetalle = $request->query->get('_gasto');
        $addGasto       = $request->query->get('add_gasto');
        $cantidad       = $request->query->get('_cantidad');
        $em             = $this->getDoctrine()->getEntityManager();
        
        $objGasto = new Gasto();
        $cantidad = str_replace("¢ ", "", $cantidad);
        
        if($idCategoria == -1){
            $objCategoria = new Categoria();
            $objCategoria->setDescripcion($addCategoria);
            $em->persist($objCategoria);
        }else{
            $objCategoria = $em->getRepository('MySiteDataBaseBundle:Categoria')->findOneBy(array('id' => $idCategoria)); 
        }
        
        if($idGastoDetalle == -1){
            $objDetalle = new GastoDetalle();
            $objDetalle->setDescripcion($addGasto);
            $em->persist($objDetalle);
        }else{
            $objDetalle = $em->getRepository('MySiteDataBaseBundle:GastoDetalle')->findOneBy(array('id' => $idGastoDetalle)); 
        }
        
        $objDetalle->setCategoria($objCategoria);
        $objGasto->setDetalle($objDetalle);
        $objGasto->setCantidad($cantidad);
        $em->persist($objGasto);
        $em->flush();
        return $this->redirect($this->generateUrl('cd_index', array('s' => 1)));
    }

    /**
     * @Route("/GetGDetallesByCat", name="cd_get_opt_gdetalles_by_cat")
     * @Template("MySiteCDominguezBundle::CDominguez/optionsChosenDetalleGastos.html.twig")
     */
    public function getOptGDetallesByCat(){
        $request      = $this->getRequest();
        $idCategoria  = array($request->query->get('pidCategoria'));
        $em           = $this->getDoctrine()->getEntityManager();
        $objCategoria = $em->getRepository('MySiteDataBaseBundle:Categoria')->findOneBy(array('id' => $idCategoria)); 
        $detalles     = $objCategoria->getGastoDetalles();
        return array( 'detalles'   => $detalles );
    }
}