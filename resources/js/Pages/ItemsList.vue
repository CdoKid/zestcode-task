<template>
    
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <div class="grid grid-cols-3">
        <div class="items-left flex justify-start col-span-1">
           <h2 class="font-semibold text-xl text-gray-700 ml-2 mt-2 mb-2 leading-tight">Items</h2>
        </div>
        <div class="items-right flex justify-end col-span-2">
            <a href="#" class="inline-flex items-center font-medium text-blue-600 dark:text-blue-500 hover:underline">Add</a>
        </div>
    </div>
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
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Apple MacBook Pro 17"
                </th>
                <td class="px-6 py-4">
                    Silver
                </td>
                <td class="px-6 py-4">
                    $2999
                </td>
                <td class="px-6 py-4">
                    <button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">delete</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

</template>
<script setup>
import { ref, onMounted } from 'vue';

const items = ref([]);

const loadItems = async () => {
  try {
    const response = await axios.get('/api/items'); // Assuming you have a route for fetching items
    items.value = response.data;
  } catch (error) {
    console.error('Error loading items', error);
  }
};

const deleteItem = async (itemId) => {
  try {
    await axios.delete(`/api/items/${itemId}`); // Assuming you have a route for deleting items
    items.value = items.value.filter(item => item.id !== itemId);
  } catch (error) {
    console.error('Error deleting item', error);
  }
};

onMounted(loadItems);
</script>