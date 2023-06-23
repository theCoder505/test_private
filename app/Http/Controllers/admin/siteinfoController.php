<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class siteinfoController extends Controller
{









    public function showPage()
    {
        $infodata = DB::table('siteinfo')->where('id', 1)->get();
        $term_data = DB::table('more_page_data')->where('page_name', 'terms')->value('page_text');
        $privacy_data = DB::table('more_page_data')->where('page_name', 'privacy')->value('page_text');
        return view('admin.adminpages.siteinfo', compact('infodata', 'term_data', 'privacy_data'));
    }






















    public function editInformation(Request $request)
    {
        $edit_sitelogo = $request["sitelogo"];
        $edit_websitename = $request["websitename"];
        $edit_contactEmail = $request["contactEmail"];
        $edit_contactnmbr = $request["contactnmbr"];
        $edit_fb_link = $request["fb_link"];
        $edit_insta_link = $request["insta_link"];
        $edit_twit_link = $request["twit_link"];
        $edit_linked_link = $request["linked_link"];
        $edit_wp_nmbr = $request["wp_nmbr"];
        $edit_youtube_link = $request["youtube_link"];
        $edit_contactaddress = $request["contactaddress"];

        $edit_terms = $request["terms"];
        $edit_privacy = $request["privacy"];

        $update2 = DB::table('more_page_data')->where('page_name', 'terms')->update(['page_text' => $edit_terms]);
        $update3 = DB::table('more_page_data')->where('page_name', 'privacy')->update(['page_text' => $edit_privacy]);


        $validate = $request->validate([
            'sitelogo' => 'required|mimes:jpg,png,jpeg,gif'
        ]);



        if ($file = $request->file('sitelogo')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/sitelogo/';
            $websitelogo_url = '/website/sitelogo/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $websitelogo_url = DB::table('siteinfo')->where('id', 1)->value('sitelogo');
        }

        if ($file = $request->file('siteicon')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/siteicon/';
            $websiteicon_url = '/website/siteicon/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $websiteicon_url = DB::table('siteinfo')->where('id', 1)->value('siteicon');
        }

        $updateInfo = DB::table('siteinfo')->where('id', 1)->update([
            'sitelogo' => $websitelogo_url,
            'siteicon' => $websiteicon_url,
            'main_sitename' => $edit_websitename,
            'email' => $edit_contactEmail,
            'phone' => $edit_contactnmbr,
            'facebook' => $edit_fb_link,
            'instagram' => $edit_insta_link,
            'tweeter' => $edit_twit_link,
            'linkedin' => $edit_linked_link,
            'whatsapp' => $edit_wp_nmbr,
            'youtube' => $edit_youtube_link,
            'brand_location' => $edit_contactaddress,
        ]);

        if ($updateInfo) {
            return Redirect::back()->with('alertMsg', 'Site Info Been Updated Successfully')->with('type', 'success');
            die();
        } else {
            return Redirect::back()->with('alertMsg', 'Could Not Update Site Info')->with('type', 'danger');
            die();
        }
    }
    //
}
