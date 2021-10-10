<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$staticResource = new Index();
?>
<div id="ppt">
  <?php $staticResource->getRandomPost(); ?>
</div>