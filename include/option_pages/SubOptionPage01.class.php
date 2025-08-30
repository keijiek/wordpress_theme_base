<?php

namespace include\option_pages;

class SubOptionPage01
{
  const SLUG = 'custom_submenu_page_1';
  const LABEL = 'サブページ';
  private string $parentSlug;
  private string $parentCapability;
  private int $position;

  public function __construct(string $parentSlug, string $parentCapability, int $position = 1)
  {
    $this->parentSlug = $parentSlug;
    $this->parentCapability = $parentCapability;
    $this->position = $position;

    add_action('admin_menu', [$this, 'addSubMenu']);
  }

  public function addSubMenu(): void
  {
    add_submenu_page(
      $this->parentSlug,
      self::LABEL . '画面',
      self::LABEL,
      $this->parentCapability,
      self::SLUG,
      [$this, 'renderOptionPage'],
      $this->position
    );
  }

  public function renderOptionPage(): void
  {
?>
    <div class="wrap">
      <h1><?= esc_html(get_admin_page_title()) ?></h1>
      <form method="post" action="options.php">
        <?php
        settings_fields('my_option_group');
        do_settings_sections('custom_submenu_page_1');
        submit_button();
        ?>
      </form>
    </div>
<?php
  }
}
