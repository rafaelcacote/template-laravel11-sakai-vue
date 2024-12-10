<script setup>
import { formatData } from "@/Assets/DateFunctions";
import { formDelete } from "@/Components/Budgets/BudgetForm";
import { visibleDelete } from "@/Components/Budgets/BudgetState";
import Button from "primevue/button";
import Dialog from "primevue/dialog";
import { useToast } from "primevue/usetoast";
import { watch } from "vue";

const props = defineProps({
    budget: {
        Type: Object,
        required: true,
    },
});
const toast = useToast();

function apagarBudget() {
    formDelete.delete(route("budget.destroy", { budget: formDelete.id }), {
        onSuccess: () => {
            toast.add({
                severity: "success",
                summary: "Excluído com sucesso!",
                detail: "Orçamento",
                life: 5000
            });
            formDelete.reset();
            visibleDelete.value = false;
        },
        onError: () => {
            toast.add({
                severity: "error",
                summary: "Erro ao concluir Orçamento",
                life: 5000,
            });
        },
    });
}

watch(
    () => props.budget,
    (newValue) => {
        formDelete.defaults(newValue);
        formDelete.reset();
    }
);

</script>

<template>
    <Dialog v-model:visible="visibleDelete" modal header="Exclusão de Orçamento" :style="{ width: '25rem' }" position="top"
        :draggable="false">
        <div class="text-surface-500 dark:text-surface-400 block mb-8">
            Deseja realmente excluir este Orçamento?
            <div class="grid grid-cols-4 gap-1 my-4 px-3">

                <div class="col-span-2 text-surface-300">
                    Quantia
                </div>
                <div class="col-span-2 font-semibold">
                    {{ budget.amount }}
                </div>
                <div class="col-span-2 text-surface-300">
                    Data Inicial
                </div>
                <div class="col-span-2 font-semibold">
                    {{ budget.start_date }}
                </div>
                <div class="col-span-2 text-surface-300">
                    Data Final
                </div>
                <div class="col-span-2 font-semibold">
                    {{ budget.end_date }}
                </div>
                <div class="col-span-2 text-surface-300">
                    Criado Em
                </div>
                <div class="col-span-2 font-semibold">
                    {{ formatData(budget.created_at) }}
                </div>

            </div>
        </div>
        <div class="flex justify-end gap-2">
            <Button type="button" label="Cancelar" severity="secondary" @click="visibleDelete = false"></Button>
            <Button icon="pi pi-trash" type="button" label="Confirmar" severity="danger"
                :loading="formDelete.processing" @click="apagarBudget"></Button>
        </div>
    </Dialog>
</template>
