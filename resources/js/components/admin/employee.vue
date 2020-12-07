<template>
    <div class="container-fluid">
        <div class="row justify-content-around">
            <div class="col-12">
                <div class="card my-5">
                    <div class="card-header">
                        <h3 class="card-title">Employee List</h3>
                        <div class="card-tools" style="position: absolute;right: 1rem;top: .5rem;">
                            <button type="button" class="btn btn-info" @click="create">
                                Add New
                                <i class="fas fa-plus"></i>
                            </button>
                            <button type="button" class="btn btn-primary" @click="reload">
                                Reload
                                <i class="fas fa-sync"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <strong>Search By :</strong>
                                        </div>
                                        <div class="col-md-9">
                                            <select v-model="queryFiled" class="form-control" id="fileds">
                                                <option value="name">Name</option>
                                                <option value="designation">Designation</option>
                                                <option value="email">Email</option>
                                                <option value="phone">Phone</option>
                                                <option value="address">Address</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <input v-model="query" type="text" class="form-control" placeholder="Search">
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#sl</th>
                                    <th>Name</th>
                                    <th>Designation</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr
                                    v-show="employees.length"
                                    v-for="(employee, index) in employees"
                                    :key="employee.id"
                                >
                                    <th scope="row">{{ index + 1 }}</th>
                                    <td>{{ employee.name }}<br>id:{{ employee.id }}</td>
                                    <td>{{ employee.designation }}</td>
                                    <td>{{ employee.email }}</td>
                                    <td>{{ employee.phone }}</td>
                                    <td>{{ employee.address }}</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-info btn-sm m-1" @click="show(employee)">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button type="button" class="btn btn-primary btn-sm m-1"
                                                @click="edit(employee)">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button
                                            type="button"
                                            class="btn btn-danger btn-sm"
                                            @click="destroy(employee)"
                                        >
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr v-show="!employees.length">
                                    <td colspan="8">
                                        <div class="alert alert-danger" role="alert">Sorry!! No data found.</div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>

                    <div class="card-footer">
                        <pagination
                            v-if="pagination.last_page > 1"
                            :pagination="pagination"
                            :offset="10"
                            @paginate="query === '' ? getData() : searchData()"
                        ></pagination>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div
            class="modal fade"
            id="employeeModalLong"
            tabindex="-1"
            role="dialog"
            aria-labelledby="customerModalLongTitle"
            aria-hidden="true"
        >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5
                            class="modal-title"
                            id="customerModalLongTitle"
                        >{{ editMode ? "Edit" : "Add New" }} Employee</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="editMode ? update() : store()" @keydown="form.onKeydown($event)">
                        <div class="modal-body">
                            <alert-error :form="form"></alert-error>
                            <div class="form-group">
                                <label>Name</label>
                                <input
                                    v-model="form.name"
                                    type="text"
                                    name="name"
                                    class="form-control"
                                    :class="{ 'is-invalid': form.errors.has('name') }"
                                >
                                <has-error :form="form" field="name"></has-error>
                            </div>
                            <div class="form-group">
                                <label>Designation</label>
                                <input
                                    v-model="form.designation"
                                    type="text"
                                    name="designation"
                                    class="form-control"
                                    :class="{ 'is-invalid': form.errors.has('designation') }"
                                >
                                <has-error :form="form" field="designation"></has-error>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input
                                    v-model="form.email"
                                    type="email"
                                    name="email"
                                    class="form-control"
                                    :class="{ 'is-invalid': form.errors.has('email') }"
                                >
                                <has-error :form="form" field="email"></has-error>
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input
                                    v-model="form.phone"
                                    type="tel"
                                    name="phone"
                                    class="form-control"
                                    :class="{ 'is-invalid': form.errors.has('phone') }"
                                >
                                <has-error :form="form" field="phone"></has-error>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <textarea
                                    v-model="form.address"
                                    name="address"
                                    class="form-control"
                                    :class="{ 'is-invalid': form.errors.has('address') }"
                                ></textarea>
                                <has-error :form="form" field="address"></has-error>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button :disabled="form.busy" type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div
            class="modal fade"
            id="showModal"
            tabindex="-1"
            role="dialog"
            aria-labelledby="showModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="showModalLabel">{{ form.name }}</h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <strong>Email : {{ form.email }}</strong>
                        <br>
                        <strong>Designation : {{ form.designation }}</strong>
                        <br>
                        <strong>Phone : {{ form.phone }}</strong>
                        <br>
                        <br>
                        <strong>Address :</strong>
                        <address>{{ form.address }}</address>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <vue-progress-bar></vue-progress-bar>
        <vue-snotify></vue-snotify>
    </div>
    <!-- /.container-fluid -->
</template>

<script>
export default {
    data() {
        return {
            editMode: false,
            employees: [],
            query: "",
            queryFiled: "email",
            pagination: {
                current_page: 1,
            },
            form: new Form({
                id: "",
                name: "example",
                email: "example@example.com",
                designation: "example",
                phone: "12133435535",
                address: "example",
            }),
        }
    },
    watch: {
        query: function (newQ, old) {
            this.pagination.current_page=1
            if (newQ === "") {
                this.getData();
            } else {
                this.searchData();
            }
        }
    },
    created() {},
    mounted() {
        this.getData()
    },
    computed: {},
    methods: {
        show(employee) {
            this.form.reset();
            this.form.fill(employee);
            $("#showModal").modal("show");
            console.log(employee);
        },
        destroy(employee) {
            this.$snotify.clear();
            this.$snotify.confirm(
                "You will not be able to recover this data!",
                "Are you sure?",
                {
                    showProgressBar: false,
                    closeOnClick: false,
                    pauseOnHover: true,
                    buttons: [
                        {
                            text: "Yes",
                            action: toast => {
                                this.$snotify.remove(toast.id);
                                this.$Progress.start();
                                axios.delete("/api/employee/" + employee.id)
                                    .then(response => {
                                        this.$Progress.finish();
                                        this.$snotify.success(
                                            "Employee Successfully Deleted",
                                            "Success"
                                        );
                                        this.getData();
                                    }).catch(e => {
                                    this.$Progress.fail();
                                    console.log(e);
                                });
                            },
                            bold: true
                        },
                        {
                            text: "No",
                            action: toast => {
                                this.$snotify.remove(toast.id);
                            },
                            bold: true
                        }
                    ]
                }
            );
        },
        edit(employee) {
            this.editMode = true;
            this.form.reset();
            this.form.clear();
            this.form.fill(employee);
            $("#employeeModalLong").modal("show");
        },
        update() {
            this.$Progress.start();
            this.form.busy = true;
            this.form
                .put("/api/employee/" + this.form.id)
                .then(response => {
                    this.getData();
                    $("#employeeModalLong").modal("hide");
                    if (this.form.successful) {
                        this.$Progress.finish();
                        this.$snotify.success("Employee Successfully Updated", "Success");
                    } else {
                        this.$Progress.fail();
                        this.$snotify.error(
                            "Something went wrong try again later.",
                            "Error"
                        );
                    }
                })
                .catch(e => {
                    this.$Progress.fail();
                    console.log(e);
                });
        },
        store() {
            this.$Progress.start();
            this.form.busy = true;
            this.form
                .post("/api/employee")
                .then(response => {
                    this.getData();
                    $("#employeeModalLong").modal("hide");
                    if (this.form.successful) {
                        this.$Progress.finish();
                        this.$snotify.success("Employee Successfully Saved", "Success");
                    } else {
                        this.$Progress.fail();
                        this.$snotify.error(
                            "Something went wrong try again later.",
                            "Error"
                        );
                    }
                })
                .catch(e => {
                    this.$Progress.fail();
                    console.log(e);
                });
        },
        create() {
            this.editMode = false;
            this.form.reset();
            this.form.clear();
            $("#employeeModalLong").modal("show");
        },
        reload() {
            this.pagination.current_page=1
            this.getData();
            this.query = "";
            this.queryFiled = "email";
            this.$snotify.success("Data Successfully Refresh", "Success");
        },
        getData() {
            console.log(this.queryFiled);
            console.log(this.query);
            this.$Progress.start();
            axios.get("/api/employee?page=" + this.pagination.current_page)
                .then((res) => {
                    console.log(res.data.data);
                    this.employees = res.data.data
                    this.pagination = res.data.meta;
                    this.$Progress.finish();
                }).catch((e) => {
                this.$Progress.fail();
                console.log(e)
            })
        },
        searchData() {
            console.log(this.queryFiled);
            console.log(this.query);
            this.$Progress.start();
            axios.get("/api/employee/search/" + this.queryFiled + "/" + this.query + "?page=" + this.pagination.current_page)
                .then(res => {
                    console.log(res.data.data);
                    this.employees = res.data.data;
                    this.pagination = res.data.meta;
                    this.$Progress.finish();
                })
                .catch(e => {
                    console.log(e);
                    this.$Progress.fail();
                });
        },
    },
}
</script>

<style scoped>

</style>
