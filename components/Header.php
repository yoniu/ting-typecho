<?php
  if (!defined('__TYPECHO_ROOT_DIR__')) exit;
  $staticResource = new Index();
?>
<!DOCTYPE HTML>
<html lang="zh-CN">
<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
    <title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>
    <!-- 使用url函数转换相关路径 -->
    <link rel="stylesheet" href="<?php echo $staticResource->css['mdui']; ?>">
    <link rel="stylesheet" href="<?php echo $staticResource->css['theme']; ?>">
    <script src="<?php echo $staticResource->js['vue']; ?>" crossorigin="anonymous"></script>
    <script src="<?php echo $staticResource->js['vuex']; ?>" crossorigin="anonymous"></script>
    <script src="<?php echo $staticResource->js['vue-lazyload']; ?>" crossorigin="anonymous"></script>
    <script src="<?php echo $staticResource->js['axios']; ?>" crossorigin="anonymous"></script>
    <script src="<?php echo $staticResource->js['mdui']; ?>" crossorigin="anonymous"></script>
    <!-- 通过自有函数输出HTML头部信息 -->
    <?php $this->header(); ?>
</head>
<body>