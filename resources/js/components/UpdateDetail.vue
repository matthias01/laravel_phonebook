<template>
    <div class="modal" :class="openUpdateModal" >
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
            <p class="modal-card-title">Update {{ form.name}}' Details</p>
            <button class="delete" aria-label="close"  @click="close"></button>
            </header>
            <section class="modal-card-body">
                <div class="field">
                    <label class="label">Name</label>
                    <div class="control">
                        <input class="input" :class="{'is-danger':errors.name}"   type="text" placeholder="Name input" v-model="form.name">
                    </div>
                    <small v-if="errors.name" class="has-text-danger ">{{ errors.name[0]}}</small>
                </div>


                <div class="field">
                    <label class="label">Email</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input" :class="{'is-danger':errors.email}"  type="email" placeholder="Email address" v-model="form.email">
                        <span class="icon is-small is-left">
                        <i class="fa fa-envelope"></i>
                        </span>
                    </div>
                     <small v-if="errors.email" class="has-text-danger ">{{ errors.email[0]}}</small>
                </div>

                 <div class="field">
                    <label class="label">Phone Number</label>
                    <div class="control">
                        <input class="input" :class="{'is-danger':errors.phone_number}"  type="number" placeholder="Phone Number" v-model="form.phone_number">
                    </div>
                     <small v-if="errors.phone_number" class="has-text-danger ">{{ errors.phone_number[0]}}</small>
                </div>

            </section>
            <footer class="modal-card-foot">
            <button class="button is-success" @click="update">Update </button>
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
                form:{  },
                errors:{}
            }
        },
        props:['openUpdateModal'],
        methods:{
            close(){

                this.form = '',
                this.errors = {};
                this.$emit('closeRequest');
            },
            update(){
                axios.patch('/phonebook/'+this.form.id, this.form)
                .then((response) => {
                    this.close();
                })
                .catch(error => {
                    console.log(error.response.data);
                    this.errors = error.response.data.errors;

                });

            }
        }
    }
</script>
