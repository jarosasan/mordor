<?php

use uFrame\Controller;

class Blog extends Controller
{

    public function index()
    {

        // show all blog records

        $blogModel = $this->model("BlogModel");

        $data['postList'] = $blogModel->getAll();

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

        if (empty($_GET['query'])) {

            $this->index();
            
        }  else {

           $blogModel = $this->model("BlogModel");

            $data['postList'] = $blogModel->search($_GET['query']);

            $this->view("blog/list", $data);

        }

    }

}
