<script setup>
import { formatData } from "@/Assets/DateFunctions";
import { formatPrioridade } from "@/Components/Categories/CategorieFunctions";
import { categorieSelecionada, visibleDelete } from "@/Components/Categories/CategorieState";
import Delete from "@/Components/Categories/Delete.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link, router } from "@inertiajs/vue3";
import Button from "primevue/button";
import Card from "primevue/card";
import Column from "primevue/column";
import DataTable from "primevue/datatable";
import { useToast } from "primevue/usetoast";
import { ref } from "vue";

const props = defineProps(["categories"]);
const toast = useToast();
const loadingConcluir = ref(false);

function abrirModalDelete(categorie) {
    categorieSelecionada.value = categorie;
    visibleDelete.value = true
}

</script>

<template>
    <AppLayout :has-create-button="true" :route-create-button="route('categorie.create')">
        <Card class="w-full">
            <template #content>
                <div class="flex justify-between">
                    <div class="text-2xl">Categorias</div>
                </div>
                <span class="text-lg text-gray-500">Listagem de Categorias</span>
                <p class="m-0" v-if="!categories?.length">
                    Você ainda não tem nenhuma categoria. As suas categorias serão listadas
                    abaixo. Adicione uma nova categorias no botão acima "Nova categorias".
                </p>
                <DataTable v-else :value="props.categories" class="rounded border" size="small" removable-sort>
                    <Column field="id" sortable header="ID" />
                    <Column field="name" sortable header="Nome" />
                    <Column field="description" sortable header="Descrição" />
                    <Column :field="(v) => formatData(v.created_at)" sortField="created_at" sortable
                        header="Criado Em" />
                    <Column header="Ações">
                        <template #body="{ data }">
                            <div class="flex gap-1">

                                <Link :href="route('categorie.edit', data.id)">
                                <Button icon="pi pi-pencil" severity="warn" class="p-1" text v-tooltip.top="'Editar'" />
                                </Link>
                                <Link :href="route('categorie.show', data.id)">
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
        <Delete :categorie="categorieSelecionada" />
    </AppLayout>
</template>
