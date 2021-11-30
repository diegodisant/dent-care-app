<template>
  <div>
    {{message}}
  </div>
</template>

<script lang="ts">
export default {
  computed: {},
  mounted(): void {
    console.log('Component mounted');
  },
  data(): object {
    return {
      message: 'Welcome to Appointments Module :D',
    };
  }
};
</script>
