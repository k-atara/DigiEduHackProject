<?php
    header('Content-Type: application/JSON; charset=utf-8');
    $metodo = $_SERVER['REQUEST_METHOD'];
    switch ($metodo){
        case  'GET':
            
        break;
        case 'POST':
                if($_GET['accion']=='user'){
                    try{
                        $DBH = new PDO ( "mysql:host=epiverso.cnmzyovsd056.us-east-1.rds.amazonaws.com;dbname=epiverso", "root", "root12345");
                    
                        $json = file_get_contents('php://input');
                        $data = json_decode($json);
                        
                        $resultado = $DBH->prepare('CALL crearUsuario(:pN, :pD, :pM, :pC)');
                        $resultado->bindParam(':pN', $data->nombre);
                        $resultado->bindParam(':pD', $data->correo);
                        $resultado->bindParam(':pM', $data->nickname);
                        $resultado->bindParam(':pC', $data->password);
                        $resultado->execute();
                        $response = $resultado->fetchALL(PDO::FETCH_ASSOC);
                        echo json_encode($response, JSON_FORCE_OBJECT);

                    }catch(PDOException $e){
                        echo $e->getMessage();
                    }
                }
                if($_GET['accion']=='login'){
                    try{
                        $DBH = new PDO ( "mysql:host=epiverso.cnmzyovsd056.us-east-1.rds.amazonaws.com;dbname=epiverso", "root", "root12345");
                    
                        $json = file_get_contents('php://input');
                        $data = json_decode($json);
                        
                        $resultado = $DBH->prepare('CALL login(:pU, :pC)');
                        $resultado->bindParam(':pU', $data->usuario);
                        $resultado->bindParam(':pC', $data->contra);
                        $resultado->execute();
                        $response = $resultado->fetchALL(PDO::FETCH_ASSOC);
                        echo json_encode($response, JSON_FORCE_OBJECT);

                    }catch(PDOException $e){
                        echo $e->getMessage();
                    }
                }
        break;
        case 'PUT':
            
        break;
        case 'DELETE':
            
        break;
        default:
            echo 'Método no soportado';
        break;
    }
?>