<template>
  <div>
     <button class="btn btn-primary ms-4" @click="followUser" v-text="buttonText"></button>
    dd("hi");
  </div>
</template>

<script>
import axios from 'axios'

    export default {
        props:['userId','follows'],
        mounted() {
            console.log('Component mounted.')
        },

        data: function(){
            return{
                status: this.follows,
            }
        },
        methods:{
            followUser(event){
                
                axios.post('/follow/'+this.userId)
                .then(response=>{
                    this.status = !this.status;
                })
                .catch(errors=>{
                        if(errors.response.status==401){
                            window.location='/login';
                        }
                });
               
            }
        },
        computed: {
            buttonText(){
                return(this.status) ? 'Unfollow':'Follow';
            }
        }
    }
</script>
