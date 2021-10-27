<template>
  <div class="container">
    <h1>{{ this.nombre.alumno }}</h1>
    <button
      type="button"
      data-toggle="modal"
      data-target="#exampleModal"
      class="btn btn-primary my-2"
    >
      Inscribir mas cursos
    </button>
    <ul class="list-group">
      <li v-for="carrera in carreras" :key="carrera.id" class="list-group-item">
        {{ carrera.nombre }}
      </li>
    </ul>
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
          <h5 class="modal-title" id="exampleModalLabel">Calificacion</h5>
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
          <div class="col-md-4">
            <label for="inputState" class="form-label">Carrera</label>
            <select v-model="elegirCarrera" class="form-select">
              <option
                v-for="lcarrera in listaCarreras"
                :value="lcarrera.id"
                :key="lcarrera.id"
              >
                {{ lcarrera.nombre }}
              </option>
            </select>
          </div>
          <div class="col-md-6">
            <label for="inputDate" class="form-label"
              >Fecha de Inscripcion</label
            >
            <input
              v-model="fecha"
              type="date"
              class="form-control"
              id="inputDate"
            />
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">
            Close
          </button>
          <button
            type="submit"
            class="btn btn-primary"
            @click="ingresarCarrera(this.$route.params.id)"
            data-dismiss="modal"
          >
            Inscribir
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  name: "Cursos",
  data() {
    return {
      carreras: [],
      nombre: [],
      listaCarreras: [],
      inscripcion: [],
    };
  },
  mounted() {
    this.listaCarrera();
    this.obtenerCarrera(this.$route.params.id);
  },
  methods: {
    obtenerCarrera: async function (id) {
      await axios
        .get(`http://127.0.0.1:8000/api/carrera/alumno/${id}`)
        .then((response) => {
          this.carreras = response.data;
          this.nombre = response.data[0];
        })
        .catch((e) => {
          console.error(e);
        });
    },
    listaCarrera: async function () {
      await axios
        .get("http://127.0.0.1:8000/api/carrera")
        .then((response) => {
          this.listaCarreras = response.data;
        })
        .catch((e) => {
          console.error(e);
        });
    },
    ingresarCarrera: async function (id) {
      const inscripcion = {
        carrera: this.elegirCarrera,
        fecha: this.fecha,
        id: this.$route.params.id,
      };
      await axios
        .post(`http://127.0.0.1:8000/api/asignatura/estudiante`, inscripcion)
        .then((res) => {
          console.log(res);
          this.obtenerCarrera(this.$route.params.id);
        })
        .catch((e) => {
          console.log(e.message);
        });
    },
  },
};
</script>