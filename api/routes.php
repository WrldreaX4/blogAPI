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

                case 'eventexpenses': 
                    if(count($request)>1){
                        echo json_encode($get->get_eventexpenses($request[1]));
                          }
                       else{
                         echo json_encode($get->get_eventexpenses($data));
                           }
                        break;

                
            case 'flipbook':
                if(count($request)>1){
                    echo json_encode($get->get_flipbook($request[1]));
                }
                else{
                    echo json_encode($get->get_flipbook($data));
                }
                break;
            
            case 'flipbook_all':
                 if(count($request)>1){
                echo json_encode($get->get_flipbookall($request[1]));
                    }
                 else{
                     echo json_encode($get->get_flipbookall());
                 }
                 break;
            case 'collage':
                if(count($request)>1){
                    echo json_encode($get->get_collage($request[1]));
                }
                else{
                    echo json_encode($get->get_collage($data));
                }
                break;

                case 'collage_all':
                    if(count($request)>1){
                        echo json_encode($get->getCollageAll($request[1]));
                    }
                    else{
                        echo json_encode($get->getCollageAll($data));
                    }
                    break;
                
            case 'reports':
                if(count($request)>1){
                    echo json_encode($get->get_reports($request[1]));
                }else{
                    echo json_encode($get->get_reports($data));
                }
                break;

            case 'reports_all':
                 if(count($request)>1){
                    echo json_encode($get->get_reportsall($request[1]));
                 }else{
                     echo json_encode($get->get_reportsall());
                    }
                    break;
             case 'annualreport': 
                     if(count($request)>1){
                      echo json_encode($get->get_annualReport($request[1]));
                     }
                        else{
                      echo json_encode($get->get_annualReport($data));
                        }
                        break;
                case 'eventreport': 
                   if(count($request)>1){
                       echo json_encode($get->get_eventreport($request[1]));
                         }
                      else{
                        echo json_encode($get->get_eventreport($data));
                          }
                       break;
                case 'eventreportall': 
                 if(count($request)>1){
                 echo json_encode($get->get_eventreportAll($request[1]));
                   }
                     else{
                   echo json_encode($get->get_eventreportAll($data));
                          }
                     break;

                case 'annualreportall': 
                        if(count($request)>1){
                        echo json_encode($get->get_annualReportAll($request[1]));
                          }
                            else{
                          echo json_encode($get->get_annualReportAll($data));
                                 }
                            break;
                 case 'financialreportall': 
                      if(count($request)>1){
                     echo json_encode($get->get_financialreportAll($request[1]));
                         }
                         else{
                        echo json_encode($get->get_financialreportAll($data));
                             }
                    break;
                case 'financialreport':
                        if(count($request)>1){
                       echo json_encode($get->get_financialreport($request[1]));
                           }
                           else{
                          echo json_encode($get->get_financialreport($data));
                               }
                      break;
                 case 'annualreportonly': 
                     if(count($request)>1){
                     echo json_encode($get->get_annualonly($request[1]));
                        }
                         else{
                         echo json_encode($get->get_annualonly($data));
                           }
                           break;

                case 'eventreportonly': 
                  if(count($request)>1){
                     echo json_encode($get->get_eventonly($request[1]));
                          }
                      else{
                         echo json_encode($get->get_eventonly($data));
                         }
                        break;
                case 'financialreportonly': 
                     if(count($request)>1){
                     echo json_encode($get->get_financialonly($request[1]));
                       }
                     else{
                      echo json_encode($get->get_financialonly($data));
                         }
                       break;

                       case 'projectreport': 
                        if(count($request)>1){
                            echo json_encode($get->get_projectreport($request[1]));
                                }
                           else{
                            echo json_encode($get->get_projectreport($data));
                                   }
                            break;
    
                    case 'projectreportall': 
                        if(count($request)>1){
                            echo json_encode($get->get_projectreportAll($request[1]));
                                }
                            else{
                            echo json_encode($get->get_projectreportAll($data));
                             }
                            break;


                    case 'projectreportonly': 
                        if(count($request)>1){
                            echo json_encode($get->get_projectonly($request[1]));
                                }
                            else{
                            echo json_encode($get->get_projectonly($data));
                                }
                            break;
                            
                    case 'profile': 
                        if(count($request)>1){
                            echo json_encode($get->get_profile($request[1]));
                            }
                            else{
                            echo json_encode($get->get_profile($data));
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

            case 'report':
                echo json_encode($post->insertReport($data));
                break;
            case 'flipbook':
                echo json_encode($post->flipbook($data, $request[1]));
                 break;
            case 'collage':
                echo json_encode($post->uploadImage('file', $request[1]));
                 break;
             case 'annualreport':
                echo json_encode($post->annualreports($data, $request[1]));
                break; 
            case 'eventreport':
                 echo json_encode($post->eventreport($data, $request[1]));
                 break;
            case 'eventreportplus':
                echo json_encode($post->expenses($data, $request[1]));
                break;
            case 'financialreport':
                echo json_encode($post->insertFinancialReport($data, $request[1]));
                break;
            case 'projectreport';
                echo json_encode($post->projectreport($data, $request[1]));
                break; 
            case 'edit_projectreport';
                echo json_encode($post->edit_projectreport($data, $request[1]));
                break;   
            case 'edit_eventreport':
                echo json_encode($post->edit_eventreport($data, $request[1]));
                 break;
            case 'edit_financialreport':
                 echo json_encode($post->edit_financialreport($data, $request[1]));
                break;
            case 'edit_annualreport':
                 echo json_encode($post->edit_annualreport($data, $request[1]));
                break;
            case 'delete_annualreport':
               echo json_encode($post->delete_annualreport($request[1]));
                    break;
            case 'delete_financialreport':
                 echo json_encode($post->delete_financialreport($request[1]));
                break;
            case 'delete_eventreport':
                echo json_encode($post->delete_eventreport($request[1]));
                break;
            case 'delete_projectreport':
                echo json_encode($post->delete_projectreport($request[1]));
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
