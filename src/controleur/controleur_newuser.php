
<?php

function actionNewuser($twig, $db){
 $form = array();
 $newuser = new Newuser($db);
 if (isset($_POST['btAjouter'])){
  
      $inputNom = $_POST['inputNom'];
      $inputPrenom = $_POST['inputPrenom']; 
      $inputAdresse =$_POST['inputAdresse']; 
      $inputCp = $_POST['inputCp'];
      $inputVille = $_POST['inputVille'];
      
       $exec = $newuser->insert($inputNom,$inputPrenom,$inputAdresse, $inputCp, $inputVille);
 if (!$exec){
 $form['valide'] = false;
 $form['message'] = 'Problème d\'insertion dans la table utilisateur ';
 }
      $form['valide'] = true;
 
    }
 
 $liste = $newuser->select();
 echo $twig->render('newuser.html.twig', array('form'=>$form,'liste'=>$liste));
}
?>