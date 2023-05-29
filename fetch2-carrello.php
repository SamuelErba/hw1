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
    header('Content-Type: application/json');
    $conn = mysqli_connect("localhost", "root", "", "dbhw1");
    $box = array();
    $username = mysqli_real_escape_string($conn,$_SESSION['username']);
    $query = "SELECT m.id_box as idbox,m.immagine as immagine,m.nome as nome, c.id_vendita as idvendita from mystery_box m join carrello c on m.id_box = c.id_box where m.id_box in (SELECT id_box from carrello where ordinato_da = '$username')";
    $entry = mysqli_query($conn, $query);
    while($row=mysqli_fetch_assoc($entry)){
        $box[]=$row; /* creo array associativo con tutti i risultati della query*/

    }
        mysqli_close($conn);
        echo json_encode($box);
?>