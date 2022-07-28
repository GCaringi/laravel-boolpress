<template>
  <div class="container">
    <h1>Tags</h1>
    <ul v-if="tags.length > 0">
        <li v-for="tag in tags" :key="tag.id">
            <router-link :to="{ name: 'single-tag', params: {slug: tag.slug} }">{{tag.name}}</router-link>
        </li>
    </ul>
    <h2 v-else>Nessuna Categoria presente</h2>
  </div>
</template>

<script>
export default {
    name: 'Tags',
    data(){
        return{
            tags: [],
        }
    },
    created(){
        axios.get('/api/tags')
            .then((response)=> {
                this.tags = response.data;
            })
    }
}
</script>

<style>

</style>