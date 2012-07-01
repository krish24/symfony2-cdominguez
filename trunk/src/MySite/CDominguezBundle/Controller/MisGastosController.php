<?php

namespace MySite\CDominguezBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use MySite\DataBaseBundle\Entity\Gasto;
use MySite\DataBaseBundle\Entity\Cuenta;
use MySite\DataBaseBundle\Entity\GastoDetalle;
use MySite\DataBaseBundle\Entity\Categoria;

use Base\EJSTreeGridBundle\Framework\GridOptionsGenerator,
    Base\EJSTreeGridBundle\Framework\GridLayoutGenerator,
    Base\EJSTreeGridBundle\Framework\GridDataFormatter;

/**
 * @Route("/mis-gastos")
 */
class MisGastosController extends Controller
{
    /** 
     * @Route("/", name="cd_mis_gastos")
     * @Template("MySiteCDominguezBundle::CDominguez/misGastos.html.twig")
     */
    public function misGastosAction() {
        $router = $this->get('router');
        
        $gridOptionsGenerator = new GridOptionsGenerator(
            'ContainerGastosGrid'
        );
        $gridOptionsGenerator
            ->setGridId('GastosGrid')
            ->setOptions(array(
                'Layout_Url'        => $router->generate('cd_grid_layout_gastos'),
                'Data_Url'          => $router->generate('cd_grid_data_gastos'),
                'Upload_Url'        => $router->generate('cd_upload_grid_default'),
                'Export_Url'        => $router->generate('cd_export_grid'),
            ));

        $dineroGastado = $this->getDoctrine()
                                ->getRepository('MySiteDataBaseBundle:Usuario')
                                ->getDineroGastado($this->getUser());
        return array(
            'gridOptionsGenerator' => $gridOptionsGenerator,
            'dineroGastado'        => $dineroGastado,
        );
    }
    
     /**
     * @Route("/grid-layout", name="cd_grid_layout_gastos", defaults={"_format" = "json"})
     * @Template("BaseEJSTreeGridBundle::gridLayout.json.twig")
     */
    public function gridLayoutAction() {
        $layoutGenerator = new GridLayoutGenerator();
        $layoutGenerator->setConfiguration(array(
            'SearchExpand'     =>  1,
            'NoFormatEscape'   =>  1,
            'StandardFilter'   =>  2,
            'NoVScroll'        =>  1,
            'Deleting'         =>  1,
            'MaxVScroll'       =>  2500,
            'Style'            =>  "Query",   
            'Group'            =>  "Categoria,Gasto",
            'Sort'             =>  "-Cantidad",
            'ExportType'       =>  "Expanded,Outline",
        ));
        $layoutGenerator->addTopRowFilter(array(
            'CategoriaCanEdit'    =>  1,
            'CategoriaType'       => "Text",
            'CategoriaSuggest'    => "|*RowsCanFilter",
            'GastoButton'   => "Defaults",
            'GastoShowMenu' =>  0,
            'GastoRange'    =>  1,
            'GastoDefaults' => "{Position:{Align:'below center'},Items:[{Name:'*FilterOff'},'-',{Columns:3,Items:'|*RowsAllCanFilter'}]}",
        ))->addVariableColumn(array(
            'CanEdit'   => 1,
            'RelWidth'  => 2,
            'MinWidth'  => 70,
            'Name'      => "Categoria",
            'CanFilter' => 1,
            'CanSort'   => 1,
            'Type'      => "Text",
        ))->addVariableColumn(array(
            'CanEdit'   => 1,
            'RelWidth'  => 2,
            'MinWidth'  => 70,
            'Name'      => "Gasto",
            'CanFilter' => 1,
            'CanSort'   => 1,
            'Type'      => "Text",
        ))->addVariableColumn(array(
            'CanEdit'   => 1,
            'RelWidth'  => 1,
            'MinWidth'  => 30,
            'Name'      => "Cantidad",
            'CanFilter' => 1,
            'CanSort'   => 1,
            'Type'      => "Int",      
        ))->addVariableColumn(array(
            'CanEdit'   => 1,
            'Width'  => 0,
            'MinWidth'  => 0,
            'Name'      => "Fecha",
            'CanFilter' => 1,
            'CanSort'   => 1,
            'Type'      => "Date", 
        ))->addDefaultRow(array(
            'Name'              => "Group",    
            'Calculated'        => 1,    
            'CantidadFormula'   => "sum()",    
            'FechaFormula'      => "max()",  
            'ExpandedFormula'   => "var index = (Row.GroupCol == 'Categoria') ? 0 : 1; return [1,0][index]",
            'CantidadCanEdit'   => 1,
            'ClassFormula'      => "var index = (Row.GroupCol == 'Categoria') ? 0 : 1; return ['level1','level2'][index]",
            'HtmlPrefixFormula' => "var index = (Row.GroupCol == 'Categoria') ? 0 : 1; return ['<span style=\"color:#599bd7;font-weight:bold\">','<span style=\"color:#e25c5b\">'][index]; ",
            'HtmlPostfix'       => "</span>",
            'CalcOrder'         => "Cantidad,Fecha,Class,Expanded,HtmlPrefix",
        ))->addDefaultRow(array(
            'Name'               => "R",    
            'Calculated'         => 1,
            'HtmlPrefix'         => "<span style=\"color:#FF9E0C\">",
            'HtmlPostfix'        => "</span>",
            'CalcOrder'          => "Total",
        ))->setToolbar(array(
            'Cells'            => "ExpandAll,CollapseAll,Total,Formula",
            'TotalType'        => "Int",
            'TotalLabelRight'  => "<b>Total</b>",
            'TotalFormula'     => "sum(\"Cantidad\")",
            'TotalHtmlPrefix'  => "<b>",
            'TotalHtmlPostfix' => "</b>"
        ));
        
        return array('gridLayoutGenerator' => $layoutGenerator);
    }
    
     /**
     * @Route("/grid-data", name="cd_grid_data_gastos", defaults={"_format" = "json"})
     * @Template("BaseEJSTreeGridBundle::gridData.json.twig")
     */
    public function gridDataAction() { 
        $d             = $this->getDoctrine();
        $user          = $this->getUser();
        $gastos        = $d->getRepository('MySiteDataBaseBundle:Gasto')->loadRecentsByUser($user);
        $dataFormatter = new GridDataFormatter();

        foreach ($gastos as $objGasto) { 
            $dataFormatter->addRow(array(
                'id'        => $objGasto->getId(),
                'Categoria' => $objGasto->getDetalle()->getCategoria()->getDescripcion(),
                'Gasto'     => $objGasto->getDetalle()->getDescripcion(),
                'Cantidad'  => $objGasto->getCantidad(),
                'Fecha'     => $objGasto->getFecha()->format('d-M-Y')
            ));
        }
        return array('gridDataFormatter' => $dataFormatter);
    }

    /**
     * @Route("/cerrar-cuenta", name="cd_cerrar_cuenta")
     */
    public function cerrarCuentaAction() {
        $em            = $this->getDoctrine()->getEntityManager();
        $r             = $this->getRequest();
        $objUser       = $this->getUser();            
        $idTipoCuenta  = $r->request->get('_tipo_cuenta');
        $objCuenta     = new Cuenta();
        $gastos        = $em->getRepository('MySiteDataBaseBundle:Gasto')
                                ->loadRecentsByUser($objUser);
        $objTipoCuenta = $em->getRepository('MySiteDataBaseBundle:TipoCuenta')->findOneBy(
            array('id' => $idTipoCuenta)
        ); 
        $dineroGastado = $em->getRepository('MySiteDataBaseBundle:Usuario')
                                ->getDineroGastado($objUser);
        $capital       = $objUser->getCapital();
        
        $objUser->setCapital(($capital - $dineroGastado));
        $em->merge($objUser);
        
        $objCuenta->setTipo($objTipoCuenta);
        $objCuenta->setFechaCierre(new \DateTime());
        $objCuenta->setUsuario($objUser);
        $em->persist($objCuenta);
        
        foreach ($gastos as $objGasto) {
            $objGasto->setCuenta($objCuenta);
            $em->merge($objGasto);
        }
        
        $em->flush();
        return $this->redirect($this->generateUrl('cd_mis_gastos', array('s' => 1)));
    }
}
