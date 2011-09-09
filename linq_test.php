<?php
  /**
  * Test for linq 1.5.5 
  */
  $mictime=explode(' ',microtime());
  $StartTime=(double)$mictime[0]+(double)$mictime[1];
  
   function getTime(){
        global $StartTime;
         $micTime=explode(' ',microtime());
         $endTime=(double)$micTime[0]+(double)$micTime[1];
         return  round($endTime-$StartTime,3);
    }   
  
  
  $line =0;
  function writeln($text){
      global $line;
      echo ++$line.". Ms :".getTime()." , ".$text."\n";
  }
  echo '<pre>';
  
  
  writeln("Creating a big array  by random  numbers.");
  
  $users=Array(   
                1=>array("age"=>rand(18,60),"rank"=>rand(0,900)),
                );
                
  for ($i=2;$i<=7000;$i++){
      $users[$i]["age"]=rand(18,60);
      $users[$i]["rank"]=rand(18,60);
  }
  writeln(count($users)." users created.");
  
  include 'D3Linq.php'; 
  writeln("D3Linq.php included");
  
  $linq=new D3Linq();
  writeln('$linq object created from D3Linq');
  $linq->Query("SELECT *FROM users WHERE age=20");
  writeln($linq->num_rows()." users are 20 years old (:");
  $linq->Query("SELECT *FROM users where age=35 ORDER BY rank DESC");
  writeln($linq->num_rows()." users are 35 years old");  
  
  writeln("-----------------------------------------------");
  writeln("users are listing ordered by rank descending...");
  writeln("-----------------------------------------------");
   while ($u=$linq->fetch_assoc()){
       writeln($u["age"]." = > ".$u["rank"]);
   }
?>