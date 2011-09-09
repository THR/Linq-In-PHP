<?php 
    include 'D3Linq.php';
   echo '<pre>';
    $linq = new D3Linq();
    $linq->GetContentsFunc='baglan_curl';
    $linq->Query("SELECT * FROM dir_files(doc) WHERE type='file'");
    
    while ($files=$linq->fetch_assoc()){
        print_r($files);
    }
    
    
    $linq->Query("SELECT * FROM dir_files(doc) WHERE type='dir'");
    
    while ($dir=$linq->fetch_assoc()){
        print_r($dir);
    }
    
    
    $linq->Query("SELECT * FROM dir_files(doc).dirs WHERE name!='.' AND name!='..'");
    
    while ($dir=$linq->fetch_assoc()){
        print_r($dir);
    }
    
    
    $linq->Query("SELECT * FROM dir_files(doc).files WHERE name LIKE '%D3Linq%'");
    
    while ($file=$linq->fetch_assoc()){
        print_r($file);
    }
?>
