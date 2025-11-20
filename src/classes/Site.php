<?php

namespace JuztStack\JuztOrbit;

use JuztStack\JuztOrbit\SvgSupport;
use JuztStack\JuztOrbit\Widgets;
use JuztStack\JuztOrbit\Assets;
use Timber\Site;
//use Timber\Timber;

#[\AllowDynamicProperties]

class StartSite extends Site
{
  public function __construct()
  {
    add_action('after_setup_theme', array($this, 'themeSupports'));
    new Assets();
    new SvgSupport();
    new Widgets();

    return parent::__construct();
  }

  public function themeSupports()
  {
    add_theme_support('title-tag');
    
    add_theme_support('post-thumbnails');
    
    add_theme_support('menus');

    add_theme_support(
      'html5',
      array(
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
      )
    );

    add_theme_support(
      'post-formats',
      array(
        'aside',
        'image',
        'video',
        'quote',
        'link',
        'gallery',
        'audio',
      )
    );

  }
}
