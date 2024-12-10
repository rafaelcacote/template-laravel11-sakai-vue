<script setup>
import InputText from "primevue/inputtext";
import Textarea from "primevue/textarea";
import { hasErrors } from "@/Assets/Functions";

const props = defineProps({
    form: {
        Type: Object,
        required: true,
    },
});
</script>

<template>
    <div>
        <label for="name">Nome <span class="text-red-400">*</span> </label>
        <InputText placeholder="Nome da Categoria" type="text" v-model="props.form.name" id="name" class="w-full"
            :class="hasErrors(props.form, 'name') ? `border border-red-500` : ''" />
        <span v-if="hasErrors(props.form, 'name')" class="text-red-500">
            {{ props.form.errors?.name }}
        </span>
    </div>
    <div>
        <label for="description">Descrição</label>
        <Textarea placeholder="Descreva.." v-model="props.form.description" id="description" rows="3" class="w-full" />
    </div>

</template>
