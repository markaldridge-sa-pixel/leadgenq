<template>
    <div>
      <Head :title="form.name" />
      <h1 class="mb-8 text-3xl font-bold">
        <Link class="text-indigo-400 hover:text-indigo-600" href="/leadforms">Leadforms</Link>
        <span class="text-indigo-400 font-medium">/</span>
        {{ form.name }}
      </h1>
      <trashed-message v-if="leadform.deleted_at" class="mb-6" @restore="restore"> This leadform has been deleted. </trashed-message>
      <div class="max-w-3xl bg-white rounded-md shadow overflow-hidden">
        <form @submit.prevent="update">
          <div class="flex flex-wrap -mb-8 -mr-6 p-8">
            <text-input v-model="form.id" :error="form.errors.id" class="pb-8 pr-6 w-full lg:w-1/2" label="Id" />
            <text-input v-model="form.name" :error="form.errors.name" class="pb-8 pr-6 w-full lg:w-1/2" label="Name" />
            <select-input v-model="form.organization_id" :error="form.errors.organization_id" class="pb-8 pr-6 w-full lg:w-1/2" label="Organization">
            <option :value="null" />
            <option v-for="organization in organizations" :key="organization.id" :value="organization.id">{{ organization.name }}</option>
          </select-input>
                     
         </div>
          <div class="flex items-center px-8 py-4 bg-gray-50 border-t border-gray-100">
            <button v-if="!leadform.deleted_at" class="text-red-600 hover:underline" tabindex="-1" type="button" @click="destroy">Delete Leadform</button>
            <loading-button :loading="form.processing" class="btn-indigo ml-auto" type="submit">Update Leadform</loading-button>
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
      leadform: Object,
      organizations: Array,
      leadforms: Array,
    },
    remember: 'form',
    data() {
      return {
        form: this.$inertia.form({
          id: this.leadform.id,
          name: this.leadform.name,
          organization_id: this.leadform.organization_id,
        }),
      }
    },
    methods: {
      update() {
        this.form.put(`/leadforms/${this.leadform.id}`)
      },
      destroy() {
        if (confirm('Are you sure you want to delete this leadform?')) {
          this.$inertia.delete(`/leadforms/${this.leadform.id}`)
        }
      },
      restore() {
        if (confirm('Are you sure you want to restore this leadform?')) {
          this.$inertia.put(`/leadforms/${this.leadform.id}/restore`)
        }
      },
    },
  }
  </script>
  