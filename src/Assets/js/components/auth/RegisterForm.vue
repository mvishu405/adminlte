<template>
    <form @submit.prevent="submit" @keydown="clearErrors($event.target.name)">
        <div class="alert alert-success text-center" v-show="form.succeeded" id="result">
            Successfully Registered <i class="fa fa-refresh fa-spin"></i> Entering
        </div>
        <div class="form-group has-feedback" :class="{ 'has-error': form.errors.has('name') }">
            <input type="text" class="form-control" placeholder="Full name" v-model="form.name">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
            <transition name="fade">
                <span class="help-block" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></span>
            </transition>
        </div>
        <div class="form-group has-feedback" :class="{'has-error': form.errors.has('email')}">
            <input type="email" class="form-control" placeholder="Email" v-model="form.email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            <transition name="fade">
                <span class="help-block" v-if="form.errors.has('email')" v-text="form.errors.get('email')"></span>
            </transition>
        </div>
        <div class="form-group has-feedback" :class="{ 'has-error': form.errors.has('password') }">
            <input type="password" class="form-control" placeholder="Password" v-model="form.password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            <transition name="fade">
                <span class="help-block" v-if="form.errors.has('password')" v-text="form.errors.get('password')"></span>
            </transition>
        </div>
        <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Retype password"
                   v-model="form.password_confirmation">
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
        </div>
        <div class="row">
            <div class="col-xs-8">
                <div class="checkbox icheck">
                    <label>
                        <input type="checkbox" name="terms"> I agree to the <a href="#">terms</a>
                    </label>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
            </div>
            <!-- /.col -->
        </div>
    </form>
</template>

<style src="./fade.css"></style>

<script>
    import initialitzeIcheck from './InitializeIcheck'
    import redirect from './redirect'
    import Form from 'acacha-forms'

    export default {
        mixins: [initialitzeIcheck, redirect],
        data: function () {
            return {
                form: new Form({name: '', email: '', password: '', password_confirmation: ''})
            }
        },
        methods: {
            submit() {
                this.form.post('/register')
                    .then(response => {
                        var component = this;
                        setTimeout(function () {
                            component.redirect(response);
                        }, 2500);
                    })
                    .catch(error => {
                        console.log(error);
                    });
            },
            clearErrors(name) {
                if (name === 'password_confirmation') {
                    name = 'password'
                    this.form.errors.clear('password_confirmation')
                }
                this.form.errors.clear(name)
            }
        },
        mounted() {
            this.initialitzeICheck('terms')
        }
    }
</script>
