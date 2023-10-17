
<template>
    <div>
    <Head title="Topics" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-black-800 dark:text-black-200 leading-tight">Create Topics</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex  m-2 p-2">
                    <Link href="/topics " class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded">Back</Link>
                </div>
                <div class="">
                    <div class="grid place-content-center mt-10">
                        <form  @submit.prevent="storeTopic" enctype="multipart/form-data" class="bg-white shadow-md m-2 p-2 rounded">
                            <div class="sm:col-span-6">
                                <label for="title" class="block text-sm font-medium text-gray-600">Name</label>
                                <div class="mt-1">
                                    <input type="text" id="name" name="name" v-model="form.name" class="block w-full transition-duration-150 ease-in-out">
                                </div>
                            </div>
                            <div class="sm:col-span-6">
                                <label for="title" class="block text-sm font-medium text-gray-600">Image</label>
                                <div class="mt-1">
                                    <input type="file" id="image" name="image" @input="form.image  = $event.target.files[0]" class="block w-full transition-duration-150 ease-in-out">
                                </div>
                            </div>
                            <div class="m-2 p-2">
                                <button type="submit" class="px-4 py-2 bg-green-400 rounded-lg ">Create</button>
                            </div>
                        </form>
                    </div>    
                </div>       
            </div>
        </div>
    </AuthenticatedLayout>
</div>
</template>


 
<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
const form = useForm({
  name: null, 
  image: null,
})

function storeTopic() {
  form.post('/topics')
}
</script>
