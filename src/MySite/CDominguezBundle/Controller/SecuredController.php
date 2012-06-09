<?php

namespace MySite\CDominguezBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

/**
 * @Route("")
 */
class SecuredController extends Controller
{
    /**
     * @Route("/login", name="cd_login")
     * @Template()
     */
    public function loginAction()
    {
        if ($this->get('request')->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $this->get('request')->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = $this->get('request')->getSession()->get(SecurityContext::AUTHENTICATION_ERROR);
        }

        return array(
            'last_username' => $this->get('request')->getSession()->get(SecurityContext::LAST_USERNAME),
            'error'         => $error,
        );
    }

    /**
     * @Route("/login_check", name="cd_security_check")
     */
    public function securityCheckAction()
    {
        $request = $this->getRequest();
        $username = $request->get('username');
        $password = $request->get('password');
        if($username != null && $password != null){
            $em = $this->getDoctrine()->getEntityManager();
            $userEntity = $em->getRepository('MySiteDataBaseBundle:Usuario')->findOneBy(array('username' => $username));
            if($userEntity != null && $userEntity->getPassword() == $password){
                $token = new UsernamePasswordToken($userEntity, null, 'cdominguezapp', array('ROLE_USER'));
                $this->get('security.context')->setToken($token);
                return $this->redirect($this->generateUrl('cd_index'));
            }
        }
        return $this->redirect($this->generateUrl('cd_login'));
    }

    /**
     * @Route("/logout", name="cd_logout")
     */
    public function logoutAction()
    {
        // The security layer will intercept this request
    }
}
