<style>
h1, h2, h3, h4
{
	text-decoration: underline;
}
</style>

<div class="container">
	
	<div class="row">
		<div class="col-md-12">
			<h2 class="text-center">Qaton Documentation</h2>
		</div>
	</div>
	<div class="row">
		
		<div class="col-md-3">
			<div style="position: sticky; top: 10%;" class="card bg-info text-light">
				<div class="card-body">
				<h5 class="card-title text-center">Table of Contents</h5>
				
				<ol>
					<li><a class="text-light" href="#intro">Introduction</a></li>
					<li><a class="text-light" href="#install">Instalation</a></li>
					<li><a class="text-light" href="#config">Configuration</a></li>
					<li><a class="text-light" href="#conventions">Conventions</a></li>
					<li><a class="text-light" href="#files">File Structure</a></li>
					<li><a class="text-light" href="#routing">URLs &amp; Request Routing</a></li>
					<li><a class="text-light" href="#controllers">Controllers</a></li>
					<li><a class="text-light" href="#views">Views</a>
						<ol>
							<li><a class="text-light" href="#themes">Themes</a></li>
							<li><a class="text-light" href="#lang">Languages</a></li>
						</ol>
					</li>
					<li><a class="text-light" href="#models">Models</a></li>
					<li><a class="text-light" href="#extend">Extend &amp; Libraries</a></li>
					<li><a class="text-light" href="#todo">TODO</a></li>
				</ol>
				</div>
			</div>
		</div>
		
		<div class="col-md-9">
			
			<h3 class="text-info" id="intro">Introduction</h3>
			
			<p>Qaton is an absolute minimal MVC system. It is not a PHP 
			framework although it closely resembles one. Qaton's primary
			goal is to provide MVC support at the most basic and elemental 
			level possible while providing developers with the maximum 
			level of flexibility. Because of it's simplicity, Qaton runs
			extremely fast as if one were running vanilla PHP. Although
			Qaton is a minimal system, it is easily extended and is able
			to support all kinds of projects. </p>
			
			<p>The MVC (Model-Controller-View) architectural pattern aims 
			at separating applications into three major logical components.
			Qaton natively adds theme and language support right off the 
			shelf. </p>
			
			<p>
				Qaton has been developed based on the fundamental 
				belief that the latest version
				of PHP has all optimizations, security and 
				functionality built-in natively to build robust 
				applciations without addtional framwork overhead. 
			</p>
			
			
			<div class="alert alert-info">
				<strong>NOTE:</strong> Qaton is still at its infancy and is at the proof of
				concept stage. The project is seeking support from
				anyone who is willing to help it advance and mature. 
			</div>
			
			<div class="alert alert-warning">
				<strong>IMPORTANT:</strong> This documentation is still under development. 
			</div>
			
			<h3 class="text-info" id="install">Instalation</h3>
			
			<p>
				The instalation is quite simple and will only take a 
				couple of seconds to complete. There are two ways to 
				install the Qaton system. 
				
				<div class="alert alert-info">
					Qaton requires PHP 7.2 or higher to function as expected 
					and has not been tested on previous versions.
				</div>
				
				<h4>Manual Installation</h4>
				
				<p>
					Manually installing Qaton is probably the fastest
					way to go about it. All you have to do is download
					the latest zip file and extract it to your web 
					server's document root. Minimal configuration may be
					necessary to ensure that the correct paths are set 
					in the primary configuration file. <br><br>
					Therefore, if your web server document root is 
					<code>/var/www/html</code> you could extract the 
					package to <code>/var/www/</code> and move the 
					<code>public</code> files to <code>html</code>, while
					keeping the rest of the files in place. The configuration
					will need to be updated to match.  
					
					<br>
					<br>
					<a target="_blank" href="https://github.com/virxnet/qaton/archive/master.zip" class="btn btn-success btn-sm">Download Qaton</a>
					
					<p>Or the command line:</p>
					
					<kbd>
						wget -O qaton.zip https://github.com/virxnet/qaton/archive/master.zip
					</kbd>
					
					<br><br>
					<p>Or</p>
					
					<kbd>
						curl -o qaton.zip https://github.com/virxnet/qaton/archive/master.zip
					</kbd>
				</p>
				
				<h4>Git</h4>
				
				<p>
					Using Git clone would ensure that you have the latest
					version of Qaton installed to your system. Simply
					run the following in the preferred directory:
				</p>
				<p>
					<kbd>
						git clone https://github.com/virxnet/qaton.git
					</kbd>
				</p>
				
				
				<h4>Packagist via Composer</h4>
				
				<p>
					Using composer would not only offer the latest 
					version but also make the management of the package
					quite simple. Simply run the the following in the 
					preferred directory:
				</p>
				
				<small class="text-dim">Until a stable version is released, you need to specify the minimum stabilit</small>
				
				<p>
					<kbd>
						composer create-project virx/qaton --stability dev
					</kbd>
				</p>
				
				<small class="text-dim">Otherwise use the following:</small>
				
				<p>
					<kbd>
						composer create-project virx/qaton
					</kbd>
				</p>
				
			</p>
			
			<h3 class="text-info" id="config">Configuration</h3>
			<p>
				The following configuration options are available on the
				system: 
			</p>
			
			<pre><code class="language-php">// Base path to the root directory (www) where index.php will reside
define("BASE_PATH", __DIR__);

// Path to index.php
define("SYSTEM", BASE_PATH.'/index.php');

// Agnostic base URL pointing to base path of index.php (root)
define("BASE_URL", '//'.$_SERVER['HTTP_HOST']);

// Absolute path to app directory (with trailing directory seperator)
define("APPPATH", BASE_PATH . '/app/');

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
define("DEFAULT_THEME", 'default');

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

// The default method to call when the DEFAULT_CONTROLLLER is called
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
define("DEBUG", true);</code></pre>
			
			
			<h3 class="text-info" id="conventions">Conventions &amp; Standards</h3>
			<p>
				As Qaton aims to be a Packagist compliant project which
				can be installed and managed via composer, many of the 
				conventions should be quite familiar. Qaton belongs 
				within the <code>VirX\Qaton\</code> namespace. Other 
				conventions and standards will be documented here as this
				documentation evolves and grows. 
				
			</p>
			
			<p>
				Qaton requires PHP 7.2+ and has not been tested on any
				older versions of PHP. 
			</p>
			
			<h3 class="text-info" id="files">File Structure</h3>
			<p>
				Qaton adheres to a standard file structure and should be 
				quite familiar if you have ever worked on any open source
				PHP project. Below is a description of this structure:
				
				<div class="card">
						<div class="card-body">
						<ul class="text-primary">
							<li>bin/ <em class="text-muted">[Required] Will contain executable files and scripts</em></li>
							<li>config/ <em class="text-muted">[Required] Essential configuration files</em>
								<ul>
									<li>config.php <em class="text-muted"></em></li>
									<li>database.php <em class="text-muted"></em></li>
								</ul>
							</li>
							<li>docs/ <em class="text-muted">[Optional] Placeholder for offline text-based documentation</em></li>
							<li>public/ <em class="text-muted">[Required] The Document Root of the web server (</em>
								<ul>
									<li>.htaccess <em class="text-muted">[Required] Apache web server configuration </em></li>
									<li>index.php <em class="text-muted">[Required] Default index file (primary routing point)</em></li>
									<li>assets/ <em class="text-muted"> Static client-side assets to be included in web pages</em>
										<li>_themes <em class="text-muted">[Optional] Directory containing all themes</em>
											<ul>
												<li>default <em class="text-muted">[Optional] A theme</em></li>
												<li>...</li>
											</ul>
										</li>
									</li>
								</ul>
							</li>
							<li>resources/ <em class="text-muted">[Optional] Additional resource files </em></li>
							<li>src/ <em class="text-muted">[Required] Project related PHP files (system and app)</em>
								<ul>
									<li>apps/ <em class="text-muted">[Required] The actual MVC apps will be housed here</em>
										<ul>
											<li>example_app <em class="text-muted">[Required] This is an app directory (example)</em>
												<ul>
													<li>controllers/ <em class="text-muted">[Required] Controllers directory </em>
														<ul>
															<li>index.php <em class="text-muted">[Required] A controller file </em></li>
															<li>... <em class="text-muted">Other controllers</em></li>
														</ul>
													</li>
													<li>lang/ <em class="text-muted">[Required] Language directories will be housed here</em>
														<ul>
															<li>english/ <em class="text-muted">[Required] A language directory. Language files will be housed here</em>
																<ul>
																	<li>common.php <em class="text-muted">[Reqiuired] A language catalog file</em></li>
																	<li>... <em class="text-muted">Other language catalog files for this language specification</em></li>
																</ul>
															</li>
															<li>...</li>
														</ul>
													</li>
													<li>models/ <em class="text-muted">[Optional] Model files will be housed here</em>
														<ul>
															<li>model.php <em class="text-muted">[Optional] A model file</em></li>
															<li>... <em class="text-muted">Other model files</em></li>
														</ul>
													</li>
													<li>views/ <em class="text-muted">[Required] View template files will be housed here</em>
														<ul>
															<li>_themes/ <em class="text-muted">[Optional] Theme views will be housed here </em>
																<ul>
																	<li>default/ <em class="text-muted">[Optional] A theme directory</em>
																		<ul>
																			<li>header.php <em class="text-muted">[Optional] Theme opening encapsulation file</em></li>
																			<li>footer.php <em class="text-muted">[Optional] Theme closing encapsulation file</em></li>
																			<li>... <em class="text-muted">Other template related files</em></li>
																		</ul>
																	</li>
																	<li>... <em class="text-muted">Other themes</em></li>
																</ul>
															</li>
															<li>index.php <em class="text-muted">[Optional] A view file </em></li>
															<li>... <em class="text-muted">Other views</em></li>
														</ul>
													</li>
												</ul>
											</li>
											<li>... <em class="text-muted">Other apps</em></li>
										</ul>
									</li>
									<li>VirX/ <em class="text-muted">[Required] All VirX.Net related projects</em>
										<ul>
											<li>Qaton <em class="text-muted">[Required] The Qaton project core files</em>
												<ul>
													<li>Controller.php <em class="text-muted">[Required] The Qaton primary Controller class</em></li>
													<li>Page.php <em class="text-muted">The Qaton primary Page class.</em></li>
												</ul>
											</li>
										</ul>
									</li>
								</ul>
							</li>
							<li>tests/ <em class="text-muted">[Optional] All test files are housed here</em></li>
							<li>vendor/ <em class="text-muted">[Required] Third-party libraries and projects to extend Qaton projects</em>
								<ul>
									<li>composer/ <em class="text-muted">Composer files</em></li>
									<li>... <em class="text-muted">Other vendor projects</em></li>
								</ul>
							</li>
							<li>CHANGELOG.md <em class="text-muted">[Optional] List of changes the project has undergone since last major version</em></li>
							<li>composer.json <em class="text-muted">[Requried] Composer project JSON file</em></li>
							<li>CONTRIBUTING.md <em class="text-muted">[Optional] Instructions and guidelines for project cntributors</em></li>
							<li>LICENSE.md <em class="text-muted">[Required] License and copyright information</em></li>
							<li>README.md <em class="text-muted">[Required] Information about the Qaton project</em></li>
						</ul>
					</div>
				</div>
			</p>
			
			<h3 class="text-info" id="routing">URLs &amp; Request Routing</h3>
			<p>
				Qaton URL routing follows a simple set of fully automated 
				rules. Qaton will parse each request and traverse through 
				it until it finds a valid Controller file in the path that
				has been provided. Assuming the path: 
				
				<code>
					example.com/farm/animals/cows/buy/anna
				</code>
				
				Where <em>farm</em> and <em>animal</em> are directories and
				<em>cows</em> is the Controller located at 
				
				<code>
					DocumentRoot/src/VirX/Qaton/apps/app/controllers/farm/animals/Cows.php
				</code>
				
				This Controller will also have method by the named <em>Buy</em>
				which accepts one parameter <em>anna</em>.
				 
				
			</p>
			<p>
				If the traversing fails and there is no Controller found
				in the path, a 404 will be issued. The same is true if
				the method being caled does not exist. If the method expects more
				paramters an error message will be rendered. 
			</p>
			
			<p class="info">
				Note that when DEBUG mode is eabled, there will be more 
				verbose error messages. 
			</p>
			
			<p>
				Please see the <a href="#controllers">Controllers</a>
				section for more details on how this works.
			</p>
			
			<h3 class="text-info" id="controllers">Controllers</h3>
			<p>
				Anyone that has worked with any PHP based MVC framework 
				will be familiar with Qaton Controllers. They function 
				basically in the same way. Here is what the Controller 
				for these Docs (i.e this page) look like. 
				
				<pre><code class="language-php line-numbers">namespace VirX\Qaton;

class Docs extends Controller 
{
	
	public function __construct()
	{
		parent::__construct();
		$this->lang();
	}
	
	public function index() 
	{
		$this->view('docs', $this->data);
	}
	
}

// End of file 
</code></pre>
			</p>
			
			<p>
				As you can see, it's extremely simple. Please see 
				<a href="#routing">URls &amp; Routing </a> for an 
				example of how the Contollers works and usefule info. 
			</p>
			
			<h4>Controllers Configuration</h4>
			
			<p>
				You must assign a default controller and a default 
				method in the primary configuration. So when the 
				call is empty (e.g. http://www.example.com) then
				Qaton will call the default controller and method,
			</p>
			
			<pre><code class="language-php">// Name of controllers dir (relative to APPPATH)
define("CONTROLLERS_DIR", 'controllers');

// File extension for controller files
define("CONTROLLERS_EXT", '.php');
				
// The default controller file to call when none have been specified (at BASE_URL, root)
define("DEFAULT_CONTROLLER", 'index');

// The default method to call when the DEFAULT_CONTROLLLER is called
define("DEFAULT_METHOD", 'index');</code></pre>

			<h4>Controller Directories, Methods &amp; Parameters</h4>
			
			<p>
				Controllers organization is quite flexible with Qaton.
				You could put a controller at the root directory that
				houses the conrollers (as defined in the configuration)
				or within subdirectories under that root. There is no
				limit to the number of sublevels. 
			</p>
			
			<p>
				If no method is called in the request, then the default
				method (as mentioned earlier) will be called. Methods can
				also take parameters as defined in the controller. 
			</p>
			
			<h3 class="text-info" id="views">Views</h3>
			<p>
				Qaton views are quite simple. Views are called directly 
				from any controller or other views. The can not access
				the controller namespace directly, but you can pass 
				data to the views. Qaton views also support themes and
				multi-language. You can also choose to return the parsed
				view as a string or send it directly to the browwer. 
			</p>
			
			<p>
				Views accept four parameters: 
				<code>$this->view($view, $data, $return, $enable_theme)</code>
				<ul>
					<li><code>$view</code> (string) is the file name (without 
					extension) of the view file being called. You 
					may include a dirctory path from the root views
					directory as well. </li>
					<li>
						<code>$data</code> (array) is an associative array of
						variables. You can pass any data you wish, including
						objects. The key names in this array will be 
						translated to variable names in the view. So 
						for example <code>$data['me'] = 'Tony'</code> will 
						be <code>$me = 'Tony'</code> within the view. 
					</li>
					<li>
						<code>$return</code> (boolean) [Default: false] specifices if the 
						result of the executed view script should be 
						returned back as a string (if $return is TRUE)
						or sent to the browser directly (if set to FALSE)
					</li>
					<li>
						<code>$enable_theme</code> (boolean) [Default: true] specifies 
						if the view should be wrapped around a theme. 
						The theme to be used will depend on the default
						theme that is active or an override theme which 
						has been set prior to calling the view. 
					</li>
				</ul>
			</p>
			
			<h4>Views Configuration</h4>
			
			<pre><code class="language-php">// Name of views dir (relative to APPPATH)
define("VIEWS_DIR", 'views');

// File extension for views file
define("VIEWS_EXT", '.php');

// Name of views sub-dir holding the themes
define("VIEWS_THEME_DIR", '_themes');</code></pre>
			
			<p>The view for the inxed page looks somewhat like this:</p>
			
			<pre><code class="language-php">&lt;?php echo $this-&gt;view('index/banner', array(), true, false); ?&gt;
&lt;div class=&quot;container&quot;&gt;
&lt;div class=&quot;row&quot;&gt;
	&lt;div class=&quot;col-md-12 mb-5&quot;&gt;
		&lt;h2&gt;Why Qaton?&lt;/h2&gt;
		&lt;hr&gt;
		&lt;p&gt;Sometimes you don't need a large bloated PHP framework for certain types of apps and websites. You just need some basic MVC to keep things organized and easy to maintain. You also don't want to lose any performance because of unnecessary overhead. You want something that is flexible but works right off the bat with zero-config, is lightning fast and easy to use. Qaton is the answer. By being a &lt;?php echo ceil(filesize(SYSTEM)/1000) ?&gt;KB single file core, Qaton will get you up and running in a flash. &lt;/p&gt;
		&lt;p&gt;Qaton will not carry a large collection of tools and libraries. Rather, it can be easily extended using resources such as Packagist and composer instead. Qaton is also easy to use with any headless CMS system. &lt;/p&gt;&lt;a class=&quot;btn btn-primary btn-lg&quot; href=&quot;#&quot;&gt;Get Qaton Now &amp;raquo;&lt;/a&gt;
		&lt;a class=&quot;btn btn-success btn-lg&quot; href=&quot;#&quot;&gt;Documentation &amp;raquo;&lt;/a&gt;
	&lt;/div&gt;
&lt;/div&gt;&lt;!-- /.row --&gt;</code></pre>
		
			<p>And it was called through the controller simply like so:</p>
			
			<pre><code class="language-php">public function index()
{	
	$this->view('index');
}</code></pre>

			<p>And this is what the view banner.php somewhat looks like:</p>
			
			<pre><code class="language-php">&lt;!-- Header --&gt;
&lt;header class=&quot;bg-primary py-5 mb-5&quot;&gt;
	&lt;div class=&quot;container h-100&quot;&gt;
		&lt;div class=&quot;row h-100 align-items-center&quot;&gt;
			&lt;div class=&quot;col-lg-12&quot;&gt;
				&lt;h1 class=&quot;display-4 text-white mt-5 mb-2&quot;&gt;&lt;?php echo $lang_common_tagline ?&gt;&lt;/h1&gt;
				&lt;p class=&quot;lead mb-5 text-white-50&quot;&gt;&lt;?php echo $lang_common_banner_text ?&gt;&lt;/p&gt;
			&lt;/div&gt;
		&lt;/div&gt;
	&lt;/div&gt;
&lt;/header&gt;</code></pre>
			
			<h4 class="text-info" id="themes">Themes</h4>
			<p>
				Qaton supports view themeing out of the box. The theme
				system functions through views. They are basically views
				and theme files are stored as views as well. By default 
				they are stored within the views directory, but this 
				can be changed through the primary configuration. When
				themes are activated, the content of the view that is 
				calling the theme will be wrapped around the THEME_OPEN_VIEW
				and the THEME_CLOSE_VIEW. Those views can also call other
				views if a complicated theme needs to be organized into
				smaller parts (such as a separate view to power dynamic
				menus).
			</p>
			
			<h5>Theme Configuration</h5>
			
			<pre><code class="language-php">// Name of views sub-dir holding the themes
define("VIEWS_THEME_DIR", '_themes');

// Default theme to use (set to false for none)
define("DEFAULT_THEME", 'twbs4_default');

// File to use as opening theme encapsulator
define("THEME_OPEN_VIEW", 'header');

// File to use as closing theme encapsulator 
define("THEME_CLOSE_VIEW", 'footer');

// Relative url path to the themes dir (from BASE_URL)
define("THEMES_PUBLIC_DIR", 'assets/_themes/');</code></pre>

			<h5>Theme Assets</h5>
			
			<p>
				Theme assets are the public level files such as images,
				CSS, JavaScript, fonts, etc.. which are required by 
				the theme on the client side. These files need to be 
				placed within the web server root where it can be
				readily served to the web. Of course, you can put these
				files anywhere and reference them. However, by convention
				they should be placed according to the paths set in the
				primary configuration and refereced like so:
			</p>
			
			<pre><code class="language-php">&lt;script src="&lt;?php echo $this-&gt;theme_public_dir ?&gt;/js/jquery-3.4.1.min.js"&gt;&lt;/script&gt;</code></pre>
			
			<h4 class="text-info" id="lang">Languages</h4>
			<p>
				Qaton supports multi-languages out of the box. 
				Any number of languages can be supported and loaded into
				views on the fly or used within the controller. The 
				defuault language is defined in the primary configuration
				and is loaded automatically if the controller calls 
				<code>$this->lang();</code> either in the constructor 
				or within any method. When loaded, the views (including
				themes) within that scope will be populated with prefixed variables 
				containing the language strings. These strings are 
				stored in the language catalogs as associative arrays. 
				The variable names will depend on the configuration or
				based on the parameters used to call the language. 
			</p>
			
			<p>
				Language accepts three parameters: 
				<code>$this->lang($lang, $catalog, $prefix)</code>
				<ul>
					<li><code>$lang</code> (string) [Default: DEFAULT_LANG]
						is the name of the language to be loaded. 
						If no value is specified, the default language
						as set in the primary configuration will be 
						loaded. 
					</li>
					<li><code>$catalog</code> (string) [Default: DEFAULT_LANG_CATALOG]
						is the language catalog file to load within the
						language directory. Each language can have an 
						unlimited number of catalogs. For example, one 
						could have a different catalog for the <em>index</em> page
						and another for the <em>about</em> page, or you
						may have multipla language catalogs per page. 
						This helps to keep things clean and organized.
						The default catalog will be used if none is 
						specified.
					</li>
					<li><code>$prefix</code> (string) [Default: DEFAULT_LANG_PREFIX]
						is the prefix to apply to the loaded language 
						variables. If none is set, then the default 
						prefix will be loaded. 
					</li>
				</ul>
			</ul>
			
			<h5>Language Configuration</h5>
			
			<pre><code class="language-php">// Name of lang dir for language files
define("LANG_DIR", 'lang');

// Name of dir for the default language 
define("DEFAULT_LANG", 'english');

// Default language catalog file to load
define("DEFAULT_LANG_CATALOG", 'common');

// Default prefix to attach to all extracted variables
define("DEFAULT_LANG_PREFIX", 'lang_common');

// Language file extension
define("LANG_EXT", '.php');</code></pre>

			<p>
				Here are some language call examples from the controller's
				construct so that the language is available to every 
				method within the controller. 
			</p>
			
			<pre><code class="language-php">public function __construct()
	{
		parent::__construct();
		$this->lang();
		$this->lang('french', 'example', 'lng_fr');
	}</code></pre>
	
			<p>
				In this example, first the default language is loaded. 
				Then the langage <code>$lang</code> <em>french</em> is
				called, and the <code>$catalog</code> <em>example</em>
				assigning a <code>$prefix</code> <em>lng_fr</em>. This
				language file will be located in:
			</p>
			
			<pre>[LANG_DIR]/[$lang]/[$catalog].[$LANG_EXT]</pre>
			
			<p>Which in the exaple above would be:</p>
			
			<pre>[LANG_DIR]/french/example.php</pre>
			
			<p>The contents of that file will look something like this:</p>
			
			<pre><code class="language-php">$this->lang_catalog = array(
	'greet' => 'Bonjour',
);</code></pre>

			<p>
				Now that the language files have been loaded in the 
				coontroller, they will be available to any view called
				within that scope. The values will be assigned to variables
				with the defined prefix and array key. So now, they 
				can be called like so:
			</p>
			
			<pre><code class="language-php">echo $lng_fr_greet;</code></pre>
			
			<p>Which would result in following output:</p>
			
			<p class="text-info"><?php echo $lng_fr_greet ?></p>
			
			<p>
				Therefore, this offers a very versatile and flexible 
				way of managing multiple languages. If a language 
				file requires large text blocks which are too long 
				(and therefore impractical) to be stored in these
				language catalog files, it is possible to create a simple 
				implementation within the language catalog file to 
				dynamically load text files containing the content 
				into the associative array dynamically and on demand.
				Here is an example:
			</p>
				
			<pre><code class="language-php">$this->lang_catalog = array();
$path_to_content = '/some/path/';
$content_files = array(
	'welcome',
	'goodbye'
);
foreach($content_files as $content_file)
{
	$this->lang_catalog[$content_file] = file_get_contents($path_to_content.$content_file);
}</code></pre>

			
			<p>
				The example above could also load data through 
				a database or more efficiently some other way.
			</p>
			
			<p class="alert alert-info">
				Please note that the language features of Qaton are 
				optional and even loading the default language is 
				not mandatory for normal operation. Also, this feature 
				has room for further improvement and optimization. 
			</p>
			
			<h3 class="text-info" id="models">Models</h3>
			
			<p>
				Qaton allows you to separate your data business logic into 
				models. These models are quite simple and are still a work 
				in progress. At the moment all Qaton will do when you 
				load a model is include the file for you and check if it
				actually exists. You have to take care of everything else.
			</p>
			<p>
				Since Qaton is not a PHP framework, it does not ship with 
				an ORM or Abstraction Layer for databases. You are free
				to use any solution out there such as Doctrine, Eloquent,
				Propel, good ol PDO, custom methods, vanilla PHP, etc...
			</p>
			<p>
				To call a model, all you need to do is the following and 
				the file will be included. You will have to write your
				own classes (within the namespace) and instantiate them
				yourself. From within any controller:
			</p>
			
			<pre><code class="language-php">$this->model('MyModel');</code></pre>
			
			
			<h3 class="text-info" id="extend">Extend &amp; Libraries</h3>
			<p>
				Qaton is easily extended using <a target="_blank" href="https://getcomposer.org/">Composer</a>.
				You can find just about anything you need on <a target="_blank" href="https://packagist.org/">Packagist</a>.
				This is the recommended method to add new libraries to 
				Qaton. However, Qaton can be extended in any way you 
				like. You may implement any developmet/design pattern 
				that suits your needs. 
			</p>
			
			<h3 class="text-info" id="todo">TODO</h3>
			<p>
				Since this project is still in it's infancy, there are 
				still some optimizations and features that are aspired
				and pending. New suggestions from the community are also
				welcome. Currently, they are:
				<ul>
					<li>Clean up the code and make it neat, clean up 
						comments, etc...
					</li>
					<li>
						Cleaning up the project structure to adhere to 
						best practices standards.
					</li>
					<li>
						Security testing and optimizations
					</li>
					<li>
						Performance testing and optimization
					</li>
					<li>
						Plugin system with support for hooks, with self
						contained modular layout
					</li>
					<li>
						Headless Content Management System (CMS) as Plugin 
						for building and maintaining standard web site
						content
					</li>
				</ul>
			</p>
		</div>
	</div>
</div>
