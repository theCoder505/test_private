<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BrandPagesController extends Controller
{







    public function showBrandPageInformation()
    {
        $total_menufacturers = DB::table('vendors')->where('type', 'menufacturer')->count();
        $total_influencers = DB::table('vendors')->where('type', 'influencer')->count();
        $total_enterprenuers = DB::table('vendors')->where('type', 'entrepreneur')->count();
        $tot_orders = DB::table('order_payment')->count();
        $tot_reviews = DB::table('reviews')->count();

        $enterprenuer_profiles = DB::table('vendor_profile')->where('vendor_type', 'entrepreneur')->orderByDesc('serial')->get();
        $influencer_profiles = DB::table('vendor_profile')->where('vendor_type', 'influencer')->orderByDesc('serial')->get();
        $brand_data = DB::table('brand_section_data')->where('sno', 1)->get();
        $rest_data = DB::table('brand_rest_section_data')->where('sno', 1)->get();
        return view('surface.pages.admin-brand-page-edit', compact('total_menufacturers', 'total_influencers', 'total_enterprenuers', 'tot_orders', 'tot_reviews', 'enterprenuer_profiles', 'influencer_profiles', 'brand_data', 'rest_data'));
    }













    public function updateBrandPageInformation(Request $request)
    {

        if ($file = $request->file('div_1_img')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/brand_page_images/';
            $req_div_1_img = '/website/brand_page_images/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_div_1_img = DB::table('brand_section_data')->where('sno', 1)->value('div_1_img');
        }

        if ($file = $request->file('div_2_img')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/brand_page_images/';
            $req_div_2_img = '/website/brand_page_images/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_div_2_img = DB::table('brand_section_data')->where('sno', 1)->value('div_2_img');
        }

        if ($file = $request->file('div_3_img')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/brand_page_images/';
            $req_div_3_img = '/website/brand_page_images/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_div_3_img = DB::table('brand_section_data')->where('sno', 1)->value('div_3_img');
        }

        if ($file = $request->file('div_4_img')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/brand_page_images/';
            $req_div_4_img = '/website/brand_page_images/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_div_4_img = DB::table('brand_section_data')->where('sno', 1)->value('div_4_img');
        }

        if ($file = $request->file('div_5_img')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/brand_page_images/';
            $req_div_5_img = '/website/brand_page_images/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_div_5_img = DB::table('brand_section_data')->where('sno', 1)->value('div_5_img');
        }

        if ($file = $request->file('div_6_img')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/brand_page_images/';
            $req_div_6_img = '/website/brand_page_images/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_div_6_img = DB::table('brand_section_data')->where('sno', 1)->value('div_6_img');
        }

        if ($file = $request->file('div_7_img')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/brand_page_images/';
            $req_div_7_img = '/website/brand_page_images/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_div_7_img = DB::table('brand_section_data')->where('sno', 1)->value('div_7_img');
        }

        if ($file = $request->file('div_8_img')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/brand_page_images/';
            $req_div_8_img = '/website/brand_page_images/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_div_8_img = DB::table('brand_section_data')->where('sno', 1)->value('div_8_img');
        }

        if ($file = $request->file('supply_img')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/brand_page_images/';
            $req_supply_img = '/website/brand_page_images/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_supply_img = DB::table('brand_section_data')->where('sno', 1)->value('supply_img');
        }

        if ($file = $request->file('fulfil_img')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/brand_page_images/';
            $req_fulfil_img = '/website/brand_page_images/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_fulfil_img = DB::table('brand_section_data')->where('sno', 1)->value('fulfil_img');
        }

        if ($file = $request->file('ecom_img')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/brand_page_images/';
            $req_ecom_img = '/website/brand_page_images/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_ecom_img = DB::table('brand_section_data')->where('sno', 1)->value('ecom_img');
        }

        if ($file = $request->file('sec_2_1_img')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/brand_page_images/';
            $req_sec_2_1_img = '/website/brand_page_images/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_sec_2_1_img = DB::table('brand_section_data')->where('sno', 1)->value('sec_2_1_img');
        }

        if ($file = $request->file('sec_2_2_img')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/brand_page_images/';
            $req_sec_2_2_img = '/website/brand_page_images/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_sec_2_2_img = DB::table('brand_section_data')->where('sno', 1)->value('sec_2_2_img');
        }

        if ($file = $request->file('sec_2_3_img')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/brand_page_images/';
            $req_sec_2_3_img = '/website/brand_page_images/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_sec_2_3_img = DB::table('brand_section_data')->where('sno', 1)->value('sec_2_3_img');
        }

        if ($file = $request->file('sec_2_4_img')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/brand_page_images/';
            $req_sec_2_4_img = '/website/brand_page_images/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_sec_2_4_img = DB::table('brand_section_data')->where('sno', 1)->value('sec_2_4_img');
        }

        if ($file = $request->file('sec_2_5_img')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/brand_page_images/';
            $req_sec_2_5_img = '/website/brand_page_images/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_sec_2_5_img = DB::table('brand_section_data')->where('sno', 1)->value('sec_2_5_img');
        }

        if ($file = $request->file('sec_2_6_img')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/brand_page_images/';
            $req_sec_2_6_img = '/website/brand_page_images/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_sec_2_6_img = DB::table('brand_section_data')->where('sno', 1)->value('sec_2_6_img');
        }

        if ($file = $request->file('sec_2_7_img')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/brand_page_images/';
            $req_sec_2_7_img = '/website/brand_page_images/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_sec_2_7_img = DB::table('brand_section_data')->where('sno', 1)->value('sec_2_7_img');
        }

        if ($file = $request->file('sec_2_8_img')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/brand_page_images/';
            $req_sec_2_8_img = '/website/brand_page_images/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_sec_2_8_img = DB::table('brand_section_data')->where('sno', 1)->value('sec_2_8_img');
        }





        $req_sec_1_title = $request['sec_1_title'];
        $req_sec_1_short_desac = $request['sec_1_short_desac'];
        $req_div_1_title = $request['div_1_title'];
        $req_div_1_text = $request['div_1_text'];
        $req_div_2_title = $request['div_2_title'];
        $req_div_2_text = $request['div_2_text'];
        $req_div_3_title = $request['div_3_title'];
        $req_div_3_text = $request['div_3_text'];
        $req_div_4_title = $request['div_4_title'];
        $req_div_4_text = $request['div_4_text'];
        $req_div_5_title = $request['div_5_title'];
        $req_div_5_text = $request['div_5_text'];
        $req_div_6_title = $request['div_6_title'];
        $req_div_6_text = $request['div_6_text'];
        $req_div_7_title = $request['div_7_title'];
        $req_div_7_text = $request['div_7_text'];
        $req_div_8_title = $request['div_8_title'];
        $req_div_8_text = $request['div_8_text'];
        $req_sec_2_title = $request['sec_2_title'];
        $req_sec_2_short_desac = $request['sec_2_short_desac'];
        $req_supply_title = $request['supply_title'];
        $req_supply_text = $request['supply_text'];
        $req_fulfil_title = $request['fulfil_title'];
        $req_fulfil_text = $request['fulfil_text'];
        $req_ecom_title = $request['ecom_title'];
        $req_ecom_text = $request['ecom_text'];
        $req_sec_2_1_title = $request['sec_2_1_title'];
        $req_sec_2_1_text = $request['sec_2_1_text'];
        $req_sec_2_2_title = $request['sec_2_2_title'];
        $req_sec_2_2_text = $request['sec_2_2_text'];
        $req_sec_2_3_title = $request['sec_2_3_title'];
        $req_sec_2_3_text = $request['sec_2_3_text'];
        $req_sec_2_4_title = $request['sec_2_4_title'];
        $req_sec_2_4_text = $request['sec_2_4_text'];
        $req_sec_2_5_title = $request['sec_2_5_title'];
        $req_sec_2_5_text = $request['sec_2_5_text'];
        $req_sec_2_6_title = $request['sec_2_6_title'];
        $req_sec_2_6_text = $request['sec_2_6_text'];
        $req_sec_2_7_title = $request['sec_2_7_title'];
        $req_sec_2_7_text = $request['sec_2_7_text'];
        $req_sec_2_8_title = $request['sec_2_8_title'];
        $req_sec_2_8_text = $request['sec_2_8_text'];




        $update1 = DB::table('brand_section_data')->where('sno', 1)->update([
            'div_1_img' => $req_div_1_img,
            'div_2_img' => $req_div_2_img,
            'div_3_img' => $req_div_3_img,
            'div_4_img' => $req_div_4_img,
            'div_5_img' => $req_div_5_img,
            'div_6_img' => $req_div_6_img,
            'div_7_img' => $req_div_7_img,
            'div_8_img' => $req_div_8_img,
            'supply_img' => $req_supply_img,
            'fulfil_img' => $req_fulfil_img,
            'ecom_img' => $req_ecom_img,
            'sec_2_1_img' => $req_sec_2_1_img,
            'sec_2_2_img' => $req_sec_2_2_img,
            'sec_2_3_img' => $req_sec_2_3_img,
            'sec_2_4_img' => $req_sec_2_4_img,
            'sec_2_5_img' => $req_sec_2_5_img,
            'sec_2_6_img' => $req_sec_2_6_img,
            'sec_2_7_img' => $req_sec_2_7_img,
            'sec_2_8_img' => $req_sec_2_8_img,
            'sec_1_title' => $req_sec_1_title,
            'sec_1_short_desac' => $req_sec_1_short_desac,
            'div_1_title' => $req_div_1_title,
            'div_1_text' => $req_div_1_text,
            'div_2_title' => $req_div_2_title,
            'div_2_text' => $req_div_2_text,
            'div_3_title' => $req_div_3_title,
            'div_3_text' => $req_div_3_text,
            'div_4_title' => $req_div_4_title,
            'div_4_text' => $req_div_4_text,
            'div_5_title' => $req_div_5_title,
            'div_5_text' => $req_div_5_text,
            'div_6_title' => $req_div_6_title,
            'div_6_text' => $req_div_6_text,
            'div_7_title' => $req_div_7_title,
            'div_7_text' => $req_div_7_text,
            'div_8_title' => $req_div_8_title,
            'div_8_text' => $req_div_8_text,
            'sec_2_title' => $req_sec_2_title,
            'sec_2_short_desac' => $req_sec_2_short_desac,
            'supply_title' => $req_supply_title,
            'supply_text' => $req_supply_text,
            'fulfil_title' => $req_fulfil_title,
            'fulfil_text' => $req_fulfil_text,
            'ecom_title' => $req_ecom_title,
            'ecom_text' => $req_ecom_text,
            'sec_2_1_title' => $req_sec_2_1_title,
            'sec_2_1_text' => $req_sec_2_1_text,
            'sec_2_2_title' => $req_sec_2_2_title,
            'sec_2_2_text' => $req_sec_2_2_text,
            'sec_2_3_title' => $req_sec_2_3_title,
            'sec_2_3_text' => $req_sec_2_3_text,
            'sec_2_4_title' => $req_sec_2_4_title,
            'sec_2_4_text' => $req_sec_2_4_text,
            'sec_2_5_title' => $req_sec_2_5_title,
            'sec_2_5_text' => $req_sec_2_5_text,
            'sec_2_6_title' => $req_sec_2_6_title,
            'sec_2_6_text' => $req_sec_2_6_text,
            'sec_2_7_title' => $req_sec_2_7_title,
            'sec_2_7_text' => $req_sec_2_7_text,
            'sec_2_8_title' => $req_sec_2_8_title,
            'sec_2_8_text' => $req_sec_2_8_text,
        ]);












        if ($file = $request->file('launch_img')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/brand_page_images/';
            $req_launch_img = '/website/brand_page_images/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_launch_img = DB::table('brand_rest_section_data')->where('sno', 1)->value('launch_img');
        }


        if ($file = $request->file('streamline_img')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/brand_page_images/';
            $req_streamline_img = '/website/brand_page_images/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_streamline_img = DB::table('brand_rest_section_data')->where('sno', 1)->value('streamline_img');
        }


        if ($file = $request->file('scale_img')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/brand_page_images/';
            $req_scale_img = '/website/brand_page_images/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_scale_img = DB::table('brand_rest_section_data')->where('sno', 1)->value('scale_img');
        }


        if ($file = $request->file('chain_1_img')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/brand_page_images/';
            $req_chain_1_img = '/website/brand_page_images/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_chain_1_img = DB::table('brand_rest_section_data')->where('sno', 1)->value('chain_1_img');
        }


        if ($file = $request->file('chain_2_img')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/brand_page_images/';
            $req_chain_2_img = '/website/brand_page_images/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_chain_2_img = DB::table('brand_rest_section_data')->where('sno', 1)->value('chain_2_img');
        }


        if ($file = $request->file('chain_3_img')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/brand_page_images/';
            $req_chain_3_img = '/website/brand_page_images/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_chain_3_img = DB::table('brand_rest_section_data')->where('sno', 1)->value('chain_3_img');
        }


        if ($file = $request->file('chain_4_img')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/brand_page_images/';
            $req_chain_4_img = '/website/brand_page_images/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_chain_4_img = DB::table('brand_rest_section_data')->where('sno', 1)->value('chain_4_img');
        }


        if ($file = $request->file('subscription_1_img')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/brand_page_images/';
            $req_subscription_1_img = '/website/brand_page_images/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_subscription_1_img = DB::table('brand_rest_section_data')->where('sno', 1)->value('subscription_1_img');
        }


        if ($file = $request->file('subscription_2_img')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/brand_page_images/';
            $req_subscription_2_img = '/website/brand_page_images/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_subscription_2_img = DB::table('brand_rest_section_data')->where('sno', 1)->value('subscription_2_img');
        }


        if ($file = $request->file('subscription_3_img')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/brand_page_images/';
            $req_subscription_3_img = '/website/brand_page_images/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_subscription_3_img = DB::table('brand_rest_section_data')->where('sno', 1)->value('subscription_3_img');
        }


        if ($file = $request->file('subscription_4_img')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/brand_page_images/';
            $req_subscription_4_img = '/website/brand_page_images/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_subscription_4_img = DB::table('brand_rest_section_data')->where('sno', 1)->value('subscription_4_img');
        }



        $req_sec_3_title = $request['sec_3_title'];
        $req_launch_title = $request['launch_title'];
        $req_launch_text = $request['launch_text'];
        $req_launch_red_text = $request['launch_red_text'];
        $req_streamline_title = $request['streamline_title'];
        $req_streamline_text = $request['streamline_text'];
        $req_streamline_red_text = $request['streamline_red_text'];
        $req_scale_title = $request['scale_title'];
        $req_scale_text = $request['scale_text'];
        $req_scale_red_text = $request['scale_red_text'];
        $req_sec_4_title = $request['sec_4_title'];
        $req_chain_1_title = $request['chain_1_title'];
        $req_chain_1_short_text = $request['chain_1_short_text'];
        $req_chain_1_long_text = $request['chain_1_long_text'];
        $req_chain_2_title = $request['chain_2_title'];
        $req_chain_2_short_text = $request['chain_2_short_text'];
        $req_chain_2_long_text = $request['chain_2_long_text'];
        $req_chain_3_title = $request['chain_3_title'];
        $req_chain_3_short_text = $request['chain_3_short_text'];
        $req_chain_3_long_text = $request['chain_3_long_text'];
        $req_chain_4_title = $request['chain_4_title'];
        $req_chain_4_short_text = $request['chain_4_short_text'];
        $req_chain_4_long_text = $request['chain_4_long_text'];
        $req_sec_5_title = $request['sec_5_title'];
        $req_subscription_1_title = $request['subscription_1_title'];
        $req_subscription_1_text = $request['subscription_1_text'];
        $req_subscription_2_title = $request['subscription_2_title'];
        $req_subscription_2_text = $request['subscription_2_text'];
        $req_subscription_3_title = $request['subscription_3_title'];
        $req_subscription_3_text = $request['subscription_3_text'];
        $req_subscription_4_title = $request['subscription_4_title'];
        $req_subscription_4_text = $request['subscription_4_text'];






        $update2 = DB::table('brand_rest_section_data')->where('sno', 1)->update([
            'launch_img' => $req_launch_img,
            'streamline_img' => $req_streamline_img,
            'scale_img' => $req_scale_img,
            'chain_1_img' => $req_chain_1_img,
            'chain_2_img' => $req_chain_2_img,
            'chain_3_img' => $req_chain_3_img,
            'chain_4_img' => $req_chain_4_img,
            'subscription_1_img' => $req_subscription_1_img,
            'subscription_2_img' => $req_subscription_2_img,
            'subscription_3_img' => $req_subscription_3_img,
            'subscription_4_img' => $req_subscription_4_img,
            'sec_3_title' => $req_sec_3_title,
            'launch_title' => $req_launch_title,
            'launch_text' => $req_launch_text,
            'launch_red_text' => $req_launch_red_text,
            'streamline_title' => $req_streamline_title,
            'streamline_text' => $req_streamline_text,
            'streamline_red_text' => $req_streamline_red_text,
            'scale_title' => $req_scale_title,
            'scale_text' => $req_scale_text,
            'scale_red_text' => $req_scale_red_text,
            'sec_4_title' => $req_sec_4_title,
            'chain_1_title' => $req_chain_1_title,
            'chain_1_short_text' => $req_chain_1_short_text,
            'chain_1_long_text' => $req_chain_1_long_text,
            'chain_2_title' => $req_chain_2_title,
            'chain_2_short_text' => $req_chain_2_short_text,
            'chain_2_long_text' => $req_chain_2_long_text,
            'chain_3_title' => $req_chain_3_title,
            'chain_3_short_text' => $req_chain_3_short_text,
            'chain_3_long_text' => $req_chain_3_long_text,
            'chain_4_title' => $req_chain_4_title,
            'chain_4_short_text' => $req_chain_4_short_text,
            'chain_4_long_text' => $req_chain_4_long_text,
            'sec_5_title' => $req_sec_5_title,
            'subscription_1_title' => $req_subscription_1_title,
            'subscription_1_text' => $req_subscription_1_text,
            'subscription_2_title' => $req_subscription_2_title,
            'subscription_2_text' => $req_subscription_2_text,
            'subscription_3_title' => $req_subscription_3_title,
            'subscription_3_text' => $req_subscription_3_text,
            'subscription_4_title' => $req_subscription_4_title,
            'subscription_4_text' => $req_subscription_4_text,
        ]);


        if ($update1 && $update2) {
            return 'success';
        } else {
            return 'error';
        }
    }











    //
}
