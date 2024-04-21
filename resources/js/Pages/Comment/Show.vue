<template>
    <div>
        <div>
            <div v-for="comment in comments">
                <p>{{ comment.comment }}</p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Show",
    props: ['comments']
}
</script>

<style scoped>

</style>
