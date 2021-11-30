<template>
  <div class="loading-screen" v-if="loading === true">
    <div class="spinner spinner--jumper">
      <div class="first-circle"></div>
      <div class="second-circle"></div>
      <div class="third-circle"></div>
    </div>
  </div>
</template>

<script lang="ts">
import Vue from 'vue';
import Component from "vue-class-component";

@Component({
  props: {
    loading: Boolean,
  },
})
export default class LoadingScreen extends Vue {
}
</script>
