<template>
  <q-page class="flex-c flex-center">
    <span class="p-1 font-20">Cadastrar nova senha</span>
    <div class="column" style="height: 150px">
      <div class="col">1 of 3</div>
      <div class="col">1 of 3</div>
      <div class="col">1 of 3</div>
    </div>
  </q-page>
</template>

<script>
import { defineComponent } from "vue";

export default defineComponent({
  name: "NewKey",

  data() {
    return {
      dados: {
        email: "",
        password: "",
      },
      error: {
        email: "",
        password: "",
      },
    };
  },

  methods: {
    save() {},
  },
});
</script>
