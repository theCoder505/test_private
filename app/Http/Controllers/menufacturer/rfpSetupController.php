<?php

namespace App\Http\Controllers\menufacturer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class rfpSetupController extends Controller
{




    public function addNewRFP()
    {
        $loggerType = (Cookie::get('loggertype'));
        $loggerUniqueId = (Cookie::get('loggerUniqueId'));
        $all__related_rfps = DB::table('all_rfps')->where('rfp_creator_type', $loggerType)->where('rfp_creator_id', $loggerUniqueId)->orderByDesc('sno')->get();

        return view('influencers.pages.all_rfp_data', compact('all__related_rfps'));
    }




    public function addNewentrepreneurRFP()
    {
        $loggerType = (Cookie::get('loggertype'));
        $loggerUniqueId = (Cookie::get('loggerUniqueId'));
        $all__related_rfps = DB::table('all_rfps')->where('rfp_creator_type', $loggerType)->where('rfp_creator_id', $loggerUniqueId)->orderByDesc('sno')->get();

        return view('entrepreneurs.pages.all_rfp_data', compact('all__related_rfps'));
    }







    public function showParticularRfpData($rfp_serial, $rfp_category, $rfp_title)
    {
        $particular_rfp_data = DB::table('all_rfps')
            ->where('sno', $rfp_serial)
            ->get();

        return view('influencers.pages.edit_rfp_data', compact('particular_rfp_data', 'rfp_serial', 'rfp_category', 'rfp_title'));
    }






    public function showParticularRfpDataToEnterprenuer($rfp_serial, $rfp_category, $rfp_title)
    {
        $particular_rfp_data = DB::table('all_rfps')
            ->where('sno', $rfp_serial)
            ->get();

        return view('entrepreneurs.pages.edit_rfp_data', compact('particular_rfp_data', 'rfp_serial', 'rfp_category', 'rfp_title'));
    }












    public function postNewInfluencerRFP(Request $request)
    {
        $loggerType = (Cookie::get('loggertype'));
        $loggerUniqueId = (Cookie::get('loggerUniqueId'));

        $req_prod_cat = $request['prod_cat'];
        $req_product_title = $request['product_title'];
        $req_prod_details = $request['prod_details'];
        $req_ref_links = $request['ref_links'];
        $req_need_smaple_query = $request['need_smaple_query'];
        $req_units_to_produce = $request['units_to_produce'];
        $req_launch_time = $request['launch_time'];
        $req_budget = $request['budget'];
        $req_factory_requirements = $request['factory_requirements'];



        $rfp_images = array();
        if ($files = $request->file('product_image')) {
            foreach ($files as $file) {
                $rfp_images_name = md5(rand(1000, 10000));
                $ext = strtolower($file->getClientOriginalExtension());
                $rfp_images_full_name = $rfp_images_name . '.' . $ext;
                $upload_path = 'vendors/rfp_gallery/';
                $rfp_images_url = '/vendors/rfp_gallery/' . $rfp_images_full_name;
                $file->move($upload_path, $rfp_images_full_name);
                $rfp_images[] = $rfp_images_url;
            }
        }


        $insert = DB::table('all_rfps')->insert([
            'rfp_creator_type' => $loggerType,
            'rfp_creator_id' => $loggerUniqueId,
            'category' => $req_prod_cat,
            'title' => $req_product_title,
            'rfp_images' => implode('|', $rfp_images),
            'description' => $req_prod_details,
            'ref_links' => $req_ref_links,
            'sample_query' => $req_need_smaple_query,
            'units' => $req_units_to_produce,
            'launch_time' => $req_launch_time,
            'budget' => $req_budget,
            'requirement' => $req_factory_requirements
        ]);

        if ($insert) {
            return Redirect::back()->with('alertMsg', 'Your RFP is uploaded successfully!!')->with('type', 'alert-success');
        } else {
            return Redirect::back()->with('alertMsg', 'Could not upload RFP! Try later.')->with('type', 'alert-danger');
        }
    }











    public function postNewentrepreneurRFP(Request $request)
    {
        $loggerType = (Cookie::get('loggertype'));
        $loggerUniqueId = (Cookie::get('loggerUniqueId'));

        $req_rfp_for = $request['rfp_for'];
        $req_prod_cat = $request['prod_cat'];
        $req_product_title = $request['product_title'];
        $req_prod_details = $request['prod_details'];
        $req_ref_links = $request['ref_links'];
        $req_need_smaple_query = $request['need_smaple_query'];
        $req_units_to_produce = $request['units_to_produce'];
        $req_launch_time = $request['launch_time'];
        $req_budget = $request['budget'];
        $req_factory_requirements = $request['factory_requirements'];



        $rfp_images = array();
        if ($files = $request->file('product_image')) {
            foreach ($files as $file) {
                $rfp_images_name = md5(rand(1000, 10000));
                $ext = strtolower($file->getClientOriginalExtension());
                $rfp_images_full_name = $rfp_images_name . '.' . $ext;
                $upload_path = 'vendors/rfp_gallery/';
                $rfp_images_url = '/vendors/rfp_gallery/' . $rfp_images_full_name;
                $file->move($upload_path, $rfp_images_full_name);
                $rfp_images[] = $rfp_images_url;
            }
        }


        $insert = DB::table('all_rfps')->insert([
            'rfp_creator_type' => $loggerType,
            'rfp_creator_id' => $loggerUniqueId,
            'rfp_for' => $req_rfp_for,
            'category' => $req_prod_cat,
            'title' => $req_product_title,
            'rfp_images' => implode('|', $rfp_images),
            'description' => $req_prod_details,
            'ref_links' => $req_ref_links,
            'sample_query' => $req_need_smaple_query,
            'units' => $req_units_to_produce,
            'launch_time' => $req_launch_time,
            'budget' => $req_budget,
            'requirement' => $req_factory_requirements
        ]);

        if ($insert) {
            return Redirect::back()->with('alertMsg', 'Your RFP is uploaded successfully!!')->with('type', 'alert-success');
        } else {
            return Redirect::back()->with('alertMsg', 'Could not upload RFP! Try later.')->with('type', 'alert-danger');
        }
    }



















    public function updateExistingInfluencer(Request $request)
    {
        $loggerType = (Cookie::get('loggertype'));
        $loggerUniqueId = (Cookie::get('loggerUniqueId'));

        $req_edit_rfp_sno = $request['edit_rfp_sno'];
        $req_edit_rfp_category = $request['edit_rfp_category'];
        $req_edit_rfp_title = $request['edit_rfp_title'];

        $req_prod_cat = $request['prod_cat'];
        $req_product_title = $request['product_title'];
        $req_prod_details = $request['prod_details'];
        $req_ref_links = $request['ref_links'];
        $req_need_smaple_query = $request['need_smaple_query'];
        $req_units_to_produce = $request['units_to_produce'];
        $req_launch_time = $request['launch_time'];
        $req_budget = $request['budget'];
        $req_factory_requirements = $request['factory_requirements'];



        $rfp_images = array();
        if ($files = $request->file('product_image')) {
            foreach ($files as $file) {
                $rfp_images_name = md5(rand(1000, 10000));
                $ext = strtolower($file->getClientOriginalExtension());
                $rfp_images_full_name = $rfp_images_name . '.' . $ext;
                $upload_path = 'vendors/rfp_gallery/';
                $rfp_images_url = '/vendors/rfp_gallery/' . $rfp_images_full_name;
                $file->move($upload_path, $rfp_images_full_name);
                $rfp_images[] = $rfp_images_url;
            }

            $image_data = (implode('|', $rfp_images));
        } else {
            $image_data = DB::table('all_rfps')
                ->where('sno', $req_edit_rfp_sno)
                ->value('rfp_images');
        }

        $insert = DB::table('all_rfps')->where('sno', $req_edit_rfp_sno)
            ->update([
                'rfp_creator_type' => $loggerType,
                'rfp_creator_id' => $loggerUniqueId,
                'category' => $req_prod_cat,
                'title' => $req_product_title,
                'rfp_images' => $image_data,
                'description' => $req_prod_details,
                'ref_links' => $req_ref_links,
                'sample_query' => $req_need_smaple_query,
                'units' => $req_units_to_produce,
                'launch_time' => $req_launch_time,
                'budget' => $req_budget,
                'requirement' => $req_factory_requirements
            ]);

        if ($insert) {
            return Redirect::back()->with('alertMsg', 'Your RFP is updated successfully!!')->with('type', 'alert-success');
        } else {
            return Redirect::back()->with('alertMsg', 'Could not update RFP! Try later.')->with('type', 'alert-danger');
        }
    }
















    public function updateExistingentrepreneurRFP(Request $request)
    {
        $loggerType = (Cookie::get('loggertype'));
        $loggerUniqueId = (Cookie::get('loggerUniqueId'));

        $req_edit_rfp_sno = $request['edit_rfp_sno'];
        $req_edit_rfp_category = $request['edit_rfp_category'];
        $req_edit_rfp_title = $request['edit_rfp_title'];

        $req_rfp_for = $request['rfp_for'];
        $req_prod_cat = $request['prod_cat'];
        $req_product_title = $request['product_title'];
        $req_prod_details = $request['prod_details'];
        $req_ref_links = $request['ref_links'];
        $req_need_smaple_query = $request['need_smaple_query'];
        $req_units_to_produce = $request['units_to_produce'];
        $req_launch_time = $request['launch_time'];
        $req_budget = $request['budget'];
        $req_factory_requirements = $request['factory_requirements'];



        $rfp_images = array();
        if ($files = $request->file('product_image')) {
            foreach ($files as $file) {
                $rfp_images_name = md5(rand(1000, 10000));
                $ext = strtolower($file->getClientOriginalExtension());
                $rfp_images_full_name = $rfp_images_name . '.' . $ext;
                $upload_path = 'vendors/rfp_gallery/';
                $rfp_images_url = '/vendors/rfp_gallery/' . $rfp_images_full_name;
                $file->move($upload_path, $rfp_images_full_name);
                $rfp_images[] = $rfp_images_url;
            }

            $image_data = (implode('|', $rfp_images));
        } else {
            $image_data = DB::table('all_rfps')
                ->where('sno', $req_edit_rfp_sno)
                ->value('rfp_images');
        }

        $insert = DB::table('all_rfps')->where('sno', $req_edit_rfp_sno)
            ->update([
                'rfp_creator_type' => $loggerType,
                'rfp_creator_id' => $loggerUniqueId,
                'rfp_for' => $req_rfp_for,
                'category' => $req_prod_cat,
                'title' => $req_product_title,
                'rfp_images' => $image_data,
                'description' => $req_prod_details,
                'ref_links' => $req_ref_links,
                'sample_query' => $req_need_smaple_query,
                'units' => $req_units_to_produce,
                'launch_time' => $req_launch_time,
                'budget' => $req_budget,
                'requirement' => $req_factory_requirements
            ]);

        if ($insert) {
            return Redirect::back()->with('alertMsg', 'Your RFP is updated successfully!!')->with('type', 'alert-success');
        } else {
            return Redirect::back()->with('alertMsg', 'Could not update RFP! Try later.')->with('type', 'alert-danger');
        }
    }










    public function seeResponses($rfp_serial, $rfp_category, $rfp_title)
    {
        $all_responses = DB::table('all_rfp_responses')->where('rfp_serial', $rfp_serial)->orderByDesc('sno')->get();
        return view('influencers.pages.all_rfp_responses', compact('all_responses', 'rfp_serial', 'rfp_category', 'rfp_title'));
    }









    public function seeResponsesToentrepreneur($rfp_serial, $rfp_category, $rfp_title)
    {
        $all_responses = DB::table('all_rfp_responses')->where('rfp_serial', $rfp_serial)->orderByDesc('sno')->get();
        return view('entrepreneurs.pages.all_rfp_responses', compact('all_responses', 'rfp_serial', 'rfp_category', 'rfp_title'));
    }









    public function showAllRfpDatatomenufacturer()
    {
        $loggerType = (Cookie::get('loggertype'));
        $loggerUniqueId = (Cookie::get('loggerUniqueId'));
        $all_rfps = DB::table('all_rfps')->orderByDesc('sno')->where('rfp_for', 'menufacturer')->get();
        return view('menufacturers.pages.added_all_rfps', compact('all_rfps'));
    }






    public function showentrepreneursRFP()
    {
        $loggerType = (Cookie::get('loggertype'));
        $loggerUniqueId = (Cookie::get('loggerUniqueId'));
        $all_rfps = DB::table('all_rfps')->orderByDesc('sno')->where('rfp_for', 'influencer')->get();
        return view('influencers.pages.added_all_rfps', compact('all_rfps'));
    }






    public function particularRequest($proposal_sno, $category, $title)
    {
        $loggerType = (Cookie::get('loggertype'));
        $loggerUniqueId = (Cookie::get('loggerUniqueId'));
        $spec_rfp = DB::table('all_rfps')->where('sno', $proposal_sno)->get();

        $check =  DB::table('all_rfp_responses')->where('rfp_serial', $proposal_sno)->count();
        if ($check > 0) {
            $response = DB::table('all_rfp_responses')
            ->where('rfp_serial', $proposal_sno)
            ->where('user_type', $loggerType)
            ->where('user_id', $loggerUniqueId)
            ->value('user_response');
        }else{
            $response = '';
        }

        return view('menufacturers.pages.specific_rfp', compact('spec_rfp', 'response', 'check'));
    }





    public function particularRequestForInfluencer($proposal_sno, $category, $title)
    {
        $loggerType = (Cookie::get('loggertype'));
        $loggerUniqueId = (Cookie::get('loggerUniqueId'));
        $spec_rfp = DB::table('all_rfps')->where('sno', $proposal_sno)->get();

        $check =  DB::table('all_rfp_responses')->where('rfp_serial', $proposal_sno)->count();
        if ($check > 0) {
            $response = DB::table('all_rfp_responses')
            ->where('rfp_serial', $proposal_sno)
            ->where('user_type', $loggerType)
            ->where('user_id', $loggerUniqueId)
            ->value('user_response');
        }else{
            $response = '';
        }

        return view('influencers.pages.specific_rfp', compact('spec_rfp', 'response', 'check'));
    }














    public function addNewBid(Request $request)
    {
        $loggerUniqueId = (Cookie::get('loggerUniqueId'));
        $loggerAccName = (Cookie::get('loggerAccName'));
        $loggerType = (Cookie::get('loggertype'));

        $req_rfp_for_user_type = $request['rfp_for_user_type'];
        $req_rfp_for_user_id = $request['rfp_for_user_id'];
        $req_rfp_images = $request['rfp_images'];
        $req_bid_over = $request['bid_over'];
        $req_total_bids = $request['total_bids'];
        $req_user_response = $request['user_response'];

        $old_tot = DB::table('all_rfps')->where('sno', $req_bid_over)->value('total_bids');
        DB::table('all_rfps')->where('sno', $req_bid_over)->update([
            'total_bids' => ($old_tot + 1),
        ]);

        $insert = DB::table('all_rfp_responses')->insert([
            'user_id' => $loggerUniqueId,
            'rfp_for_user_type' => $req_rfp_for_user_type,
            'rfp_for_user_id' => $req_rfp_for_user_id,
            'user_id' => $loggerUniqueId,
            'user_name' => $loggerAccName,
            'user_type' => $loggerType,
            'rfp_images' => $req_rfp_images,
            'rfp_serial' => $req_bid_over,
            'user_response' => $req_user_response,
        ]);

        if ($insert) {
            return Redirect::back()->with('alertMsg', 'Your bidding is added successfully!!')->with('type', 'alert-success');
        } else {
            return Redirect::back()->with('alertMsg', 'Could not add your bid! Try later.')->with('type', 'alert-danger');
        }
    }











    public function addNewinfluencerBid(Request $request)
    {
        $loggerUniqueId = (Cookie::get('loggerUniqueId'));
        $loggerAccName = (Cookie::get('loggerAccName'));
        $loggerType = (Cookie::get('loggertype'));

        $req_rfp_for_user_type = $request['rfp_for_user_type'];
        $req_rfp_for_user_id = $request['rfp_for_user_id'];
        $req_rfp_images = $request['rfp_images'];
        $req_bid_over = $request['bid_over'];
        $req_total_bids = $request['total_bids'];
        $req_user_response = $request['user_response'];

        $old_tot = DB::table('all_rfps')->where('sno', $req_bid_over)->value('total_bids');
        DB::table('all_rfps')->where('sno', $req_bid_over)->update([
            'total_bids' => ($old_tot + 1),
        ]);

        $insert = DB::table('all_rfp_responses')->insert([
            'user_id' => $loggerUniqueId,
            'rfp_for_user_type' => $req_rfp_for_user_type,
            'rfp_for_user_id' => $req_rfp_for_user_id,
            'user_id' => $loggerUniqueId,
            'user_name' => $loggerAccName,
            'user_type' => $loggerType,
            'rfp_images' => $req_rfp_images,
            'rfp_serial' => $req_bid_over,
            'user_response' => $req_user_response,
        ]);

        if ($insert) {
            return Redirect::back()->with('alertMsg', 'Your bidding is added successfully!!')->with('type', 'alert-success');
        } else {
            return Redirect::back()->with('alertMsg', 'Could not add your bid! Try later.')->with('type', 'alert-danger');
        }
    }
















    public function deleteRFP($rfp_serial, $rfp_category, $rfp_title)
    {
        $delete = DB::table('all_rfps')->where('sno', $rfp_serial)->where('category', $rfp_category)->where('title', $rfp_title)->delete();
        if ($delete) {
            return Redirect::back()->with('alertMsg', 'Your RFP is deleted successfully!!')->with('type', 'alert-info');
        } else {
            return Redirect::back()->with('alertMsg', 'Could not delete RFP! Try later.')->with('type', 'alert-danger');
        }
    }
    //
}
