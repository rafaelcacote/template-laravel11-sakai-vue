<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Card from 'primevue/card';

const props = defineProps(['categorie']);

</script>

<template>
    <AppLayout :has-back-button="true" :route-back-button="route('categorie.index')">
        <Card class="w-full">
            <template #content>
                <div class="grid grid-cols-3 gap-3">
                    <u>Título</u>
                    <span class="col-span-2">{{ props.categorie?.name }}</span>
                    <u>Descrição</u>
                    <span class="col-span-2">{{ props.categorie?.description }}</span>

                </div>
            </template>
        </Card>
    </AppLayout>
</template>
