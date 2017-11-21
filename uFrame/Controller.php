<?php
/**
 * Created by PhpStorm.
 * User: Ignas
 * Date: 2017-11-11
 * Time: 23:43
 */

namespace uFrame;

class Controller
{
    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    protected function model(string $model)
    {
        require_once "app/Models/" . $model . ".php";
        return new $model($this->db);
    }

    protected function view(string $view, array $data)
    {
        require_once "app/Views/" . $view . ".php";
    }
}
