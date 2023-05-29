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
    $conn = mysqli_connect("localhost", "root", "", "dbhw1");
    if(isset($_POST["ricerca"])){
        
        $ricerca = $_POST["ricerca"];
        $curl = curl_init(); 
        curl_setopt($curl, CURLOPT_URL, "https://www.themealdb.com/api/json/v1/1/search.php?s=".$ricerca);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
        $result = curl_exec($curl);
        curl_close($curl);
        echo $result;
    }
?>