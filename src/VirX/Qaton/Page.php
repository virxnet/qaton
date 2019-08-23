<?php
/***********************************************************************
 * 
 * Qaton
 * 
 * The Elemental PHP MVC System
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2019, VirX.Net Software Innovations Inc.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	Qaton
 * @author	Antony Peiris <asp@virx.net>
 * @copyright	Copyright (c) 2019, VirX.Net Software Innovations Inc. (http://www.virx.net)
 * @license	https://opensource.org/licenses/MIT	MIT License
 * @link	https://qaton.virx.net
 * @since	Version 0.0.1
 * @filesource
 * 
 **********************************************************************/
namespace VirX\Qaton;

/**
 * 
 * Qaton Page
 * 
 */
class Page
{
	
	/**
	 * TODO: Document this. 
	 */
	public $request;
	
	/**
	 * TODO: Document this. 
	 */
	public $app_path;
	
	/**
	 * TODO: Document this. 
	 */
	public $controller;
	
	/**
	 * Class constructor
	 *
	 */
	function __construct()
	{
		$this->init();
		$this->request = $this->getUserRequest();
		$this->getController();
	}
	
	/**
	 * TODO: Document this. 
	 * 
	 * This is used to initlize the system
	 * 
	 */
	private function init()
	{
		// TODO: Clean up
		
		// Check minimum requirements
		if (!is_dir(APPPATH.DIRECTORY_SEPARATOR.CONTROLLERS_DIR))
		{
			exit('The Controllers directory is missing '.APPPATH.CONTROLLERS_DIR);
		}
		
		if (!is_file(APPPATH.DIRECTORY_SEPARATOR.CONTROLLERS_DIR.DIRECTORY_SEPARATOR.DEFAULT_CONTROLLER.CONTROLLERS_EXT))
		{
			exit('The default Controller is missing');
		}
	}
	
	/*
	 * TODO: Clean up these comments
	 * 
	 * this method is called from the constructor and is intended to parse
	 * the user request. For example, example.com/a/b/c where a/b/c is the request
	 * 
	 * It will attempt to do some basic cleaning of the request and then return
	 * an array consisting of all the parts in order to find and call the controller
	 * 
	 */
	function getUserRequest()
	{
		
		if (mb_substr($_SERVER['REQUEST_URI'], 0, mb_strlen(URL_SUB_DIR)) === URL_SUB_DIR)
		{
			$request_url = '/'.mb_substr($_SERVER['REQUEST_URI'], mb_strlen(URL_SUB_DIR));
		}
		else
		{
			$request_url = $_SERVER['REQUEST_URI'];
		}
		
		$request = explode('/', explode('?', $request_url, 2)[0]);

		foreach ($request as $i => $req)
		{
			if ($req == '' || is_null($req))
			{
				unset($request[$i]);
			}
		}
		
		$request = array_values($request); 
		if (isset($request[0]))
		{
			if ($request[0] == basename(__FILE__))
			{
				unset($request[0]);
			}
		}
		
		return $request;
		
	}
	
	/*
	 * TODO: Clean up these comments
	 * 
	 * this method calls the controller file. It will look for a valid
	 * controller in the following sequence: 
	 * 
	 * If example.com/a/b/c is called.... it will look for a.php first,
	 * followed by b.php and then c.php. If none are found, a 404 is 
	 * issued. Otherwise, the earliest controller found will be called
	 * and the others are ignored even if they exist. However, all the
	 * remaning components will be treated as method params. So for 
	 * example if /a/b/c is called and b.php exists, then 'a' is a dir
	 * and b.php is called with 'c' being passed as a param to the class
	 * in 'b.php'. 
	 * 
	 */
	public function getController()
	{
		
		$this->controller = $this->_getController();
		
		$controllerClass = '\\VirX\\Qaton\\'.$this->_getControllerClass($this->controller['controller']);
		
		if (is_file($this->controller['controller']))
		{
			require_once($this->controller['controller']); // TODO: Move this to an autoloader later 
		}
		else
		{
			$this->_issue_404();
		}
		
		if (class_exists($controllerClass))
		{
			$pageController = new $controllerClass;
			
			if (isset($this->controller['call'][0]))
			{
				$calledMethod = $this->controller['call'][0];
			}
			else
			{
				$calledMethod = DEFAULT_METHOD;
			}
			
			if ($calledMethod == '' || $calledMethod == '/')
			{
				$calledMethod = DEFAULT_METHOD;
			}
			
			if (method_exists($pageController, $calledMethod))
			{
				
				if (isset($this->controller['call']))
				{
					$params = $this->controller['call'];
					unset($params[0]);
				}
				else
				{
					$params = array();
				}
				
				$reflection = new \ReflectionMethod($pageController, $calledMethod);
				
				if ($reflection->getNumberOfRequiredParameters() > count($params))
				{
					if (DEBUG === true)
					{
						echo "Required: ";
						foreach($reflection->getParameters() as $param)
						{
							echo $param->name.', ';
						}
						exit('Fatal Error: Incomplete Request'); // TODO: Proper error handling
					}
					else
					{
						exit('Fatal Error: Incomplete Request'); // TODO: Proper error handling
					}
				}
				
				call_user_func_array(array($pageController, $calledMethod), array_values($params));
				
			}
			else
			{
				if (DEBUG === true)
				{
					exit("Controller `{$calledMethod}` Method Does Not Exist"); // TODO: Use proper erorr handling
				}
				else
				{
					$this->_issue_404();
				}
			}
			
		}
		else
		{
			if (DEBUG === true)
			{
				exit("Class does not exist `{$controllerClass}`"); // TODO: Use proper erorr handling
			}
			else
			{
				$this->_issue_404();
			}
		}
		
		
		
	}
	
	
	private function _getCallParams($request, $index=0)
	{
		unset($request[$index]);
			
		if (empty($request))
		{
			return array(0 => DEFAULT_METHOD);
		}
		else
		{
			return array_values($request);
		} 
		
	}
	
	private function _getController()
	{
		$controllers_dir = APPPATH.DIRECTORY_SEPARATOR.CONTROLLERS_DIR.DIRECTORY_SEPARATOR;
		
		if (empty($this->request))
		{
			$controller = realpath($controllers_dir.DEFAULT_CONTROLLER.CONTROLLERS_EXT);
		}
		else
		{
			$controller = realpath($controllers_dir.implode('/', $this->request).CONTROLLERS_EXT);
		}
		
		if (is_file($controller))
		{
			return array(
				'controller' => $controller,
				'call' => $this->_getCallParams($this->request, 0)
			);
			
		}
		else
		{
			return $this->_traverseRequestGetFile($this->request, CONTROLLERS_EXT, $controllers_dir);
		}
	}
	
	/* 
	 * TODO: Clean up these comments
	 * 
	 * This is a simple utility method to traverse the provided path
	 * using the user request to find a file. The return will spit 
	 * out the full path of the file as well as whatever was remaining
	 * in the request as a 'call'
	 *  
	 */
	private function _traverseRequestGetFile($request, $ext, $path='')
	{
		
		foreach($request as $i => $req)
		{
			$path .= DIRECTORY_SEPARATOR.$req;
			$file = $path.$ext;
			
			$call = $this->_getCallParams($request, $i);
			
			if (is_file($file))
			{
				return array(
					'controller' => realpath($file),
					'call' => $call
				);
			}
		
		}
		
		return false;
		
	}
	
	/**
	 * TODO: Document this. 
	 * 
	 */
	public function _getControllerClass($controller)
	{
		
		$class = ucfirst(strtolower(pathinfo(trim($controller))['filename']));
		
		return $class;
	
	}
	
	/**
	 * TODO: Document this. 
	 * 
	 */
	public function _issue_404()
	{
		
		header("HTTP/1.0 404 Not Found");
		if (DEBUG === true)
		{
			header("Content-type: text/plain");
			debug_print_backtrace();
		}
		exit('Error 404 - Page Not Found');
		
	}
	
}

