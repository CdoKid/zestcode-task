<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';

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

            <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Save
            </PrimaryButton>
        </form>
    </section>
</template>