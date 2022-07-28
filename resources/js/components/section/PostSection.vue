<template>
  <section class="posts">
    <div class="container">
        <ul class="row">
            <li class="col-4 mb-5" v-for ="post in posts" :key = "post-slug">
                <BaseCard :title ="posts.title" :content="post.content" :slug="post.slug"/>
            </li>
        </ul>
    </div>
  </section>
</template>

<script>

import BaseCard from '../common/BaseCard.vue';

export default {
    name: 'PostSection',
    data(){
        return {
            posts: [],
        }
    },
    components: {
        BaseCard,
    },
    created() {
        axios.get('/api/posts')
        .then((response) => {
            this.posts = response.data;
        })
    },
}
</script>

<style lang = "scss" scoped>

.posts{
    background-color: #efefef;
    padding: 3.125rem 0;

    ul{
        padding: 0;
        list-style: none;
    }
}


</style>