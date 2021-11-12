<?php 
    require "connection.php";
    $data = [];
    if($pdo!=null){
        error_log("Connection is not null");
        $sql = 'SELECT IF((select id from question where question.id='.$_GET['id_question'].' and question.correct='.$_GET['correct'].') != 0,True,False)' ;
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        while($row = $stmt->fetch(PDO::FETCH_NUM))
            $data[] = $row;
    }else{
        $data = "Connection error";
    }
    echo json_encode($data);
?>
