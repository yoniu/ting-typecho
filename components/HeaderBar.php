<?php
  // 顶部导航组件
	if (!defined('__TYPECHO_ROOT_DIR__')) exit;
  $staticResource = new Index();
  $logoUrl = $staticResource->option->logoUrl ? $staticResource->option->logoUrl : $staticResource->option->themeUrl.'/assets/image/logo.png';
?>
<div id="header" class="mdui-appbar mdui-shadow-0">
  <div class="mdui-toolbar mdui-color-theme">
    <a href="<?php $staticResource->option->siteUrl(); ?>" title="<?php $staticResource->option->title(); ?>" class="mdui-typo-title">
      <img src="<?php echo $logoUrl; ?>" alt="<?php $staticResource->option->title(); ?>"/>
    </a>
    <div class="mdui-toolbar-spacer"></div>
    <?php if($staticResource->mp3['song'] !== 'none'): ?>
    <music-player
      song="<?php echo $staticResource->mp3['song']; ?>"
      singer="<?php echo $staticResource->mp3['singer']; ?>"
      link="<?php echo $staticResource->mp3['link']; ?>"
      album="<?php echo $staticResource->mp3['album']; ?>"
    ></music-player>
    <?php endif; ?>
    <a href="javascript:;" class="mdui-btn mdui-btn-icon"><i class="mdui-icon material-icons">search</i></a>
    <a href="javascript:;" class="mdui-btn mdui-btn-icon" mdui-drawer="{target: '#right-drawer'}"><i class="mdui-icon material-icons">menu</i></a>
  </div>
</div>
<div id="right-drawer" class="mdui-drawer mdui-drawer-right mdui-drawer-close mdui-shadow-2">
  <div class="mdui-drawer-avatar" style="--background: url(<?php echo $staticResource->getGravatar($this->author->mail,200); ?>);"></div>
  <ul class="mdui-list">
    <li class="mdui-subheader">导航</li>
    <li class="mdui-list-item mdui-ripple<?php if($this->is('index')): ?> mdui-list-item-active<?php endif; ?>">
      <a class="mdui-list-item-content" href="<?php $this->options->siteUrl(); ?>">
        <?php _e('首页'); ?>
      </a>
    </li>
    <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
    <?php while($pages->next()): ?>
    <li class="mdui-list-item mdui-ripple<?php if($this->is('page', $pages->slug)): ?> mdui-list-item-active<?php endif; ?>">
      <a class="mdui-list-item-content" href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>">
        <?php $pages->title(); ?>
      </a>
    </li>
    <?php endwhile; ?>
    <li class="mdui-subheader">主题</li>
    <li class="mdui-list-item mdui-ripple" :class="{ 'mdui-list-item-active': !theme }" @click="changTheme">
      <div class="mdui-list-item-content">{{ theme ? '日光模式' : '暗黑模式' }}</div>
      <i class="mdui-list-item-icon mdui-icon material-icons theme-icon">{{ theme ? 'brightness_5' : 'brightness_2' }}</i>
    </li>
  </ul>
</div>