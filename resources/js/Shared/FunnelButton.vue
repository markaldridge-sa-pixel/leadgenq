<template>
    <button :disabled="funnelB" class="btn-cardblock flex items-center btn btn-indigo justify-center">
      <div v-if="funnelB" class="btn-spinner mr-2" />
      <slot />
    </button>

  </template>
  
  <script>
  export default {
    props: {
      funnelB: Boolean,
    },
  }
  </script>
  