<template>
    <div id="auth">
        <div class="container">
            <h1>Login</h1>
            <div class="alert alert-danger" v-if="$store.state.loginError">
                Lastname or registration code not correct
            </div>
            <table class="table">
                <tr>
                    <td>Lastname</td>
                    <td><input type="text" placeholder="Lastname" class='form-control' v-model="lastname" id="lastname"></td>
                </tr>
                <tr>
                    <td>Registration Code</td>
                    <td><input type="text" placeholder="Code" class='form-control' v-model="code" id="registration_code"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><button class="btn btn-primary" @click="login">Login</button></td>
                </tr>
            </table>
        </div>
    </div>
</template>
<script>
export default {
    data: () => ({
        lastname: '',
        code: '',
        error:false,
    }),
    methods: {
        login() {
            let lastname = this.lastname;
            let registration_code = this.code;
            this.$store.dispatch('login', {
                lastname, registration_code
            })
        }
    }
}
</script>