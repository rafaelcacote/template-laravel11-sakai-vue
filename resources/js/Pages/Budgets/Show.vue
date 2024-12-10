<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Card from 'primevue/card';

const props = defineProps(['budget']);

</script>

<template>
    <AppLayout :has-back-button="true" :route-back-button="route('budget.index')">
        <Card class="w-full">
            <template #content>
                <div class="grid grid-cols-3 gap-3">
                    <u>Quantia</u>
                    <span class="col-span-2">{{ props.budget?.amount }}</span>
                    <u>Data Inicial</u>
                    <span class="col-span-2">{{ props.budget?.start_date }}</span>
                    <u>Data Final</u>
                    <span class="col-span-2">{{ props.budget?.end_date }}</span>
                    <u>Criado Em</u>
                    <span class="col-span-2">{{ formatData(props.budget?.created_at) }}</span>
                </div>
            </template>
        </Card>
    </AppLayout>
</template>
