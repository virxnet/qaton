<?php
namespace VirX\Qaton;

class Docs extends Controller 
{
	
	public function __construct()
	{
		parent::__construct();
		$this->lang();
		$this->lang('french', 'example', 'lng_fr');
	}
	
	public function index() 
	{
		$this->view('docs', $this->data);
	}
	
}

// End of file 
