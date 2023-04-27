<template>
  <div>
    <Head title="Lead Forms" />
    <h1 class="mb-8 text-3xl font-bold">Lead Forms</h1>
    <div class="flex items-center justify-between mb-6">
      <search-filter v-model="form.search" class="mr-4 w-full max-w-md" @reset="reset">
        <label class="block text-gray-700">Trashed:</label>
        <select v-model="form.trashed" class="form-select mt-1 w-full">
          <option :value="null" />
          <option value="with">With Trashed</option>
          <option value="only">Only Trashed</option>
        </select>
      </search-filter>
      <Link class="btn-indigo" href="/leadforms/create">
        <span>Create</span>
        <span class="hidden md:inline">&nbsp;Lead Form</span>
      </Link>
    </div>
    <div class="bg-white rounded-md shadow overflow-x-auto">
      <table class="w-full whitespace-nowrap">
        <tr class="text-left font-bold">
          <th class="pb-4 pt-6 px-6">Leadform Id</th>
          <th class="pb-4 pt-6 px-6">Leadform Name</th>
          <th class="pb-4 pt-6 px-6">Orginization</th>
          
                  
        </tr>
        <tr v-for="leadform in leadforms.data" :key="leadform.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
          <td class="border-t">
            <Link class="flex items-center px-6 py-4 focus:text-indigo-500" :href="`/leadforms/${leadform.id}/edit`">
              {{ leadform.id }}
              <icon v-if="leadform.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
            </Link>
          </td>
          <td class="border-t">
            <Link class="flex items-center px-6 py-4" :href="`/leadforms/${leadform.id}/edit`" tabindex="-1">
              <div v-if="leadform.name">
              {{ leadform.name }}
            </div>
            </Link>
          </td>
          <td class="border-t">
            <Link class="flex items-center px-6 py-4" :href="`/leadforms/${leadform.id}/edit`" tabindex="-1">
              <div v-if="leadform.organization">
                {{ leadform.organization.name }}
              </div>
            </Link>
            </td>
              <td class="w-px border-t">
            <Link class="flex items-center px-6 py-4" :href="`/leadforms/${leadform.id}/view`" tabindex="-1">
              <div>
                <icon name="eye-view" class="block w-6 h-6 fill-gray-400" />
              </div>
            </Link>
          </td>
            
        </tr>
        <tr v-if="leadforms.data.length === 0">
          <td class="px-6 py-4 border-t" colspan="4">No leadform found.</td>
        </tr>
      </table>
    </div>
    <pagination class="mt-6" :links="leadforms.links" />
  </div>
</template>

<script>
import { Head, Link } from '@inertiajs/vue3'
import Icon from '@/Shared/Icon'
import pickBy from 'lodash/pickBy'
import Layout from '@/Shared/Layout'
import throttle from 'lodash/throttle'
import Pagination from '@/Shared/Pagination'
import SearchFilter from '@/Shared/SearchFilter'

export default {
  components: {
    Head,
    Icon,
    Link,
    Pagination,
    SearchFilter,
  },
  layout: Layout,
  props: {
    filters: Object,
    leadforms: Object,
    funnels: Object,
    estimates: Object,
    },
  data() {
    return {
      form: {
        search: this.filters.search,
        trashed: this.filters.trashed,
      },
    }
  },
  watch: {
    form: {
      deep: true,
      handler: throttle(function () {
        this.$inertia.get('/leadforms', pickBy(this.form), { preserveState: true })
      }, 150),
    },
  },
  methods: {
    reset() {
      this.form = mapValues(this.form, () => null)
    },
  },
 
}
</script>
