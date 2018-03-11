/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('message', require('./components/MessageComponent.vue'));
import Vue from 'vue'
import VueChatScroll from 'vue-chat-scroll'
Vue.use(VueChatScroll)

const app = new Vue({
    el: '#root',
    data: {
        message: '',
        chat:{
            message:[],
            user:[],
            color:[],
            time: []
        },
        typing: "",
        channel: 'new-messages'
    },
    watch: {
        message(){
            // Echo.private('new-messages')
            Echo.private(this.channel)

                .whisper('typing', {
                    user: Laravel.user,
                    name: this.message,


                });
        }
    },
    methods:{
            send(){

                    if(this.message != "") {
                        this.chat.message.push(this.message);
                        this.chat.user.push('You');
                        this.chat.color.push('warning');
                        // this.chat.time.push(this.time.time);

                    }

                    axios.post('/send', {
                        message: this.message,

                    })
                        .then(response=> {
                            console.log(response);
                            this.message='';
                        })
                        .catch(error=> {
                            console.log(error);
                        });

                  }
              },
            mounted(){
                // Echo.private(`new-messages`)
                Echo.private(this.channel)

                    .listen('Messages', (e) => {
                        // console.log(e);
                        this.chat.message.push(e.message);
                        this.chat.user.push(e.user.name);
                        this.chat.color.push('success');
                        // this.chat.time.push(e.time.time);

                    })

                    .listenForWhisper('typing', (e) => {
                        let _this = this;
                        if(e.name != ''){

                            this.typing = e.user.name+" "+'Typing...';
                            // console.log('typing');

                            setTimeout(function() {
                                _this.typing = ''
                            }, 5000);
                        }else{
                            this.typing = ''
                        }

                    })
            },


});
