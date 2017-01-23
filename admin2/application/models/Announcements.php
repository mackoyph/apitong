<?php
Class Announcements extends CI_Model
{
	private $c = "Announcements MODEL";

	private $ANNOUNCEMENTS = 7;
	private $LIMIT = 10;
	private function debug($function, $message)
	{
		log_message('debug', $this->c . " : " . $function . " : " . $message);
	}

	function getNumPages()
	{
		$this->db->select('*')
				->from('article')
				->where('category', $this->ANNOUNCEMENTS);				
		$count = $this->db->count_all_results();
		$this->debug('getNumPages', '$count=' . var_export($count, TRUE));
		$pages = ceil((float) $count / (float) $this->LIMIT);
		$this->debug('getNumPages', ' pages = ' . var_export($pages, TRUE));
		return $pages;
	}

	function getAnnouncements($page)
	{
		$offset = $page - 1;
		$offset *= $this->LIMIT;
		$this->db->select('article.*, author.ACCESS_USERNAME AS `author`, editor.ACCESS_USERNAME as `editor`')
				->from('article')
				->join('admin_access AS `author`', 'article.author_id=author.ACCESS_NO')
				->join('admin_access AS `editor`', 'article.last_edited_by=editor.ACCESS_NO')
				->where('category', $this->ANNOUNCEMENTS)
				->order_by('creation_date', 'DESC')
				->limit($this->LIMIT, $offset);
		$query = $this->db->get();
		return $query->result();
	}

	function getAnnouncement($id)
	{
		$this->db->select('*')
				->from('article')
				->where('id', $id)
				->where('category', $this->ANNOUNCEMENTS);
		$query = $this->db->get();
		return $query->row();
	}

	function addAnnouncement($params)
	{
		$this->debug('addAnnouncement', 'params=' . var_export($params, TRUE));
		$params['category'] = $this->ANNOUNCEMENTS;
		$params['creation_date'] = date("Y-m-d H:i:s");
		$params['last_edit_date'] = date("Y-m-d H:i:s");
		$params['author_id'] = $this->session->userdata('logged_in')['id'];
		$params['last_edited_by'] = $params['author_id'];
		//$this->debug("addAnnouncement", 'sql query=' . $this->db->set($params)->get_compiled_insert('article'));
		return $this->db->insert('article', $params);
	}

	function updateAnnouncement($params)
	{
		$id = $params['id'];
		$params['last_edit_date'] = date("Y-m-d H:i:s");
		$params['last_edited_by'] = $this->session->userdata('logged_in')['id'];
		$this->db->where('id', $id);
		$this->db->where('category', $this->ANNOUNCEMENTS);
		
		return $this->db->update('article', $params);
	}

	function deleteAnnouncement($id)
	{
		return $this->db->delete('article', array('id' => $id, 'category'=>$this->ANNOUNCEMENTS));
	}

}
?>