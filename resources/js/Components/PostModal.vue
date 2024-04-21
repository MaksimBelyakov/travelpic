<template>
<div class="w-full h-full bg-gray-500 opacity-100 absolute flex justify-center" @click="userClick">
    <div @click.stop class="w-1/3 h-1/3 bg-white relative">
        <div class=" mx-2 my-2 p-4 bg-red-200 " >
            <div class="bg-gray-100">
                <p>{{ post.id }}</p>
            </div>
            <div class="bg-gray-100">
                <p>{{ post.title }}</p>
            </div>
            <div class="bg-sky-200">
                <p>{{ post.description }}</p>
            </div>
            <div class="bg-red-500">
                <p>{{ post.created_at }}</p>
            </div>

        </div>

        <div>
            <div class="w-48" v-for="image in post.images">
                <img :src="image.url" alt="">
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    name: "PostModal",
    props: ['post'],
    methods:{
        userClick(){
            this.$emit('userClick');
        }
    }
}
</script>

<style scoped>

</style>
