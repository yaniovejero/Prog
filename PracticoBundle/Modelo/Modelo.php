<?php
namespace Prog\PracticoBundle\Modelo;
class Modelo
{
    // guardo la conexion para que el objeto pueda usuarla siempre
    // proteje q no se borre y al usar protected permite que una clase
    //pueda heredar las funciones de la clase modelo
    protected $conexion;
    
    //al crear el objeto de la clase modelo el constructor se ejecuta 
    //automaticamente: ej. $bd=new Modelo()
    //conecta y selecciona la bd
    public function __construct() 
    {
        $dbconexion=  mysql_connect('localhost','root','');
        $dbbase= mysql_select_db('programacion');
        mysql_set_charset('utf-8');
        $this->conexion=$dbconexion;
    }
    
    //selecciona todos los alimentos de la base de datos, luego ejecuta 
    //la consulta query y pasa la consulta mas la conexion guardada
    //
    public function MostrarAlimentos()
    {
        $sql="select * from alimentos";
        $resultado=  mysql_query($sql,$this->conexion);
        //creo un vector vacio
        $alimentos=array();
        
        //recupero los alimentos de la consulta y los guardo uno a uno en el 
        //vector alimentos
        while($fila=  mysql_fetch_array($resultado))
        {
          $alimentos[]= $fila; 
        }
        //devuelve el vector a la clase  que lo llamo por ej: defaultcontroller
        //ej: $alimentos=$bd->MostrarAlimentos();
        
        return $alimentos;
    }
     public function unAlimento($id)
    {
        $sql="select * from alimentos where id=$id";
        $resultado=  mysql_query($sql,$this->conexion);
        $alimentos=array();
        
        while($fila=  mysql_fetch_array($resultado))
        {
          $alimentos[]= $fila; 
        }
        return $alimentos;
    }
    
    public function buscarAlimento($nombre)
    {
        $sql="select * from alimentos where nombre like '$nombre'";
        $resultado=  mysql_query($sql,$this->conexion);
        $alimentos=array();
        
        while($fila=  mysql_fetch_array($resultado))
        {
          $alimentos[]= $fila; 
        }
        return $alimentos;
    }
    
    public function insertarAlimento($n, $e, $p, $hc, $f, $g)
    {
        $sql="INSERT INTO `alimentos` (`nombre`, `energia`, `proteina`, `hidratocarbono`, `fibra`, `grasatotal`)"
                . " VALUES ('$n', '$e', '$p', '$hc', '$f', '$g')";
        $resultado=  mysql_query($sql,$this->conexion);
        
        return $resultado;//la uso en controller para verificar si cargo o no
    }
}
?>