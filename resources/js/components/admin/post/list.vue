<template>
    <div class="container-fluid">
        <div class="row justify-content-around">
            <div class="col-12">
                <div class="card my-5">
                    <div class="card-header">
                        <h3 class="card-title">Post List</h3>
                        <div class="card-tools">
                            <button class="btn btn-primary">
                                <router-link to="/post-add" style="color: #fff">Add Post</router-link>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#sl</th>
                                <th>Title</th>
                                <th>Photo</th>
                                <th>User</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(post,index) in getAllPosts">
                                <td>{{ index + 1 }}</td>
                                <td>{{ post.title }}</td>
                                <td><img :src="'photo/'+post.photo" alt="" width="50px"></td>
                                <td v-if="post.userdata">{{ post.userdata.name }}</td>
                                <td v-else style="color: red">deleted</td>
                                <td v-if="post.categorydata">{{ post.categorydata.title }}</td>
                                <td v-else style="color: red">deleted</td>
                                <td>{{ post.description|sortLentg(40,"[---]") }}</td>
                                <td>
                                    <router-link :to="`/post-edit/${post.id}`">Edit</router-link>
                                    <a href="" @click.prevent="postDelete(post.id)">Delete</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                
                    <!-- /.card-body -->
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</template>

<script>
export default {
    name: "list",
    computed: {
        getAllPosts() {
            return this.$store.getters.getAllPost
        }
    },
    methods: {
        postDelete(id){
            // console.log(id)
            axios.get('/delete-post/' + id)
                .then(() => {
                    this.$store.dispatch("getPosts")
                    Toast.fire({
                        icon: 'success',
                        title: 'Post deleted successfully'
                    })
                })
                .catch(() => {

                })
        }
    },
    mounted() {
        this.$store.dispatch("getPosts")
    },
}
</script>

<style scoped>

</style>
