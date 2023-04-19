<template>
    <div :data-active="active" @dragenter.prevent="setActive" @dragover.prevent="setActive" @dragleave.prevent="setInactive" @drop.prevent="onDrop">
        <slot :dropZoneActive="active" ></slot>
    </div>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue'


const emit = defineEmits(['files-dropped'])

let active = ref(false)
let inActiveTimeout = null

function setActive() {
    active.value = true
}
function setInactive() {
    inActiveTimeout = setTimeout(() => {
        active.value = false
    }, 50)
}

function onDrop(e) {
    setInactive() // add this line too
    emit('files-dropped', [...e.dataTransfer.files])
}



function preventDefaults(e) {
    e.preventDefault()
}


function onInputChange(e) {
    addFiles(e.target.files)
    e.target.value = null
}

const events = ['dragenter', 'dragover', 'dragleave', 'drop']

onMounted(() => {
    events.forEach((eventName) => {
        document.body.addEventListener(eventName, preventDefaults)
    })
})

onUnmounted(() => {
    events.forEach((eventName) => {
        document.body.removeEventListener(eventName, preventDefaults)
    })
})
</script>