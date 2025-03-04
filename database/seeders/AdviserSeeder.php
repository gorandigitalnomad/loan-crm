<?php

namespace Database\Seeders;

use App\Models\Adviser;
use Illuminate\Database\Seeder;

class AdviserSeeder extends Seeder
{
    public function run(): void
    {
        Adviser::factory()->create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@loancrm.com',
        ]);

        Adviser::factory()->create([
            'first_name' => 'Jane',
            'last_name' => 'Smith',
            'email' => 'jane@loancrm.com',
        ]);

        Adviser::factory()->create([
            'first_name' => 'Mike',
            'last_name' => 'Johnson',
            'email' => 'mike@loancrm.com',
        ]);
    }
}