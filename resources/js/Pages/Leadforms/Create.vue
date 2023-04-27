<template>
    <div>
      <Head title="Create Leadform" />
      <h1 class="mb-8 text-3xl font-bold">
        <Link class="text-indigo-400 hover:text-indigo-600" href="/leadforms">Leadforms</Link>
        <span class="text-indigo-400 font-medium">/</span> Create
      </h1>
      <div class="max-w-3xl bg-white rounded-md shadow overflow-hidden">
        <form @submit.prevent="store">
          <div class="flex flex-wrap -mb-8 -mr-6 p-8">
            <text-input v-model="form.name" :error="form.errors.id" class="pb-8 pr-6 w-full lg:w-1/2" label="Name" />
            <select-input v-model="form.organization_id" :error="form.errors.organization_id" class="pb-8 pr-6 w-full lg:w-1/2" label="Organization">
            <option :value="null" />
            <option v-for="organization in organizations" :key="organization.id" :value="organization.id">{{ organization.name }}</option>
          </select-input>
          <select-input v-model="form.funnel_id" :error="form.errors.funnel_id" class="pb-8 pr-6 w-full lg:w-1/2" label="Funnel ID">
            <option :value="null" />
            <option v-for="funnel in funnels" :key="funnel.id" :value="funnel.id">{{ funnel.name }}</option>
          </select-input>
          </div>
          <div class="flex items-center justify-end px-8 py-4 bg-gray-50 border-t border-gray-100">
            <loading-button :loading="form.processing" class="btn-indigo" type="submit">Create Leadform</loading-button>
          </div>
        </form>
      </div>
    </div>
  </template>
  
  <script>
  import { Head, Link } from '@inertiajs/vue3'
  import Layout from '@/Shared/Layout'
  import TextInput from '@/Shared/TextInput'
  import SelectInput from '@/Shared/SelectInput'
  import LoadingButton from '@/Shared/LoadingButton'
  
  export default {
    components: {
      Head,
      Link,
      LoadingButton,
      SelectInput,
      TextInput,
    },
    layout: Layout,
    props: {
    organizations: Array,
    funnels: Array,
    leadforms: Object,
  },
    remember: 'form',
    data() {
      return {
        form: this.$inertia.form({
          name: null,
          organization_id: null,
          funnel_id: null,
        }),
      }
    },
    methods: {
      store() {
        this.form.post('/leadforms')
      },
    },
  }
  </script>
  