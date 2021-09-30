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
        $this->js['bootstrap'] = 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js';
        $this->js['iconfont'] = $this->option->themeUrl.'/assets/js/iconfont.js';
        $this->js['theme'] = $this->option->themeUrl.'/assets/js/theme.js?v'.self::THEME_VERSION;
        $this->css['bootstrap'] = 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css';
        $this->css['theme'] = $this->option->themeUrl.'/style.css?v'.self::THEME_VERSION;
        break;
      case 2:
        $this->js['vue'] = $this->option->staticResourceUrl.'/assets/js/vue.min.js';
        $this->js['vuex'] = $this->option->staticResourceUrl.'/assets/js/vuex.min.js';
        $this->js['axios'] = $this->option->staticResourceUrl.'/assets/js/axios.min.js';
        $this->js['vue-lazyload'] = $this->option->staticResourceUrl.'/assets/js/vue-lazyload.js';
        $this->js['bootstrap'] = $this->option->staticResourceUrl.'/assets/js/bootstrap.bundle.min.js';
        $this->js['iconfont'] = $this->option->staticResourceUrl.'/assets/js/iconfont.js';
        $this->js['theme'] = $this->option->staticResourceUrl.'/assets/js/theme.js?v'.self::THEME_VERSION;
        $this->css['bootstrap'] = $this->option->staticResourceUrl.'/assets/css/bootstrap.min.css';
        $this->css['theme'] = $this->option->staticResourceUrl.'/style.css?v'.self::THEME_VERSION;
        break;
      default:
        $this->js['vue'] = $this->option->themeUrl.'/assets/js/vue.min.js';
        $this->js['vuex'] = $this->option->themeUrl.'/assets/js/vuex.min.js';
        $this->js['axios'] = $this->option->themeUrl.'/assets/js/axios.min.js';
        $this->js['vue-lazyload'] = $this->option->themeUrl.'/assets/js/vue-lazyload.js';
        $this->js['bootstrap'] = $this->option->themeUrl.'/assets/js/bootstrap.bundle.min.js';
        $this->js['iconfont'] = $this->option->themeUrl.'/assets/js/iconfont.js';
        $this->js['theme'] = $this->option->themeUrl.'/assets/js/theme.js?v'.self::THEME_VERSION;
        $this->css['bootstrap'] = $this->option->themeUrl.'/assets/css/bootstrap.min.css';
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
}