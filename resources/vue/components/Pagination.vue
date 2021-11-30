<template>
  <div class="pagination">
    <span
      class="button material-icons first"
      @click="onClickFirstButton"
      v-bind:class="{ 'disabled': !hasFirst }"
    >
      keyboard_double_arrow_left
    </span>
    <span
      class="button material-icons prev"
      @click="onClickPrevButton"
      v-bind:class="{ 'disabled': !hasPrev }">
      chevron_left
    </span>
    <span class="label current-page">
      {{ paginationData.current_page }}
    </span>
    <span class="label page-separator"> | </span>
    <span class="label last-page">
      {{ paginationData.last_page }}
    </span>
    <span
      class="button material-icons next"
      @click="onClickNextButton"
      v-bind:class="{ 'disabled': !hasNext}"
    >
      chevron_right
    </span>
    <span
      class="button material-icons last"
      @click="onClickLastButton"
      v-bind:class="{ 'disabled': !hasLast }"
    >
      keyboard_double_arrow_right
    </span>
  </div>
</template>

<script lang="ts">
import Component from "vue-class-component";
import Vue from 'vue';

@Component({
  props: {
    paginationData: Object,
    onClickPrev: Function,
    onClickNext: Function,
    onClickFirst: Function,
    onClickLast: Function
  },
})
export default class Pagination extends Vue {
  get hasPrev(): boolean {
    return this.$props.paginationData.prev_page_url !== null;
  }

  get hasNext(): boolean {
    return this.$props.paginationData.next_page_url !== null;
  }

  get hasFirst(): boolean {
    return this.$props.paginationData.current_page !== 1;
  }

  get hasLast(): boolean {
    return this.$props.paginationData.current_page !== this.$props.paginationData.last_page;
  }

  public onClickFirstButton(): void {
    if (this.hasFirst) {
      this.$props.onClickFirst();
    }
  }

  public onClickPrevButton(): void {
    if (this.hasPrev) {
      this.$props.onClickPrev();
    }
  }

  public onClickNextButton(): void {
    if (this.hasNext) {
      this.$props.onClickNext();
    }
  }

  public onClickLastButton(): void {
    if (this.hasLast) {
      this.$props.onClickLast();
    }
  }
}
</script>
