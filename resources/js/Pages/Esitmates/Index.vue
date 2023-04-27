<template>
    <div>
      <Head title="Estimates" />
      <h1 class="mb-8 text-3xl font-bold">Estimates</h1>
      <div class="flex items-center justify-between mb-6">
        <search-filter v-model="form.search" class="mr-4 w-full max-w-md" @reset="reset">
          <label class="block text-gray-700">Trashed:</label>
          <select v-model="form.trashed" class="form-select mt-1 w-full">
            <option :value="null" />
            <option value="with">With Trashed</option>
            <option value="only">Only Trashed</option>
          </select>
        </search-filter>
        <Link class="btn-indigo" href="/contacts/create">
          <span>Create</span>
          <span class="hidden md:inline">&nbsp;Estimate</span>
        </Link>
      </div>
      <div  v-for="estimate in estimates" :key="estimate.id">

        Estimates: {{esitimate.min_value_total}} -  {{esitimate.max_value_total}}
      </div>
</div>
  </template>
  
  <script>
  import { Head, Link } from '@inertiajs/vue3'

  
  export default {
    components: {
      Head,
      Link,
      SearchFilter,
    },
    layout: LeadformLayout,
    props: {
      filters: Object,
      estimates: Object,
    },
    data() {
    return {
        estimates:[
          id,
          esitimate.min_value_total,
          esitimate.max_value_total
        ]
    }
  }

}
  
  </script>
  