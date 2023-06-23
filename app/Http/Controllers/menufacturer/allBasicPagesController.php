<?php

namespace App\Http\Controllers\menufacturer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class allBasicPagesController extends Controller
{





    public function sowDashboard()
    {
        $data = DB::table('resources')->where('sno', 1)->get();
        $edu_rsrc = DB::table('educational_resources')->where('resource_for', 'menufacture')->orderByDesc('sno')->take(3)->get();
        $loggerUniqueId = (Cookie::get('loggerUniqueId'));
        return view('menufacturers.pages.dashboard', compact('data', 'edu_rsrc', 'loggerUniqueId'));
    }




    public function sendToPersonalWp()
    {
        return redirect('https://web.whatsapp.com/');
    }

    public function sendtoWhatsApp($user_id)
    {
        $whatsapp_number = DB::table('vendor_profile')->where('vendor_user_id', $user_id)->value('phone_number');
        $link = 'https://web.whatsapp.com/send?phone=' . $whatsapp_number . '&text=Hello%20are%20you%20available%20to%20work?';
        return redirect($link);
    }




    public function showentrepreneurDashboard()
    {
        $loggerType = (Cookie::get('loggertype'));
        $loggerUniqueId = (Cookie::get('loggerUniqueId'));
     
        $count = DB::table('vendor_products')->where('vendor_type', 'menufacturer')->where('tot_citations', '>', 0)->count();
        if ($count > 0) {
            $all_products = DB::table('vendor_products')->where('vendor_type', 'menufacturer')->orderByDesc('tot_citations')->get();
        }else{
            $all_products = DB::table('vendor_products')->where('vendor_type', 'menufacturer')->orderByDesc('sno')->get();
        }

        $count2 = DB::table('vendor_products')->where('vendor_type', 'influencer')->where('tot_citations', '>', 0)->count();
        if ($count2 > 0) {
            $all_inflncr_products = DB::table('vendor_products')->where('vendor_type', 'influencer')->orderByDesc('tot_citations')->get();
        }else{
            $all_inflncr_products = DB::table('vendor_products')->where('vendor_type', 'influencer')->orderByDesc('sno')->get();
        }

        return view('entrepreneurs.pages.dashboard', compact('all_products', 'all_inflncr_products'));
    }










    public function educationalPage()
    {
        $edu_resorces = DB::table('educational_resources')->where('resource_for', 'menufacture')->orderByDesc('sno')->get();
        return view('menufacturers.pages.educational_resources', compact('edu_resorces'));
    }



    public function educationalPageForInluencer()
    {
        $edu_resorces = DB::table('educational_resources')->where('resource_for', 'influencer')->orderByDesc('sno')->get();
        return view('influencers.pages.educational_resources', compact('edu_resorces'));
    }


    public function educationalPageForEntrepreneur()
    {
        $edu_resorces = DB::table('educational_resources')->where('resource_for', 'entrepreneur')->orderByDesc('sno')->get();
        return view('entrepreneurs.pages.educational_resources', compact('edu_resorces'));
    }




    public function showInfluencerDashboard()
    {
        $loggerType = (Cookie::get('loggertype'));
        $loggerUniqueId = (Cookie::get('loggerUniqueId'));
        
        $count = DB::table('vendor_products')->where('vendor_type', 'menufacturer')->where('tot_citations', '>', 0)->count();
        if ($count > 0) {
            $all_products = DB::table('vendor_products')->where('vendor_type', 'menufacturer')->orderByDesc('tot_citations')->get();
        }else{
            $all_products = DB::table('vendor_products')->where('vendor_type', 'menufacturer')->orderByDesc('sno')->get();
        }
        return view('influencers.pages.dashboard', compact('all_products'));
    }







    public function ordersAndShipments()
    {
        $loggerType = (Cookie::get('loggertype'));
        $loggerUniqueId = (Cookie::get('loggerUniqueId'));

        $ongoing_orders = DB::table('order_payment')
            ->where('orderer_type', $loggerType)
            ->where('orderrer_uid', $loggerUniqueId)
            ->where('delivery_status', '!=', 'complete')
            ->orderByDesc('sno')
            ->get();

        $all_completed_orders = DB::table('order_payment')
            ->where('orderer_type', $loggerType)
            ->where('orderrer_uid', $loggerUniqueId)
            ->where('delivery_status', 'complete')
            ->orderByDesc('sno')
            ->get();



        $orders_to_deliver = DB::table('order_payment')
            ->where('product_type', $loggerType)
            ->where('product_uid', $loggerUniqueId)
            ->where('delivery_status', '!=', 'complete')
            ->orderByDesc('sno')
            ->get();


        $delivered_orders = DB::table('order_payment')
            ->where('product_type', $loggerType)
            ->where('product_uid', $loggerUniqueId)
            ->where('delivery_status', 'complete')
            ->orderByDesc('sno')
            ->get();



        return view('influencers.pages.all_orders_status', compact('ongoing_orders', 'all_completed_orders', 'orders_to_deliver', 'delivered_orders'));
    }



















    public function ordersAndShipmentsForMenufacturer()
    {
        $loggerType = (Cookie::get('loggertype'));
        $loggerUniqueId = (Cookie::get('loggerUniqueId'));


        $ongoing_orders = DB::table('order_payment')
            ->where('product_type', $loggerType)
            ->where('product_uid', $loggerUniqueId)
            ->where('delivery_status', '!=', 'complete')
            ->orderByDesc('sno')
            ->get();


        $delivered_orders = DB::table('order_payment')
            ->where('product_type', $loggerType)
            ->where('product_uid', $loggerUniqueId)
            ->where('delivery_status', 'complete')
            ->orderByDesc('sno')
            ->get();

        return view('menufacturers.pages.all_orders_status', compact('ongoing_orders', 'delivered_orders'));
    }













    public function entrepreneurOrdersAndShipments()
    {
        $loggerType = (Cookie::get('loggertype'));
        $loggerUniqueId = (Cookie::get('loggerUniqueId'));
        $ongoing_orders = DB::table('order_payment')
            ->where('orderer_type', $loggerType)
            ->where('orderrer_uid', $loggerUniqueId)
            ->where('delivery_status', '!=', 'complete')
            ->orderByDesc('sno')
            ->get();
        $all_completed_orders = DB::table('order_payment')
            ->where('orderer_type', $loggerType)
            ->where('orderrer_uid', $loggerUniqueId)
            ->where('delivery_status', 'complete')
            ->orderByDesc('sno')
            ->get();
        return view('entrepreneurs.pages.all_orders_status', compact('ongoing_orders', 'all_completed_orders'));
    }










    public function getReviewData($order_id)
    {
        $count = DB::table('reviews')->where('review_on_order', $order_id)->count();
        $reviewData = DB::table('reviews')->where('review_on_order', $order_id)->get();


        if ($count > 0) {
            return $reviewData;
        } else {
            return 'empty';
        }
    }






    //
}
