<?php
	if (!defined('__TYPECHO_ROOT_DIR__')) exit;
  $staticResource = new Index();
  $logoUrl = $staticResource->option->logoUrl ? $staticResource->option->logoUrl : $staticResource->option->themeUrl.'/assets/image/logo.png';
?>
<div id="header" class="d-flex justify-content-between align-items-center p-2">
  <a href="<?php $staticResource->option->site(); ?>" title="<?php $staticResource->option->title(); ?>">
    <img src="<?php echo $logoUrl; ?>" alt="<?php $staticResource->option->title(); ?>"/>
  </a>
  <div class="header-icons">
    <?php if($staticResource->mp3['song'] !== 'none'): ?>
    <music-player
      song="<?php echo $staticResource->mp3['song']; ?>"
      singer="<?php echo $staticResource->mp3['singer']; ?>"
      link="<?php echo $staticResource->mp3['link']; ?>"
      album="<?php echo $staticResource->mp3['album']; ?>"
    ></music-player>
    <?php endif; ?>
  </div>
</div>