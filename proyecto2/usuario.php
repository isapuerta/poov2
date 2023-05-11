<?php
class Usuario{
    public $user;
    public $pass;
    public function __construct($user, $pass){
        $this->user = $user;
        $this->pass = $pass;
    }
    public function __destruct(){
        echo 'Datos destruidos';
    }
    public function saludar(){
        return 'Hola, soy'.$this->user;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
</head>
<body>
    <h2>Welcome!</h2>
    <a href="logout.php">Logout</a>
</body>
</html>
