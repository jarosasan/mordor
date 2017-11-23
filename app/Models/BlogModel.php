<?php

class BlogModel
{

    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }
    
    public function getCount(){
    	return $this->db->select("SELECT COUNT(*) as count FROM post");
    }

    public function getAll($startPost, $perPages): array
    {
        return $this->db->select("SELECT id, title, SUBSTRING(`body`, 1, 200) as body FROM post LIMIT :start, :coun", [':start'=>$startPost, ':coun'=>$perPages]);
    }

    public function getSingle(int $id): array
    {
        return $this->db->select("SELECT * FROM post WHERE id = :id",
            ["id" => $id]
        )[0];
    }

    public function search(string $query): array
    {
        return $this->db->select("SELECT * from post WHERE UPPER(title) LIKE UPPER(?) OR UPPER(body) LIKE UPPER(?)",
            ["%$query%", "%$query%"]
        );
    }

}
