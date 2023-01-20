<template>
  <q-page class="flex flex-center">
    <div class="column items-center" style="height: 200px; width: 300px">
      <div class="col">
        <q-input
          :size="30"
          outlined
          v-model="dados.name"
          @keyup.enter="register"
          label="Name"
        />
      </div>
      <div class="col">
        <q-input
          :size="30"
          outlined
          v-model="dados.email"
          @keyup.enter="register"
          label="E-mail"
        />
      </div>
      <div class="col">
        <q-input
          :size="30"
          outlined
          v-model="dados.password"
          label="Password"
        />
      </div>
      <div class="col">
        <q-btn
          color="white"
          style="background: #4c84ec"
          no-caps
          flat
          label="Entrar"
          @click="register"
          @keyup.enter="register"
        />
      </div>
    </div>
  </q-page>
</template>

<script>
import { mapActions } from "pinia";
import { storeMain } from "stores/storeMain";
export default {
  name: "registerView",
  data() {
    return {
      dados: {
        email: "",
        password: "",
        name: "",
      },
      error: {
        email: "",
        password: "",
        name: "",
      },
    };
  },
  methods: {
    ...mapActions(storeMain, ["postRegister"]),
    register() {
      if (this.validarRegister()) this.postRegister(this.dados);
    },
    validarRegister() {
      if (!this.dados.email.length > 0) {
        console.log("* Campo obrigatório.");
        this.error.email = "* Campo obrigatório.";
      }
      if (!this.dados.password.length > 0) {
        console.log("* Campo obrigatório.");
        this.error.password = "* Campo obrigatório.";
      }
      if (this.error.password.length > 0 || this.error.email.length > 0)
        return false;
      return true;
    },
  },
};
</script>
