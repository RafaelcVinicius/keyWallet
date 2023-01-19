<template>
  <q-page class="flex flex-center">
    <div class="column items-center" style="height: 150px; width: 300px">
      <div class="col">
        <q-input :size="30" outlined v-model="text" label="E-mail" />
      </div>
      <div class="col">
        <q-input :size="30" outlined v-model="text" label="Password" />
      </div>
      <div class="col">
        <q-btn
          color="white"
          style="background: #4c84ec"
          no-caps
          flat
          label="Entrar"
          @click="increment"
        />
      </div>
    </div>
  </q-page>
</template>

<script>
import { defineComponent } from "vue";
import { api } from "src/boot/daxios.js";

export default defineComponent({
  name: "IndexPagedd",

  created() {
    api
      .get("get")
      .then((response) => {
        console.log(response);
      })
      .catch(() => {
        console.log(response);
      });
  },
});
</script>
