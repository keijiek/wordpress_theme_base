<?php
require_once(__DIR__ . '/components/header/HeaderElement.class.php');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="<?php bloginfo('description'); ?>" />
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> id="top_of_page">
  <?php
  wp_body_open();
  (new components\header\HeaderElement())->render();
