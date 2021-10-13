<template>
  <div class="container table-responsive py-5">
    <table id="example" class="table table-bordered">
      <thead class="thead-dark">
        <tr>
          <th>Carnet</th>
          <th>Nombre</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="alumno in datosEstudiante" :key="alumno.id">
          <td>{{ alumno.carnet }}</td>
          <td>{{ alumno.nombre }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>


<script>
import "jquery/dist/jquery.min.js";
import "bootstrap/dist/css/bootstrap.min.css";
import "datatables.net-dt/js/dataTables.dataTables";
import "datatables.net-dt/css/jquery.dataTables.min.css";
import axios from "axios";
import $ from "jquery";

export default {
  name: "VerEstudiante",
  data() {
    return {
      datosEstudiante: [],
    };
  },
  mounted() {
    this.obtenerEstudiantes();
  },
  methods: {
    obtenerEstudiantes: async function () {
      await axios
        .get("http://127.0.0.1:8000/api/estudiante")
        .then((response) => {
          $("#example").DataTable().clear().destroy();
          this.datosEstudiante = response.data;
          $("#example").dataTable();
        })
        .catch((e) => {
          console.error(e);
        });
    },
  },
};
</script>