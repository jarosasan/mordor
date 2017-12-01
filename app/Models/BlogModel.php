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
	
	public function getUserPosts($user, $startPost, $perPages): array
	{
		return $this->db->select("SELECT * FROM post WHERE user = :user LIMIT :start, :coun", [':user'=>$user, ':start'=>$startPost, ':coun'=>$perPages]);
	}
	
	public function getUserPostCount($user){
		return $this->db->select("SELECT COUNT(*) as count FROM post WHERE user = :user", [':user'=>$user]);
	}
	
	public function savePost($user, $data, $file): int
	{
		return $this->db->insert("INSERT INTO post (user, title, body, image) VALUES (:user, :title, :body, :image)", [':user'=>$user, ':title'=>$data['title'], ':body'=>$data['body'], ':image'=>$file]);
	}
	
	public function remove($id){
		return $this->db->remove("DELETE FROM post WHERE id = $id");
	}

}
