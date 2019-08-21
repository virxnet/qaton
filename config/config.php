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
 * @author	Antony Peiris
 * @copyright	Copyright (c) 2019, VirX.Net Software Innovations Inc. (http://www.virx.net)
 * @license	https://opensource.org/licenses/MIT	MIT License
 * @link	https://qaton.virx.net
 * @since	Version 1.0.0
 * @filesource
 * 
 **********************************************************************/
 
// === Primary Configuration ===

// Absolute base path to the root directory (www) where index.php will reside
define("BASE_PATH", realpath(__DIR__ .'/../public/'));

// Path to index.php
define("SYSTEM", realpath(BASE_PATH.'/index.php'));

// Sub-directory if root is not root of TLD
define("URL_SUB_DIR", '/public/');

// Agnostic base URL pointing to base path of index.php (root)
define("BASE_URL", '//'.$_SERVER['HTTP_HOST'].URL_SUB_DIR);

// Absolute path to app directory (with trailing directory seperator)
define("APPPATH", realpath(BASE_PATH . '/../src/apps/qaton_site/'));

// Name of models dir (relative to APPPATH)
define("MODELS_DIR", 'models');

// File extension for model files
define("MODELS_EXT", '.php');

// Name of controllers dir (relative to APPPATH)
define("CONTROLLERS_DIR", 'controllers');

// File extension for controller files
define("CONTROLLERS_EXT", '.php');

// Name of views dir (relative to APPPATH)
define("VIEWS_DIR", 'views');

// File extension for views file
define("VIEWS_EXT", '.php');

// Name of views sub-dir holding the themes
define("VIEWS_THEME_DIR", '_themes');

// Default theme to use (set to false for none)
define("DEFAULT_THEME", 'twbs4_default');

// File to use as opening theme encapsulator
define("THEME_OPEN_VIEW", 'header');

// File to use as closing theme encapsulator 
define("THEME_CLOSE_VIEW", 'footer');

// Relative url path to the themes dir (from BASE_URL)
define("THEMES_PUBLIC_DIR", 'assets/_themes/');

// Name of libs dir for library files
define("LIBRARY_DIR", 'libs');

// The default controller file to call when none have been specified (at BASE_URL, root)
define("DEFAULT_CONTROLLER", 'index');

// The dedaul method to call when the DEFAULT_CONTROLLLER is called
define("DEFAULT_METHOD", 'index');

// Name of lang dir for language files
define("LANG_DIR", 'lang');

// Name of dir for the default language 
define("DEFAULT_LANG", 'english');

// Default language catalog file to load
define("DEFAULT_LANG_CATALOG", 'common');

// Default prefix to attach to all extracted variables
define("DEFAULT_LANG_PREFIX", 'lang_common');

// Language file extension
define("LANG_EXT", '.php');

// Debug mode (bool)
define("DEBUG", true);
