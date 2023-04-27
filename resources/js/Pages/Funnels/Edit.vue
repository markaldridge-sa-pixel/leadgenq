<template>
    <div>
      <Head :title="form.name" />
      <h1 class="mb-8 text-3xl font-bold">
        <Link class="text-indigo-400 hover:text-indigo-600" href="/funnels">Funnels</Link>
        <span class="text-indigo-400 font-medium">/</span>
        {{ form.name }}
      </h1>
      <trashed-message v-if="funnel.deleted_at" class="mb-6" @restore="restore"> This funnel has been deleted. </trashed-message>
      <div class="max-w-3xl bg-white rounded-md shadow overflow-hidden">
        <form @submit.prevent="update">
          <div class="flex flex-wrap -mb-8 -mr-6 p-8">
            <text-input v-model="form.name" :error="form.errors.name" class="pb-8 pr-6 w-full lg:w-1/2" label="Id" />
            <select-input v-model="form.organization_id" :error="form.errors.organization_id" class="pb-8 pr-6 w-full lg:w-1/2" label="Organization">
            <option :value="null" />
            <option v-for="organization in organizations" :key="organization.id" :value="organization.id">{{ organization.name }}</option>
          </select-input>
          <select-input v-model="form.leadform_id" :error="form.errors.leadform_id" class="pb-8 pr-6 w-full lg:w-1/2" label="Leadform">
            <option :value="null" />
            <option v-for="leadform in leadforms" :key="leadform.id" :value="leadform.id">{{ leadform.name}}</option>
          </select-input>
            <text-input v-model="form.line_nr" :error="form.errors.line_nr" class="pb-8 pr-6 w-full lg:w-1/2" label="Line Nr" />
            <text-input v-model="form.question" :error="form.errors.question" class="pb-8 pr-6 w-full lg:w-1/2" label="Question" />
            <text-input v-model="form.qty" :error="form.errors.qty" class="pb-8 pr-6 w-full lg:w-1/2" label="Quantity" />
            <text-input v-model="form.min_value" :error="form.errors.min_value" class="pb-8 pr-6 w-full lg:w-1/2" label="Min Value" />
            <text-input v-model="form.max_value" :error="form.errors.max_value" class="pb-8 pr-6 w-full lg:w-1/2" label="Max Value" />
         </div>
          <div class="flex items-center px-8 py-4 bg-gray-50 border-t border-gray-100">
            <button v-if="!funnel.deleted_at" class="text-red-600 hover:underline" tabindex="-1" type="button" @click="destroy">Delete Funnel</button>
            <loading-button :loading="form.processing" class="btn-indigo ml-auto" type="submit">Update Funnel</loading-button>
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
  import TrashedMessage from '@/Shared/TrashedMessage'
  
  export default {
    components: {
      Head,
      Link,
      LoadingButton,
      SelectInput,
      TextInput,
      TrashedMessage,
    },
    layout: Layout,
    props: {
      funnel: Object,
      organizations: Array,
      leadforms: Array,
    },
    remember: 'form',
    data() {
      return {
        form: this.$inertia.form({
          name: this.funnel.name,
          organization_id: this.funnel.organization_id,
          line_nr: this.funnel.line_nr,
          question: this.funnel.question,
          qty: this.funnel.qty,
          min_value: this.funnel.min_value,
          max_value: this.funnel.max_value,
          leadform_id: this.funnel.leadforms_id,
        }),
      }
    },
    methods: {
      update() {
        this.form.put(`/funnels/${this.funnel.id}`)
      },
      destroy() {
        if (confirm('Are you sure you want to delete this funnel?')) {
          this.$inertia.delete(`/funnels/${this.funnel.id}`)
        }
      },
      restore() {
        if (confirm('Are you sure you want to restore this funnel?')) {
          this.$inertia.put(`/funnels/${this.funnel.id}/restore`)
        }
      },
    },
  }
  </script>
  