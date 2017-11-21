<?php

namespace uFrame;

class Debug 
{

	public static function show(array $array) {
		echo "<pre style='background-color: red;color:white'>";

		print_r($array);

		echo "</pre>";
		die();
		
	}
}
