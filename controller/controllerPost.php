
<?php

    
require_once("{$ROOT}{$DS}model{$DS}modelPost.php");



header('Access-Control-Allow-Headers: Access-Control-Allow-Origin, Content-Type');
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json, charset=utf-8');

header('Access-Control-Allow-Headers: Access-Control-Allow-Origin, Content-Type');
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json, charset=utf-8');

$controller = "post";

if(isset($_REQUEST['action']))	
/* recupère l'action passée dans l'URL*/
	$action = $_REQUEST['action'];
/* NB: On a ajouté un comportement par défaut avec action=readAll.*/
	else $action="dashboard";	
	
switch ($action) {


    
    case "consulte":
       
       
        $tab_p = ModelPost::getAll();
         echo json_encode($tab_p);
           break;

       
  
    case "createdPost":
      
        $json = file_get_contents('php://input');
        $data = json_decode($json);

      

        
                              $name =$data->name;
                              $lastname = $data->lastname;
                              $test = $data->test;
                              $score = $data->score;
                           
                              
                            echo $name;
                            echo $lastname;
                            echo $test;
                            echo $score;


        
            
                              $id = NULL;

            
                $u = new ModelPost($name, $lastname, $test, $score);	
                $tab = array(
                    "id" => $id,  
                    
                "name" =>$name,
                "lastname" =>$lastname,
                "test" =>$test,
                "score" =>$score,
               
              
                );				
               $res = $u->insert($tab);
            
            echo (1);
        
        break;
  

                        case "detail":
                            if(isset($_REQUEST['id'])){
                            $id = $_REQUEST['id'];
                          
                            $u = ModelPost::select($id);
                            if($u!=null){
                                echo json_encode($u);
                            }
                            }
                            break;

                            case "delete":
                               
                                    $id = $_REQUEST['id'];
                                    $del = ModelPost::select($id);
                                    echo json_encode($del);
                                    if($del!=null){
                                    $del1 = ModelPost::delete($id);
                                    echo json_encode('1');
                                    }
                             
                                break;
    
                    
                      
}



 
?>