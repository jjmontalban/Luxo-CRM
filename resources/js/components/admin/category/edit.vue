<template>
    <div class="container-fluid">
        <div class="row justify-content-around ">
            <div class="col-md-8">
                <div class="card card-primary my-5">
                    <div class="card-header">
                        <h3 class="card-title">Edit Category</h3>
                    </div>
                    <form role="form" @submit.prevent="updateCategory()">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Category title</label>
                                <input v-model="form.title" type="text" name="cat_name" class="form-control"
                                       id="exampleInputEmail1"
                                       placeholder="Enter category title"
                                       :class="{ 'is-invalid': form.errors.has('title') }">
                                <has-error :form="form" field="title"></has-error>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "edit",
    data() {
        return {
            form: new Form({
                title: ''
            })
        }
    },
    mounted() {
        axios.get('/edit-category/'+(this.$route.params.cat))
            .then((res) => {
                this.form.fill(res.data.category)
            })
            .catch(() => {

            })
    },
    methods: {
        updateCategory() {
            this.form.post('/update-category/'+(this.$route.params.cat))
                .then(() => {
                    this.$router.push('/category-list')
                    Toast.fire({
                        icon: 'success',
                        title: 'Category updated successfully'
                    })
                })
                .catch(() => {

                })
        }
    }

}
</script>

<style scoped>

</style>
