<script setup>
import { formCreate } from "@/Components/Categories/CategorieForm";
import FormCategorie from "@/Components/Categories/FormCategorie.vue";
import FormCategorie from "@/Components/Categories/FormCategorie.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import Button from "primevue/button";
import Card from "primevue/card";

const props = defineProps(["categorie"]);

function submitForm() {
    formCreate.post(route("categorie.store"), {
        onSuccess: () => {
            formCreate.reset();
        },
    });
}
</script>

<template>
    <AppLayout :has-back-button="true" :route-back-button="route('categorie.index')">
        <Card class="w-full">
            <template #content>
                <form @submit.prevent="submitForm">
                    <FormCategorie :form="formCreate" />
                    <div class="mt-6 text-center">
                        <Button icon="pi pi-save" label="Salvar" :loading="formCreate.processing" type="submit" />
                    </div>
                </form>
            </template>
        </Card>
    </AppLayout>
</template>
