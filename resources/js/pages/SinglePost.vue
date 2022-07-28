<template>
  <div class="container" v-if="post">
    <h1>{{post.title}}</h1>
    <p>{{post.content}}</p>
    <h3>Autore: {{post.user.name}}</h3>
    <p v-if="post.category">
        Categoria: {{post.category.name}}
    </p>
    <div class="mt-5">
        <router-link :to = "{ name: 'home'}"> Home Page</router-link>
    </div>
  </div>
</template>

<script>
export default {
    name: 'SinglePost',
    data(){
        return {
            post: null
        }
    },
    created(){
        axios.get(`/api/posts/${this.$route.params.slug}`)
        .then((response) => {
            this.post = response.data;
        })
        .catch((err) =>{
            this.$router.push({name: 'page-404'});
        })
    }
}
</script>

<style>

</style>