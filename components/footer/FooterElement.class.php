<?php

namespace components\footer;

class FooterElement
{
  public function __construct() {}

  public function render(): void
  {
?>
    <footer>
      <div class="container-fruid px-3">
        <small>&copy;<?php echo date('Y'); ?> <?php bloginfo('name'); ?></small>
      </div>
    </footer>
<?php
  }
}
