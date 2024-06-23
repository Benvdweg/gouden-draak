<template>
    <div>
        <textarea
            v-model="content"
            @input="updateCharacterCount"
            name="message"
            id="message"
            class="w-full px-3 py-2 border rounded shadow-sm focus:outline-none focus:ring focus:ring-indigo-300 resize-none"
            rows="5"
            placeholder="Schrijf je bericht hier"
        ></textarea>
        <div class="text-right mt-2">
            <span :class="{'text-red-500': characterCount > maxCharacters}" class="text-gray-500">
                Karakters: {{ characterCount }} / {{ maxCharacters }}
            </span>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        initialContent: {
            type: String,
            default: ''
        },
        maxCharacters: {
            type: Number,
            default: 4000
        }
    },
    data() {
        return {
            content: this.initialContent,
            characterCount: 0
        };
    },
    watch: {
        initialContent(newVal) {
            this.content = newVal;
            this.updateCharacterCount();
        }
    },
    methods: {
        updateCharacterCount() {
            this.characterCount = this.content.length;
        }
    }
};
</script>
