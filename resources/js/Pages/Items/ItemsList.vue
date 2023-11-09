<script setup>
import DangerButton from '@/Components/DangerButton.vue';
import Modal from '@/Components/Modal.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps({
  items: Array,
});

const confirmingItemDeletion = ref(false);
const itemId = ref(null);

const form = useForm({
    id: '',
});

const confirmItemDeletion = (id) => {
    itemId.value  = id;
    form.id = id;
    confirmingItemDeletion.value = true;
};

const deleteItem = () => {
    form.delete(route('item.destroy'), {
        preserveScroll: true,
        onSuccess: () => closeModal(),
        onFinish: () => form.reset(),
    });
};

const closeModal = () => {
    confirmingItemDeletion.value = false;

    form.reset();
};

</script>
<template>
    <header>
        <h2 class="text-lg font-medium text-gray-900">List Items</h2>
    </header>  
    <Modal :show="confirmingItemDeletion" @close="closeModal">
            <div class="p-6">
                <h2 class="text-lg font-medium text-gray-900">
                    Are you sure you want to delete Item {{itemId}} ?
                </h2>

                <p class="mt-1 text-sm text-gray-600">
                    Once your account is deleted, all of its resources and data will be permanently deleted. Please
                    enter your password to confirm you would like to permanently delete your account.
                </p>

                <div class="mt-6 flex justify-end">
                    <SecondaryButton @click="closeModal"> Cancel </SecondaryButton>

                    <DangerButton
                        class="ms-3"
                        @click="deleteItem()"
                    >
                        Delete Item
                    </DangerButton>
                </div>
            </div>
        </Modal> 
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Item name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Description
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Price
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in items" :key="item.id" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ item.name }}
                    </th>
                    <td class="px-6 py-4">
                        {{ item.description }}
                    </td>
                    <td class="px-6 py-4">
                        {{ item.price }}
                    </td>
                    <td class="px-6 py-4">
                        <button 
                        type="button" 
                        class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                        @click="confirmItemDeletion(item.id)"
                        >
                        delete
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</template>
