<template>
  <div id="customer">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Clientes</h4>
            <div class="card-tools" style="position: absolute;right: 1rem;top: .5rem;">
              <button type="button" class="btn btn-info" @click="create">
                Añadir nuevo
                <i class="fas fa-plus"></i>
              </button>
              <button type="button" class="btn btn-primary" @click="reload">
                Recargar
                <i class="fas fa-sync"></i>
              </button>
            </div>
          </div>

          <div class="card-body">
            <div class="mb-3">
              <div class="row">
                <div class="col-md-2">
                  <strong>Buscar por :</strong>
                </div>
                <div class="col-md-3">
                  <select v-model="queryFiled" class="form-control" id="fileds">
                    <option value="firstname">Nombre</option>
                    <option value="lastname">Apellidos</option>
                    <option value="company">Empresa</option>
                    <option value="email">Email</option>
                    <option value="phone_1">Telefono 1</option>
                    <option value="phone_2">Telefono 2</option>
                    <option value="address">Dirección</option>
                  </select>
                </div>
                <div class="col-md-7">
                  <input v-model="query" type="text" class="form-control" placeholder="Buscar...">
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table table-hover table-bordered table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Empresa</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telefono 1</th>
                    <th scope="col">Telefono 2</th>
                    <th scope="col">Dirección</th>
                    <th scope="col" class="text-center">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <tr
                    v-show="customers.length"
                    v-for="(customer, index) in customers"
                    :key="customer.id"
                  >
                    <th scope="row">{{ index + 1 }}</th>
                    <td>{{ customer.firstname}}</td>
                    <td>{{ customer.lastname}}</td>
                    <td>{{ customer.company}}</td>
                    <td>{{ customer.email }}</td>
                    <td>{{ customer.phone_1 }}</td>
                    <td>{{ customer.phone_2 }}</td>
                    <td>{{ customer.address }}</td>
                    <td class="text-center">
                      <button type="button" @click="show(customer)" class="btn btn-info btn-sm">
                        <i class="fas fa-eye"></i>
                      </button>
                      <button type="button" @click="edit(customer)" class="btn btn-primary btn-sm">
                        <i class="fas fa-edit"></i>
                      </button>
                      <button
                        type="button"
                        @click="destroy(customer)"
                        class="btn btn-danger btn-sm"
                      >
                        <i class="fas fa-trash-alt"></i>
                      </button>
                    </td>
                  </tr>
                  <tr v-show="!customers.length">
                    <td colspan="6">
                      <div class="alert alert-danger" role="alert">Lo siento :( Datos no encontrados.</div>
                    </td>
                  </tr>
                </tbody>
              </table>
              <pagination
                v-if="pagination.last_page > 1"
                :pagination="pagination"
                :offset="5"
                @paginate="query === '' ? getData() : searchData()"
              ></pagination>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal -->
    <div
      class="modal fade"
      id="customerModalLong"
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
            >{{ editMode ? "Edit" : "Añadir nuevo" }} Cliente</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form @submit.prevent="editMode ? update() : store()" @keydown="form.onKeydown($event)">
            <div class="modal-body">
              <alert-error :form="form"></alert-error>
              <div class="form-group">
                <label>Nombre</label>
                <input
                  v-model="form.firstname"
                  type="text"
                  name="firstname"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('firstname') }"
                >
                <has-error :form="form" field="firstname"></has-error>
              </div>
              <div class="form-group">
                <label>Apellidos</label>
                <input
                  v-model="form.lastname"
                  type="text"
                  name="lastname"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('lastname') }"
                >
                <has-error :form="form" field="lastname"></has-error>
              </div>
              <div class="form-group">
                <label>Empresa</label>
                <input
                  v-model="form.company"
                  type="text"
                  name="company"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('company') }"
                >
                <has-error :form="form" field="company"></has-error>
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
                <label>Phone 1</label>
                <input
                  v-model="form.phone_1"
                  type="text"
                  name="phone_1"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('phone_1') }"
                >
                <has-error :form="form" field="phone_1"></has-error>
              </div>
              <div class="form-group">
                <label>Phone 2</label>
                <input
                  v-model="form.phone_2"
                  type="text"
                  name="phone_2"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('phone_2') }"
                >
                <has-error :form="form" field="phone_2"></has-error>
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
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button :disabled="form.busy" type="submit" class="btn btn-primary">Guardar cambios</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Modal -->
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
            <h5 class="modal-title" id="showModalLabel">{{ form.firstname }}</h5>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <strong>Email : {{ form.email }}</strong>
            <br>
            <strong>Teléfono : {{ form.phone_1 }}</strong>
            <br>
            <strong>Empresa : {{ form.company }}</strong>
            <br>
            <strong>Dirección :</strong>
            <address>{{ form.address }}</address>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
    <vue-progress-bar></vue-progress-bar>
    <vue-snotify></vue-snotify>
  </div>
</template>

<script>
export default {
    data() {
        return {
            editMode: false,
            query: "",
            queryFiled: "firstname",
            customers: [],
            form: new Form({
                id: "",
                firstname: "example",
                lastname: "example",
                company: "example",
                email: "example@example.com",
                phone_1: "661661661",
                phone_2: "662662662",
                address: "example"
                }),
            pagination: {
                current_page: 1
                }
            };
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

        getData() {
            console.log(this.queryFiled);
            console.log(this.query);
            this.$Progress.start();
            axios.get("/api/clientes?page=" + this.pagination.current_page)
                .then((res) => {
                    console.log(res.data.data);
                    this.customers = res.data.data
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
            axios.get("/api/cliente/buscar/" + this.queryFiled + "/" + this.query + "?page=" + this.pagination.current_page)
                .then(res => {
                    console.log(res.data.data);
                    this.customers = res.data.data;
                    this.pagination = res.data.meta;
                    this.$Progress.finish();
                })
                .catch(e => {
                    console.log(e);
                    this.$Progress.fail();
                });
        },

        reload() {
            this.pagination.current_page=1
            this.getData();
            this.query = "";
            this.queryFiled = "email";
            this.$snotify.success("Datos actualizados", "ok!");
        },

        create() {
            this.editMode = false;
            this.form.reset();
            this.form.clear();
            $("#customerModalLong").modal("show");
        },

        store() {
            this.$Progress.start();
            this.form.busy = true;
            this.form
                .post("/api/clientes")
                .then(response => {
                    this.getData();
                    $("#customerModalLong").modal("hide");
                    if (this.form.successful) {
                        this.$Progress.finish();
                        this.$snotify.success("Cliente guardado", "ok!");
                    } else {
                        this.$Progress.fail();
                        this.$snotify.error(
                            "Algo pasó. Inténtalo otra vez",
                            "Error"
                        );
                    }
                })
                .catch(e => {
                    this.$Progress.fail();
                    console.log(e);
                });
        },

        show(customer) {
            this.form.reset();
            this.form.fill(customer);
            $("#showModal").modal("show");
            console.log(customer);
        },

        edit(customer) {
            this.editMode = true;
            this.form.reset();
            this.form.clear();
            this.form.fill(customer);
            $("#customerModalLong").modal("show");
        },

        update() {
            this.$Progress.start();
            this.form.busy = true;
            this.form
                .put("/api/clientes/" + this.form.id)
                .then(response => {
                    this.getData();
                    $("#customerModalLong").modal("hide");
                    if (this.form.successful) {
                        this.$Progress.finish();
                        this.$snotify.success("Cliente actualizado", "ok!");
                    } else {
                        this.$Progress.fail();
                        this.$snotify.error(
                            "Algo pasó. Inténtalo otra vez",
                            "Error"
                        );
                    }
                })
                .catch(e => {
                    this.$Progress.fail();
                    console.log(e);
                });
        },

        destroy(customer) {
            this.$snotify.clear();
            this.$snotify.confirm(
                "Tendrás que llamar a kino para recuperarlo!",
                "Seguro?",
                {
                    showProgressBar: false,
                    closeOnClick: false,
                    pauseOnHover: true,
                    buttons: [
                        {
                            text: "Sí",
                            action: toast => {
                                this.$snotify.remove(toast.id);
                                this.$Progress.start();
                                axios.delete("/api/clientes/" + customer.id)
                                    .then(response => {
                                        this.$Progress.finish();
                                        this.$snotify.success(
                                            "Cliente Borrado",
                                            "ok!"
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
    },
}
</script>

<style scoped>

</style>
