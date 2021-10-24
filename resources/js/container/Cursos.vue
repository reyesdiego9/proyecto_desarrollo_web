<template>
  <div class="container-md">
    <h1>{{ this.nombre.alumno }}</h1>
    <table
      id="example"
      class="table table-bordered table-striped table-borderless"
      style="text-align: center"
    >
      <thead class="thead-dark">
        <tr>
          <th>Clase</th>
          <th>Carrera</th>
          <th>Ciclo</th>
          <th>Año</th>
          <th>Primer Parcial</th>
          <th>Segundo Parcial</th>
          <th>Zona</th>
          <th>Parcial Final</th>
          <th>Nota Final</th>
          <th>Estado</th>
          <th v-if="isAnAdmin == 1">Calificar</th>
        </tr>
      </thead>

      <tbody>
        <tr v-for="clase in clasesEstudiante" :key="clase.id">
          <td>{{ clase.curso }}</td>
          <td>{{ clase.carrera }}</td>
          <td>{{ clase.ciclo }}</td>
          <td>{{ clase.year }}</td>
          <td>{{ clase.primer_parcial }}</td>
          <td>{{ clase.segundo_parcial }}</td>
          <td>{{ clase.zona }}</td>
          <td>{{ clase.examen_final }}</td>
          <td>{{ clase.nota_final }}</td>
          <td>{{ clase.descripcion }}</td>
          <td v-if="isAnAdmin == 1">
            <button
              type="button"
              class="btn btn-warning center"
              data-toggle="modal"
              data-target="#exampleModal"
              @click="obtenerNota(clase.id_indice)"
            >
              Calificar
            </button>
          </td>
        </tr>
      </tbody>
    </table>
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
          <form>
            <div class="form-group">
              <label for="primer_parcial">Primer Parcial</label>
              <input
                type="number"
                class="form-control"
                id="primer_parcial"
                name="primer_parcial"
                v-model="this.nota.primer_parcial"
              />
            </div>
            <div class="form-group">
              <label for="segundo_parcial">Segundo Parcial</label>
              <input
                type="number"
                class="form-control"
                id="segundo_parcial"
                name="segundo_parcial"
                v-model="this.nota.segundo_parcial"
              />
            </div>
            <div class="form-group">
              <label for="zona">Zona</label>
              <input
                type="number"
                class="form-control"
                id="zona"
                name="zona"
                v-model="this.nota.zona"
              />
            </div>
            <div class="form-group">
              <label for="examen_final">Final</label>
              <input
                type="number"
                class="form-control"
                id="examen_final"
                name="examen_final"
                v-model="this.nota.examen_final"
              />
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">
            Close
          </button>
          <button
            type="submit"
            class="btn btn-primary"
            @click="editarNota(nota.id)"
            data-dismiss="modal"
          >
            Calificar
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
      clasesEstudiante: [],
      nombre: [],
      nota: [],
      isAnAdmin: null,
      tableComponente: 0,
    };
  },
  mounted() {
    this.obtenerCursosEstudiante(this.$route.params.id);
    console.log(this.nombre.alumno);
  },
  created() {
    if (window.Laravel.user) {
      this.isAnAdmin = window.Laravel.user.id_rol;
    }
  },
  methods: {
    obtenerCursosEstudiante: async function (id) {
      await axios
        .get(`http://127.0.0.1:8000/api/asignatura/estudiante/${id}`)
        .then((response) => {
          this.clasesEstudiante = response.data;
          this.nombre = response.data[0];
          // console.log(response.data[0]);
        })
        .catch((e) => {
          console.error(e);
        });
    },
    obtenerNota: async function (id) {
      await axios
        .get(`http://127.0.0.1:8000/api/nota/${id}`)
        .then((response) => {
          this.nota = response.data;
        })
        .catch((e) => console.log(e));
    },
    editarNota: async function (id) {
      const nota = {
        ...this.nota,
        primer_parcial: parseInt(primer_parcial.value),
        segundo_parcial: parseInt(segundo_parcial.value),
        zona: parseInt(zona.value),
        examen_final: parseInt(examen_final.value),
        nota_final:
          parseInt(primer_parcial.value) +
          parseInt(segundo_parcial.value) +
          parseInt(zona.value) +
          parseInt(examen_final.value),
      };
      axios
        .patch(`http://127.0.0.1:8000/api/nota/${id}`, nota)
        .then((res) => {
          console.log(this.nota);
          this.obtenerCursosEstudiante(this.$route.params.id);
          // this.tableComponente = this.tableComponente + 1;
        })
        .catch((e) => {
          console.log(e.message);
        });
    },
  },
};
</script>