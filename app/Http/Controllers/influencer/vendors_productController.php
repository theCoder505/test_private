<?php

namespace App\Http\Controllers\influencer;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class vendors_productController extends Controller
{





    public function showParticularProduct($prod_serial, $prod_cat, $prod_name)
    {
        $loggerType = (Cookie::get('loggertype'));
        $loggerUniqueId = (Cookie::get('loggerUniqueId'));


        $particular_product = DB::table('vendor_products')->where('product_category', $prod_cat)->where('item_name', $prod_name)->where('sno', $prod_serial)->get();

        $unique_id = DB::table('vendor_products')->where('product_category', $prod_cat)->where('item_name', $prod_name)->where('sno', $prod_serial)->value('vendor_unique_id');
        $type = DB::table('vendor_products')->where('product_category', $prod_cat)->where('item_name', $prod_name)->where('sno', $prod_serial)->value('vendor_type');

        $create_n_ship_time =  DB::table('vendor_profile')->where('vendor_user_id', $unique_id)->where('vendor_type', $type)->value('create_n_ship_time');
        $typical_run_time =  DB::table('vendor_profile')->where('vendor_user_id', $unique_id)->where('vendor_type', $type)->value('typical_run_time');
        $company_name =  DB::table('vendor_profile')->where('vendor_user_id', $unique_id)->where('vendor_type', $type)->value('business_name');

        $all_related_products = $all_products = DB::table('vendor_products')
            ->where('vendor_type', $type)
            ->where('sno', '!=', $prod_serial)
            ->orderByDesc('sno')->get();


        return view('influencers.pages.particular_product', compact('particular_product', 'prod_name', 'create_n_ship_time', 'typical_run_time', 'company_name', 'all_related_products'));
    }
















    public function showParticularProductEnterprenuer($prod_serial, $prod_cat, $prod_name)
    {
        $loggerType = (Cookie::get('loggertype'));
        $loggerUniqueId = (Cookie::get('loggerUniqueId'));


        $particular_product = DB::table('vendor_products')->where('product_category', $prod_cat)->where('item_name', $prod_name)->where('sno', $prod_serial)->get();

        $unique_id = DB::table('vendor_products')->where('product_category', $prod_cat)->where('item_name', $prod_name)->where('sno', $prod_serial)->value('vendor_unique_id');
        $type = DB::table('vendor_products')->where('product_category', $prod_cat)->where('item_name', $prod_name)->where('sno', $prod_serial)->value('vendor_type');

        $create_n_ship_time =  DB::table('vendor_profile')->where('vendor_user_id', $unique_id)->where('vendor_type', $type)->value('create_n_ship_time');
        $typical_run_time =  DB::table('vendor_profile')->where('vendor_user_id', $unique_id)->where('vendor_type', $type)->value('typical_run_time');
        $company_name =  DB::table('vendor_profile')->where('vendor_user_id', $unique_id)->where('vendor_type', $type)->value('business_name');

        $all_related_products = $all_products = DB::table('vendor_products')
            ->where('vendor_type', $type)
            ->where('sno', '!=', $prod_serial)
            ->orderByDesc('sno')->get();

        return view('entrepreneurs.pages.particular_product', compact('particular_product', 'prod_name', 'create_n_ship_time', 'typical_run_time', 'company_name', 'all_related_products'));
    }













    public function showCustomProduct($prod_serial, $prod_cat, $prod_name)
    {
        $particular_product = DB::table('custom_vendor_products')->where('product_category', $prod_cat)->where('item_name', $prod_name)->where('sno', $prod_serial)->get();

        $unique_id = DB::table('custom_vendor_products')->where('product_category', $prod_cat)->where('item_name', $prod_name)->where('sno', $prod_serial)->value('vendor_unique_id');
        $type = DB::table('custom_vendor_products')->where('product_category', $prod_cat)->where('item_name', $prod_name)->where('sno', $prod_serial)->value('vendor_type');

        $create_n_ship_time =  DB::table('vendor_profile')->where('vendor_user_id', $unique_id)->where('vendor_type', $type)->value('create_n_ship_time');
        $typical_run_time =  DB::table('vendor_profile')->where('vendor_user_id', $unique_id)->where('vendor_type', $type)->value('typical_run_time');
        $company_name =  DB::table('vendor_profile')->where('vendor_user_id', $unique_id)->where('vendor_type', $type)->value('business_name');

        return view('influencers.pages.custom_product', compact('particular_product', 'prod_name', 'create_n_ship_time', 'typical_run_time', 'company_name'));
    }












    public function showCustomProductForentrepreneur($prod_serial, $prod_cat, $prod_name)
    {
        $particular_product = DB::table('custom_vendor_products')->where('product_category', $prod_cat)->where('item_name', $prod_name)->where('sno', $prod_serial)->get();

        $unique_id = DB::table('custom_vendor_products')->where('product_category', $prod_cat)->where('item_name', $prod_name)->where('sno', $prod_serial)->value('vendor_unique_id');
        $type = DB::table('custom_vendor_products')->where('product_category', $prod_cat)->where('item_name', $prod_name)->where('sno', $prod_serial)->value('vendor_type');

        $create_n_ship_time =  DB::table('vendor_profile')->where('vendor_user_id', $unique_id)->where('vendor_type', $type)->value('create_n_ship_time');
        $typical_run_time =  DB::table('vendor_profile')->where('vendor_user_id', $unique_id)->where('vendor_type', $type)->value('typical_run_time');
        $company_name =  DB::table('vendor_profile')->where('vendor_user_id', $unique_id)->where('vendor_type', $type)->value('business_name');

        return view('entrepreneurs.pages.custom_product', compact('particular_product', 'prod_name', 'create_n_ship_time', 'typical_run_time', 'company_name'));
    }














    public function orderProduct(Request $request)
    {
        $loggerType = (Cookie::get('loggertype'));
        $loggerUniqueId = (Cookie::get('loggerUniqueId'));

        $prod_serial = $request['prod_id'];
        $cost_per_unit = $request['cost_per_unit'];
        $product_amount = $request['product_amount'];
        $particular_product = DB::table('vendor_products')->where('sno', $prod_serial)->get();
        $prod_unique_id = DB::table('vendor_products')->where('sno', $prod_serial)->value('vendor_unique_id');
        $prod_type = DB::table('vendor_products')->where('sno', $prod_serial)->value('vendor_type');
        $prod_cat = DB::table('vendor_products')->where('sno', $prod_serial)->value('product_category');
        $user_unique_id = DB::table('vendor_products')->where('sno', $prod_serial)->value('vendor_unique_id');
        $order_type = 'genuine';

        return view('influencers.pages.order_product', compact('prod_serial', 'cost_per_unit', 'product_amount', 'particular_product', 'prod_unique_id', 'prod_cat', 'prod_type', 'order_type', 'user_unique_id'));
    }












    public function orderProductForentrepreneur(Request $request)
    {
        $loggerType = (Cookie::get('loggertype'));
        $loggerUniqueId = (Cookie::get('loggerUniqueId'));

        $prod_serial = $request['prod_id'];
        $cost_per_unit = $request['cost_per_unit'];
        $product_amount = $request['product_amount'];
        $particular_product = DB::table('vendor_products')->where('sno', $prod_serial)->get();
        $prod_unique_id = DB::table('vendor_products')->where('sno', $prod_serial)->value('vendor_unique_id');
        $prod_type = DB::table('vendor_products')->where('sno', $prod_serial)->value('vendor_type');
        $prod_cat = DB::table('vendor_products')->where('sno', $prod_serial)->value('product_category');
        $user_unique_id = DB::table('vendor_products')->where('sno', $prod_serial)->value('vendor_unique_id');
        $order_type = 'genuine';

        return view('entrepreneurs.pages.order_product', compact('prod_serial', 'cost_per_unit', 'product_amount', 'particular_product', 'prod_unique_id', 'prod_cat', 'prod_type', 'order_type', 'user_unique_id'));
    }











    public function customOrderProduct(Request $request)
    {
        $prod_serial = $request['prod_id'];
        $cost_per_unit = $request['cost_per_unit'];
        $product_amount = $request['product_amount'];
        $particular_product = DB::table('custom_vendor_products')->where('sno', $prod_serial)->get();
        $prod_unique_id = DB::table('custom_vendor_products')->where('sno', $prod_serial)->value('vendor_unique_id');
        $prod_type = DB::table('custom_vendor_products')->where('sno', $prod_serial)->value('vendor_type');
        $prod_cat = DB::table('custom_vendor_products')->where('sno', $prod_serial)->value('product_category');
        $order_type = 'custom';

        return view('influencers.pages.order_product', compact('prod_serial', 'cost_per_unit', 'product_amount', 'particular_product', 'prod_unique_id', 'prod_cat', 'prod_type', 'order_type'));
    }










    public function customOrderProductForentrepreneur(Request $request)
    {
        $prod_serial = $request['prod_id'];
        $cost_per_unit = $request['cost_per_unit'];
        $product_amount = $request['product_amount'];
        $particular_product = DB::table('custom_vendor_products')->where('sno', $prod_serial)->get();
        $prod_unique_id = DB::table('custom_vendor_products')->where('sno', $prod_serial)->value('vendor_unique_id');
        $prod_type = DB::table('custom_vendor_products')->where('sno', $prod_serial)->value('vendor_type');
        $prod_cat = DB::table('custom_vendor_products')->where('sno', $prod_serial)->value('product_category');
        $user_unique_id = DB::table('custom_vendor_products')->where('sno', $prod_serial)->value('vendor_unique_id');
        $order_type = 'custom';

        return view('entrepreneurs.pages.order_product', compact('prod_serial', 'cost_per_unit', 'product_amount', 'particular_product', 'prod_unique_id', 'prod_cat', 'prod_type', 'order_type', 'user_unique_id'));
    }










    public function acceptOrderRequest(Request $request)
    {
        $loggerType = (Cookie::get('loggertype'));
        $loggerUniqueId = (Cookie::get('loggerUniqueId'));
        $loggerName = (Cookie::get('loggerAccName'));
        $loggerEmail = (Cookie::get('loggerEmail'));

        $user_unique_id = $request['user_unique_id'];
        $delivery_sample_time = DB::table('vendor_profile')->where('vendor_user_id', $user_unique_id)->value('create_n_ship_time');
        $final_date_time = date('Y-m-d H:i:s', strtotime('+' . $delivery_sample_time . ' days'));


        $req_order_type = $request['order_type'];
        $req_prod_serial = $request['prod_serial'];
        $req_item_image = $request['item_image'];
        $req_item_name = $request['item_name'];
        $req_cost_per_unit = $request['cost_per_unit'];
        $req_product_amount = $request['product_amount'];
        $tot_cost = ($req_cost_per_unit * $req_product_amount);
        $req_prod_unique_id = $request['prod_unique_id'];
        $req_prod_type = $request['prod_type'];
        $req_prod_cat = $request['prod_cat'];
        $req_card_number_1 = $request['card_number_1'];
        $req_card_number_2 = $request['card_number_2'];
        $req_card_number_3 = $request['card_number_3'];
        $req_card_number_4 = $request['card_number_4'];

        $req_cardnumber = ($req_card_number_1 . $req_card_number_2 . $req_card_number_3 . $req_card_number_4);
        $req_cardholder = $request['cardholder'];
        $req_month = $request['month'];
        $req_year = $request['year'];
        $req_cvc = $request['cvc'];



        $insert = DB::table('order_payment')->insert([
            'order_type' => $req_order_type,
            'product_serial' => $req_prod_serial,
            'prod_image' => $req_item_image,
            'prod_name' => $req_item_name,
            'prod_cat' => $req_prod_cat,
            'cost_per_unit' => $req_cost_per_unit,
            'amount' => $req_product_amount,
            'total_cost' => $tot_cost,
            'product_uid' => $req_prod_unique_id,
            'product_type' => $req_prod_type,
            'orderrer_uid' => $loggerUniqueId,
            'orderer_type' => $loggerType,
            'cardnumber' => $req_cardnumber,
            'cardholder' => $req_cardholder,
            'exp_month' => $req_month,
            'exp_year' => $req_year,
            'cvc' => $req_cvc,
            'delivery_time' => $final_date_time,
        ]);




        // send email to project owner and also send email to owner.
        //mail part start
        $product_owner_mail = DB::table('vendors')->where('user_unique_id', $user_unique_id)->value('user_email');

        $data = [
            'user_name' => $loggerName,
            'orderer_email' => $loggerEmail,
            'orderer_type' => $req_order_type,
            'prod_name' => $req_item_name,
            'amount' => $req_product_amount,
            'total_cost' => $tot_cost,
            'will_get_at' => $final_date_time,
        ];

        $user['to'] = $product_owner_mail;
        Mail::send('mail.new_order', $data, function ($message) use ($user) {
            $message->to($user['to']);
            $message->subject(" You received an order from website");
        });

        $user['to'] = $loggerEmail;
        Mail::send('mail.ordered_success', $data, function ($message) use ($user) {
            $message->to($user['to']);
            $message->subject("Order is Successfully Placed");
        });
        //mail part ends

        if ($insert) {
            return 'success';
        } else {
            return 'error';
        }
    }














    public function showVendorProfile($vendortype, $vendoruid)
    {
        $loggerType = (Cookie::get('loggertype'));
        $loggerUniqueId = (Cookie::get('loggerUniqueId'));

        $profile_data = DB::table('vendor_profile')->where('vendor_type', $vendortype)->where('vendor_user_id', $vendoruid)->get();
        $vendor_name = DB::table('vendor_profile')->where('vendor_type', $vendortype)->where('vendor_user_id', $vendoruid)->value('business_name');

        $all_related_products = DB::table('vendor_products')->where('vendor_type', $vendortype)->where('vendor_unique_id', $vendoruid)->orderByDesc('sno')->get();

        if ($loggerType == 'entrepreneur') {
            return view('entrepreneurs.pages.vendor_profile', compact('profile_data', 'vendor_name', 'vendortype', 'all_related_products'));
        } else {
            return view('influencers.pages.vendor_profile', compact('profile_data', 'vendor_name', 'vendortype', 'all_related_products'));
        }
    }












    public function reviewPArticularOrder($order_serial, $prod_serial, $prod_cat, $prod_name)
    {
        $order_details = DB::table('order_payment')
            ->where('sno', $order_serial)
            ->where('prod_cat', $prod_cat)
            ->where('prod_name', $prod_name)
            ->where('delivery_status', 'complete')
            ->get();


        $check = DB::table('reviews')->where('review_on_order', $order_serial)->where('reviews_on_product', $prod_serial)->count();
        if ($check > 0) {
            $review = DB::table('reviews')->where('review_on_order', $order_serial)->where('reviews_on_product', $prod_serial)->value('review_text');
            $stars = DB::table('reviews')->where('review_on_order', $order_serial)->where('reviews_on_product', $prod_serial)->value('review_stars');
        } else {
            $review = '';
            $stars = '';
        }

        return view('influencers.pages.review_order', compact('order_details', 'order_serial', 'prod_serial', 'review', 'stars'));
    }











    public function reviewParticularOrderForEnterprenuer($order_serial, $prod_serial, $prod_cat, $prod_name)
    {
        $order_details = DB::table('order_payment')
            ->where('sno', $order_serial)
            ->where('prod_cat', $prod_cat)
            ->where('prod_name', $prod_name)
            ->where('delivery_status', 'complete')
            ->get();


        $check = DB::table('reviews')->where('review_on_order', $order_serial)->where('reviews_on_product', $prod_serial)->count();
        if ($check > 0) {
            $review = DB::table('reviews')->where('review_on_order', $order_serial)->where('reviews_on_product', $prod_serial)->value('review_text');
            $stars = DB::table('reviews')->where('review_on_order', $order_serial)->where('reviews_on_product', $prod_serial)->value('review_stars');
        } else {
            $review = '';
            $stars = '';
        }

        return view('entrepreneurs.pages.review_order', compact('order_details', 'order_serial', 'prod_serial', 'review', 'stars'));
    }










    public function addNewReview(Request $request)
    {
        $req_review_on_order = $request['review_on_order'];
        $req_review_on_product = $request['review_on_product'];
        $req_review_stars = $request['review_stars'];
        $req_review_text = $request['review_text'];

        $insert = DB::table('reviews')->insert([
            'review_on_order' => $req_review_on_order,
            'reviews_on_product' => $req_review_on_product,
            'review_stars' => $req_review_stars,
            'review_text' => $req_review_text,
        ]);

        if ($insert) {
            return Redirect::back()->with('alertMsg', 'Your Review Is Taken. Thanks For The Review!')->with('type', 'alert-success');
        } else {
            return Redirect::back()->with('alertMsg', 'Could not upload review! Try later.')->with('type', 'alert-danger');
        }
    }








    public function addNewEnterprenuerReview(Request $request)
    {
        $req_review_on_order = $request['review_on_order'];
        $req_review_on_product = $request['review_on_product'];
        $req_review_stars = $request['review_stars'];
        $req_review_text = $request['review_text'];


        $insert = DB::table('reviews')->insert([
            'review_on_order' => $req_review_on_order,
            'reviews_on_product' => $req_review_on_product,
            'review_stars' => $req_review_stars,
            'review_text' => $req_review_text,
        ]);


        if ($insert) {
            return Redirect::back()->with('alertMsg', 'Your Review Is Taken. Thanks For The Review!')->with('type', 'alert-success');
        } else {
            return Redirect::back()->with('alertMsg', 'Could not upload review! Try later.')->with('type', 'alert-danger');
        }
    }











    public function updateStatus(Request $request)
    {
        $req_order_serial = $request['order_serial'];
        $req_change_status = $request['change_status'];

        $update = DB::table('order_payment')->where('sno', $req_order_serial)->update([
            'delivery_status' => $req_change_status,
            'delivered_at' => Carbon::now(),
        ]);



        // send email to orderer 
        $prod_img = DB::table('order_payment')->where('sno', $req_order_serial)->value('prod_image');
        $prod_name = DB::table('order_payment')->where('sno', $req_order_serial)->value('prod_name');
        $user_unique_id = DB::table('order_payment')->where('sno', $req_order_serial)->value('orderrer_uid');
        $send_mail_to = DB::table('vendors')->where('user_unique_id', $user_unique_id)->value('user_email');

        $data = [
            'product_image' => $prod_img,
            'prod_name' => $prod_name,
            'delivery_status' => $req_change_status,
        ];

        $user['to'] = $send_mail_to;
        Mail::send('mail.order_new_status', $data, function ($message) use ($user) {
            $message->to($user['to']);
            $message->subject("Your order has an update! Check it.");
        });




        if ($update) {
            return Redirect::back()->with('alertMsg', 'Order Status Is Updated Successfully!!')->with('type', 'alert-success');
        } else {
            return Redirect::back()->with('alertMsg', 'Could not update order status! Try later.')->with('type', 'alert-danger');
        }
    }









    public function updateInfluencerOrderStatus(Request $request)
    {
        $req_order_serial = $request['order_serial'];
        $req_change_status = $request['change_status'];

        $update = DB::table('order_payment')->where('sno', $req_order_serial)->update([
            'delivery_status' => $req_change_status,
            'delivered_at' => Carbon::now(),
        ]);


        // send email to orderer 
        $prod_img = DB::table('order_payment')->where('sno', $req_order_serial)->value('prod_image');
        $prod_name = DB::table('order_payment')->where('sno', $req_order_serial)->value('prod_name');
        $user_unique_id = DB::table('order_payment')->where('sno', $req_order_serial)->value('orderrer_uid');
        $send_mail_to = DB::table('vendors')->where('user_unique_id', $user_unique_id)->value('user_email');

        $data = [
            'product_image' => $prod_img,
            'prod_name' => $prod_name,
            'delivery_status' => $req_change_status,
        ];

        $user['to'] = $send_mail_to;
        Mail::send('mail.order_new_status', $data, function ($message) use ($user) {
            $message->to($user['to']);
            $message->subject("Your order has an update! Check it.");
        });



        if ($update) {
            return Redirect::back()->with('alertMsg', 'Order Status Is Updated Successfully!!')->with('type', 'alert-success');
        } else {
            return Redirect::back()->with('alertMsg', 'Could not update order status! Try later.')->with('type', 'alert-danger');
        }
    }
    //
}
