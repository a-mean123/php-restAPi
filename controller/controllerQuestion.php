
<?php

    
require_once("{$ROOT}{$DS}model{$DS}modelQuestion.php");

header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: GET, POST');

header("Access-Control-Allow-Headers: X-Requested-With");



header('Access-Control-Allow-Headers: Access-Control-Allow-Origin, Content-Type');
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json, charset=utf-8');


$controller = "question";

if(isset($_REQUEST['action']))	
/* recupère l'action passée dans l'URL*/
	$action = $_REQUEST['action'];
/* NB: On a ajouté un comportement par défaut avec action=readAll.*/
	else $action="getall";	
	
switch ($action) {


    case "consulte":
       
       
          $tab_p = ModelQuestion::getAll();
           echo json_encode($tab_p);
             break;



  
    case "createdQuestion":
        $json = file_get_contents('php://input');
                        $data = json_decode($json);

                      
        
                              $text = $data->text;
                              $reponse = $data->reponse;
                              $quiz = $data->quiz;
                              $test = $data->test;



                              $id = NULL;

            
                $u = new  ModelQuestion($text);	
                $tab = array(
                    "id" => $id,  
                    
                "text" =>$text,
                "reponse" =>$reponse,
                "quiz" =>$quiz,
                "test" =>$test,



               
                );				
               $res = $u->insert($tab);
            

               $tab_p = ModelQuestion::getAll();
              
             echo (json_encode($tab_p));
        
        break;
  
      
                   
                
              



                

                 

                    case "updated":

                        $json = file_get_contents('php://input');
                        $data = json_decode($json);

                      
        
                        $text = $data->text;
                        $reponse = $data->reponse;
                        $quiz = $data->quiz;
                        $test = $data->test;



                    

                                    
                         $u = new  ModelQuestion($text);	
                         $tab = array(
                             "id" => $id,  
                             
                         "text" =>$text,
                         "reponse" =>$reponse,
                         "quiz" =>$quiz,
                         "test" =>$test,

                        
                        
                        
                         );			
                               
                                    $o = $u->update($tab, $id);		
                                    echo json_encode($o);                            
                                
                        
                        break;


                        case "detail":
                            if(isset($_REQUEST['id'])){
                            $id = $_REQUEST['id'];
                            $u =  ModelQuestion::select($id);
                            if($u!=null){
                                echo json_encode($u);
                            }
                            }
                            break;
    
                            case "getter":
                                if(isset($_REQUEST['id'])){
                                $id = $_REQUEST['id'];
                                $u =  ModelQuestion::getter($id);
                                if($u!=null){
                                    echo json_encode($u);
                                }
                                }
                                break;


                                case "getterTest":
                                    if(isset($_REQUEST['id'])){
                                    $id = $_REQUEST['id'];
                                    $u =  ModelQuestion::getterTest($id);
                                    if($u!=null){
                                        echo json_encode($u);
                                    }
                                    }
                                    break;


                            case "delete":
                                if(isset($_REQUEST['id'])){
                                    $id = $_REQUEST['id'];
                                    $del =  ModelQuestion::select($id);
                                    if($del!=null){
                                    $del->delete($id);
                                    echo json_encode($del);
                                    }
                                }
                                break;
                      
}



 
?>