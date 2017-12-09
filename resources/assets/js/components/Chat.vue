<template>
    <div class="card" style="margin-top: 20px">
        <header class="card-header">
            <p class="card-header-title">
                Message with strangers!
            </p>
            <a href="#" class="card-header-icon" aria-label="more options">
                  <span class="icon">
                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                  </span>
            </a>
        </header>
        <div class="card-content">
            <div class="content">
                <template v-for="message in messages">
                    <span>
                        {{ message.content }}
                        <br>
                        <a href="#">@{{ message.user.name }}</a> - {{ timeForHumans(message.created_at) }}
                    </span>
                    <hr class="divider" />
                </template>
            </div>
        </div>
        <footer class="card-footer">
            <input @keyup.enter="sendMessage()" v-model="message" type="text" placeholder="Type something nice!" class="card-footer-item">
            <button @click="sendMessage()" style="max-width: 120px;" href="#" class="card-footer-item" :disabled="isLoading">
                <span v-show="! isLoading">Send</span>
                <span v-show="isLoading">Loading...</span>
            </button>
        </footer>
    </div>
</template>
<script>
    import moment from 'moment';

    export default {
        props: [],
        mounted() {
            let vm = this;
            Echo.private('chat')
                .listen('MessageSent', (e) => {
                    vm.messages.push(e.message);
                });
            this.fetchMessages();
        },
        data() {
            return {
                isLoading: false,
                message: '',
                messages: []
            };
        },
        methods: {
            fetchMessages() {
                let vm = this;
                axios.get('/api/messages')
                    .then(response => {
                        vm.messages = response.data;
                    })
                    .catch(error => {
                        console.log(error);
                    });
            },
            sendMessage() {
                if (this.message == '' || this.isLoading) return;
                let vm = this;
                this.isLoading = true;
                axios.post('/api/messages', {content: vm.message})
                    .then(response => {
                        console.log(response);
                        vm.messages.push(response.data);
                        vm.message = '';
                        vm.isLoading = false;
                    })
                    .catch();

            },
            timeForHumans(timestamp = '') {
                return moment(timestamp).fromNow();
            }
        }
    }
</script>