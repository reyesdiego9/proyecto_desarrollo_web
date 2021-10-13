<template>
  <div v-if="isAnAdmin == 1">
    <ul class="nav nav-tabs admin">
      <li class="nav-item">
        <a
          @click="activate(1)"
          class="nav-link"
          :class="{ active: this.active_el == 1 }"
          aria-current="page"
          href="#"
          >Ingresar</a
        >
      </li>
      <li class="nav-item">
        <a
          @click="activate(2)"
          class="nav-link"
          :class="{ active: this.active_el == 2 }"
          href="#"
          >Editar</a
        >
      </li>
    </ul>
    <br />
    <div class="container">
      <div v-if="this.active_el == 1">
        <ingresar-administrador></ingresar-administrador>
      </div>
      <div v-else>
        <p>hola</p>
      </div>
    </div>
  </div>
  <div v-else>
    <div class="card" style="width: 25rem; margin: 0 auto">
      <img
        src="http://images3.memedroid.com/images/UPLOADED21/5ef0cdac8b829.jpeg"
        class="card-img-top"
        alt="..."
      />
      <div class="card-body">
        <h5 class="card-title">Necesistas ser una administrador</h5>
        <p class="card-text">
          Debido a que no eres administrador, no tienes derecho a utilizar estas
          funciones
        </p>
      </div>
    </div>
  </div>
</template>

<script>
import IngresarAdministrador from "./layouts/IngresarAdministrador.vue";

export default {
  components: { IngresarAdministrador },
  name: "Administrador",
  data() {
    return {
      active_el: 1,
      isAnAdmin: null,
    };
  },
  methods: {
    activate(num) {
      this.active_el = num;
    },
  },
  created() {
    if (window.Laravel.user) {
      this.isAnAdmin = window.Laravel.user.id_rol;
    }
  },
  beforeRouteEnter(to, from, next) {
    if (!window.Laravel.isLoggedin) {
      window.location.href = "/";
    }
    next();
  },
};
</script>

<style>
/* .admin > .nav-item > .nav-link {
  color: #42b883 !important;
  font-weight: bold;
} */
</style>
