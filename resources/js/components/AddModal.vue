<template>
    <div class="modal" :class="openAddModal" >
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
            <p class="modal-card-title">Modal title</p>
            <button class="delete" aria-label="close"  @click="close"></button>
            </header>
            <section class="modal-card-body">
                <div class="field">
                    <label class="label">Name</label>
                    <div class="control">
                        <input class="input" required type="text" placeholder="Name input" v-model="form.name">
                    </div>
                </div>


                <div class="field">
                    <label class="label">Email</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input" required type="email" placeholder="Email address" v-model="form.email">
                        <span class="icon is-small is-left">
                        <i class="fa fa-envelope"></i>
                        </span>

                    </div>
                </div>

                 <div class="field">
                    <label class="label">Phone Number</label>
                    <div class="control">
                        <input class="input" required type="number" placeholder="Phone Number" v-model="form.phone_number">
                    </div>
                </div>

            </section>
            <footer class="modal-card-foot">
            <button class="button is-success" @click="save">Save changes</button>
            <button class="button" @click="close">Cancel</button>
            </footer>
        </div>
   </div>
</template>

<script>
    export default {
        mounted() {

        },
        data(){
            return{
                form:{
                    name: '',
                    email: '',
                    phone_number:''
                },
                errors:{}
            }
        },
        props:['openAddModal'],
        methods:{
            close(){
                this.$emit('closeRequest');
            },
            save(){
                axios.post('/phonebook', this.$data.form)
                .then((respose) => {
                    this.close();
                })
                .catch((error) => {
                    console.log(error.respose.data.errors);
                    this.errors = error.respose.data.errors

                });

            }
        }
    }
</script>
