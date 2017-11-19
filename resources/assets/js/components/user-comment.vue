<template>
    <div>
        <span class="user"> {{Auth::user()->display_name}}</span> <i class="fa fa-terminal"></i>  {{$cmt->comment}} <br/>
            {{$cmt->created_at->diffForHumans()}} <br/>
            <hr class="style"></hr>
    </div>
</template>

<script>
   
    export default {
        computed:{
            className(){
                return 'list-group-item-'+this.color;
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>