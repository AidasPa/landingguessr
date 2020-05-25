import Echo from 'laravel-echo';

window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: 'bad5260df7bac9bc3026',
    cluster: 'eu',
    forceTLS: true,
});
