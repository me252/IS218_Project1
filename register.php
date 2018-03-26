<?php

session_start(); //Used to start the session variables

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
ini_set('display_errors' , 1); //Not really needed, these two lines are just to display errors in the code

include (  "p1account.php"  );
include (  "p1functions.php"     ) ; //allows the register.php to use the other two php files

( $dbh = mysql_connect ( $hostname, $username, $password ) )
       or die ( "Unable to connect to MySQL database" ); //used to connect to Database

mysql_select_db( $project );  //select the DB



//INPUT - Obtain files from the HTML
$fname  =  $_GET[ "fname"  ];
$lname  =  $_GET[ "lname"  ];
$email  =  $_GET[ "email"  ];
$phone  =  $_GET[ "phone"  ];
$birthday  =  $_GET[ "birthday"  ];
$gender  =  $_GET[ "gender"  ];
$password  =  $_GET[ "password"  ];


//CHECK EMAIL AND REGISTER ACCOUNT - see p1functions.php to see what these do


reg_chk($fname , $lname, $email, $phone, $birthday, $gender, $password);
register($fname , $lname, $email, $phone, $birthday, $gender, $password);

















?>