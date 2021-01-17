<?php

use App\Specialization;
use Illuminate\Database\Seeder;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specializations = [
            ['name'=>"Audit & Taxation"],
            ['name'=>"Banking/Financial"],
            ['name'=>"Corporate Finance/Investment"],
            ['name'=>"General/Cost Accounting"],
            ['name'=>"Clerical/Administrative"],
            ['name'=>"Human Resources"],
            ['name'=>"Secretarial"],
            ['name'=>"Top Management"],
            ['name'=>"Advertising"],
            ['name'=>"Arts/Creative Design"],
            ['name'=>"Entertainment"],
            ['name'=>"Public Relations"],
            ['name'=>"Architect/Interior Design"],
            ['name'=>"Civil Engineering/Construction"],
            ['name'=>"Property/Real Estate"],
            ['name'=>"Quantity Surveying"],
            ['name'=>"IT - Hardware"],
            ['name'=>"IT - Network/Sys/DB Admin"],
            ['name'=>"IT - Software"],
            ['name'=>"Education"],
            ['name'=>"Training & Dev."],
            ['name'=>"Chemical Engineering"],
            ['name'=>"Electrical Engineering"],
            ['name'=>"Electronics Engineering"],
            ['name'=>"Environmental Engineering"],
            ['name'=>"Industrial Engineering"],
            ['name'=>"Mechanical/Automotive Engineering"],
            ['name'=>"Oil/Gas Engineering"],
            ['name'=>"Other Engineering"],
            ['name'=>"Doctor/Diagnosis"],
            ['name'=>"Pharmacy"],
            ['name'=>"Nurse/Medical Support"],
            ['name'=>"Food/Beverage/Restaurant"],
            ['name'=>"Hotel/Tourism"],
            ['name'=>"Maintenance"],
            ['name'=>"Manufacturing"],
            ['name'=>"Process Design & Control"],
            ['name'=>"Purchasing/Material Mgmt"],
            ['name'=>"Quality Assurance"],
            ['name'=>"Digital Marketing"],
            ['name'=>"Sales - Corporate"],
            ['name'=>"E-commerce"],
            ['name'=>"Marketing/Business Dev"],
            ['name'=>"Merchandising"],
            ['name'=>"Retail Sales"],
            ['name'=>"Sales - Eng/Tech/IT"],
            ['name'=>"Sales - Financial Services"],
            ['name'=>"Telesales/Telemarketing"],
            ['name'=>"Actuarial/Statistics"],
            ['name'=>"Agriculture"],
            ['name'=>"Aviation"],
            ['name'=>"Biomedical"],
            ['name'=>"Biotechnology"],
            ['name'=>"Chemistry"],
            ['name'=>"Food Tech/Nutritionist"],
            ['name'=>"Geology/Geophysics"],
            ['name'=>"Science & Technology"],
            ['name'=>"Security/Armed Forces"],
            ['name'=>"Customer Service"],
            ['name'=>"Logistics/Supply Chain"],
            ['name'=>"Law/Legal Services"],
            ['name'=>"Personal Care"],
            ['name'=>"Social Services"],
            ['name'=>"Tech & Helpdesk Support"],
            ['name'=>"Others"],
            ['name'=>"General Work"],
            ['name'=>"Journalist/Editors"],
            ['name'=>"Publishing"],

        ];
        
        foreach ($specializations as $key => $special) {
            if (Specialization::where('name', $special['name'])->count() === 0) {
                $result = Specialization::create($special);
            }
        }
    }
}
