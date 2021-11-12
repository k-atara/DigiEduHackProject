<?php 
    require "connection.php";
    $data = [];
    if($pdo!=null){
        error_log("Connection is not null");
        $sql = "SELECT user, coins FROM user ORDER BY coins DESC limit 3";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        while($row = $stmt->fetch(PDO::FETCH_NUM))
            $data[] = $row;
    }else{
        $data = "Connection error";
    }
    echo json_encode($data);
?>
