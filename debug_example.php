<?php                                                                                                                   
   /**
   * @name D3Linq
   * @version v1.5.1
   * @author Tufan Baris YILDIRIM 
   * @link http://www.tufyta.com
   * D3Linq Debugger Example
   */
   
    
    include 'D3Linq.php';
    $linq=new D3Linq();
    
    function debug_linq(){
        global $linq;
        $linq->debug();
    }
    
    $linq->OnError='debug_linq';
    
    
    /** 
    * Alternate   for debug
    * @var mixed
    */
    $linq->OnError='selfdebug';    
    
    $deneme=array('ic'=>array('deneme','deneme2'),1,2,3,4,5,67,8);
    
    $linq->Query("SELcECT DISTINCT key,value FROM deneme.ic");
  
    echo '<pre>';
    while ($Post=$linq->fetch_assoc())  {
                print_r($Post);
    }
?>