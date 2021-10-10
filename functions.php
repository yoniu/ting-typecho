<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
include_once 'functions/index.php';

function themeConfig($form) {
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点 LOGO 地址'), _t('在这里填入一个图片 URL 地址, 以在网站标题前加上一个 LOGO'));
    $form->addInput($logoUrl);
    
    $staticResource = new Typecho_Widget_Helper_Form_Element_Select('staticResource', array(
        0=>'本地',
        1=>'jsDelivr',
		2=>'自定义'
    ), 0, _t('静态资源加载'));
    $form->addInput($staticResource->multiMode());
    $staticResourceUrl = new Typecho_Widget_Helper_Form_Element_Text('staticResourceUrl', NULL, NULL, _t('静态资源加载自定义Url'), NULL);
    $form->addInput($staticResourceUrl);

    $musicPlayer = new Typecho_Widget_Helper_Form_Element_Text('musicPlayer', NULL, NULL, _t('音乐播放器设置'), _t('格式：歌曲,歌手,音乐文件链接,音乐封面'));
    $form->addInput($musicPlayer);

    $defaultCoverImage = new Typecho_Widget_Helper_Form_Element_Text('defaultCoverImage', NULL, NULL, _t('文章默认占位图'), _t('在这里填入一个图片 URL 地址'));
    $form->addInput($defaultCoverImage);
    
    $sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('sidebarBlock', 
    array('ShowRecentPosts' => _t('显示最新文章'),
    'ShowRecentComments' => _t('显示最近回复'),
    'ShowCategory' => _t('显示分类'),
    'ShowArchive' => _t('显示归档'),
    'ShowOther' => _t('显示其它杂项')),
    array('ShowRecentPosts', 'ShowRecentComments', 'ShowCategory', 'ShowArchive', 'ShowOther'), _t('侧边栏显示'));
    $form->addInput($sidebarBlock->multiMode());
}


/*
function themeFields($layout) {
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点LOGO地址'), _t('在这里填入一个图片URL地址, 以在网站标题前加上一个LOGO'));
    $layout->addItem($logoUrl);
}
*/

