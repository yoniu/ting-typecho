<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
class Index {
  const THEME_VERSION = '1.0';
  var $option;
  var $js;
  var $css;
  var $mp3;

  function __construct (){
    $this->option = Helper::options();
    switch($this->option->staticResource){
      case 1: 
        $this->js['vue'] = 'https://cdn.jsdelivr.net/npm/vue@2';
        $this->js['vuex'] = 'https://cdn.jsdelivr.net/npm/vuex@3';
        $this->js['axios'] = 'https://cdn.jsdelivr.net/npm/axios';
        $this->js['vue-lazyload'] = 'https://cdn.jsdelivr.net/npm/vue-lazyload';
        $this->js['mdui'] = 'https://cdn.jsdelivr.net/npm/mdui@1.0.1/dist/js/mdui.min.js';
        $this->js['theme'] = $this->option->themeUrl.'/assets/js/theme.js?v'.self::THEME_VERSION;
        $this->css['mdui'] = 'https://cdn.jsdelivr.net/npm/mdui@1.0.1/dist/css/mdui.min.css';
        $this->css['theme'] = $this->option->themeUrl.'/style.css?v'.self::THEME_VERSION;
        break;
      case 2:
        $this->js['vue'] = $this->option->staticResourceUrl.'/assets/js/vue.min.js';
        $this->js['vuex'] = $this->option->staticResourceUrl.'/assets/js/vuex.min.js';
        $this->js['axios'] = $this->option->staticResourceUrl.'/assets/js/axios.min.js';
        $this->js['vue-lazyload'] = $this->option->staticResourceUrl.'/assets/js/vue-lazyload.js';
        $this->js['mdui'] = $this->option->staticResourceUrl.'/assets/js/mdui.min.js';
        $this->js['theme'] = $this->option->staticResourceUrl.'/assets/js/theme.js?v'.self::THEME_VERSION;
        $this->css['mdui'] = $this->option->staticResourceUrl.'/assets/css/mdui.min.css';
        $this->css['theme'] = $this->option->staticResourceUrl.'/style.css?v'.self::THEME_VERSION;
        break;
      default:
        $this->js['vue'] = $this->option->themeUrl.'/assets/js/vue.min.js';
        $this->js['vuex'] = $this->option->themeUrl.'/assets/js/vuex.min.js';
        $this->js['axios'] = $this->option->themeUrl.'/assets/js/axios.min.js';
        $this->js['vue-lazyload'] = $this->option->themeUrl.'/assets/js/vue-lazyload.js';
        $this->js['mdui'] = $this->option->themeUrl.'/assets/js/mdui.min.js';
        $this->js['theme'] = $this->option->themeUrl.'/assets/js/theme.js?v'.self::THEME_VERSION;
        $this->css['mdui'] = $this->option->themeUrl.'/assets/css/mdui.min.css';
        $this->css['theme'] = $this->option->themeUrl.'/style.css?v'.self::THEME_VERSION;
    }
    if($this->option->musicPlayer){
      $mp3Array = explode(',', $this->option->musicPlayer);
      $this->mp3['song'] = $mp3Array[0];
      $this->mp3['singer'] = $mp3Array[1];
      $this->mp3['link'] = $mp3Array[2];
      $this->mp3['album'] = $mp3Array[3];
    }else{
      $this->mp3['song'] = 'none';
    }
  }
  //Yoniu??????Gravatar??????
  static public function getGravatar($email, $s = 40, $d = 'mm', $g = 'g') {
      if(preg_match('|^[1-9]\d{4,11}@qq\.com$|i',$email)){
          return "https://q.qlogo.cn/g?b=qq&nk=$email&s=100";
      }else{
          $hash = md5($email);
          $option = Typecho_Widget::widget('Widget_Options');
          if($option->gravatarURL){
              $avatar = $option->gravatarURL."/$hash?s=&d=$d&r=$g";
          }else{
              $avatar = "https://gravatar.com/avatar/$hash?s=&d=$d&r=$g";
          }
          return $avatar;
      }
  }
  //Yoniu????????????????????????
  public function getRandomPost(){
    $db = Typecho_Db::get();
    $result = $db->fetchAll($db->select()->from('table.contents')
        ->where('status = ?','publish')
        ->where('type = ?', 'post')
        ->where('created <= unix_timestamp(now())', 'post')
        ->limit(4)
        ->order('RAND()')
    );
    if($result){
      foreach($result as $val){
        $val = Typecho_Widget::widget('Widget_Abstract_Contents')->push($val);
        $thum = $this->GetThumFromContent(Markdown::convert($val['text']));
        $permailink = $val['permalink'];
        $title = $val['title'];
        $date = date('m-d', $val['created']);
        echo <<<Yoniu
          <a class="random-card mdui-col-xs-6 mdui-col-sm-3" style="--background: url($thum);" href="$permailink" title="$title">
            <div class="random-card-info">
              <time>$date</time>
              <span>$title</span>
            </div>
          </a>
Yoniu;
    }
  }
}
  //Yoniu??????????????????
  public function GetThumFromContent($content){
    $option = Helper::options();
    preg_match_all("|<img[^>]+src=\"([^>\"]+)\"?[^>]*>|is", $content, $img);
    if($imgsrc = !empty($img[1])){
      $imgsrc = $img[1][0];
    }else{ 
      preg_match_all("|<img[^>]+src=\"([^>\"]+)\"?[^>]*>|is", $content ,$img);
      if($imgsrc = !empty($img[1])){
        $imgsrc = $img[1][0];
      }else{
        $imgsrc = $option->defaultCoverImage ? $option->defaultCoverImage : $option->themeUrl . "/assets/image/card.jpg";	
      }
    }
    return $imgsrc;
  }
}