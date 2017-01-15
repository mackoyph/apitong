<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends CI_Controller {
	private $c = "ABOUT CONTROLLER";

	private function debug($function, $message)
	{
		log_message('debug', $this->c . " : " . $function . " : " . $message);
	}
	
	private function check_loggedin()
	{
		if(!$this->session->has_userdata('logged_in'))
		{
			$this->debug('check_loggedin', ' user not logged in, redirecting to login page');
			redirect('login');
		}
	}
	
	private function setupData()
	{
		$data['username'] = $this->session->userdata('logged_in')['username'];		
		$data['userid'] = $this->session->userdata('logged_in')['id'];
		$data['errormsg'] = NULL;
		return $data;
	}
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('about_model');
		$this->load->model('content_model');
		date_default_timezone_set("Asia/Manila");
	}
	
	function index()
	{
		$this->check_loggedin();
		$data = $this->setupData();
		$data['jsvars'] = array( 'sidebar_active' => 'about-page');
		
		$main_about_article = $this->about_model->getMainAboutArticle();

		if(count($main_about_article) != 0)
		{
			$data['main_about'] = $main_about_article[0];
			$this->debug('index', 'main_about=' . var_export($data['main_about'], TRUE));	
		}
		
		$articles = $this->about_model->getAboutArticles();
		$this->debug('index', 'articles=' . var_export($articles, TRUE));
		$data['about_articles'] = $articles;

		$data['about_categories'] = $this->about_model->getAboutCategories();
		$count = array();
		foreach($data['about_categories'] as $row)
		{
			$count[$row->id] = $this->about_model->getArticleCount($row->id);
		}
		$data['category_count'] = $count;

		$this->load->view('templates/header', $data);
		$this->load->view('about/view', $data);
		$this->load->view('templates/footer', $data);
	}

	function articleserver($id)
	{
		$this->debug('articleserver', '$id=' . var_export($id, TRUE));
		$article = $this->about_model->getArticle($id);
		$response;
		if(count($article) == 0)
		{
			$response = array(
				'title' => 'no such article exists',
				'text'=> 'none',
				'author' =>'none'				
			);
		}
		else
		{
			$response = $article[0];
		}
		$this->debug("articleserver", 'response' . var_export($response, TRUE));
		$json = json_encode($response);
		echo $json;
	}

	function jsonServer($item)
	{		
		$this->debug("jsonserver", "ITEM = ". var_export($item, TRUE));
		if(strcmp($item, "AboutPage") == 0)
		{
			$main_about = $this->about_model->getMainAboutArticle();
			$this->debug('jsonserver', 'main_about=' . var_export($main_about, TRUE));
			$json = json_encode($main_about);
			echo $json;
		}
		elseif(strcmp($item, "AllContents") == 0)
		{
			$contents = $this->content_model->getAllContents();
			$data = array();
			foreach($contents as $row)
			{
				$data[$row->content_desc] = $row->content;
			}
			$this->debug('jsonServer' , 'AllContents = ' . var_export($data, TRUE));
			$json = json_encode($data);
			echo $json;
		}
		elseif(strcmp($item, "Contents") == 0)
		{
			$contents = $this->content_model->getAllContents();
			$json = json_encode($contents);
			echo $json;
		}
		elseif(strcmp($item, "footer-contact")==0)
		{
			$footerContact = $this->content_model->getFooterContact();
			$json = json_encode($footerContact);
			echo $json;
		}
		elseif(strcmp($item, "AboutPageArticles") == 0)
		{
			$about_articles = $this->about_model->getAboutArticles();
			$json = json_encode($about_articles);
			echo $json;
		}
		elseif(strcmp($item, "AboutPageCategories") == 0)
		{
			$about_cats = $this->about_model->getAboutCategories();
			$categories = array();
			$length = count($about_cats);
			for($i = 0; $i < $length; $i++)
			{
				$articles = $this->about_model->getArticlesByCategory($about_cats[$i]->id);
				$article_array = array();
				foreach($articles as $row)
				{
					$temp = array();
					$temp['article_id'] = $row->id;
					$temp['title'] = $row->title;
					array_push($article_array, $temp);
				}
				$categories[$i] = array(
					'name' => $about_cats[$i]->name,
					'id' => $about_cats[$i]->id,
					'articles' => $article_array
				);
			}
			$json = json_encode($categories);
			echo $json;
		}
		else
		{
			
			$content = $this->content_model->getContent($item);
			$content = $content[0]->content;
			$response = array('content' => $content,
			'content_desc' =>$item);
			$this->debug('jsonserver', 'content=' . var_export($content, TRUE));
			$json = json_encode($response);
			echo $json;
		}
	}

	function new_article()
	{
		$this->debug('new_article', "POST Variables=" . var_export($this->input->post(), TRUE));
		$this->check_loggedin();
		$data = $this->setupData();
		$data['jsvars'] = array( 'sidebar_active' => 'about-page');

		$this->debug('new_article' , 'php timezone=' . date_default_timezone_get());
		$data['about_categories'] = $this->about_model->getAboutCategories();

		//load form validation
		//load form helper
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('editor1', 'Article Text', 'trim|required');
		$this->form_validation->set_rules('category', 'Category', 'numeric|required');

		if ($this->form_validation->run() == FALSE)
		{
			$this->debug('new_article', 'form validation run = false, redirecting to new article page again');
			$this->load->view('templates/header', $data);
			$this->load->view('about/new_article', $data);
			$this->load->view('templates/footer', $data);
		}
		else
		{
			//save to database
			$this->debug('new_article', 'Title=' . var_export($this->input->post('title'), TRUE));
			$this->debug('new_article', 'text=' . var_export($this->input->post('editor1'), TRUE));
			$this->debug('new_article', 'category=' . var_export($this->input->post('category'), TRUE));
			$title = $this->input->post('title');
			$text = $this->input->post('editor1');
			$category = $this->input->post('category');
			$creation_date = date("Y-m-d H:i:s");
			$edit_date = $creation_date;
			$author = $data['userid'];
			$editor = $author;

			$dbParams = array(
				'author_id' => $author,
				'last_edited_by' => $editor,
				'creation_date' =>$creation_date,
				'last_edit_date' => $edit_date,
				'title' => $title,
				'text' => $text,
				'category' => $category
			);

			$dbResult = $this->about_model->addAboutArticle($dbParams);
			if ($dbResult)
			{
				$this->debug('new_article', 'article added to databasse, redirecting to about');
				redirect('about');
			}
			else
			{
				$data['errormsg'] = 'Could not add article to database.';
				$this->load->view('templates/header', $data);
				$this->load->view('about/new_article', $data);
				$this->load->view('templates/footer', $data);
			}
			
			//redirect back to admin panel for about page
		}

	}

	function edit_article($id, $main=0)
	{
		if(!isset($id))
		{
			$this->debug('edit_article', 'invalid article id, redirecting to about');
			redirect('about');
		}

		$this->check_loggedin();
		
		$data = $this->setupData();
		$data['jsvars'] = array( 'sidebar_active' => 'about-page');

		//get article categories from db
		if($main == 0)
		{
			$data['about_categories'] = $this->about_model->getAboutCategories();
		}
		elseif($main == 1)
		{
			$data['about_categories'] = $this->about_model->getAboutCategory();
		}

		//get article from db
		$article = $this->about_model->getArticle($id);
		if(count($article) != 0)
		{
			$data['article'] = $article[0];
		}

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('editor1', 'Article Text', 'trim|required');
		$this->form_validation->set_rules('category', 'Category', 'numeric|required');

		if ($this->form_validation->run() == FALSE)
		{
			$this->debug("edit_article", 'form validation failed, displaying edit page again');
			$this->load->view('templates/header', $data);
			$this->load->view('about/edit_article', $data);
			$this->load->view('templates/footer', $data);
		}
		else
		{
			//update database here
			$postvars = $this->input->post();

			$dbParams = array (
				'title' => $postvars['title'],
				'text' => $postvars['editor1'],
				'category' =>$postvars['category'],
				'last_edited_by' => $data['userid'],
				'last_edit_date' => date("Y-m-d H:i:s")
			);

			$dbResult = $this->about_model->updateArticle($id, $dbParams);
			if($dbResult) 
			{
				$this->debug("edit_article", 'successful db update, redirecting to about');
				redirect('about');
			}
			else 
			{
				$data['errormsg'] = 'Could not add article to database.';
				$this->load->view('templates/header', $data);
				$this->load->view('about/edit_article', $data);
				$this->load->view('templates/footer', $data);
			}
		}
	}

	function delete_article($id = FALSE)
	{
		if ($id == FALSE) {
			redirect('about');
		}
		$this->check_loggedin();
		

		$dbResult = $this->about_model->deleteArticle($id);
		if ($dbResult === FALSE)
		{
			redirect('about');
		}
		else
		{
			$data['errormsg'] = "Could not delete the article.";
			$this->load->view('templates/header', $data);
			$this->load->view('about/view', $data);
			$this->load->view('templates/footer', $data);
		}
	}

	function new_category()
	{
		$this->debug('new_category', 'inside new_category method');
		$this->debug('new_category', 'POST=' . var_export($this->input->post(), TRUE));
		$this->check_loggedin();
		$data = $this->setupData();
		$data['jsvars'] = array( 'sidebar_active' => 'about-page');

		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('name', 'Category Name', 'trim|required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->debug('new_category', 'Form validation run = false, showing page');
			$this->load->view('templates/header', $data);
			$this->load->view('about/new_category', $data);
			$this->load->view('templates/footer', $data);
		}
		else
		{
			$dbParams = array(
				'name' => $this->input->post('name'),
				'root_category' => 2,
				'author_id' => $data['userid'],
				'creation_date' =>  date("Y-m-d H:i:s"),
				'last_edited_by' => $data['userid'],
				'last_edit_date' => date("Y-m-d H:i:s")
			);

			$dbResult = $this->about_model->addCategory($dbParams);
			if($dbResult)
			{
				redirect('about');
			}
			else
			{
				$data['errormsg'] = 'Could not add category to database.';
				$this->load->view('templates/header', $data);
				$this->load->view('about/new_category', $data);
				$this->load->view('templates/footer', $data);
			}

		}
	}

	function edit_category($category_id = FALSE)
	{
		if ($category_id === FALSE)
		{
			redirect('about');
		}
		$this->check_loggedin();
		$data = $this->setupData();
		$data['jsvars'] = $data['jsvars'] = array( 'sidebar_active' => 'about-page');

		$data['category'] = $this->about_model->getCategory($category_id)[0];
		$this->debug('edit_category', 'category=' . var_export($data['category'], TRUE));
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Category Name', 'trim|required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->debug('edit_category', 'form validation run = FALSE, showing page instead');
			$this->load->view('templates/header', $data);
			$this->load->view('about/edit_category', $data);
			$this->load->view('templates/footer', $data);
		}
		else
		{
			$this->debug('edit_category', 'will try to save to database');
			$dbParams = array(
				'id' => $category_id,
				'name' => $this->input->post('name')
			);
			$dbResult = $this->about_model->updateCategory($dbParams);
			if($dbResult)
			{
				$this->debug('edit_category', 'db operation to edit category name successful');
				redirect('about');
			}
			else
			{
				$data['errormsg'] = 'Could not add category to database.';
				$this->load->view('templates/header', $data);
				$this->load->view('about/edit_category', $data);
				$this->load->view('templates/footer', $data);
			}
		}
	}
}
?>