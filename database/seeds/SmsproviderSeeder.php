<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\smsprovider;

class SmsproviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('smsproviders')->insert(

            // [
            //     'providername' => 'TextLocal',
            //     'username' => 'arpitasingh820@gmail.com',
            //     'sendurl' => 'http://api.textlocal.in/send/',
            //     'provider' => 'TXTLCL',
            //     'apikey' => 'b64d3af4609a5eb30bbdaf5ede68855e6dd7849e02f0cffe36785eaca67beabd',
            //     'route' => '0'

            // ],
            [

                'providername' => 'Fast2sms',
                'username' => '',
                'sendurl' => 'https://www.fast2sms.com/dev/bulkV2',
                'provider' => 'TXTIND',
                'apikey' => 'xaL2gNQE1uVXt0cenlBzYZfmkyjO7iC94v6H3PwMoKJbTsAWSIXJ70uUAdMlj2Bq4e6mzr9FOZcsGR1n',
                'route' => 'v3'

            ]


        );
    }
}
