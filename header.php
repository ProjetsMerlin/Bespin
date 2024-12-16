<!DOCTYPE html>
<html <?php language_attributes();?>>
<head>
  <meta charset="<?php get_bloginfo('charset');?>">
  <title><?= get_bloginfo('title');?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="<?= get_bloginfo('descriptions');?>">
  <meta name="robots" content="all">
  <meta name="author" content="<?= get_bloginfo('name');?>">
  <!--Balises OG-->
  <meta property="og:title" content="<?= get_bloginfo('title');?>">
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?= get_bloginfo('url');?>">
  <meta property="og:image" content="<?= get_template_directory_uri();?>/favicon.png">
  <!---->
  <link rel="shortcut icon" type="image/x-icon" href="<?= get_template_directory_uri();?>/favicon.png">
  <?php wp_head();?>
</head>
<body <?php body_class("overflow-hidden"); ?> >