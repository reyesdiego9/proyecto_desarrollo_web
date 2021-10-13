<template>
  <div>
    <nav
      class="navbar navbar-expand-lg navbar-dark d-flex"
      style="background-color: #35495e; color: white"
    >
      <div class="container-fluid">
        <router-link to="/dashboard" class="navbar-brand" href="#"
          >Navbar</router-link
        >
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item" v-if="isAnAdmin == 1">
              <router-link to="/administrador" class="nav-link active"
                >Administrador</router-link
              >
            </li>
            <li class="nav-item" v-if="isAnAdmin == 1">
              <router-link to="/estudiante" class="nav-link active"
                >Estudiante</router-link
              >
            </li>
            <li class="nav-item">
              <a class="nav-link disabled">Disabled</a>
            </li>
          </ul>
          <a
            class="nav-item ms-auto p-2"
            style="cursor: pointer"
            @click="logout"
            >Logout</a
          >
        </div>
      </div>
    </nav>
    <br />
    <div class="container">
      <router-view />
      <!-- <img :src="'./../upload/' + foto" alt="" width="100" height="100" /> -->
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  name: "Dashboard",
  data() {
    return {
      todos: null,
      name: null,
      isAnAdmin: null,
      foto: null,
    };
  },
  created() {
    if (window.Laravel.user) {
      this.name = window.Laravel.user.nombre_completo;
      this.foto = window.Laravel.user.fotografia;
      if (window.Laravel.user.id_rol == 1) {
        this.isAnAdmin = window.Laravel.user.id_rol;
      }
    }
  },
  mounted() {
    console.log("Component mounted.");
    this.getEstudiante();
  },
  methods: {
    getEstudiante() {
      axios
        .get("http://127.0.0.1:8000/api/administrador")
        .then((response) => {
          this.todos = response.data;
        })
        .catch((e) => console.log(e));
    },
    logout(e) {
      console.log("ss");
      e.preventDefault();
      this.$axios.get("/sanctum/csrf-cookie").then((response) => {
        axios
          .post("http://127.0.0.1:8000/api/exit")
          .then((response) => {
            if (response.data.success) {
              window.location.href = "/";
            } else {
              console.log(response);
            }
          })
          .catch(function (error) {
            console.error(error);
          });
      });
      `1d`;
    },
  },
  beforeRouteEnter(to, from, next) {
    if (!window.Laravel.isLoggedin) {
      window.location.href = "/";
    }
    next();
  },
};
</script>
