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
                <span class="is-pulled-right" v-if="loading">
                    <i class="fa fa-refresh fa-spin fa-2x fa-fw"></i>
                </span>

            </p>

            <div class="panel-block">
                <p class="control has-icons-left">
                <input class="input is-small" type="text" placeholder="search with name, email or phone number" v-model="searchQuery">
                <span class="icon is-small is-left">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </span>
                </p>
            </div>

            <a class="panel-block is-active" v-for="item,key in searchContainer"  >
                <span class="column is-9">
                    {{ item.name}}
                </span>

                <span class="panel-icon column is-1">
                    <i class="has-text-danger fa fa-trash" @click="del(key, item.id)"></i>
                </span>
                <span class="panel-icon column is-1">
                    <i class="has-text-info fa fa-edit" @click="update(key)"></i>
                </span>
                <span class="panel-icon column is-1">
                    <i class="has-text-primary fa fa-eye" @click="showDetails(key)"></i>
                </span>

            </a>

        </nav>

          <add-new :openAddModal='addActive' @closeRequest='closeModal'></add-new>
          <view-contact :openModal='showActive' @closeRequest='closeModal'></view-contact>
          <update-detail :openUpdateModal='updateActive' @closeRequest='closeModal'></update-detail>
    </div>

</template>

<script>
import AddNew from './AddModal.vue';
import ViewContact from './ShowPhoneDetails.vue';
import UpdateDetail from './UpdateDetail.vue';

export default {
    components: {AddNew,ViewContact,UpdateDetail},
    data(){
        return{
            addActive: '',
            phone_lists: {},
            showActive: '',
            updateActive: '',
            loading: false,
            searchQuery: '',
            searchContainer: ''
        }
    },
     watch: {
            searchQuery(){
                if( this.searchQuery.length > 0){
                  this.searchContainer =  this.phone_lists.filter((item) => {
                      if(item.name.toLowerCase().indexOf(this.searchQuery.toLowerCase()) > -1){
                          return item.name.toLowerCase().indexOf(this.searchQuery.toLowerCase()) > -1
                      } else if ( item.email.toLowerCase().indexOf(this.searchQuery.toLowerCase()) > -1){
                          return item.email.toLowerCase().indexOf(this.searchQuery.toLowerCase()) > -1
                      } else{
                          return String(item.phone_number).indexOf(String(this.searchQuery)) > -1
                      }

                    });
                }else{
                    this.searchContainer = this.phone_lists
                }
            }
        },
    methods:{

        openAdd(){
            this.addActive = 'is-active'
        },
        closeModal(){
             this.addActive = this.updateActive = this.showActive =  ''

        },
        showDetails(key){

            this.$children[1].phone_list = this.searchContainer[key];
            this.showActive = 'is-active'
        },
        update(key){
           this.$children[2].form = this.searchContainer[key];
           this.updateActive = 'is-active'
        },
        del(key, id){
            if (confirm("Are you sure you want to delete ?")){
                this.loading = true
                  axios.delete('/phonebook/'+id)
                    .then((response) => {
                      this.phone_lists.splice(key,1)//remove item from the list without refreshing
                      this.loading = false;
                   }).catch((err) => {

                   });
            }
        }
    },
    mounted(){
            this.loading = true
          axios.post('/phonebook/getdata')
          .then((response) => {
              this.phone_lists = this.searchContainer = response.data;
               this.loading = false;
          }).catch((err) => {

          });

    }
}
</script>

<style>

</style>
