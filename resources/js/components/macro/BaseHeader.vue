<template>
  <div class="container">
    <div class="row">
        <div class="col">
            <h1>Boolpress</h1>
        </div>
        <div class="col">
            <nav>
                <ul>
                    <li>
                        <router-link :to ="{ name: 'home' }">Home</router-link>
                    </li>
                    <li>
                        <router-link :to ="{ name: 'about' }">About</router-link>
                    </li>
                    <li>
                        <router-link :to ="{ name: 'categories' }">Categorie</router-link>
                    </li>
                    <li>
                        <router-link :to ="{ name: 'tags' }">Tags</router-link>
                    </li>
                    <li>
                        <a href="/admin/home">Area Riservata</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
  </div>
</template>

<script>
export default {
    name: 'BaseHeader',
}
</script>

<style lang="scss" scoped>

ul{
    display: flex;
    list-style: none;
    column-gap: 20px;
}

.row{
    align-items: center;
}

</style>