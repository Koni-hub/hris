<script setup>
import { ref, onMounted } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm, usePage } from '@inertiajs/vue3';

// Initialize form with empty fields or default values
const form = useForm({
    surname: '',
    first_name: '',
    middle_name: '',
    extension: '',
    date_of_birth: '',
    place_of_birth: '',
    citizenship: '',
    sex: '',
    civil_status: '',
    height: '',
    weight: '',
    blood_type: '',
    gsis_id_no: '',
    pag_ibig_id_no: '',
    philhealth_no: '',
    sss_no: '',
    tin_no: '',
    agency_employee_no: '',
    telephone_no: '',
    mobile_no: '',
    email_address: '',
    spouse_surname: '',
    spouse_first_name: '',
    spouse_middle_name: '',
    spouse_occupation: '',
    spouse_employer: '',
    spouse_business_address: '',
    spouse_telephone_no: '',
    children: [{ name: '', date_of_birth: '' }],
    father_surname: '',
    father_first_name: '',
    father_middle_name: '',
    mother_maiden_name: '',
    mother_first_name: '',
    mother_middle_name: '',
    // Educational Background
    elementary_name_school: '',
    elementary_basic_education: '',
    elementary_from_school: '',
    elementary_to_school: '',
    elementary_highest_level: '',
    elementary_year_graduate: '',
    elementary_scholarship: '',
    secondary_name_school: '',
    secondary_basic_education: '',
    secondary_from_school: '',
    secondary_to_school: '',
    secondary_highest_level: '',
    secondary_year_graduate: '',
    secondary_scholarship: '',
    college_education: [{
        college_name_school: '',
        college_basic_education: '',
        college_from_school: '',
        college_to_school: '',
        college_highest_level: '',
        college_year_graduate: '',
        college_scholarship: '',
    }]
});

const page = usePage();
const personnel = ref(page.props.personnel);

// Fetch specific personnel data on component mount
onMounted(() => {
    // Populate form with fetched data
    form.id = personnel.value.id;
    form.surname = personnel.value.surname;
    form.first_name = personnel.value.first_name;
    form.middle_name = personnel.value.middle_name;
    form.extension = personnel.value.extension;
    form.date_of_birth = personnel.value.date_of_birth;
    form.place_of_birth = personnel.value.place_of_birth;
    form.citizenship = personnel.value.citizenship;
    form.sex = personnel.value.sex;
    form.civil_status = personnel.value.civil_status;
    form.height = personnel.value.height;
    form.weight = personnel.value.weight;
    form.blood_type = personnel.value.blood_type;
    form.gsis_id_no = personnel.value.gsis_id_no;
    form.pag_ibig_id_no = personnel.value.pag_ibig_id_no;
    form.philhealth_no = personnel.value.philhealth_no;
    form.sss_no = personnel.value.sss_no;
    form.tin_no = personnel.value.tin_no;
    form.agency_employee_no = personnel.value.agency_employee_no;
    form.telephone_no = personnel.value.telephone_no;
    form.mobile_no = personnel.value.mobile_no;
    form.email_address = personnel.value.email_address;
    form.spouse_surname = personnel.value.spouse_surname;
    form.spouse_first_name = personnel.value.spouse_first_name;
    form.spouse_middle_name = personnel.value.spouse_middle_name;
    form.spouse_occupation = personnel.value.spouse_occupation;
    form.spouse_employer = personnel.value.spouse_employer;
    form.spouse_business_address = personnel.value.spouse_business_address;
    form.spouse_telephone_no = personnel.value.spouse_telephone_no;
    form.children = personnel.value.children || [{ name: '', date_of_birth: '' }];
    form.father_surname = personnel.value.father_surname;
    form.father_first_name = personnel.value.father_first_name;
    form.father_middle_name = personnel.value.father_middle_name;
    form.mother_maiden_name = personnel.value.mother_maiden_name;
    form.mother_first_name = personnel.value.mother_first_name;
    form.mother_middle_name = personnel.value.mother_middle_name;
    form.elementary_name_school = personnel.value.elementary_name_school;
    form.elementary_basic_education = personnel.value.elementary_basic_education;
    form.elementary_from_school = personnel.value.elementary_from_school;
    form.elementary_to_school = personnel.value.elementary_to_school;
    form.elementary_highest_level = personnel.value.elementary_highest_level;
    form.elementary_year_graduate = personnel.value.elementary_year_graduate;
    form.elementary_scholarship = personnel.value.elementary_scholarship;
    form.secondary_name_school = personnel.value.secondary_name_school;
    form.secondary_basic_education = personnel.value.secondary_basic_education;
    form.secondary_from_school = personnel.value.secondary_from_school;
    form.secondary_to_school = personnel.value.secondary_to_school;
    form.secondary_highest_level = personnel.value.secondary_highest_level;
    form.secondary_year_graduate = personnel.value.secondary_year_graduate;
    form.secondary_scholarship = personnel.value.elementary_scholarship;
    form.college_name_school = personnel.value.college_name_school;
    form.college_education = personnel.value.college_education || [{
        college_name_school: '',
        college_basic_education: '',
        college_from_school: '',
        college_to_school: '',
        college_highest_level: '',
        college_year_graduate: '',
        college_scholarship: '',
    }]
});

</script>

<template>
    <Head title="View Personnel" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">View Personnel</h2>
        </template>

        <div class="py-10">
            <div class="max-w-6xl mx-auto">
                <div class="bg-white shadow-sm sm:rounded-lg">
                    <form @submit.prevent="submit" class="p-6">
                        <div class="grid grid-cols-1 gap-6">
                            <div>
                                <h1>CS Form No. 212</h1>
                                <h1>Revised 2017</h1>
                            </div>
                            <div><h2 class="text-5xl text-center font-extrabold">Personal Data Sheet</h2></div>
                            <p><span class="font-extrabold">WARNING</span>: Any misrepresentation made in the Personal Data Sheet and the Work Experience Sheet shall cause the filing of administrative/criminal case/s against the person concerned.</p>
                            <p>READ THE ATTACHED GUIDE TO FILLING OUT THE PERSONAL DATA SHEET (PDS) BEFORE ACCOMPLISHING THE PDS FORM.</p>
                            <!-- 1st Column -->
                            <h1 class="text-3xl bg-gray-500 text-white uppercase border-black">I. Personal Information</h1>
                            <div class="flex">
                                <label for="surname" class="block text-sm font-medium text-gray-700 overflow-hidden w-1/6">Surname</label>
                                <input disabled v-model="form.surname" type="text" id="surname" name="surname" class="mt-1 block w-full" />
                            </div>
                            <div class="flex">
                                <div class="flex-none w-40">
                                    <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                                </div>
                                <div class="flex flex-1 gap-5">
                                    <div class="flex-1 w-90">
                                        <input disabled v-model="form.first_name" type="text" id="first_name" name="first_name" class="mt-1 block w-full" />
                                    </div>
                                    <div class="flex-none">
                                        <input disabled v-model="form.extension" placeholder="Name Extension (JR., SR)" type="text" id="extension" name="extension" class="mt-1 block w-full" />
                                    </div>
                                </div>
                            </div>
                            <div class="flex">
                                <label for="middle_name" class="inline text-sm font-medium text-gray-700 overflow-hidden w-1/6">Middle Name</label>
                                <input disabled v-model="form.middle_name" type="text" id="middle_name" name="middle_name" class="mt-1 block w-full" />
                            </div>
                            <!-- 2nd Column -->
                            <div class="flex gap-5">
                                <div class="w-1/2">
                                    <label for="date_of_birth" class="block text-sm font-medium text-gray-700">Date of Birth</label>
                                    <input disabled v-model="form.date_of_birth" type="date" id="date_of_birth" name="date_of_birth" class="mt-1 block w-full" />
                                </div>
                                <div class="w-1/2">
                                    <label for="place_of_birth" class="block text-sm font-medium text-gray-700">Place of Birth</label>
                                    <input disabled v-model="form.place_of_birth" type="text" id="place_of_birth" name="place_of_birth" class="mt-1 block w-full" />
                                </div>
                                <div class="w-1/2">
                                    <label for="citizenship" class="block text-sm font-medium text-gray-700">Citizenship</label>
                                    <input disabled v-model="form.citizenship" for="citizenship" name="citizenship" id="citizenship" class="mt-1 block w-full">
                                </div>
                            </div>
                            <div class="flex gap-5">
                                <div class="w-1/2">
                                    <label for="sex" class="block text-sm font-medium text-gray-700">Sex</label>
                                    <input disabled v-model="form.sex" id="sex" name="sex" class="mt-1 block w-full">
                                </div>
                                <div class="w-1/2">
                                    <label for="civil_status" class="block text-sm font-medium text-gray-700">Civil Status</label>
                                    <input disabled v-model="form.civil_status" id="civil_status" name="civil_status" class="mt-1 block w-full">
                                </div>
                            </div>
                            <div class="flex gap-5">
                                <div class="w-1/3">
                                    <label for="height" class="block text-sm font-medium text-gray-700">Height (m)</label>
                                    <input disabled v-model="form.height" type="text" id="height" name="height" class="mt-1 block w-full" />
                                </div>
                                <div class="w-1/3">
                                    <label for="weight" class="block text-sm font-medium text-gray-700">Weight (kg)</label>
                                    <input disabled v-model="form.weight" type="text" id="weight" name="weight" class="mt-1 block w-full" />
                                </div>
                                <div class="w-1/3">
                                    <label for="blood_type" class="block text-sm font-medium text-gray-700">Blood Type</label>
                                    <input disabled v-model="form.blood_type" type="text" id="blood_type" name="blood_type" class="mt-1 block w-full" />
                                </div>
                            </div>
                            <div class="flex gap-5">
                                <div class="w-1/4">
                                    <label for="gsis_id_no" class="block text-sm font-medium text-gray-700">GSIS ID No.</label>
                                    <input disabled v-model="form.gsis_id_no" type="text" id="gsis_id_no" name="gsis_id_no" class="mt-1 block w-full" />
                                </div>
                                <div class="w-1/4">
                                    <label for="pag_ibig_id_no" class="block text-sm font-medium text-gray-700">PAG-IBIG ID No.</label>
                                    <input disabled v-model="form.pag_ibig_id_no" type="text" id="pag_ibig_id_no" name="pag_ibig_id_no" class="mt-1 block w-full" />
                                </div>
                                <div class="w-1/4">
                                    <label for="philhealth_no" class="block text-sm font-medium text-gray-700">PHILHEALTH No.</label>
                                    <input disabled v-model="form.philhealth_no" type="text" id="philhealth_no" name="philhealth_no" class="mt-1 block w-full" />
                                </div>
                                <div class="w-1/4">
                                    <label for="sss_no" class="block text-sm font-medium text-gray-700">SSS No.</label>
                                    <input disabled v-model="form.sss_no" type="text" id="sss_no" name="sss_no" class="mt-1 block w-full" />
                                </div>
                            </div>
                            <div class="flex gap-5">
                                <div class="w-1/4">
                                    <label for="tin_no" class="block text-sm font-medium text-gray-700">TIN No.</label>
                                    <input disabled v-model="form.tin_no" type="text" id="tin_no" name="tin_no" class="mt-1 block w-full" />
                                </div>
                                <div class="w-1/4">
                                    <label for="agency_employee_no" class="block text-sm font-medium text-gray-700">Agency Employee No.</label>
                                    <input disabled v-model="form.agency_employee_no" type="text" id="agency_employee_no" name="agency_employee_no" class="mt-1 block w-full" />
                                </div>
                                <div class="w-1/4">
                                    <label for="telephone_no" class="block text-sm font-medium text-gray-700">Telephone No.</label>
                                    <input disabled v-model="form.telephone_no" type="text" id="telephone_no" name="telephone_no" class="mt-1 block w-full" />
                                </div>
                                <div class="w-1/4">
                                    <label for="mobile_no" class="block text-sm font-medium text-gray-700">Mobile No.</label>
                                    <input disabled v-model="form.mobile_no" type="text" id="mobile_no" name="mobile_no" class="mt-1 block w-full" />
                                </div>
                            </div>
                            <div>
                                <label for="email_address" class="block text-sm font-medium text-gray-700">Email Address</label>
                                <input disabled v-model="form.email_address" type="email" id="email_address" name="email_address" class="mt-1 block w-full" />
                            </div>
                            <!-- Spouse Details -->
                            <h1 class="text-3xl bg-gray-500 text-white uppercase border-black">II. Spouse</h1>
                            <div class="flex gap-5">
                                <div class="w-1/3">
                                    <label for="spouse_surname" class="block text-sm font-medium text-gray-700">Surname</label>
                                    <input disabled v-model="form.spouse_surname" type="text" id="spouse_surname" name="spouse_surname" class="mt-1 block w-full" />
                                </div>
                                <div class="w-1/3">
                                    <label for="spouse_first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                                    <input disabled v-model="form.spouse_first_name" type="text" id="spouse_first_name" name="spouse_first_name" class="mt-1 block w-full" />
                                </div>
                                <div class="w-1/3">
                                    <label for="spouse_middle_name" class="block text-sm font-medium text-gray-700">Middle Name</label>
                                    <input disabled v-model="form.spouse_middle_name" type="text" id="spouse_middle_name" name="spouse_middle_name" class="mt-1 block w-full" />
                                </div>
                            </div>
                            <div class="flex gap-5">
                                <div class="w-1/3">
                                    <label for="spouse_occupation" class="block text-sm font-medium text-gray-700">Occupation</label>
                                    <input disabled v-model="form.spouse_occupation" type="text" id="spouse_occupation" name="spouse_occupation" class="mt-1 block w-full" />
                                </div>
                                <div class="w-2/3">
                                    <label for="spouse_employer" class="block text-sm font-medium text-gray-700">Employer / Business Name</label>
                                    <input disabled v-model="form.spouse_employer" type="text" id="spouse_employer" name="spouse_employer" class="mt-1 block w-full" />
                                </div>
                            </div>
                            <div class="w-full">
                                <label for="spouse_business_address" class="block text-sm font-medium text-gray-700">Business Address</label>
                                <input disabled v-model="form.spouse_business_address" type="text" id="spouse_business_address" name="spouse_business_address" class="mt-1 block w-full" />
                            </div>
                            <div class="w-full">
                                <label for="spouse_telephone_no" class="block text-sm font-medium text-gray-700">Telephone No.</label>
                                <input disabled v-model="form.spouse_telephone_no" type="text" id="spouse_telephone_no" name="spouse_telephone_no" class="mt-1 block w-full" />
                            </div>
                            <!-- Children -->
                            <h1 class="text-3xl bg-gray-500 text-white uppercase border-black">III. Children</h1>
                            <div v-for="(child, index) in form.children" :key="index" class="mb-4">
                                <div class="flex gap-5">
                                    <div class="w-1/2">
                                        <label :for="'child_name_' + index" class="block text-sm font-medium text-gray-700">Name</label>
                                        <input disabled v-model="child.name" :id="'child_name_' + index" type="text" name="child_name" class="mt-1 block w-full" />
                                    </div>
                                    <div class="w-1/2">
                                        <label :for="'child_dob_' + index" class="block text-sm font-medium text-gray-700">Date of Birth</label>
                                        <input disabled v-model="child.date_of_birth" :id="'child_dob_' + index" type="date" name="child_date_of_birth" class="mt-1 block w-full" />
                                    </div>
                                </div>
                            </div>
                            <!-- Parent Details -->
                            <h1 class="text-3xl bg-gray-500 text-white uppercase border-black">IV. Parents</h1>
                            <div class="flex gap-5">
                                <div class="w-1/3">
                                    <label for="father_surname" class="block text-sm font-medium text-gray-700">Father's Surname</label>
                                    <input disabled v-model="form.father_surname" type="text" id="father_surname" name="father_surname" class="mt-1 block w-full" />
                                </div>
                                <div class="w-1/3">
                                    <label for="father_first_name" class="block text-sm font-medium text-gray-700">Father's First Name</label>
                                    <input disabled v-model="form.father_first_name" type="text" id="father_first_name" name="father_first_name" class="mt-1 block w-full" />
                                </div>
                                <div class="w-1/3">
                                    <label for="father_middle_name" class="block text-sm font-medium text-gray-700">Father's Middle Name</label>
                                    <input disabled v-model="form.father_middle_name" type="text" id="father_middle_name" name="father_middle_name" class="mt-1 block w-full" />
                                </div>
                            </div>
                            <div class="flex gap-5">
                                <div class="w-1/3">
                                    <label for="mother_maiden_name" class="block text-sm font-medium text-gray-700">Mother's Maiden Name</label>
                                    <input disabled v-model="form.mother_maiden_name" type="text" id="mother_maiden_name" name="mother_maiden_name" class="mt-1 block w-full" />
                                </div>
                                <div class="w-1/3">
                                    <label for="mother_first_name" class="block text-sm font-medium text-gray-700">Mother's First Name</label>
                                    <input disabled v-model="form.mother_first_name" type="text" id="mother_first_name" name="mother_first_name" class="mt-1 block w-full" />
                                </div>
                                <div class="w-1/3">
                                    <label for="mother_middle_name" class="block text-sm font-medium text-gray-700">Mother's Middle Name</label>
                                    <input disabled v-model="form.mother_middle_name" type="text" id="mother_middle_name" name="mother_middle_name" class="mt-1 block w-full" />
                                </div>
                            </div>
                            <!-- Educational Background -->
                            <h1 class="text-3xl bg-gray-500 text-white uppercase border-black">V. Educational Background</h1>
                            <!-- Elementary Table -->
                            <h2 class="text-2xl font-bold mb-4">Elementary</h2>
                            <div class="border border-gray-300 rounded-lg p-4">
                                <div class="grid grid-cols-3 gap-4 mb-4">
                                    <div>
                                        <label for="elementary_name_school" class="block text-sm font-medium text-gray-700">Name of School</label>
                                        <input disabled v-model="form.elementary_name_school" type="text" id="elementary_name_school" name="elementary_name_school" class="mt-1 block w-full" />
                                    </div>
                                    <div>
                                        <label for="elementary_basic_education" class="block text-sm font-medium text-gray-700">Basic Education</label>
                                        <input disabled v-model="form.elementary_basic_education" type="text" id="elementary_basic_education" name="elementary_basic_education" class="mt-1 block w-full" />
                                    </div>
                                    <div>
                                        <label for="elementary_from_school" class="block text-sm font-medium text-gray-700">From</label>
                                        <input disabled v-model="form.elementary_from_school" type="text" id="elementary_from_school" name="elementary_from_school" class="mt-1 block w-full" />
                                    </div>
                                    <div>
                                        <label for="elementary_to_school" class="block text-sm font-medium text-gray-700">To</label>
                                        <input disabled v-model="form.elementary_to_school" type="text" id="elementary_to_school" name="elementary_to_school" class="mt-1 block w-full" />
                                    </div>
                                    <div>
                                        <label for="elementary_highest_level" class="block text-sm font-medium text-gray-700">Highest Level/Year Level</label>
                                        <input disabled v-model="form.elementary_highest_level" type="text" id="elementary_highest_level" name="elementary_highest_level" class="mt-1 block w-full" />
                                    </div>
                                    <div>
                                        <label for="elementary_year_graduate" class="block text-sm font-medium text-gray-700">Year Graduated</label>
                                        <input disabled v-model="form.elementary_year_graduate" type="text" id="elementary_year_graduate" name="elementary_year_graduate" class="mt-1 block w-full" />
                                    </div>
                                    <div>
                                        <label for="elementary_scholarship" class="block text-sm font-medium text-gray-700">Scholarship/ Honors Received</label>
                                        <input disabled v-model="form.elementary_scholarship" type="text" id="elementary_scholarship" name="elementary_scholarship" class="mt-1 block w-full" />
                                    </div>
                                </div>
                            </div>
                            <!-- Secondary Table -->
                            <h2 class="text-2xl font-bold mb-4">Secondary</h2>
                            <div class="border border-gray-300 rounded-lg p-4">
                                <div class="grid grid-cols-3 gap-4 mb-4">
                                    <div>
                                        <label for="secondary_name_school" class="block text-sm font-medium text-gray-700">Name of School</label>
                                        <input disabled v-model="form.secondary_name_school" type="text" id="secondary_name_school" name="secondary_name_school" class="mt-1 block w-full" />
                                    </div>
                                    <div>
                                        <label for="secondary_basic_education" class="block text-sm font-medium text-gray-700">Basic Education</label>
                                        <input disabled v-model="form.secondary_basic_education" type="text" id="secondary_basic_education" name="secondary_basic_education" class="mt-1 block w-full" />
                                    </div>
                                    <div>
                                        <label for="secondary_from_school" class="block text-sm font-medium text-gray-700">From</label>
                                        <input disabled v-model="form.secondary_from_school" type="text" id="secondary_from_school" name="secondary_from_school" class="mt-1 block w-full" />
                                    </div>
                                    <div>
                                        <label for="secondary_to_school" class="block text-sm font-medium text-gray-700">To</label>
                                        <input disabled v-model="form.secondary_to_school" type="text" id="secondary_to_school" name="secondary_to_school" class="mt-1 block w-full" />
                                    </div>
                                    <div>
                                        <label for="secondary_highest_level" class="block text-sm font-medium text-gray-700">Highest Level/Year Level</label>
                                        <input disabled v-model="form.secondary_highest_level" type="text" id="secondary_highest_level" name="secondary_highest_level" class="mt-1 block w-full" />
                                    </div>
                                    <div>
                                        <label for="secondary_year_graduate" class="block text-sm font-medium text-gray-700">Year Graduated</label>
                                        <input disabled v-model="form.secondary_year_graduate" type="text" id="secondary_year_graduate" name="secondary_year_graduate" class="mt-1 block w-full" />
                                    </div>
                                    <div>
                                        <label for="secondary_scholarship" class="block text-sm font-medium text-gray-700">Scholarship/ Honors Received</label>
                                        <input disabled v-model="form.secondary_scholarship" type="text" id="secondary_scholarship" name="secondary_scholarship" class="mt-1 block w-full" />
                                    </div>
                                </div>
                            </div>
                            <!-- College Table -->
                            <h2 class="text-2xl font-bold mb-4">College</h2>
                            <div v-for="(college_education, index) in form.college_education" :key="index" class="mb-4">
                                <div class="border border-gray-300 rounded-lg p-4">
                                    <div class="grid grid-cols-3 gap-4 mb-4">
                                        <div>
                                            <label for="college_name_school" class="block text-sm font-medium text-gray-700">Name of School</label>
                                            <input disabled v-model="college_education.college_name_school" type="text" :id="'college_name_school' + index" name="college_name_school" class="mt-1 block w-full" />
                                        </div>
                                        <div>
                                            <label for="college_basic_education" class="block text-sm font-medium text-gray-700">Basic Education</label>
                                            <input disabled v-model="college_education.college_basic_education" type="text" :id="'college_basic_education' + index" name="college_basic_education" class="mt-1 block w-full" />
                                        </div>
                                        <div>
                                            <label for="college_from_school" class="block text-sm font-medium text-gray-700">From</label>
                                            <input disabled v-model="college_education.college_from_school" type="text" :id="'college_from_school' + index" name="college_from_school" class="mt-1 block w-full" />
                                        </div>
                                        <div>
                                            <label for="college_to_school" class="block text-sm font-medium text-gray-700">To</label>
                                            <input disabled v-model="college_education.college_to_school" type="text" :id="'college_to_school' + index" name="college_to_school" class="mt-1 block w-full" />
                                        </div>
                                        <div>
                                            <label for="college_highest_level" class="block text-sm font-medium text-gray-700">Highest Level/Year Level</label>
                                            <input disabled v-model="college_education.college_highest_level" type="text" :id="'college_highest_level' + index" name="college_highest_level" class="mt-1 block w-full" />
                                        </div>
                                        <div>
                                            <label for="college_year_graduate" class="block text-sm font-medium text-gray-700">Year Graduated</label>
                                            <input disabled v-model="college_education.college_year_graduate" type="text" :id="'college_year_graduate' + index" name="college_year_graduate" class="mt-1 block w-full" />
                                        </div>
                                        <div>
                                            <label for="college_scholarship" class="block text-sm font-medium text-gray-700">Scholarship/ Honors Received</label>
                                            <input disabled v-model="college_education.college_scholarship" type="text" :id="'college_scholarship' + index" name="college_scholarship" class="mt-1 block w-full" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>