<?php

class PageModel
{

    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getPage(string $id): array
    {
        return $this->db->select("SELECT * FROM pages WHERE id = :id", [":id" => $id])[0];
    }


}
