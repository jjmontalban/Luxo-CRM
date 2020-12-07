<template>
    <aside class="right-sidebar">
        <div class="widget">
            <form class="form-search">
                <input @keyup="realSearch"  v-model="keyword" placeholder="Type something" type="text" class="input-medium search-query">
                <button @click.prevent="realSearch" type="submit" class="btn btn-square btn-theme">Search</button>
            </form>
        </div>
        <div class="widget">
            <h5 class="widgetheading">Categories</h5>
            <ul class="cat">
                <li v-for="category in getAllCategory" ><i class="icon-angle-right"></i><router-link :to="`/category-posts/${category.id}`">{{ category.title }}</router-link><span> (20)</span></li>

            </ul>
        </div>
        <div class="widget">
            <h5 class="widgetheading">Latest posts</h5>
            <ul class="recent">
                <li v-for="(post,index) in latestPosts" v-if="index<3"  >
                    <img :src="`/photo/${post.photo}`" class="pull-left" alt="" width="40"/>
                    <h6><router-link :to="`/single-post/${post.id}`" >{{ post.title }}</router-link></h6>
                    <p>
                        {{ post.description | sortLentg(30,".....") }}
                    </p>
                </li>

            </ul>
        </div>

    </aside>
</template>

<script>
import _ from 'lodash';
export default {
    name: "blogSidebar",
    mounted() {
        this.$store.dispatch("getLatestPosts")
        this.$store.dispatch("CategoryFrontEnd")
    },
    data() {
        return {
            keyword:'',
        }
    },
    computed: {
        getAllCategory() {
            return this.$store.getters.getCategoryFrontEnd
        },
        latestPosts() {
            return this.$store.getters.getLatestPosts
        }
    },
    methods: {
        realSearch:_.debounce(function () {
            this.$store.dispatch("searchPosts",this.keyword)
        }, 500)
    },
    components: {},

}
</script>

<style scoped>

</style>
