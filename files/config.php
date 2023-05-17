<?php

   //$Cnn=mysqli_connect("localhost","root","group12");
   //x$Dbb=mysqli_select_db($CN,"shop");
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', 'group12');
   define('DB_DATABASE', 'shop');
   $CN = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

?>