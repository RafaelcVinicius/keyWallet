<template>
  <q-page class="flex-c flex-center">
    <span class="p-1 font-20">Cadastrar nova senha</span>
    <div class="column items-center" style="height: 150px; width: 300px">
      <div class="col">
        <q-input
          :size="30"
          outlined
          v-model="dados.email"
          @keyup.enter="save"
          label="Apelido"
        />
      </div>
      <div class="col">
        <q-input
          :size="30"
          outlined
          v-model="dados.password"
          label="Password"
          @keyup.enter="save"
        />
      </div>
      <div class="col">
        <q-btn
          color="white"
          style="background: #4c84ec"
          no-caps
          flat
          label="Gravar"
          @click="save"
          @keyup.enter="save"
        />
      </div>
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
