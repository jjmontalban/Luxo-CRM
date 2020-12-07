<template>
    <div class="container-fluid">
        <div class="row justify-content-around ">
            <div class="col-md-8">
                <div class="card card-primary my-5">
                    <div class="card-header">
                        <h3 class="card-title">Add new Category</h3>
                    </div>
                    <form role="form" @submit.prevent="addCategory()">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Category title</label>
                                <input v-model="form.category_name" type="text" name="cat_name" class="form-control"
                                       id="exampleInputEmail1"
                                       placeholder="Enter category title"
                                       :class="{ 'is-invalid': form.errors.has('category_name') }">
                                <has-error :form="form" field="category_name"></has-error>
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
    data() {
        return {
            form: new Form({
                category_name: ''
            })
        }
    },
    methods: {
        addCategory() {
            this.form.post('/add-category')
                .then((response) => {
                    // console.log(response.data)
                    this.$router.push('/category-list')
                    Toast.fire({
                        icon: 'success',
                        title: 'Category added successfully'
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
