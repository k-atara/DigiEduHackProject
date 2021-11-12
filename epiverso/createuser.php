<?php 
    require "connection.php";
    $bindings = [];
    $result=null;
    if($pdo!=null){
        error_log("Connection is not null");
        $parameters = ['user', 'password', 'coins', 'level'];
        $received = json_decode(file_get_contents('php://input'),true);
        foreach ($parameters as $parameter){
            if(!isset( $received[$parameter]) ){
                $result =  "Parameter ".$parameters[$i]." missing";
                break;
            }else{
                $bindings[] = $received[$parameter];
            }
        }
        if($result==null){
            $sql = 'INSERT INTO user( time, user, password, coins, level) VALUES 
                (CURRENT_TIMESTAMP,?,?,?,?)';
                
            $stmt = $pdo->prepare($sql);
            if($stmt->execute($bindings)){
                $result = "Insertion Success";
            }
            else{
                $result = "Insertion Error";
            }
        }
    }
    else{
        $result = "Connection Error";
    }
    echo json_encode($result);
?>
