<template>
<div >
    <div>
        <div>
            <p>{{ post.title }}</p>
        </div>

        <div>
            <p>{{ post.description }}</p>
        </div>
        <div>

        </div>

        <div >

        </div>
        <div class=" w-fit">
            <input type="text" class="w-fit" v-model="commentariy.comment">

            <button class="border p-4 bg-red-500 border-gray-400" @click="share">Comment</button>
        </div>
    </div>
    <div class="bg-red-500 flex w-1/6">
        <Link class="p-4 w-full"  :href="route('posts.index')">Back</Link>
    </div>
</div>
</template>

<script>
import { Link } from "@inertiajs/vue3";

export default {


    name: "Show",
    props: ['post'],
    data(){
        return{
            commentariy:{
                'user_id':  this.$page.props.auth.user.id,
                'post_id': this.$page.props.post.id
            }
        }
    },
    components: {
        Link
    },
    mounted() {
        console.log(this.post)
    },

    methods:{
        share(){

            axios.post('/comments', this.commentariy,)
                .then(res => {
                    console.log(res);
                })
                .catch(err => {
                    console.log(err);
                })
        }
    }
}
</script>

<style scoped>

</style>
