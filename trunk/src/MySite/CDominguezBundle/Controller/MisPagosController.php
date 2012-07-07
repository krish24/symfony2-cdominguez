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
 * @Route("/mis-pagos")
 */
class MisPagosController extends Controller
{
    /** 
     * @Route("/", name="cd_mis_pagos")
     * @Template("MySiteCDominguezBundle::CDominguez/misPagos.html.twig")
     */
    public function misPagosAction() {
        $router = $this->get('router');
        
        $gridOptionsGenerator = new GridOptionsGenerator(
            'ContainerGastosGrid'
        );
        $gridOptionsGenerator
            ->setGridId('GastosGrid')
            ->setOptions(array(
                'Layout_Url'        => $router->generate('cd_grid_layout_pagos'),
                'Data_Url'          => $router->generate('cd_grid_data_pagos'),
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
     * @Route("/grid-layout", name="cd_grid_layout_pagos", defaults={"_format" = "json"})
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
            'Dragging'         =>  1,
            'Adding'           =>  1,
            'MaxVScroll'       =>  2500,
            'MainCol'          =>  "Categoria",
            'Style'            =>  "Query",   
            'Sort'             =>  "-Cantidad",
            'ExportType'       =>  "Expanded,Outline",
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
            'Name'      => "Categoria",
            'CanFilter' => 1,
            'CanSort'   => 1,
            'Type'      => "Text",
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
        
        return array('gridLayoutGenerator' => $layoutGenerator);
    }
    
     /**
     * @Route("/grid-data", name="cd_grid_data_pagos", defaults={"_format" = "json"})
     * @Template("BaseEJSTreeGridBundle::gridData.json.twig")
     */
    public function gridDataAction() { 
        $d             = $this->getDoctrine();
        $user          = $this->getUser();
        $gastos        = $d->getRepository('MySiteDataBaseBundle:Gasto')->loadRecentsByUser($user);
        $dataFormatter = new GridDataFormatter();

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
                    'Categoria'       => $objGasto->getDetalle()->getCategoria()->getDescripcion(),
                    'CantidadFormula' => "sum()",
                    'CanDelete'       => 0,
                    'CanEdit'         => 0,
                    'Expanded'        => 1,
                    'CantidadCanEdit' => 1,
                    'Class'           => "level1",
                    'HtmlPrefix'      => "<span style=\"color:#599bd7;font-weight:bold\">",
                    'HtmlPostfix'     => "</span>",
                ));
                $contador ++;
            }
            
            $gastoActual = $objGasto->getDetalle()->getDescripcion();
            if($gastoActual != $gastoLast){
                $dataFormatter->addSubRow(array(
                    'id'              => 'R' . $contador,
                    'Categoria'       => $objGasto->getDetalle()->getDescripcion(),
                    'CantidadFormula' => "sum()",
                    'CanDelete'       => 0,
                    'CanEdit'         => 0,
                    'Expanded'        => 0,
                    'CantidadCanEdit' => 1,
                    'Class'           => "level2",
                    'HtmlPrefix'      => "<span style=\"color:#e25c5b\">",
                    'HtmlPostfix'     => "</span>",
                ));
                $contador ++;
            }
            
            $dataFormatter->addSubRow(array(
                'id'              => $objGasto->getId(),
                'Name'            => $objGasto->getCantidad() . ' / ' . $objGasto->getDetalle()->getDescripcion(),
                'Categoria'       => $objGasto->getFecha()->format('Y/m/d h:m:s'),
                'CategoriaFormat' => "dddd dd MMMM yyyy hh:mm tt",
                'CategoriaType'   => "Date",
                'Gasto'           => $objGasto->getDetalle()->getDescripcion(),
                'Cantidad'        => $objGasto->getCantidad(),
                'Fecha'           => $objGasto->getFecha()->format('Y/m/d h:m:s'),
            ), 2);
            
            $categoriaLast = $categoriaActual;
            $gastoLast     = $gastoActual;
        }
        return array('gridDataFormatter' => $dataFormatter);
    }
}
