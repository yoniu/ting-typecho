<?php
/**
 * Ting主题 (vue2+mdui)
 * 
 * @package Ting 
 * @author Yoniu
 * @version 1.0
 * @link https://www.200011.net
 */

	if (!defined('__TYPECHO_ROOT_DIR__')) exit;
	$this->need('components/Header.php');
	$staticResource = new Index();
?>

<div
	id="app"
	class="mdui-theme-accent-pink mdui-theme-primary-indigo mdui-shadow-2"
	:class="{
		'mdui-theme-layout-dark': !theme,
		'mdui-theme-layout-light': theme
	}"
>
	<?php $this->need('components/HeaderBar.php'); ?>
	<?php while($this->next()): ?>
        <article class="post mdui-typo" itemscope itemtype="http://schema.org/BlogPosting">
			<h2 class="post-title" itemprop="name headline"><a itemprop="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h2>
			<ul class="post-meta">
				<li itemprop="author" itemscope itemtype="http://schema.org/Person"><?php _e('作者: '); ?><a itemprop="name" href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a></li>
				<li><?php _e('时间: '); ?><time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time></li>
				<li><?php _e('分类: '); ?><?php $this->category(','); ?></li>
				<li itemprop="interactionCount"><a itemprop="discussionUrl" href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('评论', '1 条评论', '%d 条评论'); ?></a></li>
			</ul>
            <!--<div class="post-content" itemprop="articleBody">
    			<?php $this->content('- 阅读剩余部分 -'); ?>
            </div>-->
        </article>
	<?php endwhile; ?>

    <?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
</div><!-- end #main-->
<script src="<?php echo $staticResource->js['theme']; ?>" crossorigin="anonymous"></script>

<?php //$this->need('sidebar.php'); ?>
<?php //$this->need('footer.php'); ?>
