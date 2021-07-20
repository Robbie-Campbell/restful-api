<template>
    <div class="container">
        <div class="row mt-4">
            <div class="col-6 offset-3">
                <form action="#" @submit.prevent="handleLogin">
                    <h3>Sign in for secrets</h3>
                    <div class="form-row">
                        <input type="email"  v-model="formData.email" name="email" class="form-control" placeholder="Email Address" />
                    </div>
                    <div class="form-row">
                        <input type="password" v-model="formData.password" name="password" class="form-control" placeholder="Password" />
                    </div>
                    <div class="form-row">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            secrets: [],
            formData: {
                email: '',
                password: ''
            }
        }
    },
    methods: {
        handleLogin() {
            axios.get('/sanctum/csrf-cookie').then(response => {
                console.log(this.formData)
                axios.post('/login', this.formData).then(response => {
                    console.log('User signed in!');
                }).catch(error => console.log(error)); // credentials didn't match
            });
        },
        getSecrets() {
            axios.get('/api/secrets').then(response => {
                console.log(response);
            });
        }
    }
}
</script>

<style scoped>
    .form-row {
        margin-bottom: 8px;
    }
</style>
