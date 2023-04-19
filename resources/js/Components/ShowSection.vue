<script setup>
import { computed, useSlots } from 'vue';
import SectionTitle from './SectionTitle.vue';

defineEmits(['submitted']);

const hasActions = computed(() => !! useSlots().actions);
</script>

<template>
    <div class="flex flex-row">
        <SectionTitle class="mr-10">
            <template #title>
                <slot name="title" />
            </template>
            <template #description>
                <slot name="description" />
            </template>


        </SectionTitle>

        
               
                    <div class="flex flex-col   shadow rounded-md w-full">
                        <slot name="table" />
                    </div>


                  
                

              
       
    </div>
</template>
