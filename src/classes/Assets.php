<?php

namespace JuztStack\JuztOrbit;

class Assets 
{
  public function __construct()
  {

    add_action(
      'wp_enqueue_scripts',
      array(
        $this,
        'enqueueStyles'
      )
    );

    add_action(
      'wp_enqueue_scripts',
      array(
        $this,
        'enqueueScripts'
      )
    );
  }

  public function enqueueStyles()
  {

  }

  public function enqueueScripts()
  {

  }
}