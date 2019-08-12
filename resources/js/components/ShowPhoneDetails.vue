<template>
     <div class="modal" :class="openModal" >
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
            <p class="modal-card-title"> {{ phone_list.name}}'s Details</p>
            <button class="delete" aria-label="close"  @click="close" ></button>
            </header>
            <section class="modal-card-body">
               <li class="panel-block">
                   <label class="column is-2"><strong>Name</strong></label> {{ phone_list.name}}
               </li>
               <li class="panel-block">
                   <label class="column is-2"><strong>Email</strong></label> {{ phone_list.email}}
               </li>
               <li class="panel-block">
                   <label class="column is-2"><strong>Phone Number</strong></label> {{ phone_list.phone_number}}
               </li>
            </section>
            <footer class="modal-card-foot">
            <button class="button" @click="close">Cancel</button>
            </footer>
        </div>
   </div>
</template>

<script>
export default {
      data(){
        return{

            phone_list: {},

        }
    },
     props:['openModal'],
     methods: {
         close(){
              this.$emit('closeRequest');
         }
     },
}
</script>

<style>

</style>
