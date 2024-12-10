<script setup>
import InputText from "primevue/inputtext";
import Select from "primevue/select";
import InputMask from 'primevue/inputmask';
import InputNumber from 'primevue/inputnumber';
import { hasErrors } from "@/Assets/Functions";

const props = defineProps({
    form: {
        Type: Object,
        required: true,
    },
    categories: {
        type: Array,
        required: true,
    },
});

</script>

<template>
    <div>
        <label for="amount">Quantia <span class="text-red-400">*</span> </label>


            <InputNumber v-model="props.form.amount"
            placeholder="Quantia"
            id="amount"
              inputId="currency-brl"
              mode="currency"
              currency="BRL"
              locale="pt-BR"
              :minFractionDigits="2"
              :class="hasErrors(props.form, 'amount') ? `border border-red-500` : ''"
              fluid />
        <span v-if="hasErrors(props.form, 'amount')" class="text-red-500">
            {{ props.form.errors?.amount }}
        </span>
    </div>
    <div>
        <label for="start_date">Data Inicial <span class="text-red-400">*</span> </label>
        <InputMask type="text" v-model="props.form.start_date" id="start_date" class="w-full"
         mask="99/99/9999" slotChar="dd/mm/aaaa"
            :class="hasErrors(props.form, 'start_date') ? `border border-red-500` : ''" />
        <span v-if="hasErrors(props.form, 'start_date')" class="text-red-500">
            {{ props.form.errors?.start_date }}
        </span>
    </div>
    <div>
        <label for="end_date">Data Final <span class="text-red-400">*</span> </label>
        <InputMask  type="text" v-model="props.form.end_date" id="end_date" class="w-full"
         mask="99/99/9999" slotChar="dd/mm/aaaa"
            :class="hasErrors(props.form, 'end_date') ? `border border-red-500` : ''" />
        <span v-if="hasErrors(props.form, 'end_date')" class="text-red-500">
            {{ props.form.errors?.end_date }}
        </span>
    </div>
    <div>
        <label for="category_id">Categoria <span class="text-red-400">*</span></label>
        <Select v-model="props.form.category_id" id="category_id" :options="props.categories" option-label="name"
            option-value="id" class="w-full" />
            <span v-if="hasErrors(props.form, 'category_id')" class="text-red-500">
            {{ props.form.errors?.category_id }}
        </span>
    </div>


</template>
