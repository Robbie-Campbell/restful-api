<template>
    <div class="form-area">
        <h2>Title:</h2>
        <input type="text" v-model="post.title" />
        <h2>Content:</h2>
        <input type="text" v-model="post.content" />
        <button class="button post" @click="createPost()" :class="[post.title ? 'active' : 'inactive']">
            Create Post
        </button>
    </div>
</template>


<script>
    export default {
        data: function() {
            return {
                post: {
                    title: "",
                    content: "",
                    published: "true",
                    user: 1

                }
            }
        },
        methods: {
            createPost() {
                if(this.post.title == "" || this.post.content == "") {
                    return
                }

                axios.post('api/post', {
                    post: this.post
                })
                .then(response => {
                    if (response.status == 201) {
                        this.post.title = "";
                        this.post.content = "";
                        this.$emit('postcreated');
                    }
                })
                .catch(error => {
                    console.log(error);
                })

            }
        }
    }
</script>

<style scoped>
    .form-area {
        padding: 20px;
        background: #DDD;
        max-width:60%;
        margin: auto;
    }
    input{
        background: #f7f7f7;
        border: 0px;
        outline: none;
        padding: 5px;
        margin-right: 10px;
        width: 100%;
    }
    .active {
        color:#00CE25;
    }

    .inactive{
        color:#999999;
    }
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
    .post {
        background-color: #4CAF50; /* Green */
    }
</style>
