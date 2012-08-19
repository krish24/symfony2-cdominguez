<?php

namespace MySite\CDominguezBundle\Clases;

/**
 * Description of ChartHelper
 *
 * @author Carlos Dominguez Lara
 */
class ChartHelper {
    private $doctrine;
    
    public function __construct($doctrine){
        $this->doctrine = $doctrine;
    }
    
    /**
     * Obtiene los datos para el grafico.
     * @return array Json Con el formato correcto para crear el Grafico
     */
    public function getDataChart($pquery, $pparams){ 
        $connection = $this->doctrine->getConnection();
        $query      = $pquery;
        $dataChart = array(); 
        $colors     = array(
            '#FF6300', '#FF00D0', '#35FE00', '#368B90', '#004D06', '#D4FE7F', '#00FFD7', '#000FFF', 
            '#481D57', '#008CFE', '#FF82A2', '#00FE72', '#FEEE00', '#FF0A00', '#EDC5FF', '#220077'
        );
        //Make randoms positions for colors in array.
        shuffle($colors);
                      
        $statement = $connection->prepare($query);
        $statement->execute($pparams);
        
        $data = $statement->fetchAll(\PDO::FETCH_ASSOC);
        $dataCategories = $this->formatDataChart($data);
        
        foreach ($dataCategories as $indexC => $categoria) {
            $dataDetalles = array();
            
            foreach ($categoria['detalles'] as $indexD => $detalle) {
                $dataDetalles[] = array(
                    'color' => $colors[$indexD],
                    'name'  => $detalle['detalle'],
                    'data'  => array(
                        array(
                            'y'     => intval($detalle['totaldetalle'])
                        )
                    )
                );
            }
            
            $dataChart[] = array(
                'color' => $colors[$indexC],
                'name'  => $categoria['categoria'],
                'data'  => array(
                    array(
                        'y'         => intval($categoria['totalcategoria']),
                        'drilldown' => array(
                            'name'      => $categoria['categoria'],
                            'data'      => $dataDetalles
                        )
                    )
                )
            );
        }       
        
        return array(
            "dataChart" => $dataChart,
            "colors"     => $colors,
        ); 
    }
    
    /**
     * FUNCION QUE SE ENCARGA DE DARLE EL FORMATO CORRECTO A LOS DATOS PARA EL GRAFICO TOP 15
     * NOTA: El array tiene que venir ordenado Categorias, Detalles.
     */
    public function formatDataChart($data){
        $result                    = array();
        $actualCategoria           = "";
        $lastCategoria             = "";
        
        foreach ($data as $row) {
            $actualCategoria = $row['categoria'];
            
            if($actualCategoria != $lastCategoria){
                if(isset($dataCategoria)){
                    $result[] = $dataCategoria;
                }
                
                $dataCategoria                   = array();
                $dataCategoria["categoria"]      = $row['categoria'];
                $dataCategoria["idcategoria"]    = $row['idcategoria'];
                $dataCategoria["totalcategoria"] = $row['totalcategoria'];
                $dataCategoria["detalles"]       = array();
            }
            
            $dataCategoria["detalles"][] = array(
                "detalle"      => $row['detalle'],
                "iddetalle"    => $row['iddetalle'],
                "totaldetalle" => $row['totaldetalle']
            );
            
            $lastCategoria = $actualCategoria;
        }
        
        if(isset($dataCategoria)){
            $result[] = $dataCategoria;
        }
        
        return $result;
    }
}
