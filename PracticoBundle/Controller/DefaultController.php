<?php

namespace Prog\PracticoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Prog\PracticoBundle\Modelo\Modelo;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $parametros=array(
            'mensaje'=>'Bienvenido a Mi Web de Nutricion',
            'fecha'=>date('d-m-yy'),
        );
        return $this->render('ProgPracticoBundle:Default:index.html.twig', $parametros);
    }
    
    public function contactoAction()
    {
        $parametros=array(
            'nombre'=>'Yanina Ovejero',
            'telefono'=>'383-234386',
        );
        return $this->render('ProgPracticoBundle:Default:contacto.html.twig', $parametros);
    }
    
    public function listarAction()
    {
        $base=new Modelo();
        
        $parametros=array(
            'alimentos'=>$base->MostrarAlimentos(),
        );
        return $this->render('ProgPracticoBundle:Default:MostrarAlimentos.html.twig', $parametros);
    }
    
    public function verAction($id)
    {
        $base=new Modelo();
       
        $parametros=array(
            'alimentos'=>$base->unAlimento($id),
            );
        return $this->render('ProgPracticoBundle:Default:VerAlimentos.html.twig', $parametros);
    }
    public function buscarPorNombreAction()
    {
        $parametros=array(
            'nombre'=>'',
            'resultado'=>array(),
            );
        $base=new Modelo();
       
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $parametros['nombre']=$_POST['nombre'];
            $parametros['resultado']=$base->buscarAlimento($_POST['nombre']);
        }
        
        return $this->render('ProgPracticoBundle:Default:BuscarAlimentos.html.twig', $parametros);
    } 
    public function insertarAction()
    {
        $parametros=array(
            'nombre'=>'',
            'energia'=>'',
            'proteina'=>'',
            'hidratocarbono'=>'',
            'fibra'=>'',
            'grasatotal'=>'',
            );
        $base=new Modelo();
       
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $base->insertarAlimento($_POST['nombre'], $_POST['energia'], $_POST['proteina'], $_POST['hidratocarbono'], $_POST['fibra'], $_POST['grasa']);
            $parametros['mensaje']='Alimento Insertado';
        }
        else
        {
          $parametros=array(
            'nombre'=>'',
            'energia'=>'',
            'proteina'=>'',
            'hidratocarbono'=>'',
            'fibra'=>'',
            'grasatotal'=>'',
            );
          $parametros['mensaje']='No se pudo insertar, revise...';
        }
        return $this->render('ProgPracticoBundle:Default:InsertarAlimentos.html.twig', $parametros);
    }   
}
