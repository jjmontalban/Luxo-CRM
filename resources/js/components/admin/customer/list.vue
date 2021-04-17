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
                    <th scope="col">Nombre y apellidos</th>
                    <th scope="col">Empresa</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telefono 1</th>
                    <th scope="col">Telefono 2</th>
                    <th scope="col">Dirección</th>
                    <th scope="col" class="text-center">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(customer, index) in customers" :key="customer.id">
                    <td>{{ customer.id }}</td>
                    <td v-if="customer.firstname && customer.lastname">{{ customer.firstname}} {{ customer.lastname}}</td><td v-else>Sin datos</td>
                    <td v-if="customer.company">{{ customer.company}}</td><td v-else>Sin datos</td>
                    <td>{{ customer.email }}</td>
                    <td v-if="customer.phone_1">{{ customer.phone_1 }}</td><td v-else>Sin datos</td>
                    <td v-if="customer.phone_2">{{ customer.phone_2 }}</td><td v-else>Sin datos</td>
                    <td v-if="customer.addresses">
                        <tr v-for="(address, index) in customer.addresses" :key="address.id">
                          <td>{{ address.address }}</td>
                          <td>{{ address.postcode }}</td>
                          <td>{{ address.city }}</td>
                          <td v-if="address.province">{{ address.province.name }}</td>
                          <td v-if="address.country">{{ address.country.name }}</td>
                       </tr>
                    </td> 
                    <td v-else>
                        Sin dirección
                    </td>
                      <td class="text-center">
                        <button type="button" class="btn btn-primary btn-sm">
                          <router-link :to="`/cliente/${customer.id}`"><i class="fas fa-eye"></i></router-link>
                        </button>
                      <button type="button" @click="edit(customer)" class="btn btn-primary btn-sm">
                        <i class="fas fa-edit"></i>
                      </button>
                      <button type="button" @click="destroy(customer)" class="btn btn-danger btn-sm">
                        <i class="fas fa-trash-alt"></i>
                      </button>
                    </td>
                  </tr>
                  <tr >
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
    <!-- Modal new -->
    <div
      class="modal fade"
      id="customerModalLong"
      tabindex="-1"
      role="dialog"
      aria-labelledby="customerModalLongTitle"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5
              class="modal-title"
              id="customerModalLongTitle"
            >{{ editMode ? "Editar" : "Añadir nuevo" }} Cliente</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form @submit.prevent="editMode ? update() : store()" @keydown="form.onKeydown($event)">
            <div class="modal-body">

              <alert-error :form="form"></alert-error>
              <div class="form-group row">
                <div class="col-4">
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
                <div class="col-4">
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
                <div class="col-4">
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
              </div>

              <div class="form-group row">
                <div class="col-4">
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
                <div class="col-4">
                  <label>Teléfono 1</label>
                  <input
                    v-model="form.phone_1"
                    type="text"
                    name="phone_1"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('phone_1') }"
                  >
                  <has-error :form="form" field="phone_1"></has-error>
                </div>
                <div class="col-4">
                  <label>Teléfono 2</label>
                  <input
                    v-model="form.phone_2"
                    type="text"
                    name="phone_2"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('phone_2') }"
                  >
                  <has-error :form="form" field="phone_2"></has-error>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-6">
                  <label>CIF</label>
                  <input
                    v-model="form.cif"
                    type="text"
                    name="cif"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('cif') }"
                  >
                  <has-error :form="form" field="cif"></has-error>
                </div>
                <div class="col-6">
                  <label>VAT number</label>
                  <input
                    v-model="form.vat_number"
                    type="text"
                    name="vat_number"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('vat_number') }"
                  >
                  <has-error :form="form" field="vat_number"></has-error>
                </div>  
              </div>
              
              <div v-if="!editMode">
                <hr>
                <div class="row">
                  <div class="form-group col-3">
                    <label>Alias de dirección</label>
                    <input
                      v-model="form.alias"
                      type="text"
                      name="alias"
                      class="form-control"
                      :class="{ 'is-invalid': form.errors.has('alias') }"
                    >
                    <has-error :form="form" field="alias"></has-error>
                  </div>
                  <div class="form-group col-6">
                    <label>Dirección</label>
                    <input
                      v-model="form.address"
                      type="text"
                      name="address"
                      class="form-control"
                      :class="{ 'is-invalid': form.errors.has('address') }"
                    >
                    <has-error :form="form" field="address"></has-error>
                  </div>
                  <div class="form-group col-3">
                    <label>Código Postal</label>
                    <input
                      v-model="form.postcode"
                      type="text"
                      name="postcode"
                      class="form-control"
                      :class="{ 'is-invalid': form.errors.has('postcode') }"
                    >
                    <has-error :form="form" field="postcode"></has-error>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-4">
                    <label>Ciudad</label>
                    <input
                      v-model="form.city"
                      type="text"
                      name="city"
                      class="form-control"
                      :class="{ 'is-invalid': form.errors.has('city') }"
                    >
                    <has-error :form="form" field="city"></has-error>
                  </div>
                  <div class="form-group col-4">
                    <label>Provincia</label>
                    <select v-model="form.province_id"
                            :class="{ 'is-invalid': form.errors.has('province_id') }"
                            class="form-control select2 select2-danger"
                            data-dropdown-css-class="select2-danger" style="width: 100%;">
                        <option v-for="province in provinces" :value="province.id">{{ province.name }}</option>
                      <option value="">Elegir una</option>
                    </select>
                    <has-error :form="form" field="province_id"></has-error>
                  </div>
                  <div class="form-group col-4">
                    <label>País</label>
                    <select v-model="form.country_id"
                            :class="{ 'is-invalid': form.errors.has('country_id') }"
                            class="form-control select2 select2-danger"
                            data-dropdown-css-class="select2-danger" style="width: 100%;">
                        <option v-for="country in countries" :value="country.id">{{ country.name }}</option>
                        <option value="">Elegir uno</option>
                    </select>
                    <has-error :form="form" field="country_id"></has-error>
                  </div>
                </div>

              </div>

              <div v-for="(address, index) in form.addresses" :key="address.id">
                <br>  
                <h5><strong>Dirección {{ index+1 }}</strong> ({{ address.alias }})</h5> 
                <hr>
                <div class="form-group row">
                  <div class="col-8">
                    <label>Dirección</label>
                    <input v-model="address.address"
                            type="text"
                            name="address"
                            class="form-control"
                            :class="{ 'is-invalid': form.errors.has('address') }">
                    <has-error :form="form" field="address"></has-error>
                  </div>
                  <div class="col-4">
                    <label>Código Postal</label>
                    <input v-model="address.postcode"
                            type="text"
                            name="postcode"
                            class="form-control"
                            :class="{ 'is-invalid': form.errors.has('postcode') }">
                    <has-error :form="form" field="postcode"></has-error>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-4">
                    <label>Ciudad</label>
                    <input v-model="address.city"
                            type="text"
                            name="city"
                            class="form-control"
                            :class="{ 'is-invalid': form.errors.has('city') }">
                    <has-error :form="form" field="city"></has-error>
                  </div>

                  <div class="col-4">
                    <label>Provincia</label>
                    <select v-model="address.province_id"
                            :class="{ 'is-invalid': form.errors.has('address.province_id') }"
                            class="form-control select2 select2-danger"
                            data-dropdown-css-class="select2-danger" style="width: 100%;">
                        <option v-for="province in provinces" :value="province.id">{{ province.name }}</option>
                        <option value="address.province_id">{{ address.province.name }}</option>
                    </select>
                    <has-error :form="form" field="address.province"></has-error>
                  </div>

                  <div class="col-4">
                    <label>País</label>
                    <select v-model="address.country_id"
                            :class="{ 'is-invalid': form.errors.has('address.country_id') }"
                            class="form-control select2 select2-danger"
                            data-dropdown-css-class="select2-danger" style="width: 100%;">
                        <option v-for="country in countries" :value="country.id">{{ country.name }}</option>
                        <option value="address.country_id">{{ address.country.name }}</option>
                    </select>
                    <has-error :form="form" field="address.country"></has-error>
                  </div>
                </div>

                <has-error :form="form" field="customer.addresses"></has-error>
              </div>
              <has-error :form="form" field="customer.addresses"></has-error>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button :disabled="form.busy" type="submit" class="btn btn-primary">Guardar cambios</button>
            </div>

          </form>
        </div>
      </div>
    </div>

    <vue-progress-bar></vue-progress-bar>
    <vue-snotify></vue-snotify>
  </div>
</template>

<script>
import moment from 'moment'

export default {
    name: 'CustomerList',
    mounted() {
        this.getData();
        this.getProvinces();
        this.getCountries();
        /* this.$store.dispatch("getProvince") */
    },
    data() {
        return {
            editMode: false,
            query: "",
            queryFiled: "firstname",
            customers: [],
            provinces:[],
            countries:[],


            form: new Form({
                id: "",
                firstname: "",
                lastname: "",
                company: "",
                email: "",
                phone_1: "",
                phone_2: "",
                cif: "",
                vat_number: "",
                alias:"",
                address:"",
                postcode:"",
                city:"",
                province_id:"",
                country_id:"",
                addresses:[],

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

    created() { },

    computed: { },

    methods: {

        getProvinces() {
            axios.get("/api/provincias")
                .then((res) => {
                    console.log(res.data.data);
                    this.provinces = res.data.data
                    this.$Progress.finish();
                }).catch((e) => {
                this.$Progress.fail();
                console.log(e)
            })
        },

        getCountries() {
            axios.get("/api/paises")
                .then((res) => {
                    console.log(res.data.data);
                    this.countries = res.data.data
                    this.$Progress.finish();
                }).catch((e) => {
                this.$Progress.fail();
                console.log(e)
            })
        },

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
                "No se puede deshacer!",
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
