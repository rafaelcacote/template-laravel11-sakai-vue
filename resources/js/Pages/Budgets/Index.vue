<script setup>
import { formatData } from "@/Assets/DateFunctions";
import { budgetSelecionada, visibleDelete } from "@/Components/Budgets/BudgetState";
import Delete from "@/Components/Budgets/Delete.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link, router } from "@inertiajs/vue3";
import Button from "primevue/button";
import Card from "primevue/card";
import Column from "primevue/column";
import DataTable from "primevue/datatable";
import { useToast } from "primevue/usetoast";
import { ref } from "vue";

const props = defineProps(["budgets"]);
const toast = useToast();
const loadingConcluir = ref(false);

function abrirModalDelete(budget) {
    budgetSelecionada.value = budget;
    visibleDelete.value = true
}

</script>

<template>
    <AppLayout :has-create-button="true" :route-create-button="route('budget.create')">
        <Card class="w-full">
            <template #content>
                <div class="flex justify-between">
                    <div class="text-2xl">Orçamentos</div>
                </div>
                <span class="text-lg text-gray-500">Listagem de Orçamentos</span>
                <p class="m-0" v-if="!budgets?.length">
                    Você ainda não tem nenhum Orçamento. Os seus orçamentos serão listadas
                    abaixo. Adicione um novo orçamento no botão acima "Novo Orçamento".
                </p>
                <DataTable v-else :value="props.budgets" class="rounded border" size="small" removable-sort>
                    <Column field="id" sortable header="ID" />
                    <Column field="amount" sortable header="Quantia" />
                    <Column field="start_date" sortable header="Data Inicial" />
                    <Column field="end_date" sortable header="Data Final" />
                    <Column :field="(v) => formatData(v.created_at)" sortField="created_at" sortable
                        header="Criado Em" />
                    <Column header="Ações">
                        <template #body="{ data }">
                            <div class="flex gap-1">

                                <Link :href="route('budget.edit', data.id)">
                                <Button icon="pi pi-pencil" severity="warn" class="p-1" text v-tooltip.top="'Editar'" />
                                </Link>
                                <Link :href="route('budget.show', data.id)">
                                <Button icon="pi pi-eye" severity="info" class="p-1" text v-tooltip.top="'Ver'" />
                                </Link>
                                <Button icon="pi pi-trash" severity="danger" class="p-1" text v-tooltip.top="'Apagar'"
                                    @click="abrirModalDelete(data)" />
                            </div>
                        </template>
                    </Column>
                </DataTable>
            </template>
        </Card>
        <Delete :budget="budgetSelecionada" />
    </AppLayout>
</template>
