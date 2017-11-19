<template>
    <div>
           <slot></slot>
         
    </div>
</template>

<script>
   
    export default {
      
        computed:{
            className(){
                return 'list-group-item';
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>