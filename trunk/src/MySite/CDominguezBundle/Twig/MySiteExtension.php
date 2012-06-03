<?php

namespace MySite\CDominguezBundle\Twig;

class MySiteExtension extends \Twig_Extension {

    // the magic function that makes this easy
    public function getFilters() {
        return array(
            'var_dump' => new \Twig_Filter_Function('var_dump')
        );
    }
    
    // for a service we need a name
    public function getName() {
        return 'mysite_extension';
    }

}