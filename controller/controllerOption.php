
<?php

    
require_once("{$ROOT}{$DS}model{$DS}modelOption.php");

header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: GET, POST');

header("Access-Control-Allow-Headers: X-Requested-With");



header('Access-Control-Allow-Headers: Access-Control-Allow-Origin, Content-Type');
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json, charset=utf-8');

$controller = "option";

if(isset($_REQUEST['action']))	
/* recupère l'action passée dans l'URL*/
	$action = $_REQUEST['action'];
/* NB: On a ajouté un comportement par défaut avec action=readAll.*/
	else $action="getall";	
	
switch ($action) {


    case "consulte":
       
       
          $tab_p = ModelOption::getAll();
           echo json_encode($tab_p);
             break;



  
    case "createdOption":
        $json = file_get_contents('php://input');
                        $data = json_decode($json);

                      $titre = $data->titre;
        
                              $text = $data->text;
                              
                              $question = $data->question;


                              $id = NULL;

            
                $u = new  ModelOption($text);	
                $tab = array(
                    "id" => $id,  
                    "titre" =>$titre,
                "text" =>$text,
                
                "question" =>$question,


               
                );				
               $res = $u->insert($tab);
            

               $tab_p = ModelOption::getAll();
              
             echo (json_encode($tab_p));
        
        break;
  
      
                   
                
              



                

                 

                    case "updated":

                        $json = file_get_contents('php://input');
                        $data = json_decode($json);

                      
        
                        $text = $data->text;
                        $titre = $data->titre;
                        $question = $data->question;


                    

                                    
                         $u = new  ModelOption($text);	
                         $tab = array(
                             "id" => $id,  
                             
                         "text" =>$text,
                         "titre" =>$titre,
                         "question" =>$question,
                        
                        
                        
                         );			
                               
                                    $o = $u->update($tab, $id);		
                                    echo json_encode($o);                            
                                
                        
                        break;


                        case "detail":
                            if(isset($_REQUEST['id'])){
                            $id = $_REQUEST['id'];
                            $u =  ModelOption::select($id);
                            if($u!=null){
                                echo json_encode($u);
                            }
                            }
                            break;
    

                            case "delete":
                                if(isset($_REQUEST['id'])){
                                    $id = $_REQUEST['id'];
                                    $del =  ModelOption::select($id);
                                    if($del!=null){
                                    $del->delete($id);
                                    echo json_encode($del);
                                    }
                                }
                                break;
                      
}



 
?>