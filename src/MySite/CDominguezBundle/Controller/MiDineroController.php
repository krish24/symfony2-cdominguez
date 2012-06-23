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
 * @Route("/mi-dinero")
 */
class MiDineroController extends Controller
{
    /** 
     * @Route("/", name="cd_mi_dinero")
     * @Template("MySiteCDominguezBundle::CDominguez/miDinero.html.twig")
     */
    public function indexAction() {
        $request       = $this->getRequest();
        $s             = $request->query->get('s');
        $dineroGastado = $this->getDoctrine()
                                ->getRepository('MySiteDataBaseBundle:Usuario')
                                ->getDineroGastado($this->getUser());
        return array(
            'saveData'      => $s,
            'dineroGastado' => $dineroGastado,
        );
    }

    /**
     * @Route("/set-mi-dinero", name="cd_set_mi_dinero")
     */
    public function setMiDinero() {
        $request        = $this->getRequest();
        $cantidad       = $request->query->get('_cantidad');
        $em             = $this->getDoctrine()->getEntityManager();
        $user           = $this->getUser();
        $cantidad = str_replace("¢ ", "", $cantidad);
        $user->setCapital($cantidad);
        $em->merge($user);
        $em->flush();
        return $this->redirect($this->generateUrl('cd_mi_dinero', array('s' => 1)));
    }
}
