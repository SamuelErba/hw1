<?php
    // Avvia la sessione
    session_start();
    // Verifica se l'utente è loggato
    if(!isset($_SESSION['username']))
    {
        // Vai alla login
        header("Location: login.php");
        exit;
    }

    $conn=mysqli_connect("localhost", "root", "", "dbhw1");
    $acquisto=mysqli_real_escape_string($conn,$_GET["id"]);
    $username=mysqli_real_escape_string($conn,$_SESSION['username']);
    /*echo $acquisto;
    echo $username;*/
    $query1= "INSERT into carrello (id_box, ordinato_da) VALUE ('$acquisto','$username' )";
    $res=mysqli_query($conn, $query1);
    if($res===true){
        echo json_encode(array("ok"=>true));
    }
    else{
        echo json_encode(array("ok"=>false));
    }
    mysqli_close($conn);
?>