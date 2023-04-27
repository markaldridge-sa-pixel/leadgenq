<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Account;

class FunnelSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {


        DB::table('funnels')->insert([
            'account_id' => 'TEST01',
            'line_nr' => '1',
            'question' => 'I need flooring',
            'answer' => 'Yes',
            'qty' => '1',
            'min_value' => '1500',
            'max_value' => '3000',
            'multiply' => '*',
            'min_line_total' => '1500',
            'max_line_total' => '3000',


        ]);
    }
}
