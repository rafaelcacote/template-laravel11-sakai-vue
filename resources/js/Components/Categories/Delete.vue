<script setup>
import { formatData } from "@/Assets/DateFunctions";
import { formDelete } from "@/Components/Categories/CategorieForm";
import { visibleDelete } from "@/Components/Categories/CategorieState";
import Button from "primevue/button";
import Dialog from "primevue/dialog";
import { useToast } from "primevue/usetoast";
import { watch } from "vue";

const props = defineProps({
    categorie: {
        Type: Object,
        required: true,
    },
});
const toast = useToast();

function apagarCategorie() {
    formDelete.delete(route("categorie.destroy", { categorie: formDelete.id }), {
        onSuccess: () => {
            toast.add({
                severity: "success",
                summary: "Excluído com sucesso!",
                detail: "Categoria",
                life: 5000
            });
            formDelete.reset();
            visibleDelete.value = false;
        },
        onError: () => {
            toast.add({
                severity: "error",
                summary: "Erro ao concluir categoria",
                life: 5000,
            });
        },
    });
}

watch(
    () => props.categorie,
    (newValue) => {
        formDelete.defaults(newValue);
        formDelete.reset();
    }
);

</script>

<template>
    <Dialog v-model:visible="visibleDelete" modal header="Exclusão de Categorie" :style="{ width: '25rem' }" position="top"
        :draggable="false">
        <div class="text-surface-500 dark:text-surface-400 block mb-8">
            Deseja realmente excluir esta Categoria?
            <div class="grid grid-cols-4 gap-1 my-4 px-3">

                <div class="col-span-2 text-surface-300">
                    Name
                </div>
                <div class="col-span-2 font-semibold">
                    {{ categorie.name }}
                </div>
                <div class="col-span-2 text-surface-300">
                    Descrição
                </div>
                <div class="col-span-2 font-semibold">
                    {{ categorie.description }}
                </div>
                <div class="col-span-2 text-surface-300">
                    Criado Em
                </div>
                <div class="col-span-2 font-semibold">
                    {{ formatData(categorie.created_at) }}
                </div>
                <div class="col-span-2 text-surface-300">
                    Concluída Em
                </div>
                <div class="col-span-2 font-semibold">
                    {{ formatData(categorie.concluida_em) }}
                </div>
            </div>
        </div>
        <div class="flex justify-end gap-2">
            <Button type="button" label="Cancelar" severity="secondary" @click="visibleDelete = false"></Button>
            <Button icon="pi pi-trash" type="button" label="Confirmar" severity="danger"
                :loading="formDelete.processing" @click="apagarCategorie"></Button>
        </div>
    </Dialog>
</template>
