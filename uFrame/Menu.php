<?php

namespace uFrame;

class Menu 
{

	public static function show() {

		$log = new Log();
		$db = new Database($log);
		$menuList = $db->select("SELECT * FROM pages");

		foreach ($menuList as $page) {

			if ($page['isRealPage']) {
				echo "<a class='btn btn-outline-light' href='/" . CONFIG['site_path'] . "/Page/show/" . $page['id'] . "'>". $page['title'] . "</a>";
				
			} else {
				echo "<a class='btn btn-outline-light' href='/" . CONFIG['site_path'] ."/". $page['body'] . "'>". $page['title'] . "</a>";
				

			}
		}
		
	}
}
