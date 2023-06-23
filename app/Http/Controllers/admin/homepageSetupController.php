<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class homepageSetupController extends Controller
{
    







    public function showHomePageInformation()
    {
        $total_menufacturers = DB::table('vendors')->where('type', 'menufacturer')->count();
        $total_influencers = DB::table('vendors')->where('type', 'influencer')->count();
        $total_enterprenuers = DB::table('vendors')->where('type', 'entrepreneur')->count();
        $tot_orders = DB::table('order_payment')->count();
        $tot_reviews = DB::table('reviews')->count();

        $enterprenuer_profiles = DB::table('vendor_profile')->where('vendor_type', 'entrepreneur')->orderByDesc('serial')->get();
        $influencer_profiles = DB::table('vendor_profile')->where('vendor_type', 'influencer')->orderByDesc('serial')->get();
        $homepageData = DB::table('homepage_data')->where('sno', 1)->get();
        return view('surface.pages.admin-home-edit', compact('total_menufacturers', 'total_influencers', 'total_enterprenuers', 'tot_orders', 'tot_reviews', 'enterprenuer_profiles', 'influencer_profiles', 'homepageData'));
    }























    public function updateHomePageInformation(Request $request)
    {
        // 31 files for images 

        if ($file = $request->file('slider1')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/homeImages/';
            $req_slider1 = '/website/homeImages/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_slider1 = DB::table('homepage_data')->where('sno', 1)->value('slider1');
        }

        if ($file = $request->file('slider2')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/homeImages/';
            $req_slider2 = '/website/homeImages/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_slider2 = DB::table('homepage_data')->where('sno', 1)->value('slider2');
        }

        if ($file = $request->file('slider3')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/homeImages/';
            $req_slider3 = '/website/homeImages/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_slider3 = DB::table('homepage_data')->where('sno', 1)->value('slider3');
        }

        if ($file = $request->file('slider4')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/homeImages/';
            $req_slider4 = '/website/homeImages/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_slider4 = DB::table('homepage_data')->where('sno', 1)->value('slider4');
        }

        if ($file = $request->file('slider5')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/homeImages/';
            $req_slider5 = '/website/homeImages/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_slider5 = DB::table('homepage_data')->where('sno', 1)->value('slider5');
        }

        if ($file = $request->file('slider6')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/homeImages/';
            $req_slider6 = '/website/homeImages/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_slider6 = DB::table('homepage_data')->where('sno', 1)->value('slider6');
        }

        if ($file = $request->file('slider7')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/homeImages/';
            $req_slider7 = '/website/homeImages/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_slider7 = DB::table('homepage_data')->where('sno', 1)->value('slider7');
        }

        if ($file = $request->file('slider8')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/homeImages/';
            $req_slider8 = '/website/homeImages/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_slider8 = DB::table('homepage_data')->where('sno', 1)->value('slider8');
        }


        if ($file = $request->file('left_img_file')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/homeImages/';
            $req_left_img_file = '/website/homeImages/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_left_img_file = DB::table('homepage_data')->where('sno', 1)->value('left_img_file');
        }


        if ($file = $request->file('right_img_file')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/homeImages/';
            $req_right_img_file = '/website/homeImages/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_right_img_file = DB::table('homepage_data')->where('sno', 1)->value('right_img_file');
        }

        if ($file = $request->file('pdf_src1_img')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/homeImages/';
            $req_pdf_src1_img = '/website/homeImages/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_pdf_src1_img = DB::table('homepage_data')->where('sno', 1)->value('pdf_src1_img');
        }

        if ($file = $request->file('pdf_src2_img')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/homeImages/';
            $req_pdf_src2_img = '/website/homeImages/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_pdf_src2_img = DB::table('homepage_data')->where('sno', 1)->value('pdf_src2_img');
        }

        if ($file = $request->file('pdf_src3_img')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/homeImages/';
            $req_pdf_src3_img = '/website/homeImages/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_pdf_src3_img = DB::table('homepage_data')->where('sno', 1)->value('pdf_src3_img');
        }

        if ($file = $request->file('pdf_src4_img')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/homeImages/';
            $req_pdf_src4_img = '/website/homeImages/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_pdf_src4_img = DB::table('homepage_data')->where('sno', 1)->value('pdf_src4_img');
        }

        if ($file = $request->file('potential_img_1')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/homeImages/';
            $req_potential_img_1 = '/website/homeImages/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_potential_img_1 = DB::table('homepage_data')->where('sno', 1)->value('potential_img_1');
        }

        if ($file = $request->file('potential_img_2')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/homeImages/';
            $req_potential_img_2 = '/website/homeImages/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_potential_img_2 = DB::table('homepage_data')->where('sno', 1)->value('potential_img_2');
        }

        if ($file = $request->file('potential_img_3')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/homeImages/';
            $req_potential_img_3 = '/website/homeImages/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_potential_img_3 = DB::table('homepage_data')->where('sno', 1)->value('potential_img_3');
        }

        if ($file = $request->file('potential_img_4')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/homeImages/';
            $req_potential_img_4 = '/website/homeImages/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_potential_img_4 = DB::table('homepage_data')->where('sno', 1)->value('potential_img_4');
        }

        if ($file = $request->file('overview_img1')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/homeImages/';
            $req_overview_img1 = '/website/homeImages/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_overview_img1 = DB::table('homepage_data')->where('sno', 1)->value('overview_img1');
        }

        if ($file = $request->file('overview_img2')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/homeImages/';
            $req_overview_img2 = '/website/homeImages/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_overview_img2 = DB::table('homepage_data')->where('sno', 1)->value('overview_img2');
        }

        if ($file = $request->file('overview_img3')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/homeImages/';
            $req_overview_img3 = '/website/homeImages/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_overview_img3 = DB::table('homepage_data')->where('sno', 1)->value('overview_img3');
        }

        if ($file = $request->file('sourcing_img')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/homeImages/';
            $req_sourcing_img = '/website/homeImages/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_sourcing_img = DB::table('homepage_data')->where('sno', 1)->value('sourcing_img');
        }

        if ($file = $request->file('storage_img')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/homeImages/';
            $req_storage_img = '/website/homeImages/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_storage_img = DB::table('homepage_data')->where('sno', 1)->value('storage_img');
        }

        if ($file = $request->file('ecommerce_img')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/homeImages/';
            $req_ecommerce_img = '/website/homeImages/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_ecommerce_img = DB::table('homepage_data')->where('sno', 1)->value('ecommerce_img');
        }

        if ($file = $request->file('screenshot_img')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/homeImages/';
            $req_screenshot_img = '/website/homeImages/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_screenshot_img = DB::table('homepage_data')->where('sno', 1)->value('screenshot_img');
        }

        if ($file = $request->file('soap_img')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/homeImages/';
            $req_soap_img = '/website/homeImages/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_soap_img = DB::table('homepage_data')->where('sno', 1)->value('soap_img');
        }

        if ($file = $request->file('daddy_img')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/homeImages/';
            $req_daddy_img = '/website/homeImages/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_daddy_img = DB::table('homepage_data')->where('sno', 1)->value('daddy_img');
        }

        if ($file = $request->file('varifiedss_img')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/homeImages/';
            $req_varifiedss_img = '/website/homeImages/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_varifiedss_img = DB::table('homepage_data')->where('sno', 1)->value('varifiedss_img');
        }

        if ($file = $request->file('lowcostss_img')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/homeImages/';
            $req_lowcostss_img = '/website/homeImages/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_lowcostss_img = DB::table('homepage_data')->where('sno', 1)->value('lowcostss_img');
        }

        if ($file = $request->file('ecomss_img')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/homeImages/';
            $req_ecomss_img = '/website/homeImages/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_ecomss_img = DB::table('homepage_data')->where('sno', 1)->value('ecomss_img');
        }



        // 4 PDF Data files 

        if ($file = $request->file('pdf_file_src1')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/homePdf/';
            $req_pdf_file_src1 = '/website/homePdf/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_pdf_file_src1 = DB::table('homepage_data')->where('sno', 1)->value('pdf_file_src1');
        }

        if ($file = $request->file('pdf_file_src2')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/homePdf/';
            $req_pdf_file_src2 = '/website/homePdf/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_pdf_file_src2 = DB::table('homepage_data')->where('sno', 1)->value('pdf_file_src2');
        }

        if ($file = $request->file('pdf_file_src3')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/homePdf/';
            $req_pdf_file_src3 = '/website/homePdf/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_pdf_file_src3 = DB::table('homepage_data')->where('sno', 1)->value('pdf_file_src3');
        }

        if ($file = $request->file('pdf_file_src4')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/homePdf/';
            $req_pdf_file_src4 = '/website/homePdf/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_pdf_file_src4 = DB::table('homepage_data')->where('sno', 1)->value('pdf_file_src4');
        }



        

        $req_brand_line_images = array();
        if ($files = $request->file('brand_images')) {
            foreach ($files as $file) {
                $req_brand_line_images_name = md5(rand(1000, 10000));
                $ext = strtolower($file->getClientOriginalExtension());
                $req_brand_line_images_full_name = $req_brand_line_images_name . '.' . $ext;
                $upload_path = 'website/brand_images/';
                $req_brand_line_images_url = '/' . $upload_path . $req_brand_line_images_full_name;
                $file->move($upload_path, $req_brand_line_images_full_name);
                $req_brand_line_images[] = $req_brand_line_images_url;
            }
        }



        $req_sec2_title = $request['sec2_title'];
        $req_sec2_text = $request['sec2_text'];
        $req_sm_dtls_txt_1 = $request['sm_dtls_txt_1'];
        $req_sm_dtls_txt_2 = $request['sm_dtls_txt_2'];
        $req_sm_dtls_txt_3 = $request['sm_dtls_txt_3'];
        $req_sm_dtls_txt_4 = $request['sm_dtls_txt_4'];
        $req_potential_title_1 = $request['potential_title_1'];
        $req_potential_short_desc_1 = $request['potential_short_desc_1'];
        $req_potential_desc_1 = $request['potential_desc_1'];
        $req_potential_title_2 = $request['potential_title_2'];
        $req_potential_short_desc_2 = $request['potential_short_desc_2'];
        $req_potential_desc_2 = $request['potential_desc_2'];
        $req_potential_title_3 = $request['potential_title_3'];
        $req_potential_short_desc_3 = $request['potential_short_desc_3'];
        $req_potential_desc_3 = $request['potential_desc_3'];
        $req_potential_title_4 = $request['potential_title_4'];
        $req_potential_short_desc_4 = $request['potential_short_desc_4'];
        $req_potential_desc_4 = $request['potential_desc_4'];
        $req_overview_text_1 = $request['overview_text_1'];
        $req_overview_text_2 = $request['overview_text_2'];
        $req_overview_text_3 = $request['overview_text_3'];
        $req_sourcing_title = $request['sourcing_title'];
        $req_sourcing_text = $request['sourcing_text'];
        $req_storage_title = $request['storage_title'];
        $req_storage_text = $request['storage_text'];
        $req_ecommerce_title = $request['ecommerce_title'];
        $req_ecommerce_text = $request['ecommerce_text'];
        $req_screenshot_text = $request['screenshot_text'];
        $req_soap_text = $request['soap_text'];
        $req_daddy_text = $request['daddy_text'];





        // set all images to specific folders and set old image if file is empty 










        $update = DB::table('homepage_data')->where('sno', 1)->update([
            'slider1' => $req_slider1,
            'slider2' => $req_slider2,
            'slider3' => $req_slider3,
            'slider4' => $req_slider4,
            'slider5' => $req_slider5,
            'slider6' => $req_slider6,
            'slider7' => $req_slider7,
            'slider8' => $req_slider8,
            'left_img_file' => $req_left_img_file,
            'sec2_title' => $req_sec2_title,
            'sec2_text' => $req_sec2_text,
            'right_img_file' => $req_right_img_file,
            'pdf_src1_img' => $req_pdf_src1_img,
            'pdf_file_src1' => $req_pdf_file_src1,
            'sm_dtls_txt_1' => $req_sm_dtls_txt_1,
            'pdf_src2_img' => $req_pdf_src2_img,
            'pdf_file_src2' => $req_pdf_file_src2,
            'sm_dtls_txt_2' => $req_sm_dtls_txt_2,
            'pdf_src3_img' => $req_pdf_src3_img,
            'pdf_file_src3' => $req_pdf_file_src3,
            'sm_dtls_txt_3' => $req_sm_dtls_txt_3,
            'pdf_src4_img' => $req_pdf_src4_img,
            'pdf_file_src4' => $req_pdf_file_src4,
            'sm_dtls_txt_4' => $req_sm_dtls_txt_4,
            'brand_line_images' => implode('|', $req_brand_line_images),
            'potential_img_1' => $req_potential_img_1,
            'potential_title_1' => $req_potential_title_1,
            'potential_short_desc_1' => $req_potential_short_desc_1,
            'potential_desc_1' => $req_potential_desc_1,
            'potential_img_2' => $req_potential_img_2,
            'potential_title_2' => $req_potential_title_2,
            'potential_short_desc_2' => $req_potential_short_desc_2,
            'potential_desc_2' => $req_potential_desc_2,
            'potential_img_3' => $req_potential_img_3,
            'potential_title_3' => $req_potential_title_3,
            'potential_short_desc_3' => $req_potential_short_desc_3,
            'potential_desc_3' => $req_potential_desc_3,
            'potential_img_4' => $req_potential_img_4,
            'potential_title_4' => $req_potential_title_4,
            'potential_short_desc_4' => $req_potential_short_desc_4,
            'potential_desc_4' => $req_potential_desc_4,
            'overview_img1' => $req_overview_img1,
            'overview_text_1' => $req_overview_text_1,
            'overview_img2' => $req_overview_img2,
            'overview_text_2' => $req_overview_text_2,
            'overview_img3' => $req_overview_img3,
            'overview_text_3' => $req_overview_text_3,
            'sourcing_title' => $req_sourcing_title,
            'sourcing_text' => $req_sourcing_text,
            'sourcing_img' => $req_sourcing_img,
            'storage_img' => $req_storage_img,
            'storage_title' => $req_storage_title,
            'storage_text' => $req_storage_text,
            'ecommerce_title' => $req_ecommerce_title,
            'ecommerce_text' => $req_ecommerce_text,
            'ecommerce_img' => $req_ecommerce_img,
            'screenshot_img' => $req_screenshot_img,
            'screenshot_text' => $req_screenshot_text,
            'soap_img' => $req_soap_img,
            'soap_text' => $req_soap_text,
            'daddy_img' => $req_daddy_img,
            'daddy_text' => $req_daddy_text,
            'varifiedss_img' => $req_varifiedss_img,
            'lowcostss_img' => $req_lowcostss_img,
            'ecomss_img' => $req_ecomss_img,
        ]);

        if ($update) {
            return 'success';
        }else{
            return 'error';
        }

    }





    
    
    
    
    
    
    
    
    

    
    
    
    
    //
}
