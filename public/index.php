<?php
/***********************************************************************
 * 
 * Qaton - The Elemental PHP MVC System
 * 
 * Qaton is a minimal lightweight super-fast MVC system. Qaton aims to 
 * be a small and insignificant foundation for apps, but it is definitely
 * not another PHP framework (there are plenty of those out there). 
 * Qaton relies on pure PHP by default and can be easily extended. 
 * Flexible by design and armed with the absolute essentials such as 
 * routing, themes, multi-language etc...
 * 
 * @author Antony Peiris <asp@virx.net>
 * @license MIT 
 * 
 **********************************************************************/

require_once('../config/config.php');
require_once('../vendor/autoload.php');

use VirX\Qaton\Page;
use VirX\Qaton\Controller;
new VirX\Qaton\Page();

// End of file
