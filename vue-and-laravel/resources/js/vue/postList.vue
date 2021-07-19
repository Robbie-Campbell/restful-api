<template>
    <div class="posts">
        <div v-for="(post, index) in posts" :key="index" class="post">
            <post :post="post" v-on:postchanged="$emit('reloadPosts')"/>
        </div>
    </div>
</template>

<script>
import post from './post';
    export default {
        props: ['posts'],
        components: {
            post
        }
    }
</script>

<style scoped>
    .posts{
        display: flex;
        flex-direction:column;
        align-items: center;
        text-align:center;
        justify-content:center;
        align-self:center;
    }
    .post{
        background:#DDD;
        border:1px solid gray;
        margin:20px;
        width:500px;
    }
</style>
