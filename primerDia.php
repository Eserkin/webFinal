<?php 
	function primerDia(){
		$month = date('m');
        $year = date('Y');
        return date('Y-m-d', mktime(0,0,0, $month, 1, $year));
	}
 ?>