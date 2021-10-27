<template>
  <div>
    <ul class="nav nav-tabs admin">
      <li class="nav-item">
        <a
          @click="activate(1)"
          class="nav-link"
          :class="{ active: this.$store.getters.active == 1 }"
          aria-current="page"
          href="#"
          >Ingresar</a
        >
      </li>
      <li class="nav-item">
        <a
          @click="activate(2)"
          class="nav-link"
          :class="{ active: this.$store.getters.active == 2 }"
          href="#"
          >Editar</a
        >
      </li>
    </ul>
    <br />
    <div class="container">
      <div v-if="this.$store.getters.active == 1">
        <p>pp</p>
      </div>
      <div v-else>
        <ver-esudiantes></ver-esudiantes>
      </div>
    </div>
  </div>
</template>

<script>
import VerEsudiantes from "./layouts/VerEsudiantes.vue";
export default {
  components: { VerEsudiantes },

  name: "Estudiante",
  data() {
    return {
      active_el: 1,
      isAnAdmin: null,
    };
  },
  mounted() {
    console.log("hola");
  },
  methods: {
    activate(num) {
      this.$store.commit("change", num);
      this.active_el = num;
    },
  },
};
</script>
