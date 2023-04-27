<template>
  
  <div class="flex items-center justify-center p-6 min-h-screen bg-gray-100">
    <Link class="mt-2" href="/">
          <ClientLogo/>
            </Link>

        <div class="px-4 py-8 lg:inline-flex-1 lg:p-12 md:overflow-y-auto" scroll-region>
         
            <slot />
          </div>
      </div>

  </template>
  
  <script>

import { Link } from '@inertiajs/vue3'
import ClientLogo from '@/Shared/ClientLogo'
 
  export default {
    props: {
        auth: Object,
    },
    components: { ClientLogo }
}
  </script>