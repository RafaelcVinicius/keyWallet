<template>
  <q-page class="flex flex-center">
    <div class="column mw-1366 w-100 flex-ac" style="height: 350px">
      <div class="col flex gap-c2 m-1">
        <q-btn
          color="white"
          style="background: #4c84ec"
          no-caps
          flat
          label="Nova senha"
          to="new-key"
        />
        <q-btn
          color="white"
          style="background: #4c84ec"
          no-caps
          flat
          label="Gerenciar senhas"
          to="manager-key"
        />
      </div>
      <div class="col-8"><h3 class="text-primary">Key wallet</h3></div>
      <div class="col"></div>
    </div>
  </q-page>
</template>

<script>
import { defineComponent } from "vue";

export default defineComponent({
  name: "IndexPage",
});
</script>
