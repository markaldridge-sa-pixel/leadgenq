<template>
  <div>
    <Head title="Funnels" />
    <h1 class="mb-8 text-3xl font-bold">Funnels</h1>
    <div class="flex items-center justify-between mb-6">
      <search-filter v-model="form.search" class="mr-4 w-full max-w-md" @reset="reset">
        <label class="block text-gray-700">Trashed:</label>
        <select v-model="form.trashed" class="form-select mt-1 w-full">
          <option :value="null" />
          <option value="with">With Trashed</option>
          <option value="only">Only Trashed</option>
        </select>
      </search-filter>
      <Link class="btn-indigo" href="/funnels/create">
        <span>Create</span>
        <span class="hidden md:inline">&nbsp;Funnel</span>
      </Link>
    </div>
    <div class="bg-white rounded-md shadow overflow-x-auto">
      <table class="w-full whitespace-nowrap">
        <tr class="text-left font-bold">
          <th class="pb-4 pt-6 px-6">Name</th>
          <th class="pb-4 pt-6 px-6">Orginization</th>
          <th class="pb-4 pt-6 px-6">Line Nr</th>
          <th class="pb-4 pt-6 px-6">Question</th>
          <th class="pb-4 pt-6 px-6">QTY</th>
          <th class="pb-4 pt-6 px-6">Min Value</th>
          <th class="pb-4 pt-6 px-6">Max Value</th>
          <th class="pb-4 pt-6 px-6">Linked to</th>
        </tr>
        <tr v-for="funnel in funnels.data" :key="funnel.id" class="hover:bg-gray-100 focus-within:bg-gray-100">

          <td class="border-t">
            <Link class="flex items-center px-6 py-4 focus:text-indigo-500" :href="`/funnels/${funnel.id}/edit`">
              {{ funnel.name }}
              <icon v-if="funnel.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
            </Link>
          </td>
          <td class="border-t">
            <Link class="flex items-center px-6 py-4" :href="`/funnels/${funnel.id}/edit`" tabindex="-1">
              <div v-if="funnel.organization">
                {{ funnel.organization.name }}
              </div>
            </Link>
          </td>
          <td class="border-t">
            <Link class="flex items-center px-6 py-4 focus:text-indigo-500" :href="`/funnels/${funnel.id}/edit`">
              {{ funnel.line_nr }}
              <icon v-if="funnel.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
            </Link>
          </td>
          <td class="border-t">
            <Link class="flex items-center px-6 py-4" :href="`/funnels/${funnel.id}/edit`" tabindex="-1">
                 {{ funnel.question }}
            </Link>
          </td>
          <td class="border-t">
            <Link class="flex items-center px-6 py-4" :href="`/funnels/${funnel.id}/edit`" tabindex="-1">
              {{ funnel.qty }}
            </Link>
          </td>
          <td class="border-t">
            <Link class="flex items-center px-6 py-4" :href="`/funnels/${funnel.id}/edit`" tabindex="-1">
              {{ funnel.min_value }}
            </Link>
          </td>
          <td class="border-t">
            <Link class="flex items-center px-6 py-4" :href="`/funnels/${funnel.id}/edit`" tabindex="-1">
              {{ funnel.max_value }}
            </Link>
          </td>
          <td class="border-t">
            <Link class="flex items-center px-6 py-4" :href="`/funnels/${funnel.id}/edit`" tabindex="-1">
              <div v-if="funnel.leadform">
              {{ funnel.leadform.name }}
              </div>
            </Link>
          </td>

          <td class="w-px border-t">
            <Link class="flex items-center px-4" :href="`/funnels/${funnel.id}/edit`" tabindex="-1">
              <icon name="cheveron-right" class="block w-6 h-6 fill-gray-400" />
            </Link>
          </td>
        </tr>
        <tr v-if="funnels.data.length === 0">
          <td class="px-6 py-4 border-t" colspan="4">No Funnels found.</td>
        </tr>
      </table>
    </div>
    <pagination class="mt-6" :links="funnels.links" />
  </div>
</template>

<script>
import { Head, Link } from '@inertiajs/vue3'
import Icon from '@/Shared/Icon'
import pickBy from 'lodash/pickBy'
import Layout from '@/Shared/Layout'
import throttle from 'lodash/throttle'
import mapValues from 'lodash/mapValues'
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
    funnels: Object,
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
        this.$inertia.get('/funnels', pickBy(this.form), { preserveState: true })
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
