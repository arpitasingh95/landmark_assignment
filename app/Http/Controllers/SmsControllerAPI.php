<?php

namespace App\Http\Controllers;

use App\smsprovider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;
use App\smssenddetail;

class SmsControllerAPI extends Controller
{
    public function gatway(Request $request)
    {
        $rules  =     [
            'to' => 'required|min:11|numeric',
            'provider'    => 'required',
            'content' => 'required',
        ];

        $input     = $request->only('to', 'provider', 'content');
        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'error' => $validator->messages()]);
        }
        try {
            $smsproviderdetail = smsprovider::where('provider', $request->provider)->first();
            if ($smsproviderdetail) {
                $sendurl =  $smsproviderdetail->sendurl;
                $provider =  $smsproviderdetail->provider;
                $apikey =  $smsproviderdetail->apikey;
                $message = $request->content;

                if (!empty($apikey)) {
                    $headerData = ["Authorization" => $apikey];
                } else {
                    $headerData = ["Authorization" => ''];
                }

                $senddata = ['headers' => $headerData, 'form_params' => [
                    'sender' => $provider,
                    'message' => $message,
                    'numbers' => $request->to

                ]];
                $data = self::makepostcall($sendurl, $senddata);

                if ($data['httpstatus'] == 200) {
                    smssenddetail::savesmsdata($request->to, $smsproviderdetail->id, $request->content);
                    return response()->json(['statuscode' => true, "message" => "Sms Sent sucessfully"]);
                }
            } else {
                return response()->json([
                    "statuscode" => false,
                    "message" => "SMSProvider not registered. please register first",
                    "url" => url('/') . '/api/registersmsprovider'
                ]);
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    static public function makepostcall($url, $senddata)
    {
        try {
            $data = [];
            $client = new Client();
            $response = $client->post($url, $senddata);

            $data =  ['data' => json_decode($response->getBody(), true), 'httpstatus' => $response->getStatusCode()];
        } catch (\GuzzleHttp\Exception\BadResponseException $e) {
            // throw $e;
        } catch (\Exception $e) {
            // throw $e;
        }
        return $data;
    }


    public function registersmsprovider(Request $request)
    {
        $rules  =     [
            'provider'    => 'unique:smsproviders|required',
            'sendurl' => 'required',
        ];

        $input     = $request->only('sendurl', 'provider');
        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'error' => $validator->messages()]);
        }
        try {
            $addsmsprovider = new smsprovider();
            $addsmsprovider->providername =  $request->providername;
            $addsmsprovider->sendurl =  $request->sendurl;
            $addsmsprovider->provider =  $request->provider;
            $addsmsprovider->apikey = $request->apikey;
            if ($addsmsprovider->save()) {
                return response()->json([
                    "status" => true,
                    "message" => "Registered suceessfully! ready to use",
                    'checkurl' => url('/') . '/api/getsmsprovider'
                ]);
            }
        } catch (\Throwable $th) {
            // throw $th;
        }
    }

    public function getsmsproviderdetails(Request $request)
    {

        try {
            $getsmsprovider =   smsprovider::all();
            if (count($getsmsprovider) > 0) {
                return response()->json(['statuscode' => true, 'providerdetails' => $getsmsprovider]);
            } else {
                return response()->json(['statuscode' => true, 'providerdetails' => 'NOT DATA FOUND']);
            }
        } catch (\Throwable $th) {
            // throw $th;
        }
    }
}
