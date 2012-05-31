<?php

namespace MySite\CDominguezBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;

use Base\EJSTreeGridBundle\Framework\GridOptionsGenerator,
    Base\EJSTreeGridBundle\Framework\GridLayoutGenerator,
    Base\EJSTreeGridBundle\Framework\GridDataFormatter;

class CDominguezController extends Controller
{
    /**
     * @Route("/", name="cd_index")
     * @Template("MySiteCDominguezBundle::CDominguez/dashboard.html.twig")
     */
    public function indexAction()
    {
        return array('name' => 'Carlos Fernando');
    }
    
     /**
     * @Route("/Dashboard", name="cd_dashboard")
     * @Template("MySiteCDominguezBundle::CDominguez/dashboard.html.twig")
     */
    public function dashboardAction()
    {
        $router = $this->get('router');
        $gridOptionsGenerator = new GridOptionsGenerator(
            'ContainerGridCDominguez'
        );
        $gridOptionsGenerator
            ->setGridId('GridCDominguez')
            ->setOptions(array(
                'Layout_Url'        => $router->generate('cd_grid_layout'),
                'Data_Url'          => $router->generate('cd_grid_data'),
                'Upload_Url'        => $router->generate('cd_upload_grid_default'),
                'Export_Url'        => $router->generate('cd_export_grid'),
            ));

        return array(
            'name'                  => 'Carlos Fernando',
            'gridOptionsGenerator'  => $gridOptionsGenerator
        );
    }
    
     /**
     * @Route("/GridLayout", name="cd_grid_layout", defaults={"_format" = "json"})
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
                'id'                  => "Filter",
                'NoColorState'        =>  1,
                'LogonNameCanEdit'    =>  1,
                'LogonNameType'       => "Text",
                'LogonNameSuggest'    => "|*RowsCanFilter",
                'DisplayNameButton'   => "Defaults",
                'DisplayNameShowMenu' =>  0,
                'DisplayNameRange'    =>  1,
                'DisplayNameDefaults' => "{Position:{Align:'below center'},Items:[{Name:'*FilterOff'},'-',{Columns:3,Items:'|*RowsAllCanFilter'}]}",
        ))->addLeftColumn(array(
                'CanEdit'   => 0,
                'Width'     => 0,
                'Name'      => "id",
                'Type'      => "Text",
        ))->addLeftColumn(array(
                'CanEdit'   => 0,
                'RelWidth'  => 1,
                'Name'      => "LogonName",
                'CanFilter' => 1,
                'CanSort'   => 0,
                'Type'      => "Text",
        ))->addVariableColumn(array(
                'CanEdit'   => 0,
                'RelWidth'  => 1,
                'Name'      => "DisplayName",
                'CanFilter' => 1,
                'CanSort'   => 1,
                'Type'      => "Text",
        ))->addVariableColumn(array(
                'CanEdit'   => 0,
                'RelWidth'  => 1,
                'Name'      => "Domain",
                'CanFilter' => 1,
                'CanSort'   => 1,
                'Type'      => "Text",
        ))->addVariableColumn(array(
                'CanEdit'   => 0,
                'RelWidth'  => 1,
                'Name'      => "Department",
                'CanFilter' => 1,
                'CanSort'   => 1,
                'Type'      => "Text",
        ))->addVariableColumn(array(
               'CanEdit'   => 0,
                'RelWidth'  => 1,
                'Name'      => "Email",
                'CanFilter' => 1,
                'CanSort'   => 1,
                'Type'      => "Text",
        ))->addVariableColumn(array(
                'CanEdit'   => 0,
                'RelWidth'  => 1,
                'Name'      => "FirstName",
                'CanFilter' => 1,
                'CanSort'   => 1,
                'Type'      => "Text",
        ))->addVariableColumn(array(
                'CanEdit'   => 0,
                'RelWidth'  => 1,
                'Name'      => "Surname",
                'CanFilter' => 1,
                'CanSort'   => 1,
                'Type'      => "Text",
        ))->addVariableColumn(array(
                'CanEdit'   => 0,
                'Def'       => "GroupsDef",
                'Name'      => "Groups",
                'CanSort'   => 0,
                'Width'     => 65,
                'CanFilter' => 0,
                'CanSort'   => 0,
                'Type'      => "Text",
        ))->addDefaultRow(array(
                'Name'          => "GroupsDef",
                'GroupsFormat'  => "|0|<span >|</span>",
        ))->setToolbar(array(
            'Cells' => "Reload,Repaint,Print,Export,ExpandAll,CollapseAll,Cfg"
        ));
        
        return array('gridLayoutGenerator' => $layoutGenerator);
    }
    
     /**
     * @Route("/GridData", name="cd_grid_data", defaults={"_format" = "json"})
     * @Template("BaseEJSTreeGridBundle::gridData.json.twig")
     */
    public function gridDataAction() {
        
        $DBAccess = new DBDataGridAccess();
        $datos = $DBAccess->loadAllUsers($this);
        
        $dataFormatter = new GridDataFormatter();

        foreach ($datos as $objUser) {
            $dataFormatter->addRow(array(
                'id'           => rtrim($objUser->getLogonName()),
                'LogonName'    => rtrim($objUser->getLogonName()),
                'DisplayName'  => rtrim($objUser->getDisplayName()),
                'Domain'       => rtrim($objUser->getDomain()),
                'Department'   => rtrim($objUser->getDepartment()),
                'Email'        => rtrim($objUser->getEmail()),
                'FirstName'    => rtrim($objUser->getFirstName()),
                'Surname'      => rtrim($objUser->getSurname()),
                'Groups'       => "Show",
                'GroupsFormat' => "|0|<span LogonName=\"" . rtrim($objUser->getLogonName()) . "\" ><B>|</B></span> ",
            ));
        }
        return array('gridDataFormatter' => $dataFormatter);
    }
    
}
