/*

  Ting Theme

  Author: Yoniu (www.200011.net)
  Date: 2021.10.1

*/
(()=>{
  Vue.component('music-player', {
    // 音乐播放器组件
    props: ['song', 'singer', 'link', 'album'],
    data(){
      return {
        audio: undefined,
        play: false,
        tips: `{content: '${this.song} - ${this.singer}'}`,
      };
    }, 
    template: `
      <div class="mdui-btn mdui-btn-icon" @click="playMusic" :mdui-tooltip="tips">
        <img :src="album" width="100%" :alt="song" />
        <i class="mdui-icon material-icons">{{ !play ? 'play_arrow' : 'pause' }}</i>
        <audio ref="singBox"></audio>
      </div>
    `,
    methods: {
      playMusic(){
        this.play = !this.play;
      },
    },
    watch: {
      play(now) {
        if(now){
          this.audio.play();
        }else{
          this.audio.pause();
        }
      },
    },
    mounted: function () {
      this.audio = this.$refs.singBox;
      this.audio.src = this.link;
      this.audio.onerror = function() {
        mdui.alert('音乐加载出错！', '警告');
      };
      this.audio.onended = () => {
        this.play = false;
        this.audio.currentTime = 0;
      }
    },
  });
  Vue.component('search-box', {
    props: ['box'],
    template: `
    <div :id="box + '-collapse'" class="mdui-collapse">
      <div :id="box" class="mdui-collapse-item">
        <div class="mdui-collapse-item-body">
          <slot></slot>
        </div>
      </div>
    </div>
    `
  })
  const app = new Vue({
    el: '#app',
    data: {
      theme: true,
      inst: undefined
    },
    methods: {
      changTheme() {
        this.theme = !this.theme
        !this.theme ? localStorage.setItem('theme-light', '0') : localStorage.setItem('theme-light', '1');
      },
      toggleSearch() {
        this.inst.toggle('#search-box');
      }
    },
    beforeMount() {
      this.theme = (0 == + localStorage.getItem('theme-light')) ? false : true;
    },
    mounted() {
      this.inst = new mdui.Collapse('#search-box-collapse');
    }
  });
})();
