<template>
    <section id="content">
        <div class="container">
            <div class="row">
                <div class="span8">
                    <article>
                        <div class="row">
                            <div class="span8">
                                <div class="post-image">
                                    <div class="post-heading">
                                        <h3><a href="#">{{ SinglePostData.title }}</a></h3>
                                    </div>
                                    <img :src="`/photo/${SinglePostData.photo}`" alt="" width="200"/>
                                </div>
                                <p>
                                    {{ SinglePostData.description}}
                                </p>

                                <div class="bottom-article">
                                    <ul class="meta-post">
                                        <li v-if="SinglePostData.userdata"><i class="icon-user"></i><a href="#"> {{
                                            SinglePostData.userdata.name }}</a></li>
                                        <li v-if="SinglePostData.categorydata"><i class="icon-folder-open"></i><a
                                            href="#">
                                            {{ SinglePostData.categorydata.title }}</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="span4">
                    <side></side>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import sideBar from "./blogSidebar.vue"

export default {
    name: "singlePost",
    mounted() {
        this.singlePost();
    },
    data() {
        return {}
    },
    computed: {
        SinglePostData() {
            return this.$store.getters.getBlogSinglePost
        }

    },
    methods: {
        singlePost() {
            this.$store.dispatch("getBlogSinglePosts", this.$route.params.id)
        }
    },
    components: {
        side: sideBar
    },
    watch: {
        $route(to, from) {
            this.singlePost();
        }
    }
}
</script>

<style scoped>

</style>
