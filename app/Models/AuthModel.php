<?php
	/**
	 * Created by PhpStorm.
	 * User: jaroslavlomecki
	 * Date: 11/24/17
	 * Time: 11:14 PM
	 */
	
	class AuthModel {
		
		private $db;
		
		public function __construct($db)
		{
			$this->db = $db;
		}
		
		public function getUser($username): array
		{
			return $this->db->select("SELECT * FROM users WHERE username = :username ", [':username'=>$username]);
			
		}
		
		public function getUsers(): array
		{
			return $this->db->select("SELECT username FROM users");
			
		}
		
		public function addUser(array $userData) : int {
			return $this->db->insert("INSERT into users (username, name, surname, email, password, level, lastIp) VALUES (:username, :name, :surname, :email, :password, :level, :ip)",
			[':username'=>$userData['username'], ':name'=>$userData['name'], ':surname'=>$userData['surname'], ':email'=>$userData['email'], ':password'=>$userData['password'], ':level'=>1, ':ip'=>$_SERVER['REMOTE_ADDR']]
			);
		}
	}