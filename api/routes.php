<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, DELETE, PUT, OPTIONS");  
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Content-Type: application/json"); 


require_once("config/database.php");
require_once("modules/post.php");
require_once("modules/get.php");
require_once("modules/put.php");
require_once("modules/delete.php");

error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);



$con = new Connection();
$pdo = $con->connect();


$get = new Get($pdo);
$post = new Post($pdo);
$put = new Put($pdo);
$delete = new Delete($pdo);


if(isset($_REQUEST['request'])){

    $request = explode('/', $_REQUEST['request']);
}
else{
    http_response_code(404);
    echo json_encode(["error" => "Not Found"]);
    exit;
}

switch($_SERVER['REQUEST_METHOD']){
    case 'GET':
        switch($request[0]){
            case 'get_signup':
                if(count($request)>1){
                    echo json_encode($get->get_signup($request[1]));
                }
                else{
                    echo json_encode($get->get_signup());
                }
                break;

                
            

            case 'logout':
                echo json_encode($get->logout($data));
                break;
                    
            default:
                http_response_code(403);
                echo json_encode(["error" => "Forbidden"]);
                break;
        }
        break;
    case 'POST':
        $data = json_decode(file_get_contents("php://input"));
        
        switch($request[0]){

            case 'signup':
                echo json_encode($post->signup($data));
                break;

            case 'login':
                echo json_encode($post->login($data));
                break;

            case 'profile':
                echo json_encode($post->flipbook($data, $request[1]));
                break;

            default:
                http_response_code(403);
                echo json_encode(["error" => "Forbidden"]);
                break;
        }
        break;
    case 'PUT':
        $data = json_decode(file_get_contents("php://input"));
        switch($request[0]){
            case 'edit_report' :
                echo json_encode($put->edit_reports($data, $request[1]));
                break;
            case 'edit_username' :
                echo json_encode($put->update_username($data));
                break;
            case 'edit_email' :
                  echo json_encode($put->update_email($data, $request[1]));
                break;
            case 'edit_password' :
                echo json_encode($put->update_password($data, $request[1]));
                 break;
            case 'edit_department' :
                echo json_encode($put->update_password($data, $request[1]));
                break;
            case 'edit_address' :
                echo json_encode($put->update_password($data, $request[1]));
                break;
                

                default:
                http_response_code(403);
                echo json_encode(["error" => "Forbidden"]);
                break;
        } 
        break;
    case 'DELETE':
        switch($request[0]){
            case 'delete_report' :
                echo json_encode($delete->delete_reports($request[1]));
                break;

            default:
            http_response_code(403);
            echo json_encode(["error" => "Forbidden"]);

        } break;
            http_response_code(405);
            echo json_encode(["error" => "Method Not Allowed"]);
            break;
}

?>
