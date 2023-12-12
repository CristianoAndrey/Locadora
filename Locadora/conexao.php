
<?php 
class BD{
     public static $conn;
     public function __construct(){}
  
     public static function conn(){
         if(is_null(self::$conn)){
             self::$conn = new PDO('mysql:host=localhost;dbname=locadora','root','');
             self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         }
  
         return (self::$conn) ? self::$conn : false;
     }
 }
  
 $conexao = BD::conn();
