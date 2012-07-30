<?php

namespace MySite\CDominguezBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;

class SecurityController extends Controller
{
    public function loginAction() {
        $r = $this->get('request');
        $s = $r->getSession();
        if ($r->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $r->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = $s->get(SecurityContext::AUTHENTICATION_ERROR);
        }
        $last_username = $s->get(SecurityContext::LAST_USERNAME);
        
        return $this->render('MySiteCDominguezBundle:Security:login.html.twig', array(
            'last_username' => $last_username,
            'error'         => $error
        ));
    }
}
