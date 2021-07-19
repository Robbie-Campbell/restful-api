<template>
    <div>
        <h1 class="title">Hello world</h1>
        <post-list :posts="posts" v-on:reloadPosts="getPosts()"/>
        <create-post v-on:postcreated="getPosts()"/>
    </div>
</template>

<script>
    import postList from './postList';
    import createPost from './createPost'
    export default {
        components : {
            postList,
            createPost
        },
        data: function() {
            return {
                posts: []
            }
        },
        methods: {
            getPosts() {
                axios.get('api/post')
                .then(response => {
                    this.posts = response.data
                })
                .catch(error => {
                    console.log(error)
                });
            }
        },
        created() {
            this.getPosts();
        }
    }
</script>

<style scoped>
    .title{
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
