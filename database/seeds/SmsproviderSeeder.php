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
            //     'sendurl' => 'https://api.textlocal.in/send/?username=arpitasingh820@gmail.com&hash=b64d3af4609a5eb30bbdaf5ede68855e6dd7849e02f0cffe36785eaca67beabd&test=0',
            //     'provider' => 'TXTLCL',
            //     'apikey' => 'b64d3af4609a5eb30bbdaf5ede68855e6dd7849e02f0cffe36785eaca67beabd',
          

            // ],
            [

                'providername' => 'Fast2sms',
                'sendurl' => 'https://www.fast2sms.com/dev/bulkV2?route=v3',
                'provider' => 'TXTIND',
                'apikey' => 'xaL2gNQE1uVXt0cenlBzYZfmkyjO7iC94v6H3PwMoKJbTsAWSIXJ70uUAdMlj2Bq4e6mzr9FOZcsGR1n',
  
            ]


        );
    }
}
