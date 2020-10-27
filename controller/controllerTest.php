
<?php

    
require_once("{$ROOT}{$DS}model{$DS}modelTest.php");


header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: GET, POST');

header("Access-Control-Allow-Headers: X-Requested-With");

header('Access-Control-Allow-Headers: Access-Control-Allow-Origin, Content-Type');
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json, charset=utf-8');

$controller = "test";

if(isset($_REQUEST['action']))	
/* recupère l'action passée dans l'URL*/
	$action = $_REQUEST['action'];
/* NB: On a ajouté un comportement par défaut avec action=readAll.*/
	else $action="getall";	
	
switch ($action) {


    case "consulte":
       
       
          $tab_p = ModelTest::getAll();
           echo json_encode($tab_p);
             break;



  
    case "createdTest":
        $json = file_get_contents('php://input');
                        $data = json_decode($json);

                      
        
                              $titre = $data->titre;
                              $formation = $data->formation;

                              $id = NULL;

            
                $u = new ModelTest($titre);	
                $tab = array(
                    "id" => $id,  
                    
                "titre" =>$titre,
                "formation" =>$formation,

               
                );				
               $res = $u->insert($tab);
            
            echo ($res);
        
        break;
  
      
                   
                
              



                

                 

                    case "updated":

                        $json = file_get_contents('php://input');
                        $data = json_decode($json);

                      
        
                              $titre = $data->titre;
                           
                              $id = $_REQUEST["id"];
                               
                            
                              $u = new ModelTest($titre);	
                                 $tab = array(
                                     "id" => $id,  

                                 "titre" =>$titre,
                               

                                 );				
                               
                                    $o = $u->update($tab, $id);		
                                    echo json_encode($o);                            
                                
                        
                        break;


                        case "detail":
                            if(isset($_REQUEST['id'])){
                            $id = $_REQUEST['id'];
                            $u =  ModelTest::selecter($id);
                            if($u!=null){
                                
                                echo json_encode($u);
                            }
                            }
                            break;


                            case "detailTest":
                                if(isset($_REQUEST['id'])){
                                $id = $_REQUEST['id'];
                                $u =  ModelTest::select($id);
                                if($u!=null){
                                    
                                    echo json_encode($u);
                                }
                                }
                                break;

                            case "delete":
                                if(isset($_REQUEST['id'])){
                                    $id = $_REQUEST['id'];
                                    $del = ModelTest::select($id);
                                    if($del!=null){
                                    $del->delete($id);
                                    echo json_encode($del);
                                    }
                                }
                                break;
                      
}



 
?>