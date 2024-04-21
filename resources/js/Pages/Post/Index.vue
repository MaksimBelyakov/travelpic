<template>
    <div class="">
        <PostModal v-if="isModal" :post="post" @userClick="isModal=false"></PostModal>
    </div>
<div class="flex  items-center justify-center">
    <div class="flex h-auto">
        <Link :href="route('posts.create')" class="border border-black p-6 bg-red-50" > Add </Link>
    </div>

    <div class="flex w-full mt-12 flex-wrap">
        <div class=" mx-2 my-2 max-w-48 p-4 bg-red-200 " v-for="post in postsData">
            <div class="bg-gray-100">
                <p>{{ post.title }}</p>
            </div>
            <div class="bg-sky-200">
                <p>{{ post.description }}</p>
            </div>



            <div class="bg-red-500 flex mt-2 w-1/2">
                <button @click="showModal(post)" class="p-4 w-full"> Show</button>
            </div>



            <div class=" w-fit">
                <input type="text" class="w-fit" v-model="commentariy.comment">
                <button class="border p-4 bg-red-500 border-gray-400" @click="share(post.id)">Comment</button>
            </div>
        </div>

        <div class="w-3/4 h-10 bg-red-500" >
            <Show></Show>
        </div>

    </div>
</div>
</template>

<script>
import {Link} from "@inertiajs/vue3";
import PostModal from "@/Components/PostModal.vue";
import Show from "../Comment/Show.vue"
export default {
    name: "Index",
    props: ['posts'],
    data(){
        return{
            commentsData: this.comments,
            postsData: this.posts,
            isModal: false,
            commentariy:{},

        }
    },
    components:{
        PostModal,
        Link,
        Show
    },

    methods: {
        showModal(post){
            this.post = post
            this.isModal = true
        },
        share(){
            axios.post('/api/comments', this.commentariy)
                .then(res => {
                    console.log(res);
                })
        }
    }
}
</script>

<style scoped>

</style>
