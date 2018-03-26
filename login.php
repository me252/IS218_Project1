<?php

session_start(); 

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
ini_set('display_errors' , 1); 

include (  "p1account.php"  );
include (  "p1functions.php"     ) ; 

( $dbh = mysql_connect ( $hostname, $username, $password ) )
       or die ( "Unable to connect to MySQL database" ); 

mysql_select_db( $project ); 


//INPUT
$email  =  $_GET[ "email"  ];
$password  =  $_GET[ "password"  ];



 ?>