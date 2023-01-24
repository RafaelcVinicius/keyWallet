<template>
  <q-page class="flex-center flex-c">
    <span class="p-1 font-20">Login</span>
    <div class="column items-center" style="height: 150px; width: 300px">
      <div class="col">
        <q-input
          :size="30"
          outlined
          v-model="dados.email"
          @keyup.enter="logar"
          label="E-mail"
        />
      </div>
      <div class="col">
        <q-input
          :size="30"
          outlined
          v-model="dados.password"
          label="Password"
          @keyup.enter="logar"
        />
      </div>
      <div class="col">
        <q-btn
          color="white"
          style="background: #4c84ec"
          no-caps
          flat
          label="Entrar"
          @click="logar"
          @keyup.enter="logar"
        />
      </div>
    </div>
  </q-page>
</template>

<script>
import { mapActions } from "pinia";
import { storeMain } from "stores/storeMain";
export default {
  name: "LoginView",
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
  watch: {
    dados: {
      deep: true,
      handler(newValue) {
        if (newValue.email) this.error.email = "";
        if (newValue.password) this.error.password = "";
      },
    },
  },
  methods: {
    ...mapActions(storeMain, ["postLogin"]),
    logar() {
      if (this.validarLogin()) this.postLogin(this.dados);
    },
    validarLogin() {
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
