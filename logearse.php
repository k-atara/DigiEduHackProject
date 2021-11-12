<?php 
    require "connection.php";
    $result=null;
    if($pdo!=null){
        error_log("Connection is not null");
        $received = json_decode(file_get_contents('php://input'),true);
        $user = $password = "";
        $user = $received['user'];
        $password = $received['password'];
        // $sql = "SELECT IF((SELECT id FROM user where user='".$user."' and password='".$password."') != 0,True,False)";
        $sql =    "SELECT IF((SELECT id FROM user where user='".$user."' and password='".$password."') != 0,True,False) as valid, id FROM user WHERE user='".$user."' and password='".$password."'";
        $stmt = $pdo->prepare($sql);
        if($stmt->execute()){
            while($row = $stmt->fetch(PDO::FETCH_NUM))
                $result = $row;
        }
        else{
            $result = false;
        }
    }else{
        $result = "Connection error";
    }
    echo json_encode($result);
?>