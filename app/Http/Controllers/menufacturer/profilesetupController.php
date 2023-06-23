<?php

namespace App\Http\Controllers\menufacturer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class profilesetupController extends Controller
{




    public function setUpProfile()
    {
        $loggerType = (Cookie::get('loggertype'));
        $loggerUniqueId = (Cookie::get('loggerUniqueId'));
        $vendor_data = DB::table('vendor_profile')->where('vendor_type', $loggerType)->where('vendor_user_id', $loggerUniqueId)->get();
        $industries = DB::table('industries')->get();
        return view('menufacturers.pages.profile_setup', compact('vendor_data', 'industries'));
    }



    public function setUpInfluencerProfile()
    {
        $loggerType = (Cookie::get('loggertype'));
        $loggerUniqueId = (Cookie::get('loggerUniqueId'));
        $vendor_data = DB::table('vendor_profile')->where('vendor_type', $loggerType)->where('vendor_user_id', $loggerUniqueId)->get();
        $industries = DB::table('industries')->get();
        return view('influencers.pages.profile_setup', compact('vendor_data', 'industries'));
    }


    public function setUpentrepreneurProfile()
    {
        $loggerType = (Cookie::get('loggertype'));
        $loggerUniqueId = (Cookie::get('loggerUniqueId'));
        $vendor_data = DB::table('vendor_profile')->where('vendor_type', $loggerType)->where('vendor_user_id', $loggerUniqueId)->get();
        $industries = DB::table('industries')->get();
        return view('entrepreneurs.pages.profile_setup', compact('vendor_data', 'industries'));
    }














    public function setupVendorProfile(Request $request)
    {
        $loggerType = (Cookie::get('loggertype'));
        $loggerUniqueId = (Cookie::get('loggerUniqueId'));

        $req_business_name = $request['business_name'];
        $req_persons_name = $request['persons_name'];
        $req_comp_bio = $request['comp_bio'];
        $req_phone_number = $request['phone_number'];
        $req_partnerType = $request['partnerType'];
        $req_attribute = json_encode($request['attribute']);
        $req_industries_data = json_encode($request['industries_data']);
        $req_country_name = $request['country_name'];
        $req_state = $request['state'];
        $req_timeforcreateship = $request['timeforcreateship'];
        $req_prod_full_time = $request['prod_full_time'];
        $req_avg_yearly_sale = $request['avg_yearly_sale'];
        $req_notable_projects_n_clients = $request['notable_projects_n_clients'];
        $req_linkedin_url = $request['linkedin_url'];
        $req_website_url = $request['website_url'];
        $req_insta_url = $request['insta_url'];
        $req_fb_url = $request['fb_url'];
        $req_affiliate_url = $request['affiliate_url'];




        if ($file = $request->file('user_comp_logo')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'vendors/companylogo/';
            $logo_image_url = '/vendors/companylogo/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $logo_image_url = '';
        }


        if ($file = $request->file('comp_pdf')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'vendors/pdf/';
            $pdf_image_url = '/vendors/pdf/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $pdf_image_url = '';
        }



        $project_image = array();
        if ($files = $request->file('past_project_gallery')) {
            foreach ($files as $file) {
                $project_image_name = md5(rand(1000, 10000));
                $ext = strtolower($file->getClientOriginalExtension());
                $project_image_full_name = $project_image_name . '.' . $ext;
                $upload_path = 'vendors/projectgallery/';
                $project_image_url = '/vendors/projectgallery/' . $project_image_full_name;
                $file->move($upload_path, $project_image_full_name);
                $project_image[] = $project_image_url;
            }
        }






        $check = DB::table('vendor_profile')->where('vendor_type', $loggerType)->where('vendor_user_id', $loggerUniqueId)->count();
        if ($check > 0) {

            if (!($file = $request->file('user_comp_logo'))) {
                $logo_image_url = DB::table('vendor_profile')->where('vendor_type', $loggerType)->where('vendor_user_id', $loggerUniqueId)->value('company_logo');
            }

            if (!($file = $request->file('past_project_gallery'))) {
                $project_image_urls = DB::table('vendor_profile')->where('vendor_type', $loggerType)->where('vendor_user_id', $loggerUniqueId)->value('project_gallery');
            } else {
                $project_image_urls = (implode('|', $project_image));
            }

            if (!($file = $request->file('comp_pdf'))) {
                $pdf_image_url = DB::table('vendor_profile')->where('vendor_type', $loggerType)->where('vendor_user_id', $loggerUniqueId)->value('pdf_file');
            }

            $update = DB::table('vendor_profile')->where('vendor_type', $loggerType)->where('vendor_user_id', $loggerUniqueId)->update([
                'vendor_type' => $loggerType,
                'vendor_user_id' => $loggerUniqueId,
                'company_logo' => $logo_image_url,
                'business_name' => $req_business_name,
                'persons_name' => $req_persons_name,
                'comp_bio' => $req_comp_bio,
                'pdf_file' => $pdf_image_url,
                'phone_number' => $req_phone_number,
                'partner_account' => $req_partnerType,
                'attributes' => $req_attribute,
                'industry_options' => $req_industries_data,
                'country' => $req_country_name,
                'state' => $req_state,
                'create_n_ship_time' => $req_timeforcreateship,
                'typical_run_time' => $req_prod_full_time,
                'avg_yearly_sales' => $req_avg_yearly_sale,
                'notable_projects' => $req_notable_projects_n_clients,
                'linkedin_url' => $req_linkedin_url,
                'website_url' => $req_website_url,
                'insta_url' => $req_insta_url,
                'fb_url' => $req_fb_url,
                'affiliate_url' => $req_affiliate_url,
                'project_gallery' => $project_image_urls
            ]);


            Cookie::queue(Cookie::forget('profile_status'));
            $mints = (60 * 24 * 30);
            Cookie::queue('profile_status', 1, $mints);

            if ($update) {
                return Redirect::back()->with('alertMsg', 'Profile Updated Successfully!')->with('type', 'alert-success');
            } else {
                return Redirect::back()->with('alertMsg', 'Could not update profile! Try later.')->with('type', 'alert-danger');
            }
        } else {

            $insert = DB::table('vendor_profile')->insert([
                'vendor_type' => $loggerType,
                'vendor_user_id' => $loggerUniqueId,
                'company_logo' => $logo_image_url,
                'business_name' => $req_business_name,
                'persons_name' => $req_persons_name,
                'comp_bio' => $req_comp_bio,
                'pdf_file' => $pdf_image_url,
                'phone_number' => $req_phone_number,
                'partner_account' => $req_partnerType,
                'attributes' => $req_attribute,
                'industry_options' => $req_industries_data,
                'country' => $req_country_name,
                'state' => $req_state,
                'create_n_ship_time' => $req_timeforcreateship,
                'typical_run_time' => $req_prod_full_time,
                'avg_yearly_sales' => $req_avg_yearly_sale,
                'notable_projects' => $req_notable_projects_n_clients,
                'linkedin_url' => $req_linkedin_url,
                'website_url' => $req_website_url,
                'insta_url' => $req_insta_url,
                'fb_url' => $req_fb_url,
                'affiliate_url' => $req_affiliate_url,
                'project_gallery' => implode('|', $project_image)
            ]);

            Cookie::queue(Cookie::forget('profile_status'));
            $mints = (60 * 24 * 30);
            Cookie::queue('profile_status', 1, $mints);

            if ($insert) {
                return Redirect::back()->with('alertMsg', 'Your profile completed successfully!!')->with('type', 'alert-success');
            } else {
                return Redirect::back()->with('alertMsg', 'Could not complete! Try later.')->with('type', 'alert-danger');
            }
        }
    }



    //
}
