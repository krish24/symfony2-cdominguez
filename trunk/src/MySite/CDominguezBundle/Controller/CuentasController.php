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
 * @Route("/cuentas")
 */
class CuentasController extends Controller
{
    /** 
     * @Route("/", name="cd_cuentas")
     * @Template()
     */
    public function cuentasAction() {
        $r             = $this->getRequest();
        $router        = $this->get('router');
        $idCuenta      = $r->query->get('pidCuenta');
        $dineroGastado = $this->getDoctrine()
                                ->getRepository('MySiteDataBaseBundle:Usuario')
                                ->getDineroGastado($this->getUser());
        
        if(!isset($idCuenta)){
            $viewRender  = 'MySiteCDominguezBundle::Cuentas/index.html.twig';
            $paramsGrid = array(
                'ptypeData' => 'All'
            );
            $paramsView['dataChartTop15'] = $this->getDataChartTop15();
        }else{
            $colGrouping = $r->query->get('pcolGrouping');
            $viewRender  = 'MySiteCDominguezBundle::Cuentas/verCuenta.html.twig';
            $paramsGrid = array(
                'ptypeData'    => 'One',
                'pidCuenta'    => $idCuenta,
                'pcolGrouping' => $colGrouping
            );
        }
        
        $gridOptionsGenerator = new GridOptionsGenerator(
            'ContainerCuentasGrid'
        ); 
        
        $gridOptionsGenerator
            ->setGridId('CuentasGrid')
            ->setOptions(array(
                'Layout_Url' => $router->generate('cd_grid_layout_cuentas', $paramsGrid),
                'Data_Url'   => $router->generate('cd_grid_data_cuentas', $paramsGrid),
                'Upload_Url' => $router->generate('cd_upload_grid_default'),
                'Export_Url' => $router->generate('cd_export_grid'),
            ));

        $paramsView['gridOptionsGenerator'] = $gridOptionsGenerator;
        $paramsView['dineroGastado']        = $dineroGastado;
        $paramsView['idCuenta']             = $idCuenta;
        
        return $this->render($viewRender, $paramsView);
    }
    
    /**
     * @Route("/grid-layout", name="cd_grid_layout_cuentas", defaults={"_format" = "json"})
     * @Template("BaseEJSTreeGridBundle::gridLayout.json.twig")
     */
    public function gridLayoutAction() {
        $r            = $this->getRequest();
        $pcolGrouping = $r->query->get('pcolGrouping');
        //$typeData     = $r->query->get("ptypeData"); //All, One
        
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
        ));
        
        if(isset($pcolGrouping)){
            if($pcolGrouping == 'Categoria'){
                $layoutGenerator->setConfigurationOption('Sort','-Cantidad');
            }
        }
        
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
            'NodeCol' => 'Cuenta'
        ));
        
        return array('gridLayoutGenerator' => $layoutGenerator);
    }
    
     /**
     * @Route("/grid-data", name="cd_grid_data_cuentas", defaults={"_format" = "html"})
     * @Template("BaseEJSTreeGridBundle::gridData.json.twig")
     */
    public function gridDataAction() { 
        $typeData = $this->getRequest()->query->get("ptypeData"); //All, One
        switch ($typeData) {
            case 'All':
                $data = $this->getDataAll();
                break;
            
            case 'One':
                $data = $this->getDataOne();
                break;
        }
        return array('gridDataFormatter' => $data);
    }

    /**
     * Funcion que se encarga de obtener la información para el Grafico.
     */
    public function getDataChartTop15(){ 
        $objUser    = $this->getUser();
        $connection = $this->getDoctrine()->getConnection();
        $query      = "call proc_getDataChartTop15(:pidUser)";
        $dataResult = array(); 
        
        $statement = $connection->prepare($query);
        $statement->execute(array(
            ':pidUser' => $objUser->getId()
        ));
        $data = $statement->fetchAll(\PDO::FETCH_GROUP);
        
        foreach ($data as $nameCategory => $detallesCategory) {
            $dataDetalles = array();
            $totalCategoria = 0;
            
            foreach ($detallesCategory as $detalle) {
                $dataDetalles[] = array(
                    'name' => $detalle['detalle'],
                    'data' => array(
                        array(
                            'y' => intval($detalle['totaldetalle'])
                        )
                    )
                );
                $totalCategoria = intval($detalle['totalcategoria']);
            }
            
            $dataResult[] = array(
                'name' => $nameCategory,
                'data' => array(
                    array(
                        'y'         => $totalCategoria,
                        'drilldown' => array(
                            'name'      => $nameCategory,
                            'data'      => $dataDetalles
                        )
                    )
                )
            );
        }            
        return $dataResult;
    }
    
    /**
     * FUNCION PARA OBTENER LA INFORMACIÓN DE LAS CUENTAS.
     */
    public function getDataAll() {
        $objUser       = $this->getUser();
        $dataFormatter = new GridDataFormatter();
        $cuentas       = $objUser->getCuentas()->toArray();
        $contador      = 1;
        
        foreach ($cuentas as $objCuenta){
            $fechaCierre = $objCuenta->getFechaCierre()->format('Y/m/d H:m:s');
            
            $dataFormatter->addRow(array(
                'id'              => $objCuenta->getId(),
                'NodeCol'         => $fechaCierre,
                'NodeColFormat'   => "ID: [" . $objCuenta->getId() . "] dddd dd MMMM yyyy",
                'NodeColType'     => "Date",
                'Cantidad'        => $objCuenta->getTotal(),
                'CanDelete'       => 0,
                'CanEdit'         => 0,
                'CantidadCanEdit' => 0,
                'HtmlPrefix'      => "<span style=\"color:#e25c5b;\">",
                'HtmlPostfix'     => "</span>",
            ));
            $contador ++;
        }
        
        return $dataFormatter;
    }
    
    /**
     * FUNCION PARA OBTENER LA INFORMACIÓN DE UNA CUENTA SELECCIONADA.
     */
    public function getDataOne(){
        $r             = $this->getRequest();
        $colGroup      = $r->query->get("pcolGrouping");
        $idCuenta      = $r->query->get("pidCuenta");
        $d             = $this->getDoctrine();
        $dataFormatter = new GridDataFormatter();

        switch ($colGroup) {
            // ---------------------------------------------------------------------------------------------
            case 'Categoria': 
                $gastos          = $d->getRepository('MySiteDataBaseBundle:Gasto')->loadByCuentaOrderCategoria($idCuenta);
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
                $gastos          = $d->getRepository('MySiteDataBaseBundle:Gasto')->loadByCuentaOrderDia($idCuenta);
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
        
        return $dataFormatter;
    }
}
