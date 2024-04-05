<template>
    <div class="flex justify-center">
        <div v-if="is_add" class="m-4 bg-blue-200 h-8 px-20">Success</div>
        <div>
                <div>
                    <input v-model="post.title" type="text" placeholder="title" name="" id="">
                </div>
                <div>
                    <input v-model="post.description"  type="text" placeholder="description" name="" id="">
                </div>
                <div class="p-4 w-1/3" v-if="is_error">
                    <p>{{ error.title }}</p>
                </div>


        </div>
        <button class="m-4 h-12 px-6 bg-violet-200" @click="storePost">Store</button>
    </div>
</template>

<script>
export default {
    name: "CreatePost",
    data(){
        return{
            post:{},
            error: {},
            is_add: false,
            is_error: false
        }
    },
    methods:{
        storePost(){
            axios.post('/posts', this.post)
                .then(res => {
                    this.post = {}
                    this.is_add = true
                })
                .catch(err => {
                    console.log(err)
                    this.error = err.response.data.errors
                    this.is_error = true
                })
        }

    }

}
</script>

<style scoped>

</style>
