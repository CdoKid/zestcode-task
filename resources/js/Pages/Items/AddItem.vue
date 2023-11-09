<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
 color: String,
 host: String,
});

const form = useForm({
    name: '',
    desc: '',
    price: '',
});

const addItem = () => {
    form.post(route('item.store'), {
        onFinish: () => form.reset(),
    });
};
</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">Add Item</h2>
        </header>

        <form @submit.prevent="addItem" class="mt-6 space-y-6">
            <div>
                <InputLabel for="name" value="Name" />

                <TextInput
                    id="name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.name"
                    required
                    autofocus
                    autocomplete="name"
                />

                <InputError class="mt-2" :message="form.errors.name" />
            </div>
            <div>
                <InputLabel for="desc" value="Description" />

                <TextInput
                    id="desc"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.desc"
                    autofocus
                    autocomplete="desc"
                />

                <InputError class="mt-2" :message="form.errors.desc" />
            </div>
            <div>
                <InputLabel for="price" value="Price" />

                <TextInput
                    id="price"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.price"
                    autofocus
                    autocomplete="price"
                />

                <InputError class="mt-2" :message="form.errors.price" />
            </div>

            
            <button 
            :class="['focus:outline-none text-white ',color,' hover:bg-green-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-red-900']"         
            >
            Add New
            </button>

        </form>
    </section>
</template>