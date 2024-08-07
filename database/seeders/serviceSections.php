<?php

namespace Database\Seeders;

use App\Models\ServiceJob;
use App\Models\ServiceSection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class serviceSections extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Washing = ServiceSection::create(['name' => 'Washing Section']);
        $Interior = ServiceSection::create(['name' => 'Interior Section']);
        $Service = ServiceSection::create(['name' => 'Service Section']);

        ServiceJob::create(['name'=>'Full Wash','service_section_id'=>$Washing->id]);
        ServiceJob::create(['name'=>'Body Wash','service_section_id'=>$Washing->id]);

        ServiceJob::create(['name'=>'Vacuum','service_section_id'=>$Interior->id]);
        ServiceJob::create(['name'=>'Shampoo','service_section_id'=>$Interior->id]);

        ServiceJob::create(['name'=>'Engine oil replacement','service_section_id'=>$Service->id]);
        ServiceJob::create(['name'=>'Break oil replacement','service_section_id'=>$Service->id]);
        ServiceJob::create(['name'=>'Coolant replacement','service_section_id'=>$Service->id]);
        ServiceJob::create(['name'=>'Air filter replacement','service_section_id'=>$Service->id]);
        ServiceJob::create(['name'=>'Oil filter replacement','service_section_id'=>$Service->id]);
        ServiceJob::create(['name'=>'AC filter replacement','service_section_id'=>$Service->id]);
        ServiceJob::create(['name'=>'Break Shoes replacement','service_section_id'=>$Service->id]);
    }
}
