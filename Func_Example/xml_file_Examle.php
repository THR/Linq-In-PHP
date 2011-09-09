<?php                                                                                                                   
   /**
   * @name D3Linq
   * @version v1.5.0
   * @author Tufan Baris YILDIRIM 
   * @link http://www.tufyta.com
   * D3Linq new Functions Test.
   *    -json_file();
   *    -xml_file(); 
   * next version
   */
    
    include 'D3Linq.php';
    $linq=new D3Linq();
    
    $linq->Query("SELECT * FROM xml_file(http://feeds.feedburner.com/phpclasses).channel.item ");
    
    echo '<h3>SELECT * FROM xml_file(http://feeds.feedburner.com/phpclasses).channel.item</h3><hr>';
    echo '<pre>';
    while ($Post=$linq->fetch_assoc())  {
                print_r($Post);
    }
   ?>