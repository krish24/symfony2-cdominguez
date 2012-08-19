<?php

namespace MySite\CDominguezBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use MySite\DataBaseBundle\Entity\Gasto;
use MySite\DataBaseBundle\Entity\Cuenta;
use MySite\DataBaseBundle\Entity\GastoDetalle;
use MySite\DataBaseBundle\Entity\Categoria;
use MySite\CDominguezBundle\Clases\ChartHelper;
use Symfony\Bundle\FrameworkBundle\Templating\Asset\PathPackage;
use Base\EJSTreeGridBundle\Framework\GridOptionsGenerator,
    Base\EJSTreeGridBundle\Framework\GridLayoutGenerator,
    Base\EJSTreeGridBundle\Framework\GridDataFormatter;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/gastos")
 */
class GastosController extends Controller
{
    /** 
     * @Route("/", name="cd_gastos")
     * @Template("MySiteCDominguezBundle::Gastos/index.html.twig")
     */
    public function gastosAction() {
        $router               = $this->get('router');
        $repoUser             = $this->getDoctrine()->getRepository('MySiteDataBaseBundle:Usuario');
        $objUser              = $this->getUser();
        $dineroGastado        = $repoUser->getDineroGastado($objUser);
        $dineroApartado       = $repoUser->getDineroApartado($objUser);
        $gridOptionsGenerator = new GridOptionsGenerator('ContainerGastosGrid');
        
        $gridOptionsGenerator
            ->setGridId('GastosGrid')
            ->setOptions(array(
                'Layout_Url'        => $router->generate('cd_grid_layout_gastos', array( 'pcolGrouping' => 'Dia')),
                'Data_Url'          => $router->generate('cd_grid_data_gastos', array( 'pcolGrouping' => 'Dia')),
                'Upload_Url'        => $router->generate('cd_upload_grid_default'),
                'Export_Url'        => $router->generate('cd_export_grid'),
            ));
        
        return array(
            'gridOptionsGenerator' => $gridOptionsGenerator,
            'dineroGastado'        => $dineroGastado,
            'dineroApartado'       => $dineroApartado,
            'dataChartTop15'       => $this->getDataChartTop15()
        );
    }
    
     /**
     * @Route("/grid-layout", name="cd_grid_layout_gastos", defaults={"_format" = "json"})
     * @Template("BaseEJSTreeGridBundle::gridLayout.json.twig")
     */
    public function gridLayoutAction() {
        $request         = $this->getRequest();
        $asset           = new PathPackage($request);
        $colGroup        = $request->query->get("pcolGrouping");
        $layoutGenerator = new GridLayoutGenerator();
        $layoutGenerator->setConfiguration(array(
            'SearchExpand'     =>  1,
            'NoFormatEscape'   =>  1,
            'StandardFilter'   =>  2,
            'NoVScroll'        =>  1,
            'Dragging'         =>  1,
            'Adding'           =>  1,
            'MaxVScroll'       =>  2500,
            'MainCol'          =>  "NodeCol",
            'Style'            =>  "Query",   
            'ExportType'       =>  "Expanded,Outline",
        ));
        
        if(isset($colGroup)){
            if($colGroup == 'Categoria'){
                $layoutGenerator->setConfigurationOption('Sort','-Cantidad');
            }
        }
        
        $layoutGenerator->setTopRows(array(
            array(
                "Color"                   => "#e8f4ff",
                "ConfigHtmlPrefixFormula" => "",
                "HtmlPostfix"             => "</span>",
                "HtmlPrefix"              => "<span>",
                "NodeColCanEdit"          => "0",
                "NodeCol"                 => "Total",
                "NodeColAlign"            => "Center",
                "CantidadFormula"         => "sum(\"Cantidad\")"
            )
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
            'MinWidth'  => 45,
            'Name'      => "Cantidad",
            'CanFilter' => 1,
            'CanSort'   => 1,
            'Type'      => "Int",  
            'Format'    => "¢ #,###",
            'Align'     => 'Left',
        ))->addVariableColumn(array(
            'CanEdit'   => 1,
            'Width'     => 0,
            'MinWidth'  => 0,
            'Name'      => "Fecha",
            'CanFilter' => 1,
            'CanSort'   => 1,
            'Type'      => "Date", 
        ))->addRightColumn(array(
            'CanEdit'   => 1,
            'Width'     => 50,
            'Name'      => "Config",
            'CanFilter' => 0,
            'CanSort'   => 0,
            'Type'      => "Text",      
            'Align'     => 'Left',
        ))->addDefaultRow(array(
            'Name'                    => "R",    
            'Calculated'              => 1,
            'ConfigHtmlPrefixFormula' => "'<a class=\"da-button blue small\" onclick=\"alert(' + '\'' + Row.id + '\'' + ')\"><img title=\"Editar gasto\" src=\"" . $asset->getUrl('images/icons/color/pencil.png') . "\"></a><a class=\"da-button blue small\" onclick=\"alert(' + '\'' + Row.id + '\'' + ')\"><img title=\"Eliminar gastos\" src=\"" . $asset->getUrl('images/icons/color/cross.png') . "\"></a>'",
            'HtmlPrefix'              => "<span style=\"color:#FF9E0C\">",
            'HtmlPostfix'             => "</span>",
            'CalcOrder'               => "Cantidad,Total,ConfigHtmlPrefix",
        ))->setToolbar(array(
            'Cells'            => "Add,Reload,ExpandAll,CollapseAll,Formula",
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
                            'id'              => 'Categoria_' . $objGasto->getDetalle()->getCategoria()->getId(),
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
                            'id'              => 'Detalle_' . $objGasto->getDetalle()->getId(),
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
                        'id'              => 'Gasto_' . $objGasto->getId(),
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
                            'id'              => 'Ignore_' . $contador,
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
                        'id'              => 'Gasto_' . $objGasto->getId(),
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
        return $this->redirect($this->generateUrl('cd_gastos', array('s' => 1)));
    }

    /**
     * Funcion que se encarga de obtener la información para el Grafico.
     */
    public function getDataChartTop15(){ 
        $objChart   = new ChartHelper($this->getDoctrine());
        $objUser    = $this->getUser();
        $query      = "call proc_getDataChartTop15GastosActuales(:pidUser)";
        $params     = array( ':pidUser' => $objUser->getId() );        
        $dataResult = $objChart->getDataChart($query, $params);
        return $dataResult;
    }
}
