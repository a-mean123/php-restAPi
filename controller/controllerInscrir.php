
<?php

    
require_once("{$ROOT}{$DS}model{$DS}modelInscrir.php");

header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: GET, POST');

header("Access-Control-Allow-Headers: X-Requested-With");

header('Access-Control-Allow-Headers: Access-Control-Allow-Origin, Content-Type');
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json, charset=utf-8');

$controller = "inscrir";

if(isset($_REQUEST['action']))	
/* recupère l'action passée dans l'URL*/
	$action = $_REQUEST['action'];
/* NB: On a ajouté un comportement par défaut avec action=readAll.*/
	else $action="getall";	
	
switch ($action) {


    case "consulte":
       
       
          $tab_p = ModelInscrir::getAll();
           echo json_encode($tab_p);
             break;





             
             case "userFormation":

                if(isset($_REQUEST['id'])){
                  
                $id = $_REQUEST['id'];
               
                $u =  ModelInscrir::getUserFormation($id);
                if($u!=null){
                    
                    echo json_encode($u);
                }
                }
                break;

  
    case "createdInscrir":
        $json = file_get_contents('php://input');
                        $data = json_decode($json);

                      

                         $id = NULL;

                              $user = $data->user;
                              $formation = $data->formation;



            
                $u = new  ModelInscrir($formation, $user);	
                $tab = array(
                  
                    
                  "id"=>$id,
                  "formation" =>$formation,
                "user" =>$user,
               


               
                );				
               $res = $u->insert($tab);
            

               $tab_p = ModelInscrir::getAll();
              
             echo (json_encode($tab_p));
        
        break;
  
      
                   
                
              



                

                 



                      

                        
}



 
?>