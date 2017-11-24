<?php

use uFrame\Controller;

class Page extends Controller
{

    public function index()
    {
       $this->show();
    }

    public function show()
    {
    	$page_name = (isset($_GET['page'])) ? $_GET['page'] : "1";

        $pageModel = $this->model("PageModel");

        $data['page'] = $pageModel->getPage($page_name);

        $this->view("page", $data);
    }

}
