<script setup>

/* import the fontawesome core */
import { library } from '@fortawesome/fontawesome-svg-core'

/* import font awesome icon component */
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

/* import specific icons */
import { faGavel  } from '@fortawesome/free-solid-svg-icons'



/* add icons to the library */
library.add(faGavel )

defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
    <button :type="type" class="inline-flex items-center px-4 py-2  border border-transparent rounded-md font-semibold text-xs text-blue-700  tracking-widest hover:bg-gray-300 focus:bg-gray-300 active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">

        <span class="px-2">
         
         <font-awesome-icon icon="fa-solid fa-gavel" />
       </span>
        <slot />
    </button>
</template>
