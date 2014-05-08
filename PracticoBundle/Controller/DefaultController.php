<?php

namespace Prog\PracticoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $parametros=array(
            'mensaje'=>'Bienvenido a Mi Web de Nutricion',
            'fecha'=>date('dd-mm-yyyy'),
        );
        return $this->render('ProgPracticoBundle:Default:index.html.twig', $parametros);
    }
    
}
