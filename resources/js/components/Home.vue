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

            <a class="panel-block is-active">
                <span class="column is-9">
                    Helloe
                </span>

                <span class="panel-icon column is-1">
                    <i class="has-text-danger fa fa-trash"></i>
                </span>
                <span class="panel-icon column is-1">
                    <i class="has-text-info fa fa-edit"></i>
                </span>
                <span class="panel-icon column is-1">
                    <i class="has-text-primary fa fa-eye"></i>
                </span>

            </a>

        </nav>

          <add-new :openAddModal='addActive' @closeRequest='closeModal'></add-new>
    </div>

</template>

<script>
import AddNew from './AddModal.vue';
export default {
    components: {AddNew},
    data(){
        return{
            addActive: ''
        }
    },
    methods:{
        openAdd(){
            this.addActive = 'is-active'
        },
        closeModal(){
             this.addActive = ''
        }
    }
}
</script>

<style>

</style>
