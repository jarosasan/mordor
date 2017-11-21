<?php

use uFrame\Controller;

class Page extends Controller
{

    public function index()
    {
       $this->show();
    }

    public function show($page_name = "Home")
    {

        $pageModel = $this->model("PageModel");

        $data['page'] = $pageModel->getPage($page_name);

        $this->view("page", $data);
    }

}
