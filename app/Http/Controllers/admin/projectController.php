<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class projectController extends Controller
{





    public function seePosts()
    {
        $all_posts = DB::table('property_posts')->orderByDesc('serial')->get();
        return view('admin.adminpages.see_posts', compact('all_posts'));
    }




    public function updateNewPost($post_serial_id)
    {
        $particular_post = DB::table('property_posts')->where('serial', $post_serial_id)->get();
        return view('admin.adminpages.update_post', compact('particular_post', 'post_serial_id'));
    }



















    public function addNewPost(Request $request)
    {
        $req_prop_title = $request['prop_title'];
        $req_content = $request['content'];
        $req_prop_kind = $request['prop_kind'];
        $req_management_type = $request['management_type'];
        $req_label = $request['label'];
        $req_currency = $request['currency'];
        $req_worth = $request['worth'];
        $req_common_expenses = $request['common_expenses'];
        $req_video_url = $request['video_url'];
        $req_built_surface = $request['built_surface'];
        $req_land_area = $request['land_area'];
        $req_bathrooms = $request['bathrooms'];
        $req_bedrooms = $request['bedrooms'];
        $req_years = $request['years'];
        $req_address = $request['address'];
        $req_country = $request['country'];
        $req_city = $request['city'];
        $req_qualification = implode(", ", ($request['qualification']));
        $req_add_val = implode(", ", ($request['add_val']));
        $req_charecteristics = json_encode($request['charecteristics']);
        $req_featured_status = $request['featured_status'];
        $req_virtual_tour_text = $request['virtual_tour_text'];
        $req_map_embedded_code = $request['map_embedded_code'];
        $req_disclaimer = $request['disclaimer'];



        $req_multimedia = array();
        if ($files = $request->file('multimedia')) {
            foreach ($files as $file) {
                $req_multimedia_name = md5(rand(1000, 10000));
                $ext = strtolower($file->getClientOriginalExtension());
                $req_multimedia_full_name = $req_multimedia_name . '.' . $ext;
                $upload_path = 'website/multimedia/';
                $req_multimedia_url = '/website/multimedia/' . $req_multimedia_full_name;
                $file->move($upload_path, $req_multimedia_full_name);
                $req_multimedia[] = $req_multimedia_url;
            }
        }


        $insert = DB::table('property_posts')->insert([
            'prop_title' => $req_prop_title,
            'content' => $req_content,
            'property_kind' => $req_prop_kind,
            'management_type' => $req_management_type,
            'label' => $req_label,
            'multimedia' => implode('|', $req_multimedia),
            'currency' => $req_currency,
            'worth' => $req_worth,
            'common_expenses' => $req_common_expenses,
            'video_url' => $req_video_url,
            'built_surface' => $req_built_surface,
            'land_area' => $req_land_area,
            'bathrooms' => $req_bathrooms,
            'bedrooms' => $req_bedrooms,
            'years' => $req_years,
            'address' => $req_address,
            'country' => $req_country,
            'city' => $req_city,
            'qualification' => $req_qualification,
            'add_val' => $req_add_val,
            'charecteristics' => $req_charecteristics,
            'featured_status' => $req_featured_status,
            'virtual_tour_text' => $req_virtual_tour_text,
            'map_embedded_code' => $req_map_embedded_code,
            'disclaimer' => $req_disclaimer,
        ]);


        if ($insert) {
            return Redirect::back()->with('alertMsg', 'Your POST is uploaded successfully!!')->with('type', 'alert-success');
        } else {
            return Redirect::back()->with('alertMsg', 'Could not upload POST! Try later.')->with('type', 'alert-danger');
        }
    }

















    public function updateExistingPost(Request $request)
    {
        $req_post_serial = $request['post_serial'];
        $req_prop_title = $request['prop_title'];
        $req_content = $request['content'];
        $req_prop_kind = $request['prop_kind'];
        $req_management_type = $request['management_type'];
        $req_label = $request['label'];
        $req_currency = $request['currency'];
        $req_worth = $request['worth'];
        $req_common_expenses = $request['common_expenses'];
        $req_video_url = $request['video_url'];
        $req_built_surface = $request['built_surface'];
        $req_land_area = $request['land_area'];
        $req_bathrooms = $request['bathrooms'];
        $req_bedrooms = $request['bedrooms'];
        $req_years = $request['years'];
        $req_address = $request['address'];
        $req_country = $request['country'];
        $req_city = $request['city'];
        $req_qualification = implode(", ", ($request['qualification']));
        $req_add_val = implode(", ", ($request['add_val']));
        $req_charecteristics = json_encode($request['charecteristics']);
        $req_featured_status = $request['featured_status'];
        $req_virtual_tour_text = $request['virtual_tour_text'];
        $req_map_embedded_code = $request['map_embedded_code'];
        $req_disclaimer = $request['disclaimer'];



        $req_multimedia = array();
        if ($files = $request->file('multimedia')) {
            foreach ($files as $file) {
                $req_multimedia_name = md5(rand(1000, 10000));
                $ext = strtolower($file->getClientOriginalExtension());
                $req_multimedia_full_name = $req_multimedia_name . '.' . $ext;
                $upload_path = 'website/multimedia/';
                $req_multimedia_url = '/website/multimedia/' . $req_multimedia_full_name;
                $file->move($upload_path, $req_multimedia_full_name);
                $req_multimedia[] = $req_multimedia_url;
            }
            $imagesData = implode('|', $req_multimedia);
        } else {
            $imagesData = DB::table('property_posts')->where('serial', $req_post_serial)->value('multimedia');
        }


        $update = DB::table('property_posts')->where('serial', $req_post_serial)->update([
            'prop_title' => $req_prop_title,
            'content' => $req_content,
            'property_kind' => $req_prop_kind,
            'management_type' => $req_management_type,
            'label' => $req_label,
            'multimedia' => $imagesData,
            'currency' => $req_currency,
            'worth' => $req_worth,
            'common_expenses' => $req_common_expenses,
            'video_url' => $req_video_url,
            'built_surface' => $req_built_surface,
            'land_area' => $req_land_area,
            'bathrooms' => $req_bathrooms,
            'bedrooms' => $req_bedrooms,
            'years' => $req_years,
            'address' => $req_address,
            'country' => $req_country,
            'city' => $req_city,
            'qualification' => $req_qualification,
            'add_val' => $req_add_val,
            'charecteristics' => $req_charecteristics,
            'featured_status' => $req_featured_status,
            'virtual_tour_text' => $req_virtual_tour_text,
            'map_embedded_code' => $req_map_embedded_code,
            'disclaimer' => $req_disclaimer,
        ]);


        if ($update) {
            return Redirect::back()->with('alertMsg', 'Your POST is updated successfully!!')->with('type', 'alert-success');
        } else {
            return Redirect::back()->with('alertMsg', 'Could not update POST! Try later.')->with('type', 'alert-danger');
        }
    }






    //
}
