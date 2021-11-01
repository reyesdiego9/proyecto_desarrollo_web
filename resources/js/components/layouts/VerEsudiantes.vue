<template>
  <div class="table-responsive">
    <table
      v-if="loader === false"
      class="table table-bordered table-striped table-borderless"
      style="text-align: center"
      id="myTable"
    >
      <thead class="thead-dark">
        <tr>
          <th>Carnet</th>
          <th>Nombre</th>
          <th>Informacion Personal</th>
          <th>Cursos Asignados</th>
          <th>Carrera</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="alumno in datosEstudiante" :key="alumno.id">
          <td>{{ alumno.carnet }}</td>
          <td>{{ alumno.nombre + " " + alumno.apellido }}</td>
          <td>
            <button
              type="button"
              class="btn btn-secondary center"
              data-toggle="modal"
              data-target="#exampleModal"
              @click="obtenerEstudiante(alumno.id)"
            >
              info
            </button>
          </td>
          <td>
            <router-link :to="{ name: 'cursos', params: { id: alumno.id } }">
              <button type="button" class="btn btn-danger">Cursos</button>
            </router-link>
          </td>
          <td>
            <router-link :to="{ name: 'carrera', params: { id: alumno.id } }">
              <button type="button" class="btn btn-success">Carrera</button>
            </router-link>
          </td>
        </tr>
      </tbody>
    </table>
    <div v-else class="spinner-border mx-auto" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>

  <div
    class="modal fade"
    id="exampleModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">
            Informacion del Estudiante
          </h5>
          <button
            type="button"
            class="close"
            data-dismiss="modal"
            aria-label="Close"
          >
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Carnet: {{ this.estudiante.carnet }}</p>
          <p>
            Nombre:
            {{ this.estudiante.nombre + " " + this.estudiante.apellido }}
          </p>
          <p>
            DPI:
            {{ this.estudiante.dpi }}
          </p>
          <p>Correo: {{ this.estudiante.correo }}</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">
            Close
          </button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
//Bootstrap and jQuery libraries
import "bootstrap/dist/css/bootstrap.min.css";
import "jquery/dist/jquery.min.js";
//Datatable Modules
import "datatables.net-dt/js/dataTables.dataTables";
import "datatables.net-dt/css/jquery.dataTables.min.css";
import $ from "jquery";
import axios from "axios";

export default {
  name: "VerEstudiante",
  data() {
    return {
      datosEstudiante: [],
      estudiante: [],
      isAnAdmin: "",
      loader: true,
    };
  },
  mounted() {
    this.obtenerEstudiantes();
  },
  created() {
    if (window.Laravel.user) {
      this.isAnAdmin = window.Laravel.user.id_rol;
    }
  },
  methods: {
    obtenerEstudiantes: async function () {
      await axios
        .get("http://127.0.0.1:8000/api/estudiante")
        .then((response) => {
          this.datosEstudiante = response.data;
          this.loader = false;
          $(document).ready(function () {
            $("#myTable").DataTable();
          });
        })
        .catch((e) => {
          console.error(e);
        });
    },
    obtenerEstudiante: async function (id) {
      await axios
        .get(`http://127.0.0.1:8000/api/estudiante/${id}`)
        .then((response) => {
          this.estudiante = response.data;
        })
        .catch((e) => {
          console.error(e);
        });
    },
  },
};
</script>