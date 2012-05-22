<?php

namespace Base\EJSTreeGridBundle\Framework;

/**
 * Description of GridOptionsGenerator
 *
 * @author Luis Diego Flores Villalobos
 */
class GridOptionsGenerator {
    private $options;
    private $containerId;
    private $gridId;

    function __construct($containerId, $options = array(), $gridId = 'treegrid') {
        $this->containerId = $containerId;
        $this->gridId = $gridId;
        
        $defaultOptions = array(
            'Debug'             => 1,
            'Layout_Format'     => 'JSON',
            'Data_Format'       => 'JSON',
            'Upload_Format'     => 'Internal',
            'Upload_Data'       => 'TGData',
            'Export_Data'       => 'TGData',
            'Export_Param_File' => 'Grid',
        );
        $this->setOptions(array_merge($defaultOptions, $options));
    }

    
    public function getOptions() {
        return $this->options;
    }

    public function setOptions($options) {
        foreach($options as $option => $value) {
            $this->setOption($option, $value);
        }
        
        return $this;
    }
    
    public function setOption($option, $value) {
        $optionHierarchy = explode('_', $option);

        $params = &$this->options;    
        foreach($optionHierarchy as $nestedOption) {
            $params = &$params[$nestedOption];
        }
        $params = $value;
        unset($params);
        
        return $this;
    }

    public function getContainerId() {
        return $this->containerId;
    }

    public function setContainerId($containerId) {
        $this->containerId = $containerId;
        
        return $this;
    }

    public function getGridId() {
        return $this->gridId;
    }

    public function setGridId($gridId) {
        $this->gridId = $gridId;
        
        return $this;
    }
}