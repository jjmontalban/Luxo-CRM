<template>
  <div>
    <div v-if="!selectedCustomer"> <!-- Mostrar listado si no hay un cliente seleccionado -->
      <h1>Customers</h1>
      <button @click="createCustomer">Add New Customer</button>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Business Name</th>
            <th>Email</th>
            <th>Phone 1</th>
            <th>Phone 2</th>
            <th>NIF</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="customer in customers" :key="customer.id">
            <td>{{ customer.id }}</td>
            <td>{{ customer.name }}</td>
            <td>{{ customer.business_name }}</td>
            <td>{{ customer.email }}</td>
            <td>{{ customer.phone1 }}</td>
            <td>{{ customer.phone2 }}</td>
            <td>{{ customer.nif }}</td>
            <td>
              <button @click="viewCustomer(customer.id)">View</button>
              <button @click="deleteCustomer(customer.id)">Delete</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- Mostrar detalles del cliente si hay un cliente seleccionado -->
    <div v-if="selectedCustomer">
      <h2>Customer Details</h2>
      <p><strong>Name:</strong> {{ selectedCustomer.name }}</p>
      <p><strong>Business Name:</strong> {{ selectedCustomer.business_name }}</p>
      <p><strong>Email:</strong> {{ selectedCustomer.email }}</p>
      <p><strong>Phone 1:</strong> {{ selectedCustomer.phone1 }}</p>
      <p><strong>Phone 2:</strong> {{ selectedCustomer.phone2 }}</p>
      <p><strong>NIF:</strong> {{ selectedCustomer.nif }}</p>
      
      <button @click="editCustomer">Edit</button>
      <button @click="deleteCustomer(selectedCustomer.id)">Delete</button>
      <button @click="backToList">Back to List</button>
    </div>

    <!-- Mostrar formulario de edición -->
    <div v-if="isEditing">
      <h2>Edit Customer: {{ selectedCustomer.name }}</h2>
      <label>Name</label>
      <input v-model="editedCustomer.name" type="text" />

      <label>Business Name</label>
      <input v-model="editedCustomer.business_name" type="text" />

      <label>Email</label>
      <input v-model="editedCustomer.email" type="email" />

      <label>Phone 1</label>
      <input v-model="editedCustomer.phone1" type="text" />

      <label>Phone 2</label>
      <input v-model="editedCustomer.phone2" type="text" />

      <label>NIF</label>
      <input v-model="editedCustomer.nif" type="text" />

      <button @click="saveCustomer">Save</button>
      <button @click="cancelEdit">Cancel</button>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      customers: [],
      selectedCustomer: null, // Para almacenar el cliente seleccionado
      editedCustomer: {},
      isEditing: false,
    };
  },
  mounted() {
    this.fetchCustomers();
  },
  methods: {
    fetchCustomers() {
      axios.get('/Luxo-CRM/public/api/customers').then(response => {
        this.customers = response.data;
      }).catch(error => {
        console.error(error);
      });
    },
    viewCustomer(id) {
      axios.get(`/Luxo-CRM/public/api/customers/${id}`).then(response => {
        this.selectedCustomer = response.data;
        this.isEditing = false;
      }).catch(error => {
        console.error(error);
      });
    },
    deleteCustomer(id) {
      if (confirm("Are you sure you want to delete this customer?")) {
        axios.delete(`/Luxo-CRM/public/api/customers/${id}`).then(() => {
          this.fetchCustomers();
          this.selectedCustomer = null;
        }).catch(error => {
          console.error(error);
        });
      }
    },
    editCustomer() {
      this.isEditing = true;
      this.editedCustomer = { ...this.selectedCustomer }; // Clona los datos para editarlos
    },
    saveCustomer() {
      axios.put(`/Luxo-CRM/public/api/customers/${this.editedCustomer.id}`, this.editedCustomer)
        .then(() => {
          this.isEditing = false;
          this.selectedCustomer = { ...this.editedCustomer }; // Actualiza el cliente con los datos guardados
          this.fetchCustomers(); // Actualiza el listado de clientes
        }).catch(error => {
          console.error(error);
        });
    },
    cancelEdit() {
      this.isEditing = false; // Cancela la edición y vuelve a los detalles
    },
    backToList() {
      this.selectedCustomer = null; // Vuelve al listado de clientes
    },
  }
}
</script>
