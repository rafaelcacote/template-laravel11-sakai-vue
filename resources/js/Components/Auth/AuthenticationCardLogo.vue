<script setup>
import { Link } from '@inertiajs/vue3';

const href = route('dashboard');
</script>

<template>
    <div class="flex flex-col items-center justify-center my-3">
        <Link :href class="text-center">
        <img width="110px" src="/storage/logo.png" />
        </Link>
        <div class="text-900 text-3xl font-medium mb-2 mt-1">Receitas e Despesas</div>
    </div>
</template>
