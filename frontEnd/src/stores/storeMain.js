import { defineStore } from "pinia";
import { api } from "boot/axios";

export const storeMain = defineStore("storeMain", {
  id: "storeMain",
  state: () => ({
    user: {},
  }),
  getters: {
    userLogado: (state) => state.user,
  },
  actions: {
    requestUser() {
      console.log("dd");
      api
        .get("/user", {
          headers: {
            Authorization: "Bearer " + localStorage.token,
          },
        })
        .then((res) => {
          this.user = res.data;
          console.log(this.user);
        })
        .catch(() => {
          localStorage.token = "";
        });
    },

    postLogin(dados) {
      console.log(dados);
      api
        .post("/login", dados)
        .then((res) => {
          localStorage.token = res.data.token;
          this.user = res.data;
          window.location.href = "/";
        })
        .catch((error) => {
          console.log("error", error.response.data.message);
        });
    },
    postRegister(dados) {
      console.log(dados);
      api
        .post("/register", dados)
        .then((res) => {
          localStorage.token = res.data.token;
          this.user = res.data;
          window.location.href = "/";
          console.log(res);
        })
        .catch((error) => {
          console.log("error", error.response.data.message);
        });
    },

    deslogar() {
      localStorage.token = "";
      this.user = {};
      window.location.href = "/";
    },
  },
});
