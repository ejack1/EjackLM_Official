<?php

namespace App\Http\Controllers;

use App\Models\company_info;
use App\Models\Country;
use App\Models\currency;
use App\Models\general_setting;
use App\Models\payment_setting;
use App\Models\smtp_configuration;
use App\Models\social_details;
use App\Models\testimonial;
use App\Models\time_zome;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;


class AdminSettingController extends Controller
{
    //
    public function index()
    {
        // dd('h');
        // $user->password=Hash::make($request->input('password'));
        $time_zones = time_zome::all();
        // dd($time_zones);
        $currencies = currency::all();
        $countries = Country::all();
        $company_info = company_info::find(1);
        $setting = general_setting::find(1);

        $currency = currency::find($setting->curreny);
        $country = Country::find($setting->default_country_id);
        $time_zone_selected = time_zome::find($setting->time_zone);
        // dd($currency);
        // dd($setting);
        return view('settings.mainsettings',['time_zone_selected' => $time_zone_selected,'country'=>$country,'currency'=> $currency,'currencies' => $currencies,'countries' => $countries,'time_zones' => $time_zones ,'company_info' => $company_info,'setting' => $setting]);
    }

    public function applychanges(Request $request)
    {
        // dd($request);
        $setting = general_setting::find(1);
        $company_info = company_info::find(1);

        $company_info->company_name = $request->company_name ;
        $company_info->company_address = $request->company_address ;
        $company_info->company_phone = $request->company_phone ;
        $company_info->company_vat = $request->company_vat ;
        $company_info->company_email = $request->company_email ;
        $company_info->save();

        $setting->time_zone = $request->time_zone ;
        $setting->page_row = $request->page_row;
        $setting->default_vat = $request->default_vat;
        $setting->default_country_id = $request->default_country_id;
        $setting->invoice_number = $request->invoice_number;
        $setting->awb_number = $request->awb_number;
        $setting->awb_format = $request->awb_format;
        $setting->curreny = $request->currency;
        $setting->admin_charset = $request->admin_charset;
        $setting->front_charset = $request->front_charset;
        // $setting->logo = $request->logo;
        // $setting->save();
        // dd($setting->curreny);
        // dd('hi');
        //for image

        // $request->validate([
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);
            if($request->image)
            {
                $imageName = time().'.'.$request->image->extension();  
     
                // $request->image->move(public_path('images'), $imageName);
                $request->image->move(public_path('images/logo'), $imageName);
          
                /* Store $imageName name in DATABASE from HERE */
                $setting->logo = $imageName ;
            }
        

        $setting->save();
        return back()
            ->with('success','You have successfully upload image.');
            // ->with('image',$imageName); 
    }

    public function SettingSocial()
    {
        $social = social_details::find(1);
        return view('settings.socialsettings',['social'=> $social]);
    }
    public function applySocialchanges(Request $request)
    {
        $social = social_details::find(1);
        // dd($request->fb);
        $social->fb          = $request->fb;
        $social->insta       = $request->in;
        $social->twitter         = $request->tw;
        $social->yt          = $request->yt;
        $social->save();
        return back()
            ->with('success','You have successfully upload image.');
    }

    public function Smtp_config()
    {
        $smtp = smtp_configuration::find(1);
        return view('settings.smtpconfig',['smtp'=> $smtp]);
    }
    // Config::set('mail.port', 587); // default

    public function Smtp_config_update(Request $request)
    {
        $smtp = smtp_configuration::find(1);
        
        $smtp->availability = $request->availability;
        $smtp->port = $request->port;
        $smtp->secure = $request->secure;
        $smtp->host = $request->host;
        $smtp->username = $request->username ;
        $smtp->password = $request->password;
        $smtp->save();
        //it saves config at runtime.. SO YoU CAN ONLY USE IT WHILE SENDING EMAIL TIME...
        // HERE IT IS USELESS BUT OKAY I AM STILL LETING IT BE HERE FOR DEVELOPER'S ASSISTANCE.
        Config::set('mail.port', $smtp->port); // default
        Config::set('mail.host', $smtp->host); // default
        Config::set('mail.username', $smtp->username); // default
        Config::set('mail.password', $smtp->password); // default
        Config::set('mail.encryption', $smtp->encryption); // default

        return back()
        ->with('success','You have successfully upload image.');
    }
    public function paymentsetting()
    {
        $payment = payment_setting::find(1);
        return view('settings.paymentsettings',['payment'=>$payment]);
    }
    public function paymentsettingUpdate(Request $request)
    {
        // dd('hi');
        // dd($request->paypal_email);
        $payment = payment_setting::find(1);
        $payment->paypal_availability = $request->paypal_availability;
        $payment->paypal_email = $request->paypal_email;
        $payment->wire_availability = $request->wire_availability;
        $payment->wire_details = $request->wire_details;
        $payment->save();
        return back()
        ->with('success','You have successfully upload image.');
    }
    public function testimonials()
    {
        // $testimonials =
        $testimonials = testimonial::all();
        return view('settings.testimonials',['testimonials'=>$testimonials]);
    }
    public function testimonial_create()
    {
        // dd('hi');
        return view('settings.testimonialCreate');
    }
    public function testimonialStore(Request $request)
    {
        // dd('hi');
        $testimonial = New testimonial();
        $testimonial->name  = $request->name;
        $testimonial->email = $request->email;

         //for image
         $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $imageName = time().'.'.$request->image->extension();  
     
        $request->image->move(public_path('images/testimonials'), $imageName);
  
        /* Store $imageName name in DATABASE from HERE */
        $testimonial->image = $imageName ;

        $testimonial->save();

        return back()
        ->with('success','You have successfully upload image.');
        // ->with('image',$imageName); 

    }
    public function testimonial_delete($id)
    {
        // dd($id);
        $testimonial = testimonial::find($id);
        // dd($rpo);
        unlink("images/testimonials/".$testimonial->image);

        // Storage::delete('images/'.$rpo->uni.'');

        // Storage::disk('s3')->delete('images/."".');
        // Storage::delete(['upload/test.png', 'upload/test2.png']);

        $testimonial->delete();
        return back()->with("success", "Image deleted successfully.");
    }

    public function testimonial_update_page($id)
    {
        // dd('hi');
        $testimonial = testimonial::find($id);
        return view('settings.testimonial_update',['testimonial'=>$testimonial]);
    }
    public function testimonial_updated(Request $request)
    {
        $testimonial = testimonial::find($request->id);
        // dd($testimonial);
        $testimonial->name = $request->name;
        $testimonial->email = $request->email;

        if($request->image)
        {
            // dd('yes');
            //for image

            //deleting old image
            unlink("images/testimonials/".$testimonial->image);

            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
        
            $imageName = time().'.'.$request->image->extension();  
        
            $request->image->move(public_path('images/testimonials'), $imageName);
    
            /* Store $imageName name in DATABASE from HERE */
            $testimonial->image = $imageName ;
        }
        

        $testimonial->save();
        return back()->with("success", "Updated Successfully.");
    }
}
