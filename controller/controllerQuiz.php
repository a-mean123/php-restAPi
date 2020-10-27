
<?php

    
require_once("{$ROOT}{$DS}model{$DS}modelQuiz.php");


header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: GET, POST');

header("Access-Control-Allow-Headers: X-Requested-With");


header('Access-Control-Allow-Headers: Access-Control-Allow-Origin, Content-Type');
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json, charset=utf-8');

$controller = "quiz";

if(isset($_REQUEST['action']))	
/* recupère l'action passée dans l'URL*/
	$action = $_REQUEST['action'];
/* NB: On a ajouté un comportement par défaut avec action=readAll.*/
	else $action="getall";	
	
switch ($action) {


    case "consulte":
       
       
          $tab_p = ModelQuiz::getAll();
           echo json_encode($tab_p);
             break;



  
    case "createdQuiz":
        $json = file_get_contents('php://input');
                        $data = json_decode($json);

                      
        
                              $titre = $data->titre;
                              $description = $data->description;
                              $formation = $data->formation;


                              $id = NULL;

            
                $u = new  ModelQuiz($titre);	
                $tab = array(
                    "id" => $id,  
                    
                "titre" =>$titre,
                "description" =>$description,
                "formation" =>$formation,


               
                );				
               $res = $u->insert($tab);
            

               $tab_p = ModelQuiz::getAll();
              
             echo (json_encode($tab_p));
        
        break;
  
      
                   
                
              



                

                 

                    case "updated":

                        $json = file_get_contents('php://input');
                        $data = json_decode($json);

                      
        
                         
                              $id = $_REQUEST["id"];
                             
        
                              $titre = $data->titre;
                              $description = $data->description;
                              $formation = $data->formation;


                       
                $u = new  ModelQuiz($titre);	
                $tab = array(
                    "id" => $id,  
                    
                "titre" =>$titre,
                "description" =>$description,
                "formation" =>$formation,


               
                );							
                               
                                    $o = $u->update($tab, $id);		
                                    echo json_encode($o);                            
                                
                        
                        break;


                        case "detail":
                            if(isset($_REQUEST['id'])){
                            $id = $_REQUEST['id'];
                            $u =  ModelQuiz::selecter($id);
                            if($u!=null){
                                
                                echo json_encode($u);
                            }
                            }
                            break;


                            case "detailquiz":
                                if(isset($_REQUEST['id'])){
                                $id = $_REQUEST['id'];
                                $u =  ModelQuiz::select($id);
                                if($u!=null){
                                    
                                    echo json_encode($u);
                                }
                                }
                                break;

                                case "delete":
                               
                                    $id = $_REQUEST['id'];
                                    $del = ModelQuiz::select($id);
                                    echo json_encode($del);
                                    if($del!=null){
                                    $del1 = ModelQuiz::delete($id);
                                    echo json_encode('1');
                                    }
                             
                                break;
                      
}



 
?>