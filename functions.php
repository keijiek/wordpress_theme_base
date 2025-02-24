<?php

function vardump($var)
{
?>
  <pre><?php var_dump($var); ?></pre>
<?php
}

function activate_essential_features()
{
  add_theme_support('html5', ['comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script', 'navigation-widgets']);
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('align-wide');
  add_theme_support('responsive-embeds');
  // add_theme_support('custom-logo', ['height' => 100, 'width' => 400, 'flex-height' => true, 'flex-width' => true]);
  // add_theme_support('custom-background');
  // add_theme_support('custom-header');
  // add_theme_support('editor-styles');
  // add_editor_style('editor-style.css');
}
add_action('after_setup_theme', 'activate_essential_features');


function enqueue_bootstrap_for_front()
{
  $cssSubPath = 'assets/bootstrap/dist/index.css';
  $jsSubPath = 'assets/bootstrap/dist/index.js';

  if (!file_exists(get_theme_file_path($cssSubPath)) || !file_exists(get_theme_file_path($jsSubPath))) {
    return;
  }

  wp_enqueue_style(
    'bootstrap',
    get_template_directory_uri() . '/' . $cssSubPath,
    [],
    filemtime(get_theme_file_path($cssSubPath))
  );

  wp_enqueue_script(
    'bootstrap',
    get_template_directory_uri() . '/' . $jsSubPath,
    [],
    filemtime(get_theme_file_path($jsSubPath)),
  );
}
add_action('wp_enqueue_scripts', 'enqueue_bootstrap_for_front');
