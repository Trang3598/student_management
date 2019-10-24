require('./bootstrap');

window.Vue = require('vue');
import Vue from 'vue';
//for auto scroll
import VueChatScroll from 'vue-chat-scroll';

Vue.use(VueChatScroll);

//for notification
//
import Toaster from 'v-toaster';
import 'v-toaster/dist/v-toaster.css'

Vue.use(Toaster, {timeout: 5000})
Vue.component('message', require('./components/Message.vue').default);

const app = new Vue({
    el: '#app',
    data: {
        message: '',
        chat: {
            message: [],
            user: [],
            color: [],
            time: []
        },
        typing: '',
        numberOfUser: 0
    },
    watch: {
        message() {
            Echo.private('chat')
                .whisper('typing', {
                    name: this.message
                });
        }
    },
    methods: {
        send() {
            if (this.message.length != 0) {
                this.chat.message.push(this.message);
                this.chat.user.push('you');
                this.chat.color.push('success');
                this.chat.time.push(this.getTime());
            }
            else {
                this.chat.user.push(user);
            }
            axios.post('send', {
                message: this.message,
                chat: this.chat
            })
                .then(response => {
                    console.log(response);
                    this.message = '';
                })
                .catch(error => {
                    console.log(error);
                });
        },
        getTime() {
            let time = new Date();
            return time.getHours() + ':' + time.getMinutes();
        },
        getOldMessages() {
            axios.post('getOldMessage')
                .then(response => {
                    console.log(response)
                    // console.log(response);
                    if (response.data != '') {
                        this.chat = response.data;
                    }
                })
                .catch(error => {
                    console.log(error);
                });
        },
        deleteSession() {
            axios.post('deleteSession')
                .then(response => this.$toaster.success('Chat history is deleted'));
        }

    },
    mounted: function mounted() {
        this.getOldMessages();
        Echo.private('chat')
            .listen('ChatEvent', (e) => {
                this.chat.message.push(e.message);
                this.chat.user.push(e.user);
                this.chat.color.push('danger');
                this.chat.time.push(this.getTime());

                axios.post('saveToSession', {
                    chat: this.chatư
                })
                    .then(response => {
                    })
                    .catch(error => {
                        console.log(error);
                    });
            })
            .listenForWhisper('typing', (e) => {
                if (e.name != '') {
                    this.typing = 'typing...';
                } else {
                    this.typing = '';
                }
            });

        Echo.join(`chat`)
            .here((users) => {
                this.numberOfUser = users.length;
            })
            .joining((user) => {
                this.numberOfUser += 1;
                this.$toaster.success(user.username + ' is joined the chat room');
            })
            .leaving((user) => {
                this.numberOfUser -= 1;
                this.$toaster.warning(user.username + ' is leaved the chat room');
            });
    }
});
