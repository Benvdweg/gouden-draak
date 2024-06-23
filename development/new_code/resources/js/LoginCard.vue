<template>
    <div class="w-full max-w-sm bg-white rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-semibold mb-6 text-center">Login</h2>
        <form @submit.prevent="login">
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                <input type="text" id="email" v-model="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                <span v-if="errors.email" class="text-red-500 text-sm">{{ errors.email[0] }}</span>
            </div>
            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700">Password:</label>
                <input type="password" id="password" v-model="password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                <span v-if="errors.password" class="text-red-500 text-sm">{{ errors.password[0] }}</span>
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Login</button>
            <p v-if="errorMessage" class="mt-4 text-red-500">{{ errorMessage }}</p>
        </form>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            email: '',
            password: '',
            errorMessage: '',
            errors: {}
        };
    },
    methods: {
        async login()
        {
            this.errors = {};
            this.errorMessage = '';

            try {
                await axios.post('/login', {
                    email: this.email,
                    password: this.password
                });
                window.location.href = '/admin';
            } catch (error) {
                if (error.response && error.response.status === 422) {
                    this.errors = error.response.data.errors;
                } else if (error.response && error.response.data && error.response.data.error) {
                    this.errorMessage = error.response.data.error;
                } else {
                    this.errorMessage = 'Deze combinatie van wachtwoord en email is ongeldig.';
                }
            }
        }

    }
};
</script>
