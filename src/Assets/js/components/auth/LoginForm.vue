<template>
    <form method="post" @submit.prevent="submit" @keydown="clearErrors($event.target.name)">
        <div class="alert alert-success text-center" v-show="form.succeeded" id="result">
            Logged In <i class="fa fa-refresh fa-spin"></i> Entering
        </div>
        
        <div class="form-group has-feedback" :class="{ 'has-error': form.errors.has('email') }">
            <input type="email" class="form-control" v-model="form.email" autofocus/>
            <span class="glyphicon form-control-feedback glyphicon-envelope"></span>
            <transition name="fade">
                <span class="help-block" v-if="form.errors.has('email')" v-text="form.errors.get('email')"
                      id="validation_error_email"></span>
            </transition>
        </div>
        
        <div class="form-group has-feedback" :class="{ 'has-error': form.errors.has('password') }">
            <input type="password" class="form-control" name="password" v-model="form.password"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            <transition name="fade">
                <span class="help-block" v-if="form.errors.has('password')" v-text="form.errors.get('password')"
                      id="validation_error_password"></span>
            </transition>
        </div>
        <div class="row">
            <div class="col-xs-8">
                <div class="checkbox icheck">
                    <label>
                        <input type="checkbox" name="remember" v-model="form.remember">
                        Remember Me
                    </label>
                </div>
            </div>
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat" :disabled="form.errors.any()">
                    Login <i v-if="form.submitting" class="fa fa-refresh fa-spin"></i>
                </button>
            </div>
        </div>
    </form>
</template>

<style src="./fade.css"></style>

<script>

    import Form from 'acacha-forms'
    import initialitzeIcheck from './InitializeIcheck'
    import redirect from './redirect'

    export default {
        mixins: [initialitzeIcheck, redirect],
        data: function () {
            let form = new Form({email: '', password: '', remember: ''})
            return {
                form: form,
            }
        },
        methods: {
            submit() {
                this.form.post('/login')
                    .then(response => {
                        var component = this;
                        setTimeout(function () {
                            component.redirect(response)
                        }, 2500);
                    })
                    .catch(error => {
                        console.log(this.trans('adminlte_lang_message.loginerror') + ':' + error)
                    })
            },
            clearErrors(name) {
                if (name === 'password') {
                    this.form.errors.clear('password')
                    name = this.name
                }
                this.form.errors.clear(name)
            }
        },
        mounted() {
            this.initialitzeICheck('remember')
        },
    }
</script>
