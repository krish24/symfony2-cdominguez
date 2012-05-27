<?php

namespace MySite\CDominguezBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;

class CDominguezController extends Controller
{
    /**
     * @Route("/", name="cd_dashboard")
     * @Template("MySiteCDominguezBundle::CDominguez/dashboard.html.twig")
     */
    public function dashboardAction()
    {
        return array('name' => 'Carlos Fernando');
    }
}
