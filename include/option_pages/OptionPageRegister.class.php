<?php

namespace include\option_pages;

class OptionPageRegister
{
  const SLUG = 'site_settings';
  const CAPABILITY = 'manage_options';

  public function __construct()
  {
    add_action('admin_menu', [$this, 'addOptionPage']);
    new \include\option_pages\SubOptionPage01(self::SLUG, self::CAPABILITY, 1);
  }

  public function addOptionPage(): void
  {
    // トップレベルメニュー項目の追加
    add_menu_page(
      '共通設定画面',
      '共通設定',
      self::CAPABILITY,
      self::SLUG,
      [$this, 'optionPageRenderer'],
      'dashicons-admin-generic',
      21
    );
  }

  public function optionPageRenderer()
  {
?>
    <section class="wrap">
      <h1><?= esc_html(get_admin_page_title()) ?></h1>
      <?php settings_errors(); // エラーや成功メッセージの表示
      ?>

      <form method="post" action="options.php">
        <?php
        // 隠しフィールドなどを出力
        settings_fields('my_option_group');

        // セクションとフィールドを出力
        do_settings_sections('custom_menu_page');

        // 送信ボタン
        submit_button();
        ?>
      </form>
    </section>
  <?php
  }

  public function subPage01Renderer()
  {
  ?>
    <section class="wrap">
      <h1><?= esc_html(get_admin_page_title()) ?></h1>
      <?php settings_errors(); // エラーや成功メッセージの表示
      ?>
    </section>
<?php

  }
}
