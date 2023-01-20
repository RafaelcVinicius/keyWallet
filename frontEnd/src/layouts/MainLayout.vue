<template>
  <q-layout view="lHh Lpr lFf">
    <q-header elevated>
      <q-toolbar>
        <q-btn
          flat
          dense
          round
          icon="menu"
          aria-label="Menu"
          @click="toggleLeftDrawer"
        />

        <q-toolbar-title>
          <q-btn style="background: #4c84ec" flat to="/" label="Key wallet" />
        </q-toolbar-title>
        <div v-if="!userLogado.id">
          <q-btn unelevated to="/login" label="Entrar" no-caps class="m-1r" />
          <q-btn
            color="white"
            text-color="blue"
            unelevated
            to="/register"
            label="Registre-se"
            no-caps
          />
        </div>
        <div v-else>
          <q-btn unelevated @click="deslogar" label="Sair" no-caps />
        </div>
      </q-toolbar>
    </q-header>

    <q-drawer v-model="leftDrawerOpen" show-if-above bordered>
      <q-list>
        <q-item-label header>Key wallet</q-item-label>

        <EssentialLink
          v-for="link in essentialLinks"
          :key="link.title"
          v-bind="link"
        />
      </q-list>
    </q-drawer>

    <q-page-container>
      <router-view />
    </q-page-container>
  </q-layout>
</template>

<script>
import { defineComponent, ref } from "vue";
import EssentialLink from "components/EssentialLink.vue";
import { storeMain } from "stores/storeMain";
import { mapActions, mapState } from "pinia";

const linksList = [
  {
    title: "Github",
    caption: "github.com/quasarframework",
    icon: "code",
    link: "https://github.com/RafaelcVinicius",
  },
];

export default defineComponent({
  name: "MainLayout",

  components: {
    EssentialLink,
  },
  computed: {
    ...mapState(storeMain, ["userLogado"]),
  },
  methods: {
    ...mapActions(storeMain, ["deslogar"]),
    ...mapActions(storeMain, ["requestUser"]),

    t() {
      this.requestUser();
      console.log(this.requestUser);
    },
  },
  setup() {
    const leftDrawerOpen = ref(false);

    return {
      essentialLinks: linksList,
      leftDrawerOpen,
      toggleLeftDrawer() {
        leftDrawerOpen.value = !leftDrawerOpen.value;
      },
    };
  },
});
</script>
