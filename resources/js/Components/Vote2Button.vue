<template>
  <button class="delete-button transition ease-in-out duration-150" @click="handleClick">



  </button>

</template>

<script>

import { library } from '@fortawesome/fontawesome-svg-core'

/* import font awesome icon component */
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

/* import specific icons */
import { faGavel  } from '@fortawesome/free-solid-svg-icons'



/* add icons to the library */
library.add(faGavel )

export default {
  name: 'EditButton',
  methods: {
    handleClick() {
        this.$emit('submit');
    }
  }
};
</script>

<style>
.delete-button {
  @apply text-red-900 px-4 py-2 rounded-md cursor-pointer;
}

.delete-button:hover {
  @apply text-red-400 bg-gray-200 rounded-full cursor-pointer;
  @apply text-3xl;
}
</style>
