import Form from 'acacha-forms'

export default {
    props: {
        'user-data': {
            type: Object,
            required: true
        },
        'save-url': {
            type: String,
            required: true
        }
    },
    data() {
        return {
            user: new Form({
                'name': this.userData.name,
                'email': this.userData.email,
                'current_password': '',
                'password': '',
                'password_confirmation': ''
            })
        }
    },
    methods: {
        save() {
            this.user.post('' + this.saveUrl).then(response => {
                console.log(response);
            }).catch(error => {
                console.log(error);
            });
        },
        clearErrors(name) {
            this.user.errors.clear(name)
        }
    }
}