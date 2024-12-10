<script setup>
import { formCreate } from "@/Components/Budgets/BudgetForm";
import FormBudget from "@/Components/Budgets/FormBudget.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import Button from "primevue/button";
import Card from "primevue/card";

const props = defineProps(["budget", "categories"]);


function submitForm() {
    formCreate.post(route("budget.store"), {
        onSuccess: () => {
            formCreate.reset();
        },
    });
}
</script>

<template>
    <AppLayout :has-back-button="true" :route-back-button="route('budget.index')">
        <Card class="w-full">
            <template #content>
                <form @submit.prevent="submitForm">
                    <FormBudget :form="formCreate" :categories="categories" />
                    <div class="mt-6 text-center">
                        <Button icon="pi pi-save" label="Salvar" :loading="formCreate.processing" type="submit" />
                    </div>
                </form>
            </template>
        </Card>
    </AppLayout>
</template>
