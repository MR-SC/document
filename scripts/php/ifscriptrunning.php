<?php
private function ifScriptRunning($scriptname){                                                                                                                                             

	$exec_arr = array();                                                                                                                                                                         
	exec("ps auxw", $exec_arr);                                                                                                                                                                  
	$num_matches = 0;                                                                                                                                                                            
	foreach($exec_arr as $line)                                                                                                                                                                  
	{                                                                                                                                                                                            
		if(preg_match('/'.$scriptname.'/', $line))                                                                                                                                               
			$num_matches++;                                                                                                                                                                      
	}                                                                                                                                                                                            
	if ($num_matches>1)                                                                                                                                                                          
		echo 'running';     
	return ($num_matches>1) ? true : false;

	#return false;                                                                                                                                                                                    } 
