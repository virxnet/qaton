<?php
namespace VirX\Qaton;

class Connect extends Controller 
{
	
	public function __construct()
	{
		parent::__construct();
		$this->lang();
	}
	
	public function index() 
	{
		$this->view('connect', $this->data);
	}
	
}

// End of file 
