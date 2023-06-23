<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class AdminRedirects extends Controller
{


    public function showDashBoard()
    {
        $total_menufacturers = DB::table('vendors')->where('type', 'menufacturer')->count();
        $total_influencers = DB::table('vendors')->where('type', 'influencer')->count();
        $total_enterprenuers = DB::table('vendors')->where('type', 'entrepreneur')->count();
        $tot_orders = DB::table('order_payment')->count();
        $tot_reviews = DB::table('reviews')->count();

        return view('admin.adminpages.home', compact('total_menufacturers', 'total_influencers', 'total_enterprenuers', 'tot_orders', 'tot_reviews',));
    }








    public function siteInfoManagement()
    {
        $siteinformation = DB::table('siteinfos')->where('id', 1)->get();
        return view('admin.adminpages.siteinfo', compact('siteinformation'));
    }










    public function mailChangeManagement()
    {
        return view('admin.change.mailchange');
    }








    public function passChangeManagement()
    {
        return view('admin.change.passchange');
    }















    public function managePages()
    {
        $publications_data = DB::table('pagedata')->where('type', 'publications')->value('content');
        return view('admin.adminpages.manage_pages', compact('publications_data'));
    }









    public function manageFaqs()
    {
        $allfaqs = DB::table('faqs')->orderByDesc('sno')->get();
        return view('admin.adminpages.manage_faqs', compact('allfaqs'));
    }







    public function manageCollaborators()
    {
        $all_collaborators = DB::table('collaborators')->orderByDesc('sno')->get();
        return view('admin.adminpages.collaborators', compact('all_collaborators'));
    }







    public function manageImageToGallery()
    {
        $full_gallery = DB::table('gallery')->orderByDesc('sno')->get();
        return view('admin.adminpages.project_gallery_setup', compact('full_gallery'));
    }






    public function manageServiceGallery()
    {
        $full_gallery = DB::table('service_gallery')->orderByDesc('sno')->get();
        return view('admin.adminpages.our_service_gallery', compact('full_gallery'));
    }
















    public function addNewFaq(Request $request)
    {
        $req_title = $request['title'];
        $req_faq_answer = $request['faq_answer'];

        $insertFaq = DB::table('faqs')->insert([
            'title' => $req_title,
            'answer' => $req_faq_answer,
        ]);

        if ($insertFaq) {
            return Redirect::back()->with('alertMsg', 'FAQ added successfully!!')->with('type', 'alert-success');
        } else {
            return Redirect::back()->with('alertMsg', 'Could not add! Try later.')->with('type', 'alert-danger');
        }
    }













    public function addNewCollaborator(Request $request)
    {
        $req_col_name = $request['col_name'];
        $req_designation = $request['designation'];
        $req_fblink = $request['fblink'];
        $req_twitlink = $request['twitlink'];
        $req_pinlink = $request['pinlink'];
        $req_linkedin_link = $request['linkedin_link'];
        $req_google_link = $request['google_link'];
        $req_about_text = $request['about_text'];


        if ($file = $request->file('image_file')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/colleborator/';
            $logo_image_url = '/website/colleborator/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $logo_image_url = '';
        }



        $insert = DB::table('collaborators')->insert([
            'col_name' => $req_col_name,
            'designation' => $req_designation,
            'image_file' => $logo_image_url,
            'fblink' => $req_fblink,
            'twitlink' => $req_twitlink,
            'pinlink' => $req_pinlink,
            'linkedin_link' => $req_linkedin_link,
            'google_link' => $req_google_link,
            'about_text' => $req_about_text,
        ]);

        if ($insert) {
            return Redirect::back()->with('alertMsg', 'New collaborator added successfully!!')->with('type', 'alert-success');
        } else {
            return Redirect::back()->with('alertMsg', 'Could not add! Try later.')->with('type', 'alert-danger');
        }
    }
















    public function addNewImageToGallery(Request $request)
    {
        $req_gallery_title = $request['gallery_title'];
        $req_gallery_link = $request['gallery_link'];


        if ($file = $request->file('gallery_image')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/gallery/';
            $logo_image_url = '/website/gallery/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $logo_image_url = '';
        }


        $insert = DB::table('gallery')->insert([
            'gallery_image' => $logo_image_url,
            'gallery_title' => $req_gallery_title,
            'gallery_link' => $req_gallery_link,
        ]);

        if ($insert) {
            return Redirect::back()->with('alertMsg', 'New image added to gallery successfully!!')->with('type', 'alert-success');
        } else {
            return Redirect::back()->with('alertMsg', 'Could not add! Try later.')->with('type', 'alert-danger');
        }
    }














    public function updateImageToGallery(Request $request)
    {
        $serial = $request['serial'];
        $req_gallery_title = $request['gallery_title'];
        $req_gallery_link = $request['gallery_link'];


        if ($file = $request->file('gallery_image')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/gallery/';
            $logo_image_url = '/website/gallery/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $logo_image_url = DB::table('gallery')->where('sno', $serial)->value('gallery_image');
        }


        $update = DB::table('gallery')->where('sno', $serial)->update([
            'gallery_image' => $logo_image_url,
            'gallery_title' => $req_gallery_title,
            'gallery_link' => $req_gallery_link,
        ]);

        if ($update) {
            return Redirect::back()->with('alertMsg', 'Updated successfully!!')->with('type', 'alert-success');
        } else {
            return Redirect::back()->with('alertMsg', 'Could not update! Try later.')->with('type', 'alert-danger');
        }
    }













    public function updateServiceGallery(Request $request)
    {
        if ($file = $request->file('image1')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/servicegallery/';
            $req_image_data1 = '/website/servicegallery/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_image_data1 = DB::table('gallery')->where('type', 'image1')->value('image_data');
        }

        if ($file = $request->file('image2')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/servicegallery/';
            $req_image_data2 = '/website/servicegallery/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_image_data2 = DB::table('gallery')->where('type', 'image2')->value('image_data');
        }

        if ($file = $request->file('image3')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/servicegallery/';
            $req_image_data3 = '/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_image_data3 = DB::table('gallery')->where('type', 'image3')->value('image_data');
        }

        if ($file = $request->file('image4')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/servicegallery/';
            $req_image_data4 = '/website/servicegallery/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_image_data4 = DB::table('gallery')->where('type', 'image4')->value('image_data');
        }

        if ($file = $request->file('image5')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/servicegallery/';
            $req_image_data5 = '/website/servicegallery/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_image_data5 = DB::table('gallery')->where('type', 'image5')->value('image_data');
        }

        if ($file = $request->file('image6')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/servicegallery/';
            $req_image_data6 = '/website/servicegallery/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_image_data6 = DB::table('gallery')->where('type', 'image6')->value('image_data');
        }







        $update = DB::table('service_gallery')->where('sno', 1)->update([
            'image1' => $req_image_data1,
            'image2' => $req_image_data2,
            'image3' => $req_image_data3,
            'image4' => $req_image_data4,
            'image5' => $req_image_data5,
            'image6' => $req_image_data6,
        ]);

        if ($update) {
            return Redirect::back()->with('alertMsg', 'Updated successfully!!')->with('type', 'alert-success');
        } else {
            return Redirect::back()->with('alertMsg', 'Could not update! Try later.')->with('type', 'alert-danger');
        }
    }




















    public function updateColleborator(Request $request)
    {
        $serial = $request['serial'];
        $req_col_name = $request['col_name'];
        $req_designation = $request['designation'];
        $req_fblink = $request['fblink'];
        $req_twitlink = $request['twitlink'];
        $req_pinlink = $request['pinlink'];
        $req_linkedin_link = $request['linkedin_link'];
        $req_google_link = $request['google_link'];
        $req_about_text = $request['about_text'];


        if ($file = $request->file('image_file')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/colleborator/';
            $logo_image_url = '/website/colleborator/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $logo_image_url = DB::table('collaborators')->where('sno', $serial)->value('image_file');
        }



        $insert = DB::table('collaborators')->where('sno', $serial)->update([
            'col_name' => $req_col_name,
            'designation' => $req_designation,
            'image_file' => $logo_image_url,
            'fblink' => $req_fblink,
            'twitlink' => $req_twitlink,
            'pinlink' => $req_pinlink,
            'linkedin_link' => $req_linkedin_link,
            'google_link' => $req_google_link,
            'about_text' => $req_about_text,
        ]);

        if ($insert) {
            return Redirect::back()->with('alertMsg', 'New collaborator added successfully!!')->with('type', 'alert-success');
        } else {
            return Redirect::back()->with('alertMsg', 'Could not add! Try later.')->with('type', 'alert-danger');
        }
    }















    public function updateFaq(Request $request)
    {
        $req_serial = $request['serial'];
        $req_title = $request['title'];
        $req_faq_answer = $request['faq_answer'];

        $update = DB::table('faqs')->where('sno', $req_serial)->update([
            'title' => $req_title,
            'answer' => $req_faq_answer,
        ]);

        if ($update) {
            return Redirect::back()->with('alertMsg', 'FAQ updated successfully!!')->with('type', 'alert-success');
        } else {
            return Redirect::back()->with('alertMsg', 'Could not update! Try later.')->with('type', 'alert-danger');
        }
    }







    public function deletefaq($faq_sno)
    {
        $delete = DB::table('faqs')->where('sno', $faq_sno)->delete();
        if ($delete) {
            return Redirect::back()->with('alertMsg', 'FAQ Deleted successfully!!')->with('type', 'alert-success');
        } else {
            return Redirect::back()->with('alertMsg', 'Could not Delete! Try later.')->with('type', 'alert-danger');
        }
    }









    public function getParticularPages(Request $request)
    {
        $page_type = $request['pageType'];
        $publications_data = DB::table('pagedata')->where('type', $page_type)->value('content');
        return $publications_data;
    }









    public function updatePageData(Request $request)
    {
        $req_select_page = $request['select_page'];
        $req_content = $request['content'];
        $update = DB::table('pagedata')->where('type', $req_select_page)->update(['content' => $req_content]);

        if ($update) {
            return Redirect::back()->with('alertMsg', 'Updated successfully!!')->with('type', 'alert-success');
        } else {
            return Redirect::back()->with('alertMsg', 'Could not update! Try later.')->with('type', 'alert-danger');
        }
    }













    //
}
