<template>
    <!-- <div class="container-fluid">
        <div class="row justify-content-around ">
            <div class="col-md-8">
                <div class="card card-primary my-5">
                    <div class="card-header">
                        <h3 class="card-title">customer view</h3>

                        <p><strong>· Empresa : {{ customer.company }}</strong></p>
            <p><strong>· Email :</strong> {{ customer.email }}</p>
            <p><strong v-if="customer.phone_1">· Teléfono 1: </strong>{{ customer.phone_1 }}</p>
            <p><strong v-if="customer.phone_2">· Teléfono 2 : </strong>{{ customer.phone_2 }}</p>
            <p><strong v-if="customer.cif">· CIF :</strong> {{ customer.cif }}</p>
            <p><strong v-if="customer.vat_number">· VAT : </strong>{{ customer.vat_number }}</p>
            <p><strong>· Fecha creación : </strong>{{ customer.created_at }}</p>
            <p><strong>· Fecha modificación : </strong>{{ customer.updated_at }}</p>

            <td v-if="customer.addresses">
              <tr v-for="(address, index) in customer.addresses" :key="address.id">
                <p><strong>· {{ address.alias }}:</strong></p>
                <p>&nbsp;&nbsp;&nbsp;{{ address.address }}. {{ address.postcode }} {{ address.city }} ({{ address.province.name }}). {{ address.country.name }}</p> 
              </tr>
            </td>
                       
                    </div>
                </div>
            </div>
        </div>
    </div> -->
<!--     <div class="layout-content">
 -->
          <!-- Content -->
          <div class="container">

            <!-- Header -->
            <div class="container-m-nx container-m-ny theme-bg-white mb-4">
              <div class="media col-md-10 col-lg-8 col-xl-7 py-5 mx-auto">
                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="d-block ui-w-100 rounded-circle">
                <div class="media-body ml-5">
                  <h4 class="font-weight-bold mb-4">{{ customer.firstname }} {{ customer.lastname }}</h4>

                  <div class="text-muted mb-4">
                    {{ mainAddress.city }} ({{ mainAddress.province.name }}). {{ mainAddress.country.name }}
                  </div>

                  <a href="javascript:void(0)" class="d-inline-block text-body">
                    <strong>234</strong>
                    <span class="text-muted">compras</span>
                  </a>
                  <strong>Última actualización:</strong>
                  <span class="text-muted"> hace 1 año</span>
                </div>
              </div>
              <hr class="m-0">
            </div>

            <div class="row">
              <div class="col">

                <!-- Info -->
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
                    <a href="javascript:void(0)" class="btn btn-primary rounded-pill">Nuevo Whatsapp</a>
                  </div>
                  <hr class="border-light m-0">
                  <div class="card-body">
                    <p class="mb-2">
                      <i class="ion ion-md-desktop ui-w-30 text-center text-lighter"></i>Último contacto: {{ customer.updated_at }}
                    </p>
                    <p class="mb-0">
                      <i class="ion ion-md-globe ui-w-30 text-center text-lighter"></i>
                      <a href="javascript:void(0)" class="text-body">Ir a conversación</a>
                    </p>
                  </div>
                  <hr class="border-light m-0">
                  <div class="card-header">
                    <a href="javascript:void(0)" class="btn btn-primary rounded-pill">Nuevo Email</a>
                  </div>
                  <div class="card-body">
                   <p class="mb-2">
                      <i class="ion ion-md-desktop ui-w-30 text-center text-lighter"></i>Último contacto: {{ customer.created_at }}
                    </p>
                    <a href="javascript:void(0)" class="d-block text-body mb-2">
                      <i class="ion ion-logo-facebook ui-w-30 text-center text-facebook"></i> Ir al email
                    </a>
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
                <!-- / Skills -->

               

             

              </div>
            </div>

          </div>
</template>

<script>
export default {
    name: "customerView",

    /* mounted() {
       this.getCustomer();
    }, */

    data() {
        return {
          customer: [],
          mainAddress: [],
        }
    },
    computed: {
        
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
<style>
body{margin-top:20px;
background: #f5f5f5;
}
.theme-bg-white {
    background-color: #fff !important;
}
.ui-w-100 {
    width: 100px !important;
    height: auto;
}
.ui-w-40 {
    width: 40px !important;
    height: auto;
}
.row-bordered>.col::before, .row-bordered>[class^="col-"]::before, .row-bordered>[class*=" col-"]::before, .row-bordered>[class^="col "]::before, .row-bordered>[class*=" col "]::before, .row-bordered>[class$=" col"]::before, .row-bordered>[class="col"]::before {
    content: "";
    position: absolute;
    right: 0;
    bottom: -1px;
    left: 0;
    display: block;
    height: 0;
    border-top: 1px solid rgba(24,28,33,0.06);
}
.row-bordered>.col::after, .row-bordered>[class^="col-"]::after, .row-bordered>[class*=" col-"]::after, .row-bordered>[class^="col "]::after, .row-bordered>[class*=" col "]::after, .row-bordered>[class$=" col"]::after, .row-bordered>[class="col"]::after {
    content: "";
    position: absolute;
    top: 0;
    bottom: 0;
    left: -1px;
    display: block;
    width: 0;
    border-left: 1px solid rgba(24,28,33,0.06);
}

.ui-bg-cover {
    background-color: rgba(0,0,0,0);
    background-position: center center;
    background-size: cover;
}

.ui-square {
    padding-top: 100% !important;
}
.ui-square, .ui-rect, .ui-rect-30, .ui-rect-60, .ui-rect-67, .ui-rect-75 {
    position: relative !important;
    display: block !important;
    padding-top: 100% !important;
    width: 100% !important;
}
</style>