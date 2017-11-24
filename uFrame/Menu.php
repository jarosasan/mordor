<?php

namespace uFrame;

class Menu 
{
	
	public static function show() {
		
		$log      = new Log();
		$db       = new Database( $log );
		$menuList = $db -> select( "SELECT * FROM pages" );
		
		foreach ( $menuList as $page ) {
			if ( $page['isRealPage'] ) {
				echo "<div class='element'><a  href='/" . CONFIG['site_path'] . "/Page/show?page=" . $page['id'] . "'>" . strtoupper( $page['title'] ) . "</a></div>";
			} else {
				echo "<div class='element'><a href='/" . CONFIG['site_path'] . "/" . $page['body'] . "'>" . strtoupper( $page['title'] ) . "</a></div>";
			}
		}
	}
	
	public static function admin() {
		
		$log      = new Log();
		$db       = new Database( $log );
		$menuList = $db -> select( "SHOW TABLES" );
		
		foreach ( $menuList as $page ) {
			
				echo "<div class='element'><a href='/" . CONFIG['site_path'] . "/Admin/index?table=" . $page['Tables_in_morder'] . "'>" . strtoupper($page['Tables_in_morder']) . "</a></div>";
			
		}
	}
}
