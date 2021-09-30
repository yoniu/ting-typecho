(()=>{
  Vue.component('music-player', {
    props: ['song', 'singer', 'link', 'album'],
    template: '<span>{{song}}</span>'
  })
  const app = new Vue({
    el: '#app',
  
  });
})();
