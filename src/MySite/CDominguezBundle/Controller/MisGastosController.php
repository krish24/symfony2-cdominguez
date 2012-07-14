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
                'Layout_Url'        => $router->generate('cd_grid_layout_gastos', array( 'pcolGrouping' => 'Dia')),
                'Data_Url'          => $router->generate('cd_grid_data_gastos', array( 'pcolGrouping' => 'Dia')),
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
        $colGroup = $this->getRequest()->query->get("pcolGrouping");
        $layoutGenerator = new GridLayoutGenerator();
        $layoutGenerator->setConfiguration(array(
            'SearchExpand'     =>  1,
            'NoFormatEscape'   =>  1,
            'StandardFilter'   =>  2,
            'NoVScroll'        =>  1,
            'Deleting'         =>  1,
            'Dragging'         =>  1,
            'Adding'           =>  1,
            'MaxVScroll'       =>  2500,
            'MainCol'          =>  "NodeCol",
            'Style'            =>  "Query",   
            'ExportType'       =>  "Expanded,Outline",
            //'Sort'             =>  "-Cantidad",
        ));
        $layoutGenerator->addTopRowFilter(array(
            'CategoriaCanEdit' =>  1,
            'CategoriaType'    => "Text",
            'CategoriaSuggest' => "|*RowsCanFilter",
            'GastoButton'      => "Defaults",
            'GastoShowMenu'    =>  0,
            'GastoRange'       =>  1,
            'GastoDefaults'    => "{Position:{Align:'below center'},Items:[{Name:'*FilterOff'},'-',{Columns:3,Items:'|*RowsAllCanFilter'}]}",
        ))->addVariableColumn(array(
            'CanEdit'   => 1,
            'Width'     => 0,
            'Name'      => "id",
            'Type'      => "Text",
        ))->addVariableColumn(array(
            'Width'     => 0,
            'Name'      => "Name",
            'Type'      => "Text", 
        ))->addVariableColumn(array(
            'CanEdit'   => 1,
            'RelWidth'  => 2,
            'MinWidth'  => 70,
            'Name'      => "NodeCol",
            'CanFilter' => 1,
            'CanSort'   => 1,
            'Type'      => "Text",
            'Align'     => 'Left',
        ))->addVariableColumn(array(
            'CanEdit'   => 1,
            'Width'     => 0,
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
            'Align'     => 'Left',
        ))->addVariableColumn(array(
            'CanEdit'   => 1,
            'Width'     => 0,
            'MinWidth'  => 0,
            'Name'      => "Fecha",
            'CanFilter' => 1,
            'CanSort'   => 1,
            'Type'      => "Date", 
        ))->addDefaultRow(array(
            'Name'        => "R",    
            'Calculated'  => 1,
            'HtmlPrefix'  => "<span style=\"color:#FF9E0C\">",
            'HtmlPostfix' => "</span>",
            'CalcOrder'   => "Cantidad,Total",
        ))->setToolbar(array(
            'Cells'            => "Add,Reload,ExpandAll,CollapseAll,Total,Formula",
            'TotalType'        => "Int",
            'TotalLabelRight'  => "<b>Total</b>",
            'TotalFormula'     => "sum(\"Cantidad\")",
            'TotalHtmlPrefix'  => "<b>",
            'TotalHtmlPostfix' => "</b>"
        ));
        
        $layoutGenerator->setHeaderRow(array(
            'NodeCol' => $colGroup
        ));
        return array('gridLayoutGenerator' => $layoutGenerator);
    }
    
     /**
     * @Route("/grid-data", name="cd_grid_data_gastos", defaults={"_format" = "json"})
     * @Template("BaseEJSTreeGridBundle::gridData.json.twig")
     */
    public function gridDataAction() { 
        $colGroup      = $this->getRequest()->query->get("pcolGrouping");
        $d             = $this->getDoctrine();
        $user          = $this->getUser();
        $dataFormatter = new GridDataFormatter();

        switch ($colGroup) {
            // ---------------------------------------------------------------------------------------------
            case 'Categoria': 
                $gastos          = $d->getRepository('MySiteDataBaseBundle:Gasto')->loadRecentsByUserOrderCategoria($user);
                $categoriaActual = "";
                $categoriaLast   = "";
                $gastoActual     = "";
                $gastoLast       = "";
                $contador = 1;

                foreach ($gastos as $objGasto) { 
                    $categoriaActual = $objGasto->getDetalle()->getCategoria()->getDescripcion();
                    if($categoriaActual != $categoriaLast){
                        $dataFormatter->addRow(array(
                            'id'              => 'R' . $contador,
                            'NodeCol'         => $objGasto->getDetalle()->getCategoria()->getDescripcion(),
                            'CantidadFormula' => "sum()",
                            'CanDelete'       => 0,
                            'CanEdit'         => 0,
                            'Expanded'        => 1,
                            'CantidadCanEdit' => 1,
                            'HtmlPrefix'      => "<span style=\"color:#e25c5b;\">",
                            'HtmlPostfix'     => "</span>",
                        ));
                        $contador ++;
                    }

                    $gastoActual = $objGasto->getDetalle()->getDescripcion();
                    if($categoriaActual != $categoriaLast || $gastoActual != $gastoLast){
                        $dataFormatter->addSubRow(array(
                            'id'              => 'R' . $contador,
                            'NodeCol'         => $objGasto->getDetalle()->getDescripcion(),
                            'CantidadFormula' => "sum()",
                            'CanDelete'       => 0,
                            'CanEdit'         => 0,
                            'Expanded'        => 0,
                            'CantidadCanEdit' => 1,
                            'HtmlPrefix'      => "<span style=\"color:#599bd7\">",
                            'HtmlPostfix'     => "</span>",
                        ));
                        $contador ++;
                    }

                    $dataFormatter->addSubRow(array(
                        'id'              => $objGasto->getId(),
                        'Name'            => $objGasto->getCantidad() . ' / ' . $objGasto->getDetalle()->getDescripcion(),
                        'NodeCol'         => $objGasto->getFecha()->format('Y/m/d H:m:s'),
                        'NodeColFormat'   => "dddd dd MMMM yyyy hh:mm tt",
                        'NodeColType'     => "Date",
                        'Gasto'           => $objGasto->getDetalle()->getDescripcion(),
                        'Cantidad'        => $objGasto->getCantidad(),
                        'Fecha'           => $objGasto->getFecha()->format('Y/m/d H:m:s'),
                    ), 2);

                    $categoriaLast = $categoriaActual;
                    $gastoLast     = $gastoActual;
                }

                break;
                
            // ---------------------------------------------------------------------------------------------
            case 'Dia':
                $gastos          = $d->getRepository('MySiteDataBaseBundle:Gasto')->loadRecentsByUserOrderDia($user);
                $diaActual       = "";
                $diaLast         = "";
                $gastoActual     = "";
                $gastoLast       = "";
                $contador = 1;

                foreach ($gastos as $objGasto) { 
                    $diaActual   = $objGasto->getFecha()->format('Y/m/d');
                    $fechaGasto  = $objGasto->getFecha()->format('Y/m/d H:m:s');
                    $horaGasto   = $objGasto->getFecha()->format('h:m:s A');
                    $gastoActual = $objGasto->getDetalle()->getDescripcion();
                    $categoria   = $objGasto->getDetalle()->getCategoria()->getDescripcion();
                    
                    if($diaActual != $diaLast){
                        $dataFormatter->addRow(array(
                            'id'              => 'R' . $contador,
                            'NodeCol'         => $fechaGasto,
                            'NodeColFormat'   => "dddd dd MMMM yyyy",
                            'NodeColType'     => "Date",
                            'CantidadFormula' => "sum()",
                            'CanDelete'       => 0,
                            'CanEdit'         => 0,
                            'Expanded'        => 1,
                            'CantidadCanEdit' => 1,
                            'HtmlPrefix'      => "<span style=\"color:#7a9230;\">",
                            'HtmlPostfix'     => "</span>",
                        ));
                        $contador ++;
                    }

                    $dataFormatter->addSubRow(array(
                        'id'              => $objGasto->getId(),
                        'Name'            => $gastoActual . ' - ' . $objGasto->getId(),
                        'NodeCol'         => $gastoActual . ' | ' . $horaGasto . ' | ' . $categoria,
                        'Cantidad'        => $objGasto->getCantidad(),
                        'CanDelete'       => 1,
                        'CanEdit'         => 0,
                        'Expanded'        => 0,
                        'CantidadCanEdit' => 1,
                        'HtmlPrefix'      => "<span style=\"color:#599bd7;\">",
                        'HtmlPostfix'     => "</span>",
                    ), 1);
                  
                    $diaLast       = $diaActual;
                    $gastoLast     = $gastoActual;
                }
                break;
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
                                ->loadRecentsByUserOrderDia($objUser);
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
