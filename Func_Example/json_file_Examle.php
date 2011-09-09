<?php                                                                                                                   
   /**
   * @name D3Linq
   * @version v1.5.0
   * @author Tufan Baris YILDIRIM 
   * @link http://www.tufyta.com
   * D3Linq new Functions.
   *    -json_file();
   *    -xml_file(); 
   * next version
   */
    
    include 'D3Linq.php';
    $linq=new D3Linq();
    
    $linq->Query("SELECT * FROM json_file(my_json_file.txt)");
    
    echo '<h3>SELECT * FROM json_file(my_json_file.txt)</h3><hr>';
    echo '<pre>';
    while ($Post=$linq->fetch_assoc())  {
                print_r($Post);
    }
   ?>