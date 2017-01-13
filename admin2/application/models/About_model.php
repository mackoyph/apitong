<?php
Class About_model extends CI_Model
{
	private $root_category = 1;
	function getMainAboutArticle()
	{
		$this->db->select('*')
				->from('article')
				->where('category', $this->root_category);
		$query = $this->db->get();
		return $query -> result();
	}
	
	function getArticles()
	{
		$this->db->select('*')
				->from('article')
				->where('category !=', $this->root_category);
		$query = $this->db->get();
		return $query->result();
	}
	
	function getCategories()
	{
		$this->db->select('*')
				->from('article_category');
		$query = $this->db->get();
		return $query->result();
	}
}
?>