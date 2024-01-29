require("./bootstrap");

// import Alpine from 'alpinejs';

// window.Alpine = Alpine;

// Alpine.start();

import Vue from "vue";
import ExampleComponent from "./components/ExampleComponent.vue";
import OutpassComponent from "./components/OutpassComponent.vue";

Vue.component("outpass-component", OutpassComponent);

const app = new Vue({
    el: "#app",
});
