
<?php

    
require_once("{$ROOT}{$DS}model{$DS}modelCours.php");


header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: GET, POST');

header("Access-Control-Allow-Headers: X-Requested-With");



$controller = "cours";

if(isset($_REQUEST['action']))	
/* recupère l'action passée dans l'URL*/
	$action = $_REQUEST['action'];
/* NB: On a ajouté un comportement par défaut avec action=readAll.*/
	else $action="getall";	
	
switch ($action) {


    case "consulte":
       
       
          $tab_p = ModelCours::getAll();
           echo json_encode($tab_p);
             break;



  
    case "createdCours":
        $image=$_FILES['image']['name']; 
        $expimage=explode('.',$image);
        $imageexptype=$expimage[1];
        date_default_timezone_set('Australia/Melbourne');
        $date = date('m/d/Yh:i:sa', time());
        $rand=rand(10000,99999);
        $encname=$date.$rand;
        $imagename=md5($encname).'.'.$imageexptype;
        $imagepath="assets/cours/".$imagename;
        move_uploaded_file($_FILES["image"]["tmp_name"],$imagepath);
        

        
                             
                        $titre = $_REQUEST['titre'];
                        $date = $_REQUEST['date'];
                        $fichier = $imagename;
                        $formation = $_REQUEST['formation'];

                              $id = NULL;

            
                $u = new ModelCours($titre , $date , $fichier, $formation);	
                $tab = array(
                    "id" => $id,  
                   
                      "titre" =>$titre,
               
                      "date"=> $date,
                    
                      "fichier" => $fichier,
                      "formation" => $formation
                );				
               $res = $u->insert($tab);
            
            echo ("1");
        
        break;
  
      
                   
                
              



                

                 

                    case "updated":

                     
                        $id = $_REQUEST["id"];

                        $image=$_FILES['image']['name']; 
                        $expimage=explode('.',$image);
                        $imageexptype=$expimage[1];
                        date_default_timezone_set('Australia/Melbourne');
                        $date = date('m/d/Yh:i:sa', time());
                        $rand=rand(10000,99999);
                        $encname=$date.$rand;
                        $imagename=md5($encname).'.'.$imageexptype;
                        $imagepath="assets/cours/".$imagename;
                        move_uploaded_file($_FILES["image"]["tmp_name"],$imagepath);
                        
                  
                                             
                                                 
                        $titre = $_REQUEST['titre'];
                        $date = $_REQUEST['date'];
                        $fichier = $imagename;
                        $formation = $formation;

                          
            
                           $u = new ModelCours($titre , $date , $fichier, $formation);	
                           $tab = array(
                               "id" => $id,  

                                 "titre" =>$titre,

                                 "date"=> $date,

                                 "fichier" => $fichier,
                                 "formation" => $formation
                           );				
                               
                                    $o = $u->update($tab, $id);		
                                    echo json_encode($o);                            
                                
                        
                        break;


                        case "detail":
                            if(isset($_REQUEST['id'])){
                            $id = $_REQUEST['id'];
                            $u = ModelCours::select($id);
                            if($u!=null){
                                echo json_encode($u);
                            }
                            }
                            break;
    
                            case "getCours":
                                if(isset($_REQUEST['id'])){
                                $id = $_REQUEST['id'];
                                $u = ModelCours::selecter($id);
                                if($u!=null){
                                    echo json_encode($u);
                                }
                                }
                                break;
        

                            case "delete":
                               
                                $id = $_REQUEST['id'];
                                $del = ModelCours::select($id);
                                echo json_encode($del);
                                if($del!=null){
                                $del1 = ModelCours::delete($id);
                                echo json_encode('1');
                                }
                         
                            break;
}



 
?>