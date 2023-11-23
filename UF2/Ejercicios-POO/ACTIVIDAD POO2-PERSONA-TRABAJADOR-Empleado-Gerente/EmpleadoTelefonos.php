<?php

class EmpleadoTelefonos {
    private $nombre;
    private $apellidos;
    private $sueldo;

    private $telefono = [];

    /**
     * @param $nombre
     * @param $apellidos
     * @param $sueldo
     */
    public function __construct($nombre, $apellidos, $sueldo)
    {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->sueldo = $sueldo;
    }


    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }




    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }



    /**
     * @return mixed
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }



    /**
     * @param mixed $apellidos
     */
    public function setApellidos($apellidos): void
    {
        $this->apellidos = $apellidos;
    }



    /**
     * @return mixed
     */
    public function getSueldo()
    {
        return $this->sueldo;
    }



    /**
     * @param mixed $sueldo
     */
    public function setSueldo($sueldo): void
    {
        $this->sueldo = $sueldo;
    }


    //FUNCIONES DECLARADAS POR EL USUARIO

    public function getNombreCompleto(): string {
        return $this->nombre . ', ' . $this->apellidos;
    }

    public function debePagarImpuestos(): bool {
        $totalSueldo = $this->sueldo;

        if($totalSueldo>3333) {
            return true;
        }else {
            return false;
        }
    }

    public function anyadirTelefono(int $telefono) : void {
        $this->telefono[] = $telefono;
    }

    public function listarTelefonos(): string {

        $telefonos = $this->telefono;
        $allTelefonos = "";


        for ($i=0; $i<count($telefonos); $i++) {
            $allTelefonos .= $telefonos . ',';
        }

        return $allTelefonos;
    }

    public function vaciarTelefonos(): void {
        $this->telefono = [];
    }

    function __toString()
    {
        $message = "";
        $message .= "Nombre : $this->nombre  <br>";
        $message .= "Apellidos : $this->apellidos  <br>";
        $message .= "Sueldo : $this->sueldo <br>";

        return "$message";
    }


}

$empleado1 = new EmpleadoTelefonos("Shah Zaib", "Asghar Munir", 3334);

$nombreCompleto = $empleado1->getNombreCompleto();

$pagaImpuestos = $empleado1->debePagarImpuestos();


echo "$empleado1";
echo "Nombre Completo : $nombreCompleto <br>";


if($pagaImpuestos) {
    echo "Prepara el dinero, que tienes que pagar impuestos";
}else {
    echo "Te libras de los Impuestos";
}



?>

