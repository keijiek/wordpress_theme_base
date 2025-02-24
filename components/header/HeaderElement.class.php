<?php

namespace components\header;

class HeaderElement
{
  public function __construct() {}

  public function render(): void
  {
?>
    <header class="container-fruid px-3">
      <h1><?php bloginfo('name'); ?></h1>
      <p><?php bloginfo('description'); ?></p>
    </header>
<?php
  }
}
