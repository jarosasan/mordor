<?php
	/**
	 * Created by PhpStorm.
	 * User: jaroslavlomecki
	 * Date: 11/24/17
	 * Time: 11:13 PM
	 */
	
	use uFrame\Controller;
	
	class Auth extends Controller {
		
		public $errors = [];
		
		public function index() {
			$data=[];
			$this->loginForm($data);
		}
		
		public function loginForm($data) {
			
			$this->view("auth/login", $data);
		}
		
		public function login()
		
		{
			if(isset($_POST['username']) && $_POST['username'] != "") {
				
				$user = $this->model('AuthModel');
				$userData = $user->getUser($_POST['username']);
				
				if(password_verify($_POST['password'], $userData[0]['password'])){
					
					$_SESSION['username'] = $_POST['username'];
					setcookie("sausainis_username", $_SESSION['username'], time() + 60 * 60 *24);
					$data = [];
					$this->view("blog/myList", $data);
//					$post = $this->controllers("UserPosts");
//					$post->myList();
//					redirect(base_url('your_controller/your_method'));
					
					
					
				}else{
					$data['body'] = "Bad password";
					$this->loginForm($data);
				}
			}else{
					$data['body'] = "Please write your username";
					$this->loginForm($data);
			}
		}
		
		// Registration Form
		public function regForm() {
			$data=[];
			$this->view("auth/registration", $data);
		}
		
		
		
		public function registration()
		{
			if(isset($_POST['username']) && $_POST['username'] != "" ){
				$user = $this->model('AuthModel');
				$us = $user->getUsers();
				if($_POST['username'] != $us[0]['username']) {
					if ($_POST['password'] === $_POST['confirm-password']) {
						$_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
						unset($_POST['confirm_password']);
						$user->addUser($_POST);
						$data = [];
						$this->loginForm($data);
					} else {
						$this->errors[] = "Bad password";
						$this->regForm();
					}
				}else{
					$this->errors[] = "User exsist.";
					$this->regForm();
				}
			}else{
				$this->errors[] =  "Please add your name.";
				$this->regForm();
			}
			
		}
		
		public function logoutForm()
		{
			$data = [];
			session_destroy();
			$_SESSION = null;
			$this->controllers("blog", $data);
			
			
		}
		
		
		
		
		
		
		
		
	}