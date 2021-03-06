<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Alerts;
use App\User;
use App\Contact;
use Mail;
class DigiFlare extends Controller
{
    
   /*public function test(Request $request)
    {
       $text = $request->text;
       
    	Storage::append('test.txt', $text);
    	echo true;
    }*/

     public function test(Request $request)
    {
       $text = $request->text;
       //storage
       
    	Storage::append('testDemo.txt', $text);
       //
       if(!$text) {
       	return "0";
       }
       $arr = explode(";", $text);

       if(count($arr) < 2) {
       		return "0";
       }
       $lat = (float) $arr[0];
       $lon = (float) $arr[1];
       if($lat <=0 || $lon <=0) {
       		return "0";
       }
       $device = count($arr) === 3 ?  $arr[2] : "23";

       
       $alerts = Alerts::where([
    	['device_id', '=', $device],
   		['status', '=', 1]
		])->first();
       if(!$alerts) {
			$record = Alerts::forceCreate([
	            'device_id' => $device,
	            'status' => 1,
	            'latitude' => $lat,
	            'longitude' => $lon

        	]);
        	$this->sendEmailtoAll();
       }
       return "1";
    }
    public function list(Request $request)
    {
     	$user = User::first();
     	//dd($user);
 	    $alerts = Alerts::where('status', '=', 1)->get();

         return view('list', ['alerts' => $alerts, "user" => $user]);
    }

    public function resolved(Request $request)
    {
     	$id = $request->id;
     	//dd($user);
 	    $alert = Alerts::where('id', '=', $id)->first();
		$alert->status = 0;
		$alert->update();
		return redirect()->route('list');
    }
    

    public function sendEmail() {
    	 $contacts = Contact::get();
    	 $toall = '';
 		 $alert = Alerts::where('status', '=', 1)->first();
     	 foreach ($contacts as $key => $contact) {
    	 	$to_name = $contact->name;
			$to_email = $contact->email;
			 return view('emails', ['contact' => $contact, 'alert' =>$alert]);
    	 }
    	

    }
    public function sendEmailtoAll() {
    	 $contacts = Contact::get();
    	 $toall = '';
 		 $alert = Alerts::where('status', '=', 1)->first();
     	 foreach ($contacts as $key => $contact) {
    	 	$to_name = $contact->name;
			$to_email = $contact->email;
			Mail::send('emails', ['contact' => $contact, 'alert' =>$alert], function ($m) use ($contact) {
	            $m->from('digiflareor@gmail.com', 'Alert from DigiFLare');
	            $m->to($contact->email, $contact->name)->subject('Alert from DigiFLare');
	        });
    	 }
    	

    }
}
