<template>
  <div class="container-sm">
    <h3>Ingreso de Alumno</h3>
    <hr />
    <form enctype="multipart/form-data">
      <div class="form-floating mb-3">
        <input
          type="text"
          class="form-control"
          id="floatingInput"
          placeholder="Juan Diego"
          v-model="nombre"
        />
        <label for="floatingInput">Nombre</label>
      </div>
      <div class="form-floating mb-3">
        <input
          type="text"
          class="form-control"
          id="floatingInput"
          placeholder="Reyes Zepeda"
          v-model="apellido"
        />
        <label for="floatingInput">Apellido</label>
      </div>
      <div class="form-floating mb-3">
        <input
          type="text"
          class="form-control"
          id="floatingInput"
          placeholder="Ingrese su DPI"
          v-model="dpi"
        />
        <label for="floatingInput">Dpi</label>
      </div>
      <div class="form-floating mb-3">
        <input
          type="date"
          class="form-control"
          id="floatingInput"
          placeholder="Ingrese su DPI"
          v-model="fechaNacimiento"
        />
        <label for="floatingInput">Fecha de nacimiento</label>
      </div>
      <div class="form-group">
        <label for="exampleFormControlFile1">Elegir Foto: </label>
        <input
          type="file"
          class="form-control-file"
          id="exampleFormControlFile1"
        />
      </div>
      <div class="form-floating mb-3">
        <input
          type="email"
          class="form-control"
          id="floatingInput"
          placeholder="prueba@example.com"
          v-model="correo"
        />
        <label for="floatingInput">Correo Electronico</label>
      </div>
      <div class="form-floating mb-3">
        <input
          placeholder="contraseña"
          type="password"
          class="form-control"
          id="floatingInput"
          v-model="password"
        />
        <label for="floatingInput">Contraseña</label>
      </div>
      <br />
      <div class="d-grid gap-2 col-6 mx-auto">
        <button
          class="btn btn-block btn-lg"
          style="background-color: #42b883; color: white; font-weight: bold"
        >
          Registrar Alumno
        </button>
      </div>
    </form>
  </div>
</template>


<script>
export default {
  name: "IngresoAlumno",
  setup() {},
};
</script>