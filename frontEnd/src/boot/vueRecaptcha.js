import { boot } from "quasar/wrappers";
import { VueRecaptcha } from "vue-recaptcha";

// "async" is optional;
// more info on params: https://v2.quasar.dev/quasar-cli/boot-files
export default boot(({ app }) => {
  app.component("VueRecaptcha", VueRecaptcha);
});
