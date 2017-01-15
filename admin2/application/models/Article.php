<?php
Class Article extends CI_Model
{
	function getArticles()
	{
		$query = $this->db->get('article');
		return $query->result();
	}
	
	function getArticle($article_id)
	{
		$this->db->select('*')
				->from('article')
				->where('id', $article_id);
		$query = $this->db->get();
		return $query->result();
	}
	
	function editAdminAccount($edit, $article_id)
	{
		$dbparam = array();
		$dbparam['title'] = $edit['title'];
		$dbparam['text'] = $edit['text'];
		$this->db->where('id', $article_id);
		return $this->db->update('article', $dbparam);
	}
}
?>