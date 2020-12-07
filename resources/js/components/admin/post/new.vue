<template>
    <div class="container-fluid">
        <div class="row justify-content-around ">
            <div class="col-md-8">
                <div class="card card-primary my-5">
                    <div class="card-header">
                        <h3 class="card-title">Add new Post</h3>
                    </div>
                    <form role="form" enctype="multipart/form-data" @submit.prevent="addPost()">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="postTitle">Post title</label>
                                <input v-model="form.title" type="text" class="form-control"
                                       id="postTitle"
                                       placeholder="Post title"
                                       :class="{ 'is-invalid': form.errors.has('post_title') }">
                                <has-error :form="form" field="post_title"></has-error>
                            </div>
                            <div class="form-group">
                                <label>Post Description</label>
                                <markdown-editor v-model="form.description"></markdown-editor>
                                <has-error :form="form" field="description"></has-error>
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <select v-model="form.categorey"
                                        :class="{ 'is-invalid': form.errors.has('description') }"
                                        class="form-control select2 select2-danger"
                                        data-dropdown-css-class="select2-danger" style="width: 100%;">
                                    <option disabled value="">Select one</option>
                                    <option v-for="cat in getAllCategory" :value="cat.id">{{ cat.title }}</option>
                                </select>
                                <has-error :form="form" field="categorey"></has-error>
                            </div>
                            <div class="form-group">
                                <img :src="form.img" alt=" upoaded image" width="100">
                                <hr>
                                <label>Photo</label>
                                <input @change="changePhoto($event)" name="img" type="file"
                                       :class="{ 'is-invalid': form.errors.has('img') }">
                                <has-error :form="form" field="img"></has-error>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "new",
    mounted() {
        this.$store.dispatch("getCategory")
    },
    data() {
        return {
            form: new Form({
                title: '',
                description: '',
                categorey: '40',
                img: '',

            })
        }
    },
    computed: {
        getAllCategory() {
            return this.$store.getters.getCategory
        }
    },
    methods: {
        changePhoto(event) {
            let file = event.target.files[0];
            // console.log(file);
            if (file.size > 1048576) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'File Size much large!',
                    footer: '<a href>Why do I have this issue?</a>'
                })
            } else {
                let reader = new FileReader();
                reader.onload = (e) => {
                    this.form.img = e.target.result
                    // console.log(e.target.result)
                }
                reader.readAsDataURL(file);
            }
        },
        addPost() {
            this.form.post('/add-post')
                .then((response) => {
                    console.log(response)
                    this.$router.push('/post-list')
                    Toast.fire({
                        icon: 'success',
                        title: 'Post added successfully'
                    })
                })
                .catch(() => {

                })
        }

    },

}
</script>

<style scoped>

</style>
