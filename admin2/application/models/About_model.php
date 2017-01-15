<?php
Class About_model extends CI_Model
{
	private $c = "ABOUT MODEL";

	private function debug($function, $message)
	{
		log_message('debug', $this->c . " : " . $function . " : " . $message);
	}

	private $About = 2;

	function getMainAboutArticle()
	{
		$this->db->select('*')
				->from('article')
				->where('category', $this->About);
		$query = $this->db->get();
		return $query -> result();
	}
	
	function getAboutArticles()
	{
		$this->db->select('article.*, article_category.name, author.ACCESS_USERNAME AS `author_username`, editor.ACCESS_USERNAME AS `editor_username`')
				->from('article')
				->join('article_category', 'article.category=article_category.id')
				->join('admin_access AS `author`', 'article.author_id=author.ACCESS_NO')
				->join('admin_access AS `editor`', 'article.last_edited_by=editor.ACCESS_NO')
				->where('root_category', $this->About);
		//$string = $this->db->get_compiled_select('article',FALSE);
		//$this->debug('getAboutArticles', 'query='.var_export($string, TRUE));
		$query = $this->db->get();
		return $query->result();
	}

	function addAboutArticle($dbParams)
	{
		$this->debug('addAboutArticle', 'dbParams=' . var_export($dbParams, TRUE));
		return $this->db->insert('article', $dbParams);
	}
	
	function getAboutCategories()
	{
		$this->db->select('*')
				->from('article_category')
				->where('root_category', $this->About);
		$query = $this->db->get();
		return $query->result();
	}
}
?>