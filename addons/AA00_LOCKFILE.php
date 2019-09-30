<?php
//Cek File Locker
function AA00_LOCKFILE_main() 
{
	global $FILE_LOCKER;

	if (!file_exists($FILE_LOCKER["NAME"])) 
	{
		touch($FILE_LOCKER["NAME"]);
	}
	else 
	{
		$filter = $FILE_LOCKER["FILTER"]["COMMAND"] . " " . $FILE_LOCKER["FILTER"]["PARAMETER"];
		$RUN=0;
		$PID=0;
		$last_line = exec("/usr/bin/ps -ax | grep \"$filter\"",$output,$retval);
		$jumlah_element=sizeof($output);
		if ($jumlah_element>0) 
		{
			for($a=0;$a<=$jumlah_element-1;$a++) 
			{
				$element_string_1=explode(" ",$output[$a]);
				$element_string_2=[];
				for($b=0;$b<=sizeof($element_string_1)-1;$b++) 
				{
					if ($element_string_1[$b]!="") 
					{
						array_push($element_string_2,$element_string_1[$b]);
					}
				}
				if ($element_string_2[4]==$FILE_LOCKER["FILTER"]["COMMAND"]) 
				{
					$RUN=1;
					$PID=$element_string_2[0];
				}
			}
		}
	
		$interval=date_diff(date_create(date('Y-m-d H:i:s',filemtime($FILE_LOCKER["NAME"]))),date_create(date('Y-m-d H:i:s')));
		$interval_menit=$interval->format("%i");
		if ($interval_menit>$FILE_LOCKER["EXPIRED"]) 
		{
			if ($RUN==1) 
			{
				//Kill process 
				exec("/usr/bin/kill -9 $PID",$output,$r);
			}
			
			//delete file locker
			unlink($FILE_LOCKER["NAME"]);
			
			//retouch file locker
			touch($FILE_LOCKER["NAME"]);
		}
		else 
		{
			die();
		}	
	}
}
?>