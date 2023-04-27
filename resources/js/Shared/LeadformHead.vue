<template>

<div class="flex items-center justify-between px-15 py-15 md:justify-center">
            <Link class="mt-2" href="/">
          <ClientLogo/>
            </Link>
            </div>
</template>
<script>
import { Link } from '@inertiajs/vue3'
import ClientLogo from './ClientLogo.vue';

export default {
    props: {
        auth: Object,
    },
    components: { ClientLogo }
}
  </script>