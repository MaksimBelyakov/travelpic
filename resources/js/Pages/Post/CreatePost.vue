<template>
    <div class="flex justify-center flex-col items-center">
        <div class="flex justify-center items-center">
            <div v-if="is_add" class="m-4 bg-blue-200 h-8 px-20">Success</div>
            <div class="m-2">
                <input v-model="post.title" type="text" placeholder="title" name="" id="">
            </div>
            <div class="m-2">
                <input v-model="post.description"  type="text" placeholder="description" name="" id="">
            </div>
            <div class="p-4 w-1/3" v-if="is_error">
                <p>{{ error.title }}</p>
            </div>


            <button @click="createPost" class="px-6 m-2 py-3 border border-black bg-sky-400">Create</button>
            <div class="flex ">
                <Link class="px-8 m-2 py-3 border border-black bg-red-500":href="route('posts.index')"> Back</Link>
            </div>
        </div>

        <div class="m-2">
            <input @change="addFiles" type="file" multiple>
        </div>




    </div>
</template>

<script>
import {Link} from "@inertiajs/vue3";

export default {
    name: "CreatePost",
    data(){
        return{
            post:{},
            images: [],
            error: {},
            is_error: false,
            is_add: false
        }
    },
    methods:{
        createPost(){
            let formData = new FormData()


            Object.entries(this.post).forEach(item => {
                formData.append(`post[${item[0]}]`, item[1])
            })
            Array.from(this.images).forEach(image => {
                formData.append('images[]', image)
            })

            axios.post('/posts', formData)
                .then(res => {
                    this.post = {}
                    this.is_add = true
                })
                .catch( err => {
                    console.log(err);
                    this.error = err.response.data.errors
                    this.is_error = true
                })
        },

        addFiles(e){
            this.images = e.target.files
        }
    },

    components: {
        Link
    }

}
</script>

<style scoped>

</style>
