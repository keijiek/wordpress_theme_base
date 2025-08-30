<?php

namespace include\taxonomies;


use \include\taxonomies\TaxonomyBase;

// require_once POST_TYPES_DIR . '/notices/Notices.class.php';

use \include\post_types\Notices;

class NoticeType extends TaxonomyBase
{
  public const SLUG = 'notice_type';

  public function __construct()
  {
    parent::__construct();

    add_filter('manage_edit-notices_columns', function ($columns) {
      // 例: 2番目の位置に「お知らせタイプ」カラムを挿入
      $new = [];
      foreach ($columns as $key => $value) {
        $new[$key] = $value;
        if ($key === 'title') {
          $new['taxonomy-notice_type'] = 'お知らせタイプ';
        }
      }
      return $new;
    });
  }

  public function register_taxonomy(): void
  {
    register_taxonomy(
      self::SLUG,
      [Notices::getSlug()],
      [
        'hierarchical' => true,
        'labels' => [
          'name' => 'お知らせタイプ',
          'singular_name' => 'お知らせタイプ',
        ],
        'public' => true,
        'show_admin_column' => true,
        'show_in_rest' => true,
      ]
    );
  }
}
