<?php

use uFrame\Controller;

class Blog extends Controller
{
	
    public function index()
    {
        // show all blog records
	    
	    $perPage = 5;
	    
        $blogModel = $this->model("BlogModel");
        $count = $blogModel->getCount();
        
	    $totalPages = ceil($count[0]['count'] / $perPage);
	    $data['total']=$totalPages;
	    if(isset($_GET['page'])){
	    	$page = $_GET['page'];
	    }else{
	    	$page = 1;
	    }
	    $data['page']=$page;
		
	    if ($page){
		    $data['start'] = ($page-1) * $perPage;
	    }else{
		    $data['start'] = 0;
	    }
	    $data['co'] = $count[0]['count'];
	    $data['perPage'] = $perPage;
        $data['postList'] = $blogModel->getAll($data['start'], $perPage);
		$data['index']= "index?";
        $this->view("blog/list", $data);
    
    }

    public function show($id)
    {
        // show single blog post by id

        $blogModel = $this->model("BlogModel");
        $bannerModel = $this->model("BannerModel");

        $data['banners'] = $bannerModel->getRandom();

        $data['post'] = $blogModel->getSingle($id);

        $this->view("blog/single", $data);
    }

    public function search() {
    	//Search from post
		$perPage = 3;
	  
        if (empty($_GET['query'])) {
            $this->index();
        }  else {
           $blogModel = $this->model("BlogModel");

            $d = $blogModel->search($_GET['query']);
	        $data['total'] = ceil(count($d) / $perPage);
	        
	        $page = (isset($_GET['page'])) ? $_GET['page'] : 1;
	        $data['page'] = $page;
	        
	        $data['start'] = ($page) ? (($page - 1) * $perPage) : 0;
	
			$data['co']= count($d);
	        $data['postList']= array_slice($d, $data['start'], $perPage);
	        $data['index']= "search?guery=".$_GET['query']."&";
	        $data['perPage'] = $perPage;
	        
	        $this->view("blog/list", $data);

        }

    }
	public function myList()
	{
		// show all blog records
		
		$perPage = 5;
		$user = $_SESSION['username'];
		
		$blogModel = $this->model("BlogModel");
		$count = $blogModel->getUserPostCount($user);
		
		$totalPages = ceil($count[0]['count'] / $perPage);
		$data['total']=$totalPages;
		if(isset($_GET['page'])){
			$page = $_GET['page'];
		}else{
			$page = 1;
		}
		$data['page']=$page;
		
		if ($page){
			$data['start'] = ($page-1) * $perPage;
		}else{
			$data['start'] = 0;
		}
		$data['co'] = $count[0]['count'];
		$data['perPage'] = $perPage;
		$data['postList'] = $blogModel->getUserPosts($user, $data['start'], $perPage);
		$data['index']= "index?";
		$this->view("blog/myList", $data);
		
	}
 

}
