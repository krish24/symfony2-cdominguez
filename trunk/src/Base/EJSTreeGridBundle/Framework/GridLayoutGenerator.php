<?php

namespace Base\EJSTreeGridBundle\Framework;

/**
 * Description of GridLayoutGenerator
 *
 * @author Luis Diego Flores Villalobos
 */
class GridLayoutGenerator {
    private $communication;     // <IO>
    private $configuration;     // <Cfg>
    private $defaultRows;       // <Def>, Child <D>
    private $defaultColumns;    // <DefCols>, Child <D>
    private $panel;             // <Panel>
    private $leftColumns;       // <LeftCols>, Child <C>
    private $variableColumns;   // <Cols>, Child <C>
    private $rightColumns;      // <Right>, Child <C>
    //En la Etiqueta Header se definen los nombres que llevaran las columnas.
    private $headerRow;         // <Header>
    private $solidRows;         // <Solid>, Child <Space> <I> <Group> <Search> <Toolbar> <Tabber>
    private $topRows;           // <Head>, Child <I> <Filter> <Header>
    private $variableRows;      // <Body>
    private $bottomRows;        // <Foot>
    private $toolbar;           // <Toolbar>
    private $configurationMenu; // <MenuCfg>
    private $pager;             // <Pager>
    private $zoom;              // <Zoom>, Child <Z>
    private $resources;         // <Resources>, Child <R>
    private $language;          // <Lang>, Child <Alert> <Text> <Gantt> <MenuButtons> <MenuCopy> <MenuCfg> <MenuFilter> <Format>
    private $shortFormat;       // <Par>, Child <P>
    private $changes;           // <Changes>, Child <I>
    private $spannedCells;      // <Spanned>, Child <I>
    private $filters;           // <Filters>, Child <I> <Filter>
    
    function __construct() {
        // Set default options
        $this->configuration = array(
            'Code'                => "STAEIPAPMKXSIB",
            'Style'               => "Modern",
            'SaveValues'          => 0,
            'ShowDeleted'         => 0,
            'DateStrings'         => 1,
            'NumberId'            => 1,
            'LastId'              => 1,
            'CaseSensitiveId'     => 1,
            'AutoUpdate'          => 0,
            'Selecting'           => 1,
            'Deleting'            => 0,
            'SearchExpand'        => 1,
            'ConstWidth'          => 0,
            'SafeCSS'             => 1,
            'MaxVScroll'          => 600,
            'NoFormatEscape'      => 1, // Renderisa el html de un String al aplicar los formatos
            'StandardFilter'      => 0, // Manera en que filtra los datos a la hora de buscar
            'ExportType'          => 'Expanded,Outline', // Export setting, all rows will be exported expanded and will be used Excel outline
        );
        /*
        $this->communication = $communication;
        $this->configuration = $configuration;
        */
        $this->defaultRows     = array();
        /*
        $this->defaultColumns = $defaultColumns;
        $this->panel = $panel;
        */
        $this->leftColumns     = array();
        $this->variableColumns = array();
        $this->rightColumns    = array();
        $this->headerRow       = array();
        /* 
        $this->solidRows = $solidRows;
        */
        $this->topRows         = array();
        $this->toolbar         = array(
                                    'Cells' => "Save,Reload,Repaint,Print,Export,ExpandAll,CollapseAll,Cfg"
                                 );
        /*
        $this->variableRows = $variableRows;
        $this->bottomRows = $bottomRows;
        $this->toolbar = $toolbar;
        $this->configurationMenu = $configurationMenu;
        $this->pager = $pager;
        $this->zoom = $zoom;
        $this->resources = $resources;
        $this->language = $language;
        $this->shortFormat = $shortFormat;
        $this->changes = $changes;
        $this->spannedCells = $spannedCells;
        $this->filters = $filters;
         */
    }

    public function setCommunication($communication) {
        $this->communication = $communication;
        
        return $this;
    }

    public function setConfiguration($configuration) {
        $this->configuration = array_merge($this->configuration, $configuration);
        
        return $this;
    }
    
    public function setConfigurationOption($option, $value) {
        $this->configuration[$option] = $value;
        
        return $this;
    }

    public function setDefaultRows($defaultRows) {
        $this->defaultRows = $defaultRows;
        
        return $this;
    }
    
    public function addDefaultRow($defaultRow) {
        $this->defaultRows[] = $defaultRow;
        
        return $this;
    }

    public function setDefaultColumns($defaultColumns) {
        $this->defaultColumns = $defaultColumns;
        
        return $this;
    }

    public function setPanel($panel) {
        $this->panel = $panel;
        
        return $this;
    }

    public function setLeftColumns($leftColumns) {
        foreach($leftColumns as $leftColumnAttributes) {
            $this->addLeftColumn($leftColumnAttributes);
        }
        
        return $this;
    }
    
    public function addLeftColumn($columnAttributes) {
        $defaultOptions = array(
            'CanEdit'   => 0,
            'Type'      => "Text",
        );
        $this->leftColumns[] = array_merge($defaultOptions, $columnAttributes);
        
        return $this;
    }

    public function setVariableColumns($variableColumns) {
        foreach($variableColumns as $variableColumnAttributes) {
            $this->addVariableColumn($variableColumnAttributes);
        }
        
        return $this;
    }
    
    public function addVariableColumn($columnAttributes) {
        $defaultOptions = array(
            'CanEdit'   => 0,
            'Type'      => "Text",
        );
        $this->variableColumns[] = array_merge($defaultOptions, $columnAttributes);
        
        return $this;
    }
    
    public function setRightColumns($rightColumns) {
        foreach($rightColumns as $righColumnAttributes) {
            $this->addRightColumn($righColumnAttributes);
        }
        
        return $this;
    }
    
    public function addRightColumn($columnAttributes) {
        $defaultOptions = array(
            'CanEdit'   => 0,
            'Type'      => "Text",
        );
        $this->rightColumns[] = array_merge($defaultOptions, $columnAttributes);
        
        return $this;
    }

    public function setHeaderRow($headerRow) {
        $this->headerRow = $headerRow;
        
        return $this;
    }
    
    public function addHeaderRowColumn($headerRowColumnName, $headerRowColumnHeader) {
        $this->headerRow[$headerRowColumnName] = $headerRowColumnHeader;
        
        return $this;
    }

    public function setSolidRows($solidRows) {
        $this->solidRows = $solidRows;
        
        return $this;
    }

    public function setTopRows($topRows) {
        $this->topRows = $topRows;
        
        return $this;
    }
    
    public function addTopRowItem($itemAttributes) {
        $defaultOptions = array();
        $this->topRows[] = array_merge($defaultOptions, $itemAttributes);
        
        return $this;
    }
    
    public function addTopRowFilter($filterAttributes) {
        $defaultOptions = array('Kind' => 'Filter');
        $this->topRows[] = array_merge($defaultOptions, $filterAttributes);
        
        return $this;
    }
    
    public function addTopRowHeader($headerAttributes) {
        $defaultOptions = array();
        $this->topRows[] = array_merge($defaultOptions, $headerAttributes);
        
        return $this;
    }

    public function setVariableRows($variableRows) {
        $this->variableRows = $variableRows;
        
        return $this;
    }

    public function setBottomRows($bottomRows) {
        $this->bottomRows = $bottomRows;
        
        return $this;
    }

    public function setToolbar($toolbar) {
        $this->toolbar = $toolbar;
        
        return $this;
    }

    public function setConfigurationMenu($configurationMenu) {
        $this->configurationMenu = $configurationMenu;
        
        return $this;
    }

    public function setPager($pager) {
        $this->pager = $pager;
        
        return $this;
    }

    public function setZoom($zoom) {
        $this->zoom = $zoom;
        
        return $this;
    }

    public function setResources($resources) {
        $this->resources = $resources;
        
        return $this;
    }

    public function setLanguage($language) {
        $this->language = $language;
        
        return $this;
    }

    public function setShortFormat($shortFormat) {
        $this->shortFormat = $shortFormat;
        
        return $this;
    }

    public function setChanges($changes) {
        $this->changes = $changes;
        
        return $this;
    }

    public function setSpannedCells($spannedCells) {
        $this->spannedCells = $spannedCells;
        
        return $this;
    }

    public function setFilters($filters) {
        $this->filters = $filters;
        
        return $this;
    }

    public function getLayoutSettings() {
        return array_filter(array(
            'IO'        => $this->communication,
            'Cfg'       => $this->configuration,
            'Def'       => $this->defaultRows,
            'DefCols'   => $this->defaultColumns,
            'Panel'     => $this->panel,
            'LeftCols'  => $this->leftColumns,
            'Cols'      => $this->variableColumns,
            'RightCols' => $this->rightColumns,
            'Header'    => $this->headerRow,
            'Solid'     => $this->solidRows,
            'Head'      => $this->topRows,
            'Body'      => $this->variableRows,
            'Foot'      => $this->bottomRows,
            'Toolbar'   => $this->toolbar,
            'MenuCfg'   => $this->configurationMenu,
            'Pager'     => $this->pager,
            'Zoom'      => $this->zoom,
            'Resources' => $this->resources,
            'Lang'      => $this->language,
            'Par'       => $this->shortFormat,
            'Changes'   => $this->changes,
            'Spanned'   => $this->spannedCells,
            'Filters'   => $this->filters,
        ));
    }
}
