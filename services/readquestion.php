<?php 
    require "connection.php";
    $data = [];
    if($pdo!=null){
        error_log("Connection is not null");
        $sql = "SELECT question,type, answer1, answer2, answer3, answer4,id, coins FROM question WHERE id =".$_GET['id'] ;
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        while($row = $stmt->fetch(PDO::FETCH_NUM))
            $data[] = $row;
    }else{
        $data = "Connection error";
    }
    echo json_encode($data);
?>
