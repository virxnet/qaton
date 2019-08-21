<?php
namespace VirX\Qaton;

class Download extends Controller 
{
	
	public function __construct()
	{
		parent::__construct();
		$this->lang();
	}
	
	public function index() 
	{
		$this->view('download', $this->data);
	}
	
}

// End of file 
