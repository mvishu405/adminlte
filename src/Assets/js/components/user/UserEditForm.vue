<template>
    <form class="form-horizontal" @submit.prevent="save" enctype="multipart/form-data">
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
                <input type="text" placeholder="example - abc@abc.com" id="email" name="email" class="form-control"
                       v-model="user.email">
            </div>
        </div>
        <button type="submit">save</button>
    </form>
</template>

<script>
    export default {
        props: {
            'user-data': {
                type: Object,
                required: true
            }
        },
        data: function () {
            return {
                user: this.userData
            }
        },
        methods: {
            save() {
                console.log("Save user data" + this.user.name);
            }
        },
        created: function () {

        }
    }
</script>