<?php

namespace App\Http\Controllers\menufacturer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class productController extends Controller
{



    public function setUpProduct()
    {
        $loggerType = (Cookie::get('loggertype'));
        $loggerUniqueId = (Cookie::get('loggerUniqueId'));
        $all_products = DB::table('vendor_products')->where('vendor_type', $loggerType)->where('vendor_unique_id', $loggerUniqueId)->orderByDesc('sno')->get();
        return view('menufacturers.pages.products', compact('all_products'));
    }




    public function setUpInfluencerProduct()
    {
        $loggerType = (Cookie::get('loggertype'));
        $loggerUniqueId = (Cookie::get('loggerUniqueId'));
        $all_products = DB::table('vendor_products')->where('vendor_type', $loggerType)->where('vendor_unique_id', $loggerUniqueId)->orderByDesc('sno')->get();
        return view('influencers.pages.products', compact('all_products'));
    }



















    public function addNewProduct(Request $request)
    {
        $loggerType = (Cookie::get('loggertype'));
        $loggerUniqueId = (Cookie::get('loggerUniqueId'));

        $req_item_name = $request['item_name'];
        $req_prod_desc = $request['prod_desc'];
        $req_sample_price = $request['sample_price'];
        $req_sample_moq = $request['sample_moq'];
        $req_what_receives = $request['what_receives'];
        $req_prod_unit_cost = $request['prod_unit_cost'];
        $req_prod_mcq = $request['prod_mcq'];
        $req_product_category = $request['product_category'];
        $req_skunumber = $request['skunumber'];



        $project_image = array();
        if ($files = $request->file('project_photos')) {
            foreach ($files as $file) {
                $project_image_name = md5(rand(1000, 10000));
                $ext = strtolower($file->getClientOriginalExtension());
                $project_image_full_name = $project_image_name . '.' . $ext;
                $upload_path = 'vendors/projectphotos/';
                $project_image_url = '/vendors/projectphotos/' . $project_image_full_name;
                $file->move($upload_path, $project_image_full_name);
                $project_image[] = $project_image_url;
            }
        }



        $insert = DB::table('vendor_products')->insert([
            'vendor_type' => $loggerType,
            'vendor_unique_id' => $loggerUniqueId,
            'project_photos' => implode('|', $project_image),
            'item_name' => $req_item_name,
            'prod_desc' => $req_prod_desc,
            'sample_price' => $req_sample_price,
            'sample_moq' => $req_sample_moq,
            'what_receives' => $req_what_receives,
            'prod_unit_cost' => $req_prod_unit_cost,
            'prod_mcq' => $req_prod_mcq,
            'product_category' => $req_product_category,
            'skunumber' => $req_skunumber,
        ]);


        if ($insert) {
            return Redirect::back()->with('alertMsg', 'Your product is uploaded successfully!!')->with('type', 'alert-success');
        } else {
            return Redirect::back()->with('alertMsg', 'Could not upload product! Try later.')->with('type', 'alert-danger');
        }
    }



















    public function addNewCustomRequest(Request $request)
    {
        $loggerType = (Cookie::get('loggertype'));
        $loggerUniqueId = (Cookie::get('loggerUniqueId'));

        $req_prod_for = $request['prod_for'];
        $req_item_name = $request['item_name'];
        $req_prod_desc = $request['prod_desc'];
        $req_sample_price = $request['sample_price'];
        $req_sample_moq = $request['sample_moq'];
        $req_what_receives = $request['what_receives'];
        $req_prod_unit_cost = $request['prod_unit_cost'];
        $req_prod_mcq = $request['prod_mcq'];
        $req_product_category = $request['product_category'];
        $req_skunumber = $request['skunumber'];



        $project_image = array();
        if ($files = $request->file('project_photos')) {
            foreach ($files as $file) {
                $project_image_name = md5(rand(1000, 10000));
                $ext = strtolower($file->getClientOriginalExtension());
                $project_image_full_name = $project_image_name . '.' . $ext;
                $upload_path = 'vendors/custom_projectphotos/';
                $project_image_url = '/vendors/custom_projectphotos/' . $project_image_full_name;
                $file->move($upload_path, $project_image_full_name);
                $project_image[] = $project_image_url;
            }
        }



        $insert = DB::table('custom_vendor_products')->insert([
            'vendor_type' => $loggerType,
            'vendor_unique_id' => $loggerUniqueId,
            'order_for' => $req_prod_for,
            
            'project_photos' => implode('|', $project_image),
            'item_name' => $req_item_name,
            'prod_desc' => $req_prod_desc,
            'sample_price' => $req_sample_price,
            'sample_moq' => $req_sample_moq,
            'what_receives' => $req_what_receives,
            'prod_unit_cost' => $req_prod_unit_cost,
            'prod_mcq' => $req_prod_mcq,
            'product_category' => $req_product_category,
            'skunumber' => $req_skunumber,
        ]);


        if ($insert) {
            return Redirect::back()->with('alertMsg', 'Your custom product is uploaded successfully!!')->with('type', 'alert-success');
        } else {
            return Redirect::back()->with('alertMsg', 'Could not upload custom product! Try later.')->with('type', 'alert-danger');
        }
    }


















    public function addNewInfluencerCustomRequest(Request $request)
    {
        $loggerType = (Cookie::get('loggertype'));
        $loggerUniqueId = (Cookie::get('loggerUniqueId'));

        $req_item_name = $request['item_name'];
        $req_prod_desc = $request['prod_desc'];
        $req_sample_price = $request['sample_price'];
        $req_sample_moq = $request['sample_moq'];
        $req_what_receives = $request['what_receives'];
        $req_prod_unit_cost = $request['prod_unit_cost'];
        $req_prod_mcq = $request['prod_mcq'];
        $req_product_category = $request['product_category'];
        $req_skunumber = $request['skunumber'];



        $project_image = array();
        if ($files = $request->file('project_photos')) {
            foreach ($files as $file) {
                $project_image_name = md5(rand(1000, 10000));
                $ext = strtolower($file->getClientOriginalExtension());
                $project_image_full_name = $project_image_name . '.' . $ext;
                $upload_path = 'vendors/custom_projectphotos/';
                $project_image_url = '/vendors/custom_projectphotos/' . $project_image_full_name;
                $file->move($upload_path, $project_image_full_name);
                $project_image[] = $project_image_url;
            }
        }



        $insert = DB::table('custom_vendor_products')->insert([
            'vendor_type' => $loggerType,
            'vendor_unique_id' => $loggerUniqueId,
            'project_photos' => implode('|', $project_image),
            'item_name' => $req_item_name,
            'prod_desc' => $req_prod_desc,
            'sample_price' => $req_sample_price,
            'sample_moq' => $req_sample_moq,
            'what_receives' => $req_what_receives,
            'prod_unit_cost' => $req_prod_unit_cost,
            'prod_mcq' => $req_prod_mcq,
            'product_category' => $req_product_category,
            'skunumber' => $req_skunumber,
        ]);


        if ($insert) {
            return Redirect::back()->with('alertMsg', 'Your custom product is uploaded successfully!!')->with('type', 'alert-success');
        } else {
            return Redirect::back()->with('alertMsg', 'Could not upload custom product! Try later.')->with('type', 'alert-danger');
        }
    }






















    public function showEditingPage($productid)
    {
        $loggerType = (Cookie::get('loggertype'));
        $loggerUniqueId = (Cookie::get('loggerUniqueId'));
        $check = DB::table('vendor_products')->where('vendor_type', $loggerType)->where('vendor_unique_id', $loggerUniqueId)->where('sno', $productid)->count();
        $vendor_product_data = DB::table('vendor_products')->where('vendor_type', $loggerType)->where('vendor_unique_id', $loggerUniqueId)->where('sno', $productid)->get();

        if ($check > 0) {
            return view('menufacturers.pages.edit_product', compact('vendor_product_data'));
        } else {
            return Redirect::back()->with('alertMsg', 'No Such Product You Own!')->with('type', 'alert-danger');
        }
    }













    public function showInfluencerEditingPage($productid)
    {
        $loggerType = (Cookie::get('loggertype'));
        $loggerUniqueId = (Cookie::get('loggerUniqueId'));
        $check = DB::table('vendor_products')->where('vendor_type', $loggerType)->where('vendor_unique_id', $loggerUniqueId)->where('sno', $productid)->count();
        $vendor_product_data = DB::table('vendor_products')->where('vendor_type', $loggerType)->where('vendor_unique_id', $loggerUniqueId)->where('sno', $productid)->get();

        if ($check > 0) {
            return view('influencers.pages.edit_product', compact('vendor_product_data'));
        } else {
            return Redirect::back()->with('alertMsg', 'No Such Product You Own!')->with('type', 'alert-danger');
        }
    }










    public function editCustomInfluencerProductPage($productid)
    {
        $loggerType = (Cookie::get('loggertype'));
        $loggerUniqueId = (Cookie::get('loggerUniqueId'));
        $check = DB::table('custom_vendor_products')->where('vendor_type', $loggerType)->where('vendor_unique_id', $loggerUniqueId)->where('sno', $productid)->count();
        $vendor_product_data = DB::table('custom_vendor_products')->where('vendor_type', $loggerType)->where('vendor_unique_id', $loggerUniqueId)->where('sno', $productid)->get();

        if ($check > 0) {
            return view('influencers.pages.edit_custom_product', compact('vendor_product_data'));
        } else {
            return Redirect::back()->with('alertMsg', 'No Such Product You Own!')->with('type', 'alert-danger');
        }
    }



















    public function editExistingProduct(Request $request)
    {
        $loggerType = (Cookie::get('loggertype'));
        $loggerUniqueId = (Cookie::get('loggerUniqueId'));

        $productid = $request['product_id'];
        $req_item_name = $request['item_name'];
        $req_prod_desc = $request['prod_desc'];
        $req_sample_price = $request['sample_price'];
        $req_sample_moq = $request['sample_moq'];
        $req_what_receives = $request['what_receives'];
        $req_prod_unit_cost = $request['prod_unit_cost'];
        $req_prod_mcq = $request['prod_mcq'];
        $req_product_category = $request['product_category'];
        $req_skunumber = $request['skunumber'];



        $project_image = array();
        if ($files = $request->file('project_photos')) {
            foreach ($files as $file) {
                $project_image_name = md5(rand(1000, 10000));
                $ext = strtolower($file->getClientOriginalExtension());
                $project_image_full_name = $project_image_name . '.' . $ext;
                $upload_path = 'vendors/projectphotos/';
                $project_image_url = '/vendors/projectphotos/' . $project_image_full_name;
                $file->move($upload_path, $project_image_full_name);
                $project_image[] = $project_image_url;
            }
        }

        if (!($file = $request->file('project_photos'))) {
            $project_image_urls = DB::table('vendor_products')->where('vendor_type', $loggerType)->where('vendor_unique_id', $loggerUniqueId)->where('sno', $productid)->value('project_photos');
        } else {
            $project_image_urls = (implode('|', $project_image));
        }

        $insert = DB::table('vendor_products')->where('vendor_type', $loggerType)->where('vendor_unique_id', $loggerUniqueId)->where('sno', $productid)->update([
            'project_photos' => $project_image_urls,
            'item_name' => $req_item_name,
            'prod_desc' => $req_prod_desc,
            'sample_price' => $req_sample_price,
            'sample_moq' => $req_sample_moq,
            'what_receives' => $req_what_receives,
            'prod_unit_cost' => $req_prod_unit_cost,
            'prod_mcq' => $req_prod_mcq,
            'product_category' => $req_product_category,
            'skunumber' => $req_skunumber,
        ]);


        if ($insert) {
            return Redirect::back()->with('alertMsg', 'Your product is updated successfully!!')->with('type', 'alert-success');
        } else {
            return Redirect::back()->with('alertMsg', 'Could not update! Try later.')->with('type', 'alert-danger');
        }
    }



























    public function editExistingCustomRequestProduct(Request $request)
    {
        $loggerType = (Cookie::get('loggertype'));
        $loggerUniqueId = (Cookie::get('loggerUniqueId'));

        $productid = $request['product_id'];
        $req_item_name = $request['item_name'];
        $req_prod_desc = $request['prod_desc'];
        $req_sample_price = $request['sample_price'];
        $req_sample_moq = $request['sample_moq'];
        $req_what_receives = $request['what_receives'];
        $req_prod_unit_cost = $request['prod_unit_cost'];
        $req_prod_mcq = $request['prod_mcq'];
        $req_product_category = $request['product_category'];
        $req_skunumber = $request['skunumber'];



        $project_image = array();
        if ($files = $request->file('project_photos')) {
            foreach ($files as $file) {
                $project_image_name = md5(rand(1000, 10000));
                $ext = strtolower($file->getClientOriginalExtension());
                $project_image_full_name = $project_image_name . '.' . $ext;
                $upload_path = 'vendors/projectphotos/';
                $project_image_url = '/vendors/projectphotos/' . $project_image_full_name;
                $file->move($upload_path, $project_image_full_name);
                $project_image[] = $project_image_url;
            }
        }

        if (!($file = $request->file('project_photos'))) {
            $project_image_urls = DB::table('custom_vendor_products')->where('vendor_type', $loggerType)->where('vendor_unique_id', $loggerUniqueId)->where('sno', $productid)->value('project_photos');
        } else {
            $project_image_urls = (implode('|', $project_image));
        }

        $insert = DB::table('custom_vendor_products')->where('vendor_type', $loggerType)->where('vendor_unique_id', $loggerUniqueId)->where('sno', $productid)->update([
            'project_photos' => $project_image_urls,
            'item_name' => $req_item_name,
            'prod_desc' => $req_prod_desc,
            'sample_price' => $req_sample_price,
            'sample_moq' => $req_sample_moq,
            'what_receives' => $req_what_receives,
            'prod_unit_cost' => $req_prod_unit_cost,
            'prod_mcq' => $req_prod_mcq,
            'product_category' => $req_product_category,
            'skunumber' => $req_skunumber,
        ]);


        if ($insert) {
            return Redirect::back()->with('alertMsg', 'Your product is updated successfully!!')->with('type', 'alert-success');
        } else {
            return Redirect::back()->with('alertMsg', 'Could not update! Try later.')->with('type', 'alert-danger');
        }
    }























    

    public function makeCustomRequest()
    {
        $loggerType = (Cookie::get('loggertype'));
        $loggerUniqueId = (Cookie::get('loggerUniqueId'));
        $all_cstm_products = DB::table('custom_vendor_products')->where('vendor_type', $loggerType)->where('vendor_unique_id', $loggerUniqueId)->orderByDesc('sno')->get();
        return view('menufacturers.pages.makeCustomRequest', compact('all_cstm_products'));
    }










    

    public function makeCustomInfluencerRequest()
    {
        // for entrepreneurs from influencers 
        $loggerType = (Cookie::get('loggertype'));
        $loggerUniqueId = (Cookie::get('loggerUniqueId'));
        $all_cstm_products = DB::table('custom_vendor_products')->where('vendor_type', $loggerType)->where('vendor_unique_id', $loggerUniqueId)->orderByDesc('sno')->get();
        return view('influencers.pages.makeCustomRequest', compact('all_cstm_products'));
    }


    //
}
