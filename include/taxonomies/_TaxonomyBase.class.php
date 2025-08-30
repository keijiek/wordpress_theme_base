<?php


namespace include\taxonomies;

abstract class TaxonomyBase
{

  public function __construct()
  {
    add_action('init', [$this, 'register_taxonomy']);
  }


  abstract public function register_taxonomy(): void;
}
