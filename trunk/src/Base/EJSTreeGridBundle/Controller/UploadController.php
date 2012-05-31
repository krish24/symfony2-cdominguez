<?php

namespace Base\EJSTreeGridBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use GlobalTool\ApprovalBundle\Framework\TreeGrid;
use GlobalTool\DatabaseBundle\Entity\DemandPlan\Version;
use GlobalTool\DatabaseBundle\Entity\DemandPlan\Detail;
use GlobalTool\DatabaseBundle\Entity\DemandPlan\DetailRepository;

class UploadController extends Controller
{ 
    /**
     * @Route("/UploadGridDefault", name="cd_upload_grid_default")
     */
    public function uploadGridDefault() {
        $xmlResult = "<Grid><IO Result='0'/></Grid>";
        $response = new Response();
        $response->setStatusCode(200);
        $response->headers->set('Content-Type', "text/xml");
        $response->headers->set('Cache-Control', "must-revalidate");
        $response->setContent($xmlResult);
        return $response;
    }
}
