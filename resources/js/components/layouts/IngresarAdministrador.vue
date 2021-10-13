<template>
  <div class="container">
    <h1>Ingreso de Administrador</h1>
    <hr />
    <form @submit="formSubmit" enctype="multipart/form-data">
      <div class="form-floating mb-3">
        <input
          type="text"
          class="form-control"
          id="floatingInput"
          placeholder="Juan Diego Reyes Zepeda"
          v-model="datos.nombre_completo"
        />
        <label for="floatingInput">Nombre Completo</label>
      </div>
      <div class="form-floating mb-3">
        <input
          type="email"
          class="form-control"
          id="floatingInput"
          placeholder="prueba@example.com"
          v-model="datos.correo"
        />
        <label for="floatingInput">Correo Electronico</label>
      </div>
      <div class="form-group">
        <label for="exampleFormControlFile1">Elegir Foto: </label>
        <input
          type="file"
          class="form-control-file"
          id="exampleFormControlFile1"
          v-on:change="onChange"
        />
      </div>
      <div class="form-floating mb-3">
        <input
          placeholder="contraseña"
          type="password"
          class="form-control"
          id="floatingInput"
          v-model="datos.password"
        />
        <label for="floatingInput">Contraseña</label>
      </div>
      <div class="form-floating">
        <select
          class="form-select"
          id="floatingSelect"
          aria-label="Floating label select example"
          v-model="datos.rol"
        >
          <option selected>Eligue el Rol</option>
          <option v-for="rol in roles" :key="rol.id" :value="rol.id">
            {{ rol.descripcion }}
          </option>
        </select>
        <label for="floatingSelect">Roles</label>
      </div>
      <br />
      <div class="d-grid gap-2 col-6 mx-auto">
        <button
          class="btn btn-block btn-lg"
          style="background-color: #42b883; color: white; font-weight: bold"
        >
          Upload
        </button>
      </div>
    </form>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "IngresarAdministrador",
  data() {
    return {
      roles: null,
      datos: {
        nombre_completo: "",
        fotografia: "",
        correo: "",
        password: "",
        rol: null,
      },
    };
  },
  mounted() {
    this.obtenerRoles();
  },
  methods: {
    obtenerRoles() {
      axios
        .get("http://127.0.0.1:8000/api/roles")
        .then((response) => {
          console.log(response);
          this.roles = response.data;
        })
        .catch((e) => {
          console.error(e);
        });
    },
    onChange(e) {
      this.datos.fotografia = e.target.files[0];
      console.log(this.datos.fotografia);
    },
    formSubmit(e) {
      e.preventDefault();
      let existingObj = this;
      // this.datos.fotografia = e.target.files[0];
      const config = {
        headers: {
          "content-type": "multipart/form-data",
          "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]')
            .content,
        },
      };
      let data = new FormData();
      data.append("nombre", this.datos.nombre_completo);
      data.append("file", this.datos.fotografia);
      data.append("correo", this.datos.correo);
      data.append("password", this.datos.password);
      data.append("rol", this.datos.rol);

      axios
        .post("http://127.0.0.1:8000/api/administrador", data, config)
        .then((res) => {
          existingObj.success = res.data.success;
        })
        .catch((err) => {
          existingObj.output = err;
        });
    },
  },
};
</script>