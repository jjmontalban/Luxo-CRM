<template>
    <div>
        <section id="inner-headline">
            <div class="container">
                <div class="row">
                    <div class="span4">
                        <div class="inner-heading">
                            <h2>Blog left sidebar</h2>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <section id="content">
            <div class="container">
                <div class="row">
                    <div class="span8">
                        <article v-for="post in BlogPosts">
                            <div class="row">
                                <div class="span8" >
                                    <div class="post-image">
                                        <div class="post-heading">
                                            <h3><a href="#">{{ post.title }}</a></h3>
                                        </div>
                                        <img :src="`photo/${post.photo}`" alt="" width="50"/>
                                    </div>
                                    <p>
                                        {{post.description | sortLentg(300," [Read more......]")}}
                                    </p>
                                    <div class="bottom-article">
                                        <ul class="meta-post">
                                            <li><i class="icon-calendar"></i><a href="#"> Mar 23, 2013</a></li>
                                            <li><i class="icon-user"></i><a href="#"> {{ post.userdata.name }}</a></li>
                                            <li v-if="post.categorydata"><i class="icon-folder-open"></i><a href="#"> {{ post.categorydata.title }}</a></li>
                                            <li><i class="icon-comments"></i><a href="#">4 Comments</a></li>
                                        </ul>
                                        <router-link :to="`single-post/${post.id}`" class="pull-right">Continue reading <i class="icon-angle-right"></i></router-link>
                                    </div>
                                </div>
                            </div>
                        </article>

                        <div id="pagination">
                            <span class="all">Page 1 of 3</span>
                            <span class="current">1</span>
                            <a href="#" class="inactive">2</a>
                            <a href="#" class="inactive">3</a>
                        </div>
                    </div>
                    <div class="span4">
                        <side></side>
                    </div>

                </div>
            </div>
        </section>
    </div>
</template>

<script>
import sideBar from "./blogSidebar.vue"

export default {
    name: "blogPost",
    mounted() {
        this.post();
    },
    data() {
        return {}
    },
    computed: {
        BlogPosts() {
            return this.$store.getters.getAllBlogPost
        }
    },
    methods: {
        post(){
            if (this.$route.params.id){
                this.$store.dispatch("getBlogPosts",this.$route.params.id)
            }else {
                this.$store.dispatch("getBlogPosts","b")
            }
        }
    },
    components: {
        side:sideBar
    },
    watch: {
        $route(to, from) {
            this.post();
        }
    }
}
</script>

<style scoped>

</style>
