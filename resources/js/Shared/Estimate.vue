<template>
    <div>


      <div  v-for="estimate in estimates" :key="estimate.id">

        Estimates: {{esitimate.min_value_total}} -  {{esitimate.max_value_total}}
      </div>
</div>
  </template>
  
  <script>
  import { Head, Link } from '@inertiajs/vue3'

  
  export default {
    props: {
      filters: Object,
      estimates: Object,
    },
    data() {
    return {
        estimates:[]
        
    }
  }

}
  
  </script>
  