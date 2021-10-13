<template>
  <div v-if="isLoggedIn">
    <dashboard></dashboard>
  </div>
  <section class="vh-100" style="background-color: #42b883" v-else>
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card shadow-2-strong" style="border-radius: 1rem">
            <div class="card-body p-5 text-center">
              <div
                class="alert alert-danger"
                role="alert"
                v-if="form.error !== null"
              >
                {{ form.error }}
              </div>
              <h3 class="mb-5">Iniciar Sesion</h3>

              <div class="form-outline mb-4">
                <input
                  type="email"
                  id="typeEmailX"
                  class="form-control form-control-lg"
                  v-model="form.correo"
                />
                <label class="form-label" for="typeEmailX">Correo</label>
              </div>

              <div class="form-outline mb-4">
                <input
                  type="password"
                  id="typePasswordX"
                  class="form-control form-control-lg"
                  v-model="form.password"
                />
                <label class="form-label" for="typePasswordX">Contraseña</label>
              </div>

              <button
                class="btn btn-lg btn-block"
                style="background-color: #35495e; color: white"
                type="submit"
                @click="login"
              >
                Login
              </button>

              <hr class="my-4" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import axios from "axios";
import Dashboard from "./Dashboard.vue";

export default {
  name: "Login",
  mounted() {
    console.log("Component mounted.");
  },
  components: {
    Dashboard,
  },
  data: () => ({
    isLoggedIn: false,
    form: {
      correo: "",
      password: "",
      error: null,
    },
  }),
  created() {
    if (window.Laravel.isLoggedin) {
      this.isLoggedIn = true;
    }
  },
  methods: {
    login() {
      const router = this.$router;
      if (this.form.password.length > 0) {
        axios.get("/sanctum/csrf-cookie").then((response) => {
          axios
            .post("http://127.0.0.1:8000/api/adminLogin", {
              correo: this.form.correo,
              password: this.form.password,
            })
            .then((response) => {
              console.log(response.data);
              if (response.data.success) {
                this.$router.go("/dashboard");
              } else {
                this.form.error = response.data.message;
              }
            })
            .catch((e) => {
              console.error(e);
            });
        });
      }
    },
  },
  beforeRouteEnter(to, from, next) {
    if (window.Laravel.isLoggedin) {
      return next("dashboard");
    }
    next();
  },
};
</script>