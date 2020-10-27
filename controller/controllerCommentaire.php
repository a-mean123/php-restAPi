
<?php

    
require_once("{$ROOT}{$DS}model{$DS}modelCommentaire.php");



header('Access-Control-Allow-Headers: Access-Control-Allow-Origin, Content-Type');
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json, charset=utf-8');

header('Access-Control-Allow-Headers: Access-Control-Allow-Origin, Content-Type');
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json, charset=utf-8');

$controller = "commentaire";

if(isset($_REQUEST['action']))	
/* recupère l'action passée dans l'URL*/
	$action = $_REQUEST['action'];
/* NB: On a ajouté un comportement par défaut avec action=readAll.*/
	else $action="dashboard";	
	
switch ($action) {


    
    case "consulte":
       
       
        $tab_p = ModelCommentaire::getAll();
         echo json_encode($tab_p);
           break;

       
  
    case "createdCommentaire":
      
        $json = file_get_contents('php://input');
        $data = json_decode($json);

      

        
                              $name =$data->name;
                              $lastname = $data->lastname;
                              $formation = $data->formation;
                              $commentaire = $data->commentaire;
                           
                              
                            echo $name;
                            echo $lastname;
                            echo $formation;
                            echo $commentaire;


        
            
                              $id = NULL;

            
                $u = new ModelCommentaire($name, $lastname, $formation, $commentaire);	
                $tab = array(
                    "id" => $id,  
                    
                "name" =>$name,
                "lastname" =>$lastname,
                "formation" =>$formation,
                "commentaire" =>$commentaire,
               
              
                );				
               $res = $u->insert($tab);
            
            echo (1);
        
        break;
  

                        case "detail":
                            if(isset($_REQUEST['id'])){
                            $id = $_REQUEST['id'];
                          
                            $u = ModelCommentaire::select($id);
                            if($u!=null){
                                echo json_encode($u);
                            }
                            }
                            break;



                            case "formationCommentaire":
                                if(isset($_REQUEST['id'])){
                                $id = $_REQUEST['id'];
                                $u =  ModelCommentaire::selecter($id);
                                if($u!=null){
                                    
                                    echo json_encode($u);
                                }
                                }
                                break;
                            case "delete":
                               
                                    $id = $_REQUEST['id'];
                                    $del = ModelCommentaire::select($id);
                                    echo json_encode($del);
                                    if($del!=null){
                                    $del1 = ModelCommentaire::delete($id);
                                    echo json_encode('1');
                                    }
                             
                                break;
    
                    
                      
}



 
?>