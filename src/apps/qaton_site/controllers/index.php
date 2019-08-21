<?php
namespace VirX\Qaton;

class Index extends Controller 
{
	
	public function __construct()
	{
		parent::__construct();
		$this->lang(); // Default
	}
	
	public function index()
	{	
		$this->view('index');
	}
	
}

// End of file
