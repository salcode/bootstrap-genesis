<?php

// Update the default widget markup to use bootstrap panel component styles as well as other relevant nested components
add_filter( 'genesis_register_sidebar_defaults', 'bsg_register_sidebar_defaults' );
function bsg_register_sidebar_defaults($defaults) {
    $defaults = array(
        'before_widget' => genesis_markup( array(
          'open'    => '<section id="%%1$s" class="panel panel-default widget %%2$s">',
          'context' => 'widget-wrap',
          'echo'    => false,
        ) ),
        'after_widget'  => genesis_markup( array(
          'close'   => '</section>' . "\n",
          'context' => 'widget-wrap',
          'echo'    => false
        ) ),
        'before_title'  => '<header class="panel-heading"><h4 class="panel-title widget-title widgettitle">',
        'after_title'   => '</h4></header><div class="panel-body">' . "\n",
    );
    return $defaults;
}