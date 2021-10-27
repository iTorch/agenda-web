<?php
class DB{
    private $server = "mysql:host=localhost; dbname=agenda-php";
    private $user = "";
    private $pass = "";
    private $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC);
    protected $conn;

    public function open(){
        try {
            $this->conn = new PDO($this->server, $this->user,
                $this->pass, $this->options);
            return $this->conn;
        } catch (PDOException $e){
            echo "Ocurrio un problema con la conexion: ". $e->getMessage();
        }
    }

    public function close(){
        $this->conn = null;
    }
}
    /*
     * PDO::ATTR_ERRMODE
     * Se utiliza para informar de los errores que puede tener
     * PDO::ERRMODE_EXCEPTION
     * Genera excepciones si hay error SQL, al lanzar excepcion el script deja de ejecutarse
     * PDO::ATTR_DEFAULT_FETCH_MODE
     * Establece modo de recuperacion predeterminado
    */
?>
