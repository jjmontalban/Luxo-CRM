export default {
    state: {
        category: [],
        posts:[],
        blogpost:[],
        blogSinglePost:[],
        category_frontend:[],
        latestPosts:[],
    },
    getters: {
        getCategory(state) {
            return state.category
        },
        getAllPost(state) {
            return state.posts
        },
        getAllBlogPost(state) {
            return state.blogpost
        },
        getBlogSinglePost(state) {
            return state.blogSinglePost
        },
        getCategoryFrontEnd(state) {
            return state.category_frontend
        },
        getLatestPosts(state) {
            return state.latestPosts
        },
    },
    actions: {
        getCategory(context) {
            axios.get('/list-category ')
                .then((response) => {
                    context.commit("categories", response.data.categories)
                })
        },
        getPosts(context){
            axios.get('/list-post ')
                .then((response) => {
                    context.commit("posts_all", response.data.posts_data)
                })
        },

        getBlogPosts(context,payload){
            axios.get('/blog-posts/'+payload)
                .then((response) => {
                    context.commit("blogposts", response.data.querydata)
                })
        },
        getBlogSinglePosts(context,payload){
            axios.get('/blog-single-post/'+payload)
                .then((response) => {
                    context.commit("blogSinglepost", response.data.querydata)
                })
        },
        CategoryFrontEnd(context) {
            axios.get('/list-category-frontend ')
                .then((response) => {
                    context.commit("categories_frontend", response.data.querydata)
                })
        },
        getLatestPosts(context){
            axios.get('/latest-posts')
                .then((response) => {
                    context.commit("latestPosts", response.data.querydata)
                })
        },

        searchPosts(context,payload){
            axios.get('/search?s='+payload)
                .then((response) => {
                    context.commit("allSearchPost", response.data.querydata)
                })
        },

    },

    mutations: {
        categories(state, data){
            return state.category=data
        },
        posts_all(state, data){
            return state.posts=data
        },
        blogposts(state, data){
            return state.blogpost=data
        },
        blogSinglepost(state, data){
            return state.blogSinglePost=data
        },
        categories_frontend(state, data){
            return state.category_frontend=data
        },
        latestPosts(state, data){
            return state.latestPosts=data
        },
        allSearchPost(state, data){
            return state.blogpost=data
        },
    }
}
