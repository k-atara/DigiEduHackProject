<?php 
    require "connection.php";
    $data = [];
    if($pdo!=null){
        error_log("Connection is not null");
        $sql = 'UPDATE user SET user.coins=user.coins+' .$_GET['coins']. ' WHERE id='.$_GET['id'].';';
        $stmt = $pdo->prepare($sql);
        if($stmt->execute()){
            $data[] = true;
        }else{
            $data[] = false;
        }
    }else{
        $data = "Connection error";
    }
    echo json_encode($data);
?>
