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
 * Qaton Controller
 * 
 */
class Controller
{
	
	/**
	 * TODO: Document this. 
	 */
	public $data = array();
	
	/**
	 * TODO: Document this. 
	 */
	public $view;
	
	/**
	 * TODO: Document this. 
	 */
	public $theme = DEFAULT_THEME;
	
	/**
	 * TODO: Document this. 
	 */
	public $theme_dir = false;
	
	/**
	 * TODO: Document this. 
	 */
	public $theme_open_view = false;
	
	/**
	 * TODO: Document this. 
	 */
	public $theme_close_view = false; 
	
	/**
	 * TODO: Document this. 
	 */
	public $theme_public_dir;
	
	/**
	 * TODO: Document this. 
	 */
	public $langs = array();
	
	/**
	 * TODO: Document this. 
	 */
	public $lang_catalog = false; 
	
	/**
	 * Class constructor
	 *
	 */
	public function __construct()
	{
		
		
	}
	
	/**
	 * Lang
	 *
	 * Populates language array 
	 *
	 * @param 	string		$lang		Langage
	 * @param	string		$catalog	Language catalog
	 * #param	string		$prefix		Prefix to apply to language variables
	 * @return 	void
	 */
	public function lang($lang=DEFAULT_LANG, $catalog=DEFAULT_LANG_CATALOG, $prefix=DEFAULT_LANG_PREFIX)
	{
		$lang_file = APPPATH.DIRECTORY_SEPARATOR.LANG_DIR.DIRECTORY_SEPARATOR.$lang.DIRECTORY_SEPARATOR.$catalog.LANG_EXT;
		if (is_file($lang_file))
		{
			$this->langs[] = array(
				'file' => $lang_file,
				'prefix' => $prefix
			);
		}
		else
		{
			exit('Invalid language file specified '.$lang_file); // TODO: Proper error handling
		}
	}
	
	/**
	 * Model
	 * 
	 * Loads (includes) model files 
	 * 
	 * @param	string	$model 	The model to load
	 */
	public function model($model=false)
	{

		$models_dir = APPPATH.DIRECTORY_SEPARATOR.MODELS_DIR.DIRECTORY_SEPARATOR;
		$model_file = realpath($models_dir.$model.VIEWS_EXT);
		
		if (file_exists($model_file) && is_readable($model_file))
		{
			include_once($model_file);
		}
		else
		{
			// TODO: Debugging and error reporting
			exit('Invalid model file '.$model_file);
		}
		
	}
	
	/**
	 * View
	 * 
	 * Loads (or returns) a view file after interpreting it 
	 * 
	 * @param	string	$view			The path and name of view
	 * @param	array	$data			Associative array of data to extract into view
	 * @param	bool	$return			Return or output to browser (interpreted view output)
	 * @param	bool	$enable_theme	Enable theme wrapping for this view
	 * 
	 * @return	string|void 
	 */
	public function view($view=false, $data=array(), $return=false, $enable_theme=true)
	{
		
		$this->data = $data;
		
		$views_dir = APPPATH.DIRECTORY_SEPARATOR.VIEWS_DIR.DIRECTORY_SEPARATOR;
		$this->view = realpath($views_dir.$view.VIEWS_EXT);
		
		$return_data = array();
		
		if (is_array($this->langs))
		{
			foreach ($this->langs as $i => $lang)
			{
				$this->lang_catalog = false;
				include_once($lang['file']);
				if (isset($this->lang_catalog) && $this->lang_catalog !== false && $this->lang_catalog !== null)
				{
					if (isset($lang['prefix']) && $lang['prefix'] !== false && $lang['prefix'] !== null)
					{
						extract($this->lang_catalog, EXTR_PREFIX_ALL, $lang['prefix']);
						
					}
					else
					{
						extract($this->lang_catalog);
						
					}
					$this->langs[$i]['catalog'] = $this->lang_catalog;
				}
			}
		}
		
		if ($this->theme !== false && $enable_theme === true)
		{
			$this->_setViewTheme($this->theme);
			$this->theme_open_view = realpath($views_dir.$this->theme_open_view.VIEWS_EXT);
			$this->theme_close_view = realpath($views_dir.$this->theme_close_view.VIEWS_EXT);
		}
		
		if (is_file($this->view))
		{
			extract($this->data);
			if ($return === true)
			{
				$content = $this->_includeToVar($this->view, $this->data, $this->langs);
				if ($this->theme_dir && $enable_theme === true)
				{
					$header = $this->_includeToVar($this->theme_open_view, $this->data);
					$footer = $this->_includeToVar($this->theme_close_view, $this->data);
					return $header.$content.$footer;
				}
				else
				{
					return $content;
				}
			}
			else
			{
				if ($this->theme_dir && $enable_theme == true)
				{
					include($this->theme_open_view);
					include($this->view);
					include($this->theme_close_view);
				}
				else
				{
					include($this->view);
				}
			}
		}
		else
		{
			exit('View Not Found'); // TODO: Proper error handling
		}
		
	}
	
	
	/**
	 * Set View Theme
	 * 
	 * Sets the theme for active view
	 * 
	 * @param	string	$theme	Theme name
	 * 
	 */
	public function _setViewTheme($theme)
	{
		
		$theme_dir = APPPATH.DIRECTORY_SEPARATOR.VIEWS_DIR.DIRECTORY_SEPARATOR.VIEWS_THEME_DIR.DIRECTORY_SEPARATOR.$theme;
		$this->theme_public_dir = BASE_URL.'/'.THEMES_PUBLIC_DIR."{$theme}/";
		if (is_dir($theme_dir))
		{
			$this->theme = $theme;
			$this->theme_dir = $theme_dir;
			$this->theme_open_view = VIEWS_THEME_DIR.DIRECTORY_SEPARATOR.$theme.DIRECTORY_SEPARATOR.THEME_OPEN_VIEW;
			$this->theme_close_view = VIEWS_THEME_DIR.DIRECTORY_SEPARATOR.$theme.DIRECTORY_SEPARATOR.THEME_CLOSE_VIEW;
		}
		else
		{
			exit('Invalid Theme Specified: '.$theme_dir); // TODO: Proper error handling
		}
		
	}
	
	/**
	 * TODO: Document this. 
	 * 
	 * This is used by the language system
	 * 
	 */
	public function _includeToVar($file, $data, $langs=false)
	{
		ob_start();
		extract($data);
		
		foreach($langs as $lang)
		{
			include_once($lang['file']);
			if (isset($lang['catalog']) && $lang['catalog'] !== false && $lang['catalog'] !== null)
			{
				if (isset($lang['prefix']) && $lang['prefix'] !== false && $lang['prefix'] !== null)
				{
					extract($lang['catalog'], EXTR_PREFIX_ALL, $lang['prefix']);
					
				}
				else
				{
					extract($lang['catalog']);
					
				}
			}
		}
		
		include($file);
		return ob_get_clean();
	}
}

