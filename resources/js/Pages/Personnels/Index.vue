<script setup>
import { ref, nextTick } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import { Head } from '@inertiajs/inertia-vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Modal from '@/Components/Modal.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import DangerButton from '@/Components/DangerButton.vue';
import { useForm } from '@inertiajs/inertia-vue3'; // Import useForm for form handling

const props = defineProps({
    personnels: Array,
    message: String
});

const confirmingUserDeletion = ref(false);
const passwordInput = ref(null);
const personnelToDelete = ref(null); // Reference for personnel to be deleted

// Initialize form with password field
const form = useForm({
    password: '',
});

// Handle Add Personnel button click
const handleAddPersonnelClick = () => {
    Inertia.visit(route('personnels.create'));
};

// Handle View Personnel button click
const viewPersonnelClick = (personnelID) => {
    Inertia.visit(route('personnels.show', { personnel: personnelID }));
};

// Handle Edit Personnel button click
const editPersonnelClick = (personnelID) => {
    Inertia.visit(route('personnels.edit', { personnel: personnelID }));
};

// Open the modal for confirming personnel deletion
const confirmUserDeletion = (personnelID) => {
    personnelToDelete.value = personnelID;
    confirmingUserDeletion.value = true;
    nextTick(() => passwordInput.value.focus());
};

const deleteUser = () => {
    form.errors = {};

    // Validate if password is empty
    if (!form.password.trim()) {
        form.errors.password = 'Password is required.';
        nextTick(() => passwordInput.value.focus()); // Refocus on password field
        return;
    }

    form.delete(route('personnels.destroy', { personnel: personnelToDelete.value }), {
        preserveScroll: true,
        onSuccess: () => {
            toast.success('Personnel deleted successfully.');
            closeModal();
        },
        onError: (errors) => {
            console.log('Form Errors:', errors);
            // Set error message for password
            if (errors.response && errors.response.data && errors.response.data.errors) {
                form.errors = errors.response.data.errors;
            } else {
                form.errors.password = 'An unexpected error occurred.';
            }
        }
    });
};

// Close the modal and reset form
const closeModal = () => {
    confirmingUserDeletion.value = false;
    form.reset();
};
</script>

<template>
    <Head title="Personnel Index" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Personnel List</h2>
                <button 
                    @click="handleAddPersonnelClick" 
                    class="bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                    Add Personnel
                </button>
            </div>
        </template>

        <div class="py-10">
            <div class="max-w-8xl mx-auto sm:px-2 lg:px-4">
                <div class="bg-white overflow-x-auto shadow-sm sm:rounded-lg">
                    <table class="table-auto min-w-full max-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Surname</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date of Birth</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sex</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mobile No.</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email Address</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr v-for="personnel in props.personnels" :key="personnel.id">
                                <td class="px-6 py-4 whitespace-nowrap">{{ personnel.id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ personnel.surname }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ new Date(personnel.date_of_birth).toLocaleDateString() }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ personnel.sex }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ personnel.mobile_no }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ personnel.email_address }}</td>
                                <td class="px-6 py-4 gap-2 flex">
                                    <button @click="viewPersonnelClick(personnel.id)" class="bg-gray-500 text-white p-2 rounded-md">View</button>
                                    <button @click="editPersonnelClick(personnel.id)" class="bg-blue-500 text-white p-2 rounded-md">Edit</button>
                                    <button @click="confirmUserDeletion(personnel.id)" class="bg-red-500 text-white p-2 rounded-md">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Confirmation Modal for Deleting Personnel -->
        <Modal :show="confirmingUserDeletion" @close="closeModal">
            <div class="p-6">
                <h2 class="text-lg font-medium text-gray-900">
                    Are you sure you want to delete this personnel?
                </h2>
                <p class="mt-1 text-sm text-gray-600">
                    Once deleted, all of its data will be permanently deleted. Please enter your password to confirm.
                </p>
                <div class="mt-6">
                    <InputLabel for="password" value="Password" class="w-full" />
                    <TextInput
                        id="password"
                        ref="passwordInput"
                        v-model="form.password"
                        type="password"
                        class="mt-1 block w-3/4"
                        placeholder="Password"
                        @keyup.enter="deleteUser"
                    />
                    <!-- Display validation error if password is incorrect -->
                    <InputError :message="form.errors.password" class="mt-2" />
                </div>
                <div class="mt-6 flex justify-end">
                    <SecondaryButton @click="closeModal"> Cancel </SecondaryButton>
                    <DangerButton
                        type="button"
                        class="ms-3"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                        @click="deleteUser"
                    >
                        Delete Personnel
                    </DangerButton>
                </div>
            </div>
        </Modal>
    </AuthenticatedLayout>
</template>