<template>
    <div>
        <h1>{{post.title}}</h1>
        <p>{{post.content}}</p>
        <button class="button delete" @click="deletePost()">
            Delete Post
        </button>
    </div>
</template>

<script>
    export default {
        props: ['post'],
        methods : {
            deletePost() {
                axios.delete('api/post/' + this.post.id)
                .then(response => {
                    this.$emit('postchanged');
                })
                .catch(error => {
                    console.log(error);
                })
            }
        }
    }
</script>

<style scoped>
.button {
    pointer-events: all;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
}
.delete {
    background-color: #DD0000; /* Green */
}
</style>
