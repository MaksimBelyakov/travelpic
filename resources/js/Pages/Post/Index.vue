<template>
<div class="flex  mx-auto justify-center">
    <div class="flex w-3/4 mt-12 flex-wrap">
        <div class=" mx-2 1/4 p-4 bg-red-200 " v-for="post in posts">
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
    </div>
</div>
</template>

<script>
export default {
    name: "Index",
    props: ['posts']
}
</script>

<style scoped>

</style>
