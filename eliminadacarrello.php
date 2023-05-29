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
    $id_vendita = mysqli_real_escape_string($conn, $_GET["idvendita"]);
    /*$username = mysqli_real_escape_string($conn,$_SESSION['username']);*/
    $query="DELETE from carrello where id_vendita= '$id_vendita'";
    $res=mysqli_query($conn, $query);
    echo json_encode($res);
    mysqli_close($conn); 
?>