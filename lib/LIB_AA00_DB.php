<?php
// Directory Global
$DIRECTORY_LOG = $DIRECTORY_HOME . DIRECTORY_SEPARATOR . "log";

// GLOBAL CONFIG OF DATABASE 1
$DBHOST_1	= " "; //DB Host
$DBUSER_1	= " "; //DB Username
$DBPASS_1	= " "; //DB Password 
$DBNAME_1	= " "; //DB Table
$G_DBCONN_1	= mysqli_connect($DBHOST_MAIN,$DBUSER_MAIN,$DBPASS_MAIN,$DBNAME_MAIN);     
   
$G_TABLENAME_1		= "user_table"; //Sample table name
$G_TABLENAME_2		= "transaction";

// GLOBAL CONFIG OF DATABASE 2 (if you have more than one database connection)
/**
*	$DBHOST_FINAL=" ";
*	$DBUSER_FINAL=" ";
*	$DBPASS_FINAL=" ";
*	$DBNAME_FINAL=" ";
*	$G_DBCONN_FINAL=mysqli_connect($DBHOST_FINAL,$DBUSER_FINAL,$DBPASS_FINAL,$DBNAME_FINAL);     
   
$G_TABLENAME_1		= " ";
$G_TABLENAME_2		= " ";
*/

// File Locker 
$FILE_LOCKER = array (
        "NAME"          => $DIRECTORY_LOG . DIRECTORY_SEPARATOR . "PROCESS.lock",
        "FILTER"        => array (
                "COMMAND"       => "/usr/bin/php",
                "PARAMETER"     => $DIRECTORY_MAIN . "bin/RUN.php"
        ),
        "EXPIRED"       => 60
);

function LIB_AA00_DB_main() {
	//do nothing
}

?>
