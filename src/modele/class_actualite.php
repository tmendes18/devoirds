<?php
class Actualite{

 private $db;
 private $insert;
 private $select;



 public function __construct($db){
 $this->db = $db;
 $this->insert = $db->prepare("insert into actualite(titre, contenu, idUtilisateur ) values(:Titre, :Contenu, :IdUtilisateur )");
 $this->select = $db->prepare("select titre from actualite order by titre");

 }
 public function insert($inputTitre, $inputContenu, $inputUser){
 $r = true;
 $this->insert->execute(array(':Titre'=>$inputTitre, ':Contenu'=>$inputContenu, ':IdUtilisateur'=>$inputUser));
 if ($this->insert->errorCode()!=0){
 print_r($this->insert->errorInfo());
 $r=false;
 }
 return $r;
 }


 
  public function select(){
 $liste = $this->select->execute();
 if ($this->select->errorCode()!=0){
 print_r($this->select->errorInfo());
 }
 return $this->select->fetchAll();
 }


}
?>