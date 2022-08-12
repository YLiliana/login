<template>
    <div class="col-3">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0">Login</h3>
            </div>
            <div class="card-body">
                <form @submit.prevent="login()">
                    <div class="mb-3">
                        <label>Email</label>
                        <input
                            type="text"
                            class="form-control"
                            placeholder="enter email"
                            v-model="user.email"
                        >
                        <div v-if="errors.email">
                            <small
                                v-for="error in errors.email"
                                :key="error"
                                class="text-danger"
                            >
                                {{ error }}
                            </small>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input
                            type="password"
                            class="form-control"
                            placeholder="enter password"
                            v-model="user.password"
                        >
                        <div v-if="errors.password">
                            <small
                                v-for="error in errors.password"
                                :key="error"
                                class="text-danger"
                            >
                                {{ error }}
                            </small>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Sign in</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    data(){
        return {
            errors:{},
            user: {
                email: null,
                password: null
            }
        }
    },
    methods: {
        async login() {
            console.log('entro a login');
            try {
                let response = await axios.post('/api/login', this.user)

               console.log(response);
            } catch (error) {
                console.log(error);
                this.errors = error.response.data.errors
            }
        }
    }
}
</script>
