<template>
  <div class="card">
    
      <div class="card-header">

          <h3 class="card-title"></h3>
          <div class="card-tools">
            <button @click="$router.go(-1)" type="button" class="btn btn-primary">VOLVER A LISTADO</button>
          </div>

      </div>
      
      <div class="card-body">
      
        <!-- Header -->
        <div class="mb-4">
          <div class="py-5">
            <div class="ml-4">
              <h2 class="font-weight-bold mb-4">{{ customer.firstname }} {{ customer.lastname }}</h2>
              <div class="text-muted">
                <h5 class="font-weight-bold mb-4">{{ mainAddress.city }} ({{ mainAddress.province.name }}). {{ mainAddress.country.name }}</h5>
              </div>
              <div class="text-muted">
                <a href="#" class="d-inline-block text-body">
                  <strong>234</strong>
                  <span class="text-muted">compras</span>
                </a>
                <strong>Última actualización:</strong>
                <span class="text-muted"> hace 1 año</span>
              </div>
            </div>
          </div>
          <hr class="m-0">
        </div>

        <div class="row">
          <div class="col">               
            <!-- Info -->
            <h3>Información Personal</h3>
            <div class="card mb-4">

              <div class="card-body">
                <div class="row mb-2">
                  <div class="col-md-3 text-muted">Empresa:</div>
                  <div v-if="customer.company" class="col-md-4">{{ customer.company }}</div> 
                  <div class="col-md-5">({{ customer.firstname }} {{ customer.lastname }})</div> 
                </div>

                <div class="row mb-2">
                  <div class="col-md-3 text-muted">Email:</div>
                  <div class="col-md-9">{{ customer.email }}</div>
                </div>

                <div class="row mb-2">
                  <div class="col-md-3 text-muted">Teléfonos:</div>
                  <div v-if="customer.phone_1" class="col-md-3">{{ customer.phone_1 }}</div>
                  <div v-if="customer.phone_2" class="col-md-1"> | </div>
                  <div v-if="customer.phone_2" class="col-md-4">{{ customer.phone_2 }}</div>
                </div>

                <h6 class="my-3">Información Fiscal</h6>

                <div v-if="customer.cif" class="row mb-2">
                  <div class="col-md-3 text-muted">CIF:</div>
                  <div class="col-md-9">{{ customer.cif }}</div>
                </div>
                <div v-if="customer.vat_number" class="row mb-2">
                  <div class="col-md-3 text-muted">VAT:</div>
                  <div class="col-md-9">{{ customer.vat_number }}</div>
                </div>

                <h6 class="my-3">Actividad</h6>

                <div class="row mb-2">
                  <div class="col-md-3 text-muted">Cliente desde:</div>
                  <div class="col-md-9">{{ customer.created_at }}</div>
                </div>
                <div class="row mb-2">
                  <div class="col-md-3 text-muted">última edición:</div>
                  <div class="col-md-9">Hace 4 meses</div>
                </div>
                
              </div>
              <div class="card-footer text-center p-0">
                <div class="row no-gutters row-bordered row-border-light">
                  <div class="d-flex col flex-column text-body py-3">
                    <div class="font-weight-bold">24</div>
                    <div class="text-muted small">compras</div>
                  </div>
                  <div class="d-flex col flex-column text-body py-3">
                    <div class="font-weight-bold">2.240€</div>
                    <div class="text-muted small">gastados</div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Info -->

            <!-- / Direcciones -->
            <h3>Direcciones</h3>
            <div v-for="(address, index) in customer.addresses" :key="address.id">
                <div class="card mb-4">
                  <div class="card-body">

                    <div class="row mb-2">
                      <div v-if="address.alias" class="col-md-12 text-muted"><strong>{{ address.alias }}</strong></div>
                    </div>

                    <div class="row mb-2">
                      <div v-if="address.address" class="col-md-12">{{ address.address }}. ({{ address.city }}. {{ address.postcode }} ({{ address.province.name }}). {{ address.country.name }}</div> 
                    </div>

                  </div>
                  <div class="card-footer text-center p-0">
                    <div class="row no-gutters row-bordered row-border-light">
                      <div class="d-flex col flex-column text-body py-3">
                        <div class="font-weight-bold"></div>
                        <div class="text-muted small"></div>
                      </div>
                      <div class="d-flex col flex-column text-body py-3">
                        <div class="font-weight-bold"></div>
                        <div class="text-muted small"></div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
          
          </div>
          <div class="col-xl-4">

            <!-- Side info -->
            <div class="card mb-4">
              <div class="card-header">
                WHATSAPP
              </div>
              <hr class="border-light m-0">
              <div class="card-body">
                <p class="mb-2">
                  Último contacto: {{ customer.updated_at }}  
                </p>
                 <p class="mb-2">
                  <button type="button" class="btn btn-primary">IR A CONVERSACIÓN</button>
                </p>
              </div>
            </div>
            
            <hr class="border-light m-0">

            <div class="card mb-4">
              <div class="card-header">
                CORRREO ELECTRÓNICO
              </div>
              <div class="card-body">
                <p class="mb-2">
                  <i class="ion ion-md-desktop ui-w-30 text-center text-lighter"></i>Último email: {{ customer.created_at }}
                </p>
                <p class="mb-2">
                  <button type="button" class="btn btn-primary">IR A EMAIL</button>
                </p>
              </div>
            </div>
            <!-- / Side info -->

            <!-- Productos + vendidos -->
            <div class="card mb-4">

              <div class="card-header">Productos + vendidos</div>
              <div class="card-body">
                <div class="mb-1">Decoración - <small class="text-muted">35%</small></div>
                <div class="progress mb-3" style="height: 4px;">
                  <div class="progress-bar bg-warning" style="width: 35%;"></div>
                </div>

                <div class="mb-1">Complementos - <small class="text-muted">15%</small></div>
                <div class="progress mb-3" style="height: 4px;">
                  <div class="progress-bar bg-success" style="width: 15%;"></div>
                </div>

                <div class="mb-1">Embalajes y Tejidos - <small class="text-muted">50%</small></div>
                <div class="progress" style="height: 4px;">
                  <div class="progress-bar bg-danger" style="width: 50%;"></div>
                </div>
              </div>
              <a href="javascript:void(0)" class="card-footer d-block text-center text-body small font-weight-semibold">Ver todas las compras</a>
            
            </div>

          </div>
        </div>

      </div>

      <!-- /.card-body -->
      <div class="card-footer">
          
      </div>
      <!-- /.card-footer-->
  </div>
</template>

<script>
export default {
    name: "customerView",

    data() {
        return {
          customer: [],
          mainAddress: [],
        }
    },

    mounted() {

        axios.get('/api/cliente/'+(this.$route.params.customerId))
            .then((res) => {
                console.log(res.data);
                this.customer = res.data;
                this.mainAddress = res.data.addresses[0];
                this.$Progress.finish();
            })
            .catch(() => {
                this.$Progress.fail();
                console.log(e)
            })
    },
    
}
</script>