<?php
    include ('conn.php');
    $id = $_POST['id'];
    $r = $pdo->query("select * from users where id = $id")->fetchAll(PDO::FETCH_ASSOC);
    header('Content-Type: application/json');
    echo json_encode($r);
?>