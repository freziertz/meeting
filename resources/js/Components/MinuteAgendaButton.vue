<script setup>

/* import the fontawesome core */
import { library } from '@fortawesome/fontawesome-svg-core'

/* import font awesome icon component */
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

/* import specific icons */
import { faPencilSquare } from '@fortawesome/free-solid-svg-icons'



/* add icons to the library */
library.add(faPencilSquare)

defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
    <button :type="type" >
        <slot />
    </button>
</template>
