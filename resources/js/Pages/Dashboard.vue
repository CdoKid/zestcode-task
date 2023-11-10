<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import AddItem from '@/Pages/Items/AddItem.vue'
import ItemsList from '@/Pages/Items/ItemsList.vue'
import ButtonColorUtils from '@/utils/ButtonColorUtils';

const isLocalhost = ButtonColorUtils.isLocalhost();
const randomColor = isLocalhost ? ButtonColorUtils.getRandomColor(): 'bg-green-500';

defineProps({
    items: Object,
});
</script>

<template>
    <AuthenticatedLayout>
        <Head title="Dashboard" />
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <AddItem class="max-w-xl" :host="isLocalhost" :color="randomColor"/>
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <ItemsList :items="items" class="max-w-xl"/>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
