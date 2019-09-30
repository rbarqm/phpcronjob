<?php
$DIRECTORY_HOME="/home/data/process"; //home directory of the script

// --------- Load Library --------------
$DIRECTORY_LIB=$DIRECTORY_HOME . DIRECTORY_SEPARATOR . "lib";
$libs = scandir($DIRECTORY_LIB);

foreach ($libs as $lib) {      
	if (!in_array($lib,array(".",".."))) { //memastikan direktori ada isinya

		if (!is_dir($DIRECTORY_LIB . DIRECTORY_SEPARATOR . $lib)) { //memastikan lib adalah direktori

			if (substr($lib,-3)=="php") { //pastikan list file yg di filter adalah *.php

				include_once("$DIRECTORY_LIB". DIRECTORY_SEPARATOR ."$lib"); //include another .php file inside this file
				list($nm_fungsi_main) = explode(".php",$lib);
				echo $nm_fungsi_main."\n";
				$nm_fungsi_main.="_main";
				$nm_fungsi_main();

			}

		}

	}
}

//------ Run Modul -------------------
$DIRECTORY_ADDONS=$DIRECTORY_HOME . DIRECTORY_SEPARATOR . "addons";
$addons = scandir($DIRECTORY_ADDONS); 
foreach ($addons as $addon) {
	if (!in_array($addon,array(".",".."))) { //memastikan direktori ada isinya	

		if (!is_dir($DIRECTORY_ADDONS . DIRECTORY_SEPARATOR . $addon)) { //memastikan lib adalah direktori

			if (substr($addon,-3)=="php") { //pastikan list file yg di filter adalah *.php
				echo "Addons : $addon \n";
				include_once($DIRECTORY_ADDONS . DIRECTORY_SEPARATOR . $addon); //include another .php file inside this file
				list($nm_fungsi_main) = explode(".php",$addon);
				echo $nm_fungsi_main."\n";
				$nm_fungsi_main.="_main";
				$nm_fungsi_main();	
			}

		}
		
	}
}

AA00_UNLOCKFILE();
?>
