<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Service;
use App\Mail\MessageEmail;
use App\Mail\ServiceEmail;
use Illuminate\Http\Request;
use App\Models\ServiceRequest;
use App\Mail\MessageEmailFeedback;
use App\Mail\ServiceEmailFeedback;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ProcessController extends Controller
{
    public function processMessage(Request $request)
    {
        if (Auth::check()) {
            $rules = [
                'name' => ['required', 'string', 'max:30'],
                'subject' => ['required', 'string', 'max:255', 'min:2'],
                'email' => ['required', 'string', 'max:255', 'email'],
                'message' => ['required', 'string', 'max:1000', 'min:3'],
            ];

            // Validate input data
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect('/contact#next-section')->withErrors($validator)->withInput();
            } else {
                try {
                    // Start a database transaction
                    DB::beginTransaction();

                    $formData = new Message();
                    $formData->name = $request->input('name');
                    $formData->subject = $request->input('subject');
                    $formData->message = htmlspecialchars($request->input('message')); // Sanitize user input
                    $formData->user_id = Auth::id(); // Use authenticated user's ID
                    $formData->email = $request->input('email');

                    $formData->save();

                    $mailto = 'info@cloudstechn.com';

                    // Email sending (ensure that email content is sanitized and secure)
                    // Mail::to($mailto)->send(new MessageEmail($formData));
                    // Mail::to($formData->email)->send(new MessageEmailFeedback($formData));

                    // Commit the transaction
                    DB::commit();

                    session()->flash('success', 'Thank you for contacting TechClouds, Your Message is received successiful!!');
                    return redirect('/contact#notification');
                } catch (\Exception $e) {
                    // An error occurred, so roll back the transaction
                    DB::rollBack();

                    // You can log the error or handle it as needed
                    return redirect('/contact#error-section')->with('error', 'There is an error ocured during processing your request, the system maintenance will work on this so soon!');
                }
            }
        } else {
            return redirect()->route('register');
        }
    }



    function makeOrder(Request $request)
    {
        $rules = [
            'Customer_Phone' => ['required', 'string', 'max:20'],
            'Short_Description' => ['required', 'string', 'min:10', 'max:1000'],
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            session()->flash('error', 'Order could not be completed, Please Fill in the phone number in your account Settings to continue!');
            return redirect('/services#feeds');
        } else {
            $formData = new ServiceRequest();
            $formData->Customer_Name = request()->Customer_Name;
            $formData->client_id = request()->client_id;
            $formData->Customer_Email = request()->Customer_Email;
            $formData->Customer_Phone = request()->Customer_Phone;
            $formData->Service_Requested = request()->Service_Requested;
            $formData->Short_Description = request()->Short_Description;

            $formData->save();

            session()->flash('success', 'You Service request has been placed successiful, Our team will get back to you shortly!');
            //Sending the emial to the user and the administration system
            $mailto = 'info@cloudstechn.com';
            // Mail::to($mailto)->send(new ServiceEmail($formData));
            // Mail::to($formData->Customer_Email)->send(new ServiceEmailFeedback($formData));
            return redirect('/services#feeds');
        }
    }
}