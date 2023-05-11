<?php


include_once('db.php');


class DatabaseProcess extends DatabasePDO
{

    private $user;
    private $pass;

    public function getAll()
    {
        try {

            # Conexión a MySQL
            // Instantiate database.
            $cnn = $this->conn();
            //Preparamos la consulta sql
            $respuesta = $cnn->prepare("select * from loguear");
            //Ejecutamos la consulta
            $respuesta->execute();
            //Creamos un array donde almacenaremos la data obtenida
            $usuarios = [];
            //Recorremos la data obtenida
            foreach ($respuesta as $res) {
                //Llenamos la data en el array
                $usuarios[] = $res;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $usuarios;
    }



    public function login($user, $pass)
    {
        try {

            $this->user = $user;
            $this->pass = $pass;

            # Conexión a MySQL
            // Instantiate database.
            $cnn = $this->conn();

            //Preparamos la consulta sql
            $stmt = $cnn->prepare("SELECT * FROM loguear WHERE nombre=:usernameEmail  AND contraseña=:hash_password");
            $stmt->bindParam("usernameEmail", $this->user, PDO::PARAM_STR);
            $stmt->bindParam("hash_password", $this->pass, PDO::PARAM_STR);
            //Ejecutamos la consulta
            $stmt->execute();
            $count = $stmt->rowCount();
            $data = $stmt->fetch(PDO::FETCH_OBJ);
            $db = null;
            $mesage = "";
            if ($count) {

                $mesage = "verdadero";
            } else {
                $mesage = "Falso";
            }
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
        return $mesage;
    }
}