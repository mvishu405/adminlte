@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Dashboard
@endsection

@section('contentheader_title')
    General Settings
@endsection

@section('main-content')

    @push('content-start')
        <user-form :user-data="{{ $user }}" :save-url="'{{ route('admin.store.setting') }}'" inline-template>
            <form class="form-horizontal" @submit.prevent="save" @keydown="clearErrors($event.target.name)" enctype="multipart/form-data">
                @endpush

                <b><i>General Options</i></b>

                <hr>

                <div class="form-group">
                    <label class="col-sm-4 control-label" for="name">Name</label>
                    <div class="col-sm-8">
                        <input type="text" placeholder="example - mvishal" id="name" name="name" class="form-control"
                               v-model="user.name">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label" for="email">Email</label>
                    <div class="col-sm-8">
                        <input type="text" placeholder="example - abc@abc.com" id="email" name="email"
                               class="form-control" v-model="user.email">
                        <transition name="fade">
                            <span class="help-block" v-if="user.errors.has('email')"
                                  v-text="user.errors.get('email')"></span>
                        </transition>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label" for="current_password">Enter your current password</label>
                    <div class="col-sm-8">
                        <input type="password" id="current_password" name="current_password" class="form-control"
                               v-model="user.current_password">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label" for="password">Enter your new password</label>
                    <div class="col-sm-8">
                        <input type="password" id="password" name="password" class="form-control"
                               v-model="user.password">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label" for="password_confirmation">Repeat your new password</label>
                    <div class="col-sm-8">
                        <input type="password" id="password_confirmation" name="password_confirmation"
                               class="form-control" v-model="user.password_confirmation">
                    </div>
                </div>

                @push('btn')
                    <button class="btn btn-sm btn-primary admin-submit">
                        <i class="fa fa-save"></i>
                        Save
                        <i v-if="user.submitting" class="fa fa-refresh fa-spin"></i>
                    </button>
                @endpush

                @push('content-end')
            </form>
        </user-form>
    @endpush

@endsection