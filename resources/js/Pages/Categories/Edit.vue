<script setup>
import { formEdit } from "@/Components/Categories/CategorieForm";
import FormCategorie from "@/Components/Categories/FormCategorie.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link } from "@inertiajs/vue3";
import Button from "primevue/button";
import Card from "primevue/card";
import { onMounted } from "vue";
import { useToast } from "primevue/usetoast";

const props = defineProps(["categorie"]);
const toast = useToast();

function submitForm() {
    formEdit.put(route("categorie.update", { id: props.categorie.id }), {
        onSuccess: () => {
            formEdit.reset();
            toast.add({
                severity: "success",
                summary: "Atualizado com sucesso",
                detail: "Categoria",
                life: 5000,
            });
        },
    });
}

onMounted(() => {
    formEdit.defaults(props.categorie);
    formEdit.reset();
});

</script>

<template>
    <AppLayout :has-back-button="true" :route-back-button="route('categorie.index')">
        <Card class="w-full">
            <template #content>
                <form @submit.prevent="submitForm">
                    <FormCategorie :form="formEdit" />
                    <div class="mt-6 text-center">
                        <Button label="Atualizar" icon="pi pi-check" :loading="formEdit.processing" type="submit" />
                        <Button label="Resetar" icon="pi pi-refresh" @click="formEdit.reset()" type="button"
                            class="ml-2" severity="secondary" />
                    </div>
                </form>
            </template>
        </Card>

    </AppLayout>
</template>
