<?php

namespace Prog\PracticoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $name="hola";
        return $this->render('ProgPracticoBundle:Default:index.html.twig', array('name' => $name));
    }
}
