<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('personnels', function (Blueprint $table) {
            $table->id();
            $table->string('surname');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('extension')->nullable();
            $table->date('date_of_birth');
            $table->string('citizenship')->nullable();
            $table->string('place_of_birth');
            $table->enum('sex', ['MALE', 'FEMALE']);
            $table->enum('civil_status', ['SINGLE', 'MARRIED', 'WIDOWED', 'DIVORCED']);
            $table->float('height')->nullable();
            $table->float('weight')->nullable();
            $table->string('blood_type')->nullable();
            $table->string('gsis_id_no')->nullable();
            $table->string('pag_ibig_id_no')->nullable();
            $table->string('philhealth_no')->nullable();
            $table->string('sss_no')->nullable();
            $table->string('tin_no')->nullable();
            $table->string('agency_employee_no')->nullable();
            $table->string('telephone_no')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('email_address')->nullable();
            $table->string('residential_address')->nullable();
            $table->string('permanent_address')->nullable();

            // Spouse Information
            $table->string('spouse_surname')->nullable();
            $table->string('spouse_first_name')->nullable();
            $table->string('spouse_middle_name')->nullable();
            $table->string('spouse_occupation')->nullable();
            $table->string('spouse_employer')->nullable();
            $table->string('spouse_business_address')->nullable();
            $table->string('spouse_telephone_no')->nullable();

            // Children Information
            $table->json('children')->nullable();

            // Parent Information
            $table->string('father_surname')->nullable();
            $table->string('father_first_name')->nullable();
            $table->string('father_middle_name')->nullable();
            $table->string('mother_maiden_name')->nullable();
            $table->string('mother_first_name')->nullable();
            $table->string('mother_middle_name')->nullable();

            // Educational Background
            $table->string('elementary_name_school')->nullable();
            $table->string('elementary_basic_education')->nullable();
            $table->string('elementary_from_school')->nullable();
            $table->string('elementary_to_school')->nullable();
            $table->string('elementary_highest_level')->nullable();
            $table->string('elementary_year_graduate')->nullable();
            $table->string('elementary_scholarship')->nullable();

            $table->string('secondary_name_school')->nullable();
            $table->string('secondary_basic_education')->nullable();
            $table->string('secondary_from_school')->nullable();
            $table->string('secondary_to_school')->nullable();
            $table->string('secondary_highest_level')->nullable();
            $table->string('secondary_year_graduate')->nullable();
            $table->string('secondary_scholarship')->nullable();

            // College Education Information
            $table->json('college_education')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personnels');
    }
};