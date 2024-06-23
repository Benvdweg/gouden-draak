// app.js or main.js

import { createApp } from 'vue';
import CharacterCounter from './CharacterCounter.vue';
import LoginCard from './LoginCard.vue';

createApp({
    components: {
        CharacterCounter,
        LoginCard
    },
}).mount('#app');
