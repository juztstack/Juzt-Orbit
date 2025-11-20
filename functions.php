<?php

/**
 * @package JuztOrbit-Theme
 * @subpackage Timber
 * @since Timber 0.1
 */

use Timber\Timber;
use JuztStack\JuztOrbit\StartSite;

define('JUZT_ORBIT_VERSION', '0.0.1');
define('JUZT_ORBIT_DIR', get_template_directory(__FILE__));
define('JUZT_ORBIT_URL', get_template_directory_uri(__FILE__));


require_once JUZT_ORBIT_DIR . '/vendor/autoload.php';

Timber::$dirname = array('views');
Timber::$locations = array(
  JUZT_ORBIT_DIR . '/sections',
  JUZT_ORBIT_DIR . '/snippets'
);

new StartSite();