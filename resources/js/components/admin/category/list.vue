<template>
    <div class="container-fluid">
        <div class="row justify-content-around">
            <div class="col-8">
                <div class="card my-5">
                    <div class="card-header">
                        <h3 class="card-title">Category List</h3>
                        <div class="card-tools">
                            <button class="btn btn-primary">
                                <router-link to="/category-add" style="color: #fff">Add category</router-link>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>
                                    <select name="" id="" v-model="select" @change="deleteSelected">
                                        <option value="">Select</option>
                                        <option value="">Delete All</option>
                                    </select>
                                    <br>
                                    <br>
                                    <input type="checkbox" @click="selectAll"  v-model="selected"  >
                                    <span v-if="selected">Uncheck All</span>
                                    <span v-else>Check All</span>
                                </th>
                                <th>#sl</th>
                                <th>Category Name</th>
                                <th>Created</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(category,index) in getAllCategory">
                                <td><input type="checkbox" v-model="categoryItem" :value="category.id"></td>
                                <td>{{ index + 1 }}</td>
                                <td>{{ category.title }}</td>
                                <td>{{ category.created_at | timeformate }}</td>
                                <td>
                                    <router-link :to="`/category-edit/${category.id}` ">Edit</router-link>
                                    <a href="" @click.prevent="deleteCategory(category.id)">Delete</a>
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
    data() {
        return {
            categoryItem: [],
            select: '',
            selected: false,
        }
    },
    computed: {
        getAllCategory() {
            return this.$store.getters.getCategory
        }
    },
    methods: {
        deleteCategory(id) {
            // console.log(id);
            axios.get('delete-category/' + id)
                .then(() => {
                    this.$store.dispatch("getCategory")
                    Toast.fire({
                        icon: 'success',
                        title: 'Category deleted successfully'
                    })
                })
                .catch(() => {

                })
        },
        deleteSelected() {
            axios.get('/delete-category-selected/' + this.categoryItem)
                .then(() => {
                    this.$store.dispatch("getCategory"),
                        this.categoryItem = []
                        this.selected = false
                        Toast.fire({
                            icon: 'success',
                            title: 'Categories deleted successfully'
                        })
                })
                .catch(() => {

                })
        },
        selectAll() {
            if (this.selected==false){
                this.selected = true;
                for (var cat in this.getAllCategory){
                    this.categoryItem.push(this.getAllCategory[cat].id)
                }
            }else{
                this.selected = false
                this.categoryItem = []
            }

        }

    },
    mounted() {
        this.$store.dispatch("getCategory")
    }
}
</script>

<style scoped>

</style>
