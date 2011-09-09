<html>
<head>
<meta http-equiv="content-language" content="EN">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>D3Linq Language Integrated Query</title>
<meta name="author" content="http://www.tufyta.com">
<meta http-equiv="reply-to" content="dellytufy@hotmail.com">

<style type="text/css">
body{
    padding:0px;
    margin:0px;
    font-size:12px;
    font-family: Tahoma;
}
#footer {
    padding-right: 10px;
    background: #eee;
    border:#ddd 1px solid;
    font-size:11px; 
}
#title{
    border:1px solid;
    background:#2c8fff;
    color:#ddd;
}
div {
    padding:3px;
}
.uyari{background:#ffeeac;padding:4px;font-size:11px;color:#dc7200;border:1px solid;}
.uyari  b{font-size: 12px;}
.uyari a:link{color:#000}
.uyari a:visited{color:#000}
.uyari a:hover{color:#000}
.code {
    background:#e5e5e5;
    font-size:11px;
    padding:3px;
}
</style>

</head>
<body>


<?php
       
       $myArray=array(
       'animals'                =>array('cat'=>'Miyavv','dog'=>'Hav hav','snake'=>'sSSSssSssss','bird'=>'Cik Cik Cik'),
       'a big animal'           =>'dinosaur',
       'its smaller then 100'   =>90
       );
       
              include '../D3Linq.php';
              $a=new D3Linq();
            
              
        ?>    

<table width="100%" cellspacing="0">
<tr><td id="title" colspan="2" align="center"><h1>D3Linq Class</h1></td></tr>
<tr><td valign="top" width="200" class="code">
<h3 class="uyari">This is My Array : myArray</h3><br>
        
         <pre><?php print_r($myArray);?></pre>
          
        
        
</td><td height="100%" style="background: #eee;">


<h3 class="uyari">Fetch All Animals as Objects</h3>
<div><?php 
 highlight_string('<?php '."\n".' $Linq->Query("SELECT key  Animal Name,value As Sound  FROM myArray.animals ORDER BY Sound DESC"); '."\n".'?>',false);
 ?></div>
           <pre class="code">
           <?php
           /**
           * U can use arrays as dot object like other oop languages  myArray.animals ;)
           * And can set alias for key and/or value
           */
                $a->Query('SELECT key  Animal Name,value As Sound  FROM myArray.animals ORDER BY Sound DESC');
                echo '<b class=uyari>Found '.$a->num_rows().' Animal(s)</b><br>'; 
                while ($Animals=$a->fetch_assoc()){
                     print_r($Animals);
                }
                
                
                
           ?>
           </pre> 
           
<h3 class="uyari">Find all animals which has a sound like "cik cik"</h3> 
<div><?php 
 highlight_string('<?php '."\n".' $Linq->Query("SELECT key  Animal Name,value As Sound  FROM myArray.animals WHERE value LIKE \'%cik cik%\' "); '."\n".'?>',false);
 ?></div>
           <pre class="code">
           <?php
           /**
           * U Can use like command as SQL
           */
                $a->Query("SELECT key  Animal Name,value As Sound  FROM myArray.animals WHERE value LIKE '%cik cik%' ");
                 echo '<b class=uyari>Found '.$a->num_rows().' Animal(s)</b><br>'; 
                while ($cikCikAnimals=$a->fetch_object()){
                     print_r($cikCikAnimals);
                }
           ?>
           </pre> 
           
           
   <h3 class="uyari">Find Elements which value is integer </h3> 
   <div><?php 
 highlight_string('<?php '."\n".' $Linq->Query("SELECT key ElementName,value Value  FROM myArray WHERE  is_integer(\'.value.\') "); '."\n".'?>',false);
 ?></div>
   <pre class="code">
   <?php
       /**
       * yeah.!
       * U Can use all of php funcsions in where clauses. 
       */
        $a->Query("SELECT key ElementName,value Value  FROM myArray WHERE  is_integer('.value.') ");
          echo '<b class=uyari>Found '.$a->num_rows().' Element(s)</b><br>'; 
        while ($result=$a->fetch_object()){
             print_r($result);
        }
   ?>
   </pre>   
   
   
    <h3 class="uyari">Find Elements which value is integer and smaller then 100 </h3>
      <div><?php 
 highlight_string('<?php '."\n".' $Linq->Query("SELECT key ElementName,value Value  FROM myArray WHERE value<100 AND is_integer(\'.value.\') "); '."\n".'?>',false);
 ?></div> 
   <pre class="code">
   <?php
       /**
       * u  can use key and value directly in  math processes
       */
        $a->Query("SELECT key ElementName,value Value  FROM myArray WHERE value<100 AND is_integer('.value.') ");
          echo '<b class=uyari>Found '.$a->num_rows().' Element(s)</b><br>'; 
        while ($result=$a->fetch_object()){
             print_r($result);
        }
   ?>
   </pre> 
   
   <h3 class="uyari">IF value is an array (: </h3>
      <div><?php 
 highlight_string('<?php '."\n".' $Linq->Query("SELECT key ElementName,value Value  FROM myArray WHERE  \'.value.\'[cat]==\'Miyavv\' AND \'.value.\'[dog]==\'Hav hav\' ORDER BY ElementName ASC"); '."\n".'?>',false);
 ?></div> 
   <pre class="code">
   <?php
       /**
       *  use '.key.'  or '.value.'  for directly use it as php.
       */
        $a->Query("SELECT key ElementName,value Value  FROM myArray WHERE  '.value.'[cat]=='Miyavv' AND '.value.'[dog]=='Hav hav' ORDER BY ElementName ASC");
          echo '<b class=uyari>Found '.$a->num_rows().' Element(s)</b><br>'; 
        while ($result=$a->fetch_object()){
             print_r($result);
        }
   ?>
   </pre>   
           
           
           <h3 class="uyari">Delete elements from an array   {v1.0.1}</h3>
      <div><?php 
 highlight_string('<?php '."\n".' $Linq->Query("DELETE FROM myArray.animals WHERE value LIKE \'%cik cik%\' "); '."\n".'?>',false);
 ?></div> 
   <pre class="code">
   <?php
       /**
       *  use '.key.'  or '.value.'  for directly use it as php.
       */
        $a->Query("DELETE FROM myArray.animals WHERE value LIKE '%cik cik%' ");
        
   ?>
   <b>After Delete print_r($myArray)</b> <br>
   <?php print_r($myArray);?>
   </pre>   



</td></tr>
<tr><td id="footer" colspan="2" align="right">v1.0 <a href="http://www.tufyta.com">Tufyta</a></td></tr>
</table>
   
</body>
</html>