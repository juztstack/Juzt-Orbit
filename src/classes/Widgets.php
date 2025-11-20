<?php

namespace JuztStack\JuztOrbit;

class Widgets 
{
  public function __construct()
  {
    add_action('widgets_init', array($this, 'registerSidebarTheme'));
  }

  public function registerSidebarTheme()
  {

  }
}