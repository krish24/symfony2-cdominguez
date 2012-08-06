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
use Symfony\Bundle\FrameworkBundle\Templating\Asset\PathPackage;

/**
 * @Route("apartar-dinero")
 */
class ApartarDineroController extends Controller
{
    /** 
     * @Route("/", name="cd_apartar_dinero")
     * @Template("MySiteCDominguezBundle::ApartarDinero/index.html.twig")
     */
    public function apartarDineroAction() {
        $request        = $this->getRequest();
        $s              = $request->query->get('s');
        $d              = $request->query->get('d');
        $objUser        = $this->getUser();
        $objUserRepo    = $this->getDoctrine()->getRepository('MySiteDataBaseBundle:Usuario');
        $categorias     = $objUserRepo->getCategoriasOrderByDescription($objUser);
        $dineroGastado  = $objUserRepo->getDineroGastado($objUser);
        $dineroApartado = $objUserRepo->getDineroApartado($objUser);
        $detalles       = array();
        
        return array( 
            'categorias'     => $categorias,
            'detalles'       => $detalles,
            'dineroGastado'  => $dineroGastado,
            'dineroApartado' => $dineroApartado,
            'saveData'       => $s,
            'deleteData'     => $d,
        );
    }
    
    /**
     * @Route("/data-table", name="cd_data_apartar_dinero", defaults={"_format" = "json"})
     */
    public function getDataDineroApartado() {
        $asset          = new PathPackage($this->getRequest());
        $router         = $this->get('router');
        $apartarDinero  = $this->getDoctrine()
                                ->getRepository('MySiteDataBaseBundle:Gasto')
                                ->loadGastosFuturosByUser($this->getUser());
        $data = array(
            'aaData' => array()
        );
        
        foreach ($apartarDinero as $objGasto) {
            $fechaGasto  = $objGasto->getFecha()->format('Y/m/d');
            $gastoActual = $objGasto->getDetalle()->getDescripcion();
            $categoria   = $objGasto->getDetalle()->getCategoria()->getDescripcion();

            $data['aaData'][] = array(
                $gastoActual . ' | ' . $categoria,
                $fechaGasto,
                $objGasto->getCantidad(),
                '<a href="#"><img title="Agregar a los gastos" src="' . $asset->getUrl('images/icons/color/add.png') . '"></a><a href="#"><img title="Editar gasto" src="' . $asset->getUrl('images/icons/color/pencil.png') . '"></a><a href="' . $router->generate('cd_delete_gasto_futuro', array('pidGasto'=>$objGasto->getId())) . '"><img title="Eliminar gastos" src="' . $asset->getUrl('images/icons/color/cross.png') . '"></a>'
            );
        }
        return new Response(json_encode($data));
    }
    
    /**
     * @Route("/add-gasto-futuro", name="cd_add_apartar_dinero")
     */
    public function addGastoFuturo() {
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
        $objGasto->setFuture(true);
        $em->persist($objGasto);
        $em->flush();
        return $this->redirect($this->generateUrl('cd_apartar_dinero', array('s' => 1)));
    }
    
    /**
     * @Route("/delete-gasto-futuro", name="cd_delete_gasto_futuro")
     */
    public function deleteGastoFuturo() {
        $r        = $this->getRequest();
        $em       = $this->getDoctrine()->getEntityManager();
        $idGasto  = $r->query->get('pidGasto');
        $objGasto = $em->getRepository('MySiteDataBaseBundle:Gasto')->findOneBy(
            array('id' => $idGasto)
        ); 
        
        $em->remove($objGasto);
        $em->flush();
        return $this->redirect($this->generateUrl('cd_apartar_dinero', array('d' => 1)));
    }
}  