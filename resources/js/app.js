require("./bootstrap");

// import Alpine from 'alpinejs';

// window.Alpine = Alpine;

// Alpine.start();

import Vue from "vue";
import ExampleComponent from "./components/ExampleComponent.vue";

Vue.component("example-component", ExampleComponent);

const app = new Vue({
    el: "#app",
});
