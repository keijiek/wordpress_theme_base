<?php

namespace configuration;

class InitialConfigurator
{
  public function __construct()
  {
    $this->configure();
  }

  private function configure(): void
  {
    $this->registerAutoload();
    $this->registerThemeSupport();
    $this->registerMenus();
    $this->registerSidebars();
  }

  private function registerAutoload(): void
  {
    spl_autoload_register(function ($class) {
      $class = str_replace('\\', '/', $class);
      require_once "include/$class.class.php";
    });
  }

  private function registerThemeSupport(): void
  {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
  }

  private function registerMenus(): void
  {
    register_nav_menus([
      'header-menu' => 'Header Menu',
      'footer-menu' => 'Footer Menu'
    ]);
  }

  private function registerSidebars(): void
  {
    register_sidebar([
      'name' => 'Sidebar',
      'id' => 'sidebar',
      'before_widget' => '<section>',
      'after_widget' => '</section>',
      'before_title' => '<h2>',
      'after_title' => '</h2>'
    ]);
  }
}
