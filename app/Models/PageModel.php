<?php

class PageModel
{

    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getPage(string $title): array
    {
        return $this->db->select("SELECT * FROM pages WHERE title = :title", ["title" => $title])[0];
    }


}
