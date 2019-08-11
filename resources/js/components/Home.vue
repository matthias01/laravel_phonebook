<template>
    <div>
         <nav class="panel is-offset-2 is-8">
            <p class="panel-heading">
            <span class="panel-icon">
                <i class="fa fa-book"></i>
                </span>
                My phoneBook
                <button class="button is-link is-outlined" @click="openAdd">
               Add New
                </button>
            </p>

            <div class="panel-block">
                <p class="control has-icons-left">
                <input class="input is-small" type="text" placeholder="search">
                <span class="icon is-small is-left">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </span>
                </p>
            </div>

            <a class="panel-block is-active" v-for="item,key in phone_lists" >
                <span class="column is-9">
                    {{ item.name}}
                </span>

                <span class="panel-icon column is-1">
                    <i class="has-text-danger fa fa-trash"></i>
                </span>
                <span class="panel-icon column is-1">
                    <i class="has-text-info fa fa-edit" @click="editDetails"></i>
                </span>
                <span class="panel-icon column is-1">
                    <i class="has-text-primary fa fa-eye" @click="showDetails(key)"></i>
                </span>

            </a>

        </nav>

          <add-new :openAddModal='addActive' @closeRequest='closeModal'></add-new>
          <view-contact :openModal='showActive' @closeRequest='closeModal'></view-contact>
    </div>

</template>

<script>
import AddNew from './AddModal.vue';
import ViewContact from './ShowPhoneDetails.vue';
import { constants } from 'crypto';
export default {
    components: {AddNew,ViewContact},
    data(){
        return{
            addActive: '',
            phone_lists: {},
            showActive: ''
        }
    },
    methods:{
        openAdd(){
            this.addActive = 'is-active'
        },
        closeModal(){
             this.addActive = this.showActive =  ''

        },
        showDetails(key){

            this.$children[1].phone_list = this.phone_lists[key];
            this.showActive = 'is-active'
        },
        editDetails(){
            alert('aaaa')
        }
    },
    mounted(){

          axios.post('/phonebook/getdata')
          .then((response) => {
              this.phone_lists = response.data;

          }).catch((err) => {

          });
    }
}
</script>

<style>

</style>
