<template>
    <div class="grid grid-cols-4 gap-2 ">
        <div class="flex flex-col w-full justify-center items-center border border-gray-400" v-for="post in postsUsers">
            <div class="flex bg-gray-200 border border-gray-400 text-wrap">{{ post.title }}</div>
            <div class="flex bg-sky-200 border border-gray-400">{{ post.description }}</div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Index",
    props: ['posts'],
    data(){
        return{
            postsUsers: this.posts
        }
    }
}
</script>

<style scoped>

</style>
