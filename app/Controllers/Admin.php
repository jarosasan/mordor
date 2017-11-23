<?php
	
	use uFrame\Controller;
	
	class Admin extends Controller
	{
		
		public function index()
		{
			$table = $_GET['table'];
			
			$adminModel = $this->model("AdminModel");
			$data['th'] = $adminModel->getColName($table);
			
			$perPage = 20;
			
			$count = $adminModel->getCount($table);

			$totalPages = ceil($count[0]['count'] / $perPage);
			$data['total']=$totalPages;
			$page = (isset($_GET['page'])) ? $_GET['page'] : 1;
			$data['page'] = $page;
			
			$data['start'] = ($page) ? (($page - 1) * $perPage) : 0;
			$data['co'] = $count[0]['count'];
			$data['perPage'] = $perPage;
			
			$data['postList'] = $adminModel->getPosts($table, $data['start'], $perPage);
			$data['index']= "index?";
			$this->view("admin/admin", $data);
			
		}
		
	}