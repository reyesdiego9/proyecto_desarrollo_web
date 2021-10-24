<template>
  <div>
    <h1>{{ this.nombre.alumno }}</h1>
    <p v-for="carrera in carreras" :key="carrera.id">{{ carrera.nombre }}</p>
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
    };
  },
  mounted() {
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
  },
};
</script>