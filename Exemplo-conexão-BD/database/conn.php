<?php
try{
    $host = "127.0.0.1";
    $bdname = "fk_test";
    $user = "root";
    $password = "root";
    
    $conn = new PDO('mysql:host='.$host.';dbname='.$bdname, $user, $password);
    
}catch(PDOException $e){
    echo "<strong>ERRO no PDO</strong>" . $e;
}
?>
