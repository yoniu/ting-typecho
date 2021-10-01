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
      }
    },
  })
  const app = new Vue({
    el: '#app',
    data: {
      theme: true
    },
    methods: {
      changTheme(){
        this.theme = !this.theme
        !this.theme ? localStorage.setItem('theme-light', '0') : localStorage.setItem('theme-light', '1');
      }
    },
    beforeMount() {
      this.theme = (0 == + localStorage.getItem('theme-light')) ? false : true;
    },
  });
})();
