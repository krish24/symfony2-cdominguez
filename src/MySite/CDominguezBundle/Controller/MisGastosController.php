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

/**
 * @Route("/MisGastos")
 */
class MisGastosController extends Controller
{
    /** 
     * @Route("/", name="cd_mis_gastos")
     * @Template("MySiteCDominguezBundle::CDominguez/misgastos.html.twig")
     */
    public function misGastosAction(){
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

        return array(
            'gridOptionsGenerator' => $gridOptionsGenerator
        );
    }
    
     /**
     * @Route("/GridLayout", name="cd_grid_layout_gastos", defaults={"_format" = "json"})
     * @Template("BaseEJSTreeGridBundle::gridLayout.json.twig")
     */
    public function gridLayoutAction(){
        $layoutGenerator = new GridLayoutGenerator();
        $layoutGenerator->setConfiguration(array(
            'Deleting'       =>  0,
            'AutoUpdate'     =>  1,
            'Dragging'       =>  0,
            'Adding'         =>  0,
            'Selecting'      =>  1,
            'SearchDefs'     =>  "Node",
            'SearchExpand'   =>  1,
            'ConstWidth'     =>  0,
            'SafeCSS'        =>  1,
            'MaxVScroll'     => 600,
            'NoFormatEscape' =>  1,
            'StandardFilter' =>  0,
            'ExportType'     => "Expanded,Outline",
            
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
            'CanEdit'   => 0,
            'RelWidth'  => 2,
            'MinWidth'  => 70,
            'Name'      => "Categoria",
            'CanFilter' => 1,
            'CanSort'   => 1,
            'Type'      => "Text",
        ))->addVariableColumn(array(
            'CanEdit'   => 0,
            'RelWidth'  => 2,
            'MinWidth'  => 70,
            'Name'      => "Gasto",
            'CanFilter' => 1,
            'CanSort'   => 1,
            'Type'      => "Text",
        ))->addVariableColumn(array(
            'CanEdit'   => 0,
            'RelWidth'  => 2,
            'MinWidth'  => 110,
            'Name'      => "Fecha",
            'CanFilter' => 1,
            'CanSort'   => 1,
            'Type'      => "Date", 
        ))->addVariableColumn(array(
            'CanEdit'   => 0,
            'RelWidth'  => 1,
            'MinWidth'  => 30,
            'Name'      => "Cantidad",
            'CanFilter' => 1,
            'CanSort'   => 1,
            'Type'      => "Int",        
        ))->setToolbar(array(
            'Cells' => "Style,Reload,Repaint,Print,Export,ExpandAll,CollapseAll,Cfg,Formula"
        ));
        
        return array('gridLayoutGenerator' => $layoutGenerator);
    }
    
     /**
     * @Route("/GridData", name="cd_grid_data_gastos", defaults={"_format" = "json"})
     * @Template("BaseEJSTreeGridBundle::gridData.json.twig")
     */
    public function gridDataAction() { 
        $em            = $this->getDoctrine()->getEntityManager();
        $gastos        = $em->getRepository('MySiteDataBaseBundle:Gasto')->findAll();
        $dataFormatter = new GridDataFormatter();

        foreach ($gastos as $objGasto) { 
            $dataFormatter->addRow(array(
                'id'        => $objGasto->getId(),
                'Categoria' => $objGasto->getDetalle()->getCategoria()->getDescripcion(),
                'Gasto'     => $objGasto->getDetalle()->getDescripcion(),
                'Cantidad'  => $objGasto->getCantidad(),
                'Fecha'     => $objGasto->getFecha()->format('d-M-Y h:m:s')
            ));
        }
        return array('gridDataFormatter' => $dataFormatter);
    }
}