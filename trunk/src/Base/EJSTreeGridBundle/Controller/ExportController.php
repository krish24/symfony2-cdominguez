<?php

namespace Base\EJSTreeGridBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class ExportController extends Controller
{ 
     /**
     * @Route("/ExportGrid", name="cd_export_grid")
     */
    public function exportGrid() {
        $file = array_key_exists("File", $_REQUEST) ? $_REQUEST["File"] : "";
        if ($file == ""){
            $file = "Export.xls";
        }
        
        $response = new Response();
        $response->setStatusCode(200);
        $response->headers->set('Content-Type', "application/vnd.ms-excel");
        $response->headers->set('Cache-Control', "must-revalidate");
        $response->headers->set('Content-Disposition', sprintf('attachment;filename="%s.xls"', $file));
        
        $XML = array_key_exists("TGData", $_REQUEST) ? $_REQUEST["TGData"] : "";
        if (get_magic_quotes_gpc()){
            $XML = stripslashes($XML);
        }
        $html = html_entity_decode($XML);
        $html = htmlspecialchars_decode($html);
        $response->setContent($html);
        return $response;
    }
    
    /**
     * @Route("/ExportGridWord", name="cd_export_grid_word")
     */
    public function exportGridWord() {
        $file = array_key_exists("File", $_REQUEST) ? $_REQUEST["File"] : "";
    
        if ($file == ""){
            $file = "Export.doc";
        }
        
        $response = new Response();
        $response->setStatusCode(200);
        $response->headers->set('Content-Type', "application/vnd.ms-word");
        $response->headers->set('Cache-Control', "must-revalidate");
        $response->headers->set('Content-Disposition', sprintf('attachment;filename="%s.doc"', $file));
        
        $XML = array_key_exists("TGData", $_REQUEST) ? $_REQUEST["TGData"] : "";
        if (get_magic_quotes_gpc()){
            $XML = stripslashes($XML);
        }
        
        $response->setContent(html_entity_decode($XML));
        return $response;
    }
    
}
