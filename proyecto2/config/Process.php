<?php

include_once('DatabaseProces.php');

class Login{

   public function Loguear($user, $pass){
      $user = $_POST['email'];
      $pass = $_POST['pass'];



      //instanciar el objeto
      $users = new DatabaseProcess();
      // llamado función de loguin
      $users->login($user,$pass);

      $response = $users->login($user,$pass);

      echo $response; 

      if ($response==="verdadero") {
         header("Location: ../index.php"); 
      }

      else{
         echo '<script language="javascript">alert("Error En Datos");</script>';
      }
   }
}

$proceso = new Login();
$proceso -> Loguear($user, $pass);