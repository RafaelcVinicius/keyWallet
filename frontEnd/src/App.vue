<template>
  <router-view />
</template>

<script>
import { defineComponent } from "vue";
import { mapActions } from "pinia";
import { storeMain } from "stores/storeMain";

export default defineComponent({
  name: "App",

  created() {
    console.log(localStorage.token);
    if (localStorage.token.length) {
      this.requestUser();
    }
  },
  methods: {
    ...mapActions(storeMain, ["requestUser"]),
  },
});
</script>
