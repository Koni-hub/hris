<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PersonnelSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 20) as $index) {
            DB::table('personnels')->insert([
                'surname' => $faker->lastName,
                'first_name' => $faker->firstName,
                'middle_name' => $faker->firstName,
                'extension' => $faker->regexify('^M{0,4}(CM|CD|D?C{0,3})(XC|XL|L?X{0,3})(IX|IV|V?I{0,3})$'),
                'date_of_birth' => $faker->date('Y-m-d', '2000-01-01'),
                'citizenship' => $faker->country,
                'place_of_birth' => $faker->city,
                'sex' => $faker->randomElement(['MALE', 'FEMALE']),
                'civil_status' => $faker->randomElement(['SINGLE', 'MARRIED', 'WIDOWED', 'DIVORCED']),
                'height' => $faker->randomFloat(2, 150, 200),
                'weight' => $faker->randomFloat(2, 50, 100),
                'blood_type' => $faker->randomElement(['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-']),
                'gsis_id_no' => $faker->regexify('[A-Z]{2}[0-9]{6}'),
                'pag_ibig_id_no' => $faker->regexify('[A-Z]{3}[0-9]{6}'),
                'philhealth_no' => $faker->regexify('[0-9]{12}'),
                'sss_no' => $faker->regexify('[0-9]{10}'),
                'tin_no' => $faker->regexify('[0-9]{9}'),
                'agency_employee_no' => $faker->regexify('[A-Z]{3}[0-9]{6}'),
                'telephone_no' => $faker->phoneNumber,
                'mobile_no' => $faker->phoneNumber,
                'email_address' => $faker->unique()->safeEmail,
                'residential_address' => $faker->address,
                'permanent_address' => $faker->address,

                // Spouse fields
                'spouse_surname' => $faker->lastName,
                'spouse_first_name' => $faker->firstName,
                'spouse_middle_name' => $faker->firstName,
                'spouse_occupation' => $faker->word,
                'spouse_employer' => $faker->company,
                'spouse_business_address' => $faker->address,
                'spouse_telephone_no' => $faker->phoneNumber,

                // Children fields (as JSON)
                'children' => json_encode([
                    ['name' => $faker->firstName, 'date_of_birth' => $faker->date('Y-m-d')],
                    ['name' => $faker->firstName, 'date_of_birth' => $faker->date('Y-m-d')]
                ]),

                // Parents fields
                'father_surname' => $faker->lastName,
                'father_first_name' => $faker->firstName,
                'father_middle_name' => $faker->firstName,
                'mother_maiden_name' => $faker->lastName,
                'mother_first_name' => $faker->firstName,
                'mother_middle_name' => $faker->firstName,

                // Educational Background fields
                'elementary_name_school' => $faker->company,
                'elementary_basic_education' => $faker->word,
                'elementary_from_school' => $faker->year,
                'elementary_to_school' => $faker->year,
                'elementary_highest_level' => $faker->word,
                'elementary_year_graduate' => $faker->year,
                'elementary_scholarship' => $faker->word,

                'secondary_name_school' => $faker->company,
                'secondary_basic_education' => $faker->word,
                'secondary_from_school' => $faker->year,
                'secondary_to_school' => $faker->year,
                'secondary_highest_level' => $faker->word,
                'secondary_year_graduate' => $faker->year,
                'secondary_scholarship' => $faker->word,

                'college_education' => json_encode([
                'college_to_school' => $faker->year,
                    ['college_name_school' => $faker->company, 'college_basic_education' => $faker->word, 'college_from_school' => $faker->year, 'college_to_school' => $faker->year, 'college_highest_level' => $faker->word, 'college_year_graduate' => $faker->year,'college_scholarship' => $faker->word ],
                    ['college_name_school' => $faker->company, 'college_basic_education' => $faker->word, 'college_from_school' => $faker->year, 'college_to_school' => $faker->year, 'college_highest_level' => $faker->word, 'college_year_graduate' => $faker->year,'college_scholarship' => $faker->word ],
                ]),

                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}