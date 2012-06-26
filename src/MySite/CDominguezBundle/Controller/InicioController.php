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
    public function indexAction() {
        $request       = $this->getRequest();
        $s             = $request->query->get('s');
        $objUser       = $this->getUser();
        $categorias    = $objUser->getCategorias();
        $detalles      = array();
        $dineroGastado = $this->getDoctrine()
                                ->getRepository('MySiteDataBaseBundle:Usuario')
                                ->getDineroGastado($objUser);
        return array(
            'categorias'    => $categorias,
            'detalles'      => $detalles,
            'dineroGastado' => $dineroGastado,
            'saveData'      => $s
        );
    }
    
    /**
     * @Route("/add-gasto", name="cd_add_gasto")
     */
    public function addGasto() {
        $r              = $this->getRequest();
        $idCategoria    = $r->request->get('_categoria');
        $addCategoria   = $r->request->get('add_categoria');
        $idGastoDetalle = $r->request->get('_gasto');
        $addGasto       = $r->request->get('add_gasto');
        $cantidad       = $r->request->get('_cantidad');
        $date           = $r->request->get('_datepicker');
        $em             = $this->getDoctrine()->getEntityManager();
        $user           = $this->getUser();
        
        $objGasto = new Gasto();
        $cantidad = str_replace("¢ ", "", $cantidad);
        
        if($idCategoria == -1){
            $objCategoria = new Categoria();
            $objCategoria->setDescripcion($addCategoria);
            $objCategoria->addUsuario($user);
            $em->persist($objCategoria);
            $user->addCategoria($objCategoria);
            $em->merge($user);
        }else{
            $objCategoria = $em->getRepository('MySiteDataBaseBundle:Categoria')->findOneBy(
                array('id' => $idCategoria)
            ); 
        }
        
        if($idGastoDetalle == -1){
            $objDetalle = new GastoDetalle();
            $objDetalle->setDescripcion($addGasto);
            $objDetalle->addUsuario($user);
            $em->persist($objDetalle);
            $user->addGastoDetalle($objDetalle);
            $em->merge($user);
        }else{
            $objDetalle = $em->getRepository('MySiteDataBaseBundle:GastoDetalle')->findOneBy(
                array('id' => $idGastoDetalle)
            ); 
        }
        
        $objDetalle->setCategoria($objCategoria);
        $objGasto->setDetalle($objDetalle);
        $objGasto->setCantidad($cantidad);
        $objGasto->setUsuario($user);
        $objGasto->setFecha(new \DateTime($date));
        $em->persist($objGasto);
        $em->flush();
        return $this->redirect($this->generateUrl('cd_index', array('s' => 1)));
    }

    /**
     * @Route("/get-detalles", name="cd_get_opt_gdetalles_by_cat")
     * @Template("MySiteCDominguezBundle::CDominguez/optionsChosenDetalleGastos.html.twig")
     */
    public function getOptGDetallesByCat() {
        $request      = $this->getRequest();
        $idCategoria  = array($request->query->get('pidCategoria'));
        $em           = $this->getDoctrine()->getEntityManager();
        $objCategoria = $em->getRepository('MySiteDataBaseBundle:Categoria')->findOneBy(
            array('id' => $idCategoria)
        ); 
        $detalles     = $em->getRepository('MySiteDataBaseBundle:GastoDetalle')
                                ->loadByUserAndCategory($this->getUser(), $objCategoria); 
        return array( 'detalles'   => $detalles );
    } 
}  