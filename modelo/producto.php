<?php
class Producto
{
    public $Marca;
    public $Descripcion;
    public $Codigo;
    public static function BuscarTodas()
    {
        $con  = Database::getInstance();
        $sql = "select * from [NOMBRE DE LA TABLA DE LA BASE DE DATOS, DEBE SER EN SIGULAR Y SIN MAYUSCULA]";
        $queryClaseAReemplazar = $con->db->prepare($sql);
        $queryClaseAReemplazar->execute();
        $queryClaseAReemplazar->setFetchMode(PDO::FETCH_CLASS, '[COLOCAMOS EL NOMBRE DE LA CLASE QUE ESTA ARRIBA DE ESTE MISMO ARCHIVO]');

        $claseAReemplazarADevolver = array();

        foreach ($queryClaseAReemplazar as $m) {
            $claseAReemplazarADevolver[] = $m;
        }

        return $claseAReemplazarADevolver;
    }

    public function Agregar()
    {
        $con  = Database::getInstance();
        $sql = "insert into [SE COLOCA EL NOMBRE DE LA TABLA DE LA BASE DE DATOS COMO EN LA PRIMERA PARTE] ([NOMBRE DE LA 
        VARIABLE 1 (MARCA)],[NOMBRE DE LA VARIABLE 2 (DESCRIPCION)],[NOMBRE DE LA VARIABLE 3 (CODIGO)]) values (:p1,:p2,:P3)";
        $claseAReemplazar = $con->db->prepare($sql);
        $params = array("p1" => $this->Marca, "p2" => $this->Descripcion, "p3" => $this->Codigo );
        $claseAReemplazar->execute($params);
    }

}
