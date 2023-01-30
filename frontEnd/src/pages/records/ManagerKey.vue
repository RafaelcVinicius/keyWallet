<template>
  <!-- <q-page class="flex-c flex-start flex-ac">
    <span class="p-1 font-20 m-2t">Cadastrar nova senha</span>
    <div class="column" style="height: 150px">
      <div
        v-for="(key, i) in getWallet"
        :key="i"
        style="background-color: yellowgreen"
        class="col"
      >
        {{ key }}
      </div>
    </div>
  </q-page> -->
  <div class="q-pa-md">
    <q-table
      title="Treats"
      :rows="getWallet"
      :columns="columns"
      row-key="name"
      v-model:expanded="expanded"
    >
      <template v-slot:header="props">
        <q-tr :props="props">
          <q-th auto-width />

          <q-th v-for="col in props.cols" :key="col.name" :props="props">
            {{ col.label }}
          </q-th>
        </q-tr>
      </template>

      <template v-slot:body="props">
        <q-tr :props="props">
          <q-td auto-width>
            <q-toggle
              v-model="props.expand"
              checked-icon="add"
              unchecked-icon="remove"
            />
          </q-td>

          <q-td v-for="col in props.cols" :key="col.name" :props="props">
            {{ col.value }}
          </q-td>
        </q-tr>
        <q-tr v-show="props.expand" :props="props">
          <q-td colspan="100%">
            <div class="text-left">E-mail: {{ props.row.email }}</div>
            <div class="text-left">Password: {{ props.row.key }}</div>
          </q-td>
        </q-tr>
      </template>
    </q-table>
  </div>
</template>

<script>
import { defineComponent } from "vue";
import { mapActions } from "pinia";
import { mapState } from "pinia";
import { storeMain } from "stores/storeMain";

import { ref } from "vue";

export default defineComponent({
  name: "NewKey",
  setup() {
    return {
      expanded: ref([
        // Array of row keys
        "Ice cream sandwich",
      ]),

      columns,
      rows,
    };
  },
  computed: {
    ...mapState(storeMain, ["getWallet"]),
  },
  methods: {
    ...mapActions(storeMain, ["setWallet"]),
  },
  created() {
    this.setWallet();
    console.log(this.getWallet);
  },
});

const columns = [
  {
    name: "apelido",
    required: true,
    label: "Apelido",
    align: "left",
    field: (row) => row,
    format: (val) => `ID ${val.id} - ${val.apelido}`,
    sortable: true,
  },
  {
    name: "date",
    label: "Data",
    field: "created_at",
    sortable: true,
    sort: (a, b) => parseInt(a, 10) - parseInt(b, 10),
  },
];

const rows = [
  {
    name: "Free",
    created_at: "12/12/2023",
    email: "rafaelCOld@gsgs.fwaf",
    key: "dwadwadwadwad",
    id: 1,
  },
];
</script>
