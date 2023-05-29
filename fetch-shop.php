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
    $box=array();
    $query="SELECT * from mystery_box";
    $ris=mysqli_query($conn, $query);
    while($row=mysqli_fetch_assoc($ris)){
        $box[]=$row; //legge il prodotto e lo mette alla fine della lista
    }
    mysqli_free_result($ris);
        mysqli_close($conn);
        echo json_encode($box);   

?>