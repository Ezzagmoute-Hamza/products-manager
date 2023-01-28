<?php

$dsn='mysql:host=localhost;dbname=e_shopping';
$user="root";
$pwd="";
try{
   $db=new PDO($dsn,$user,$pwd);
   $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $excep){
   echo "bad connection to database.". "---" .$excep->getMessage();
}

?>