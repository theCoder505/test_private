<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class allBasicWorksController extends Controller
{





    public function setCategoriesPage()
    {
        $all_prod_categories = DB::table('categories')->where('cat_type', 'product')->orderByDesc('sno')->get();
        $all_blog_categories = DB::table('categories')->where('cat_type', 'blog')->orderByDesc('sno')->get();
        return view('admin.adminpages.setCategoriesPage', compact('all_prod_categories', 'all_blog_categories'));
    }













    public function setIndustryOptions()
    {
        $all_added_industries = DB::table('industries')->orderByDesc('sno')->get();
        return view('admin.adminpages.IndustryOptionsPage', compact('all_added_industries'));
    }






    public function addNewIndustryOption(Request $request)
    {
        $req_industry_name = $request['industry_name'];
        $insert = DB::table('industries')->insert(['option_name' => $req_industry_name]);

        if ($insert) {
            return Redirect::back()->with('alertMsg', 'New Industry Option Is Added successfully!!')->with('type', 'alert-success');
        } else {
            return Redirect::back()->with('alertMsg', 'Could not add! Try later.')->with('type', 'alert-danger');
        }
    }







    public function updateIndustryOption(Request $request)
    {
        $req_serial = $request['serial'];
        $req_industry_name = $request['industry_name'];
        $update = DB::table('industries')->where('sno', $req_serial)->update(['option_name' => $req_industry_name]);

        if ($update) {
            return Redirect::back()->with('alertMsg', 'New Industry Option Is Updated successfully!!')->with('type', 'alert-success');
        } else {
            return Redirect::back()->with('alertMsg', 'Could not update! Try later.')->with('type', 'alert-danger');
        }
    }





    public function deleteIndustryOption($deleting_id)
    {
        $delete = DB::table('industries')->where('sno', $deleting_id)->delete();

        if ($delete) {
            return Redirect::back()->with('alertMsg', 'New Industry Option Is Deleted successfully!!')->with('type', 'alert-success');
        } else {
            return Redirect::back()->with('alertMsg', 'Could not delete! Try later.')->with('type', 'alert-danger');
        }
    }










    public function showUsersActivity()
    {
        $all_users_data = DB::table('vendors')->orderByDesc('sno')->get();
        return view('admin.adminpages.users_activity', compact('all_users_data'));
    }







    public function showQuestionControllers()
    {
        $all_controllers = DB::table('question_controllers')->orderByDesc('controller_id')->get();
        return view('admin.adminpages.question_controllers', compact('all_controllers'));
    }











    public function controllerQuestions()
    {
        $today = Carbon::today();
        $all_added_industries = DB::table('industries')->orderByDesc('sno')->get();

        $questions_data = DB::table('questions_for_users')->where('controller_id', '!=', null)->orderByDesc('question_id')->get();

        $submitted_count = DB::table('questions_for_users')->where('controller_id', '!=', null)->count();

        $in_progress_count = DB::table('questions_for_users')->where('controller_id', '!=', null)
            ->where('deadline',  '>', $today)->where('publish_status', 0)->count();

        $completed_count = DB::table('questions_for_users')->where('controller_id', '!=', null)
            ->where('deadline',  '<=', $today)->where('publish_status', 0)->count();

        $published_count = DB::table('questions_for_users')->where('controller_id', '!=', null)
            ->where('deadline',  '<=', $today)->where('publish_status', 1)->count();

        $discarded_count = DB::table('questions_for_users')->where('controller_id', '!=', null)->where('publish_status', -1)->count();



        return view('admin.adminpages.questions_dashboard', compact(
            'all_added_industries',
            'questions_data',
            'submitted_count',
            'in_progress_count',
            'completed_count',
            'published_count',
            'discarded_count'
        ));
    }













    
    public function deleteQuestion($question_sno)
    {
        $insert = DB::table('questions_for_users')->where('question_id', $question_sno)->delete();

        if ($insert) {
            return Redirect::back()->with('alertMsg', 'Question Been deleted successfully!!')->with('type', 'alert-success');
        } else {
            return Redirect::back()->with('alertMsg', 'Could not delete Question! Try later.')->with('type', 'alert-danger');
        }
    }











    public function addNewQuestionController(Request $request)
    {

        $req_controller_name = $request->controller_name;
        $req_controller_email = $request->controller_email;
        $req_controller_password = $request->controller_password;

        $insert_query = DB::table('question_controllers')->insert([
            'controller_name' => $req_controller_name,
            'controller_email' => $req_controller_email,
            'controller_password' => $req_controller_password,
        ]);

        if ($insert_query) {
            return Redirect::back()->with('alertMsg', 'New Controller Is Added successfully!!')->with('type', 'alert-success');
        } else {
            return Redirect::back()->with('alertMsg', 'Could not Add! Try later.')->with('type', 'alert-danger');
        }
    }









    public function updateQuestionControllersData(Request $request)
    {
        $req_controller_id = $request->controller_id;
        $req_controller_name = $request->controller_name;
        $req_controller_email = $request->controller_email;
        $req_controller_password = $request->controller_password;

        $update_query = DB::table('question_controllers')->where('controller_id', $req_controller_id)->update([
            'controller_name' => $req_controller_name,
            'controller_email' => $req_controller_email,
            'controller_password' => $req_controller_password,
        ]);

        if ($update_query) {
            return Redirect::back()->with('alertMsg', 'Controller Details Been Changed successfully!!')->with('type', 'alert-success');
        } else {
            return Redirect::back()->with('alertMsg', 'Could not update! Try later.')->with('type', 'alert-danger');
        }
    }










    public function deleteQuestionController($removing_id)
    {
        $delete = DB::table('question_controllers')->where('controller_id', $removing_id)->delete();
        if ($delete) {
            return Redirect::back()->with('alertMsg', 'Controller Has Been Removed successfully!!')->with('type', 'alert-success');
        } else {
            return Redirect::back()->with('alertMsg', 'Could not remove! Try later.')->with('type', 'alert-danger');
        }
    }













    public function changeActivity(Request $request)
    {
        $req_serial = $request['serial'];
        $curr_activity = DB::table('vendors')->where('user_unique_id', $req_serial)->value('activity_status_by_admin');


        if ($curr_activity == 1) {
            $update = DB::table('vendors')->where('user_unique_id', $req_serial)->update(['activity_status_by_admin' => 0]);
        } else {
            $update = DB::table('vendors')->where('user_unique_id', $req_serial)->update(['activity_status_by_admin' => 1]);
        }

        if ($update) {
            return Redirect::back()->with('alertMsg', 'User\'s activity changed successfully!!')->with('type', 'alert-success');
        } else {
            return Redirect::back()->with('alertMsg', 'Could not change! Try later.')->with('type', 'alert-danger');
        }
    }



















    public function addNewcategory(Request $request)
    {
        $req_category_type = $request['category_type'];
        $req_category_name = $request['category_name'];

        $insertCategory = DB::table('categories')->insert([
            'cat_type' => $req_category_type,
            'category_name' => $req_category_name,
        ]);

        if ($insertCategory) {
            return Redirect::back()->with('alertMsg', 'Category added successfully!!')->with('type', 'alert-success');
        } else {
            return Redirect::back()->with('alertMsg', 'Could not add! Try later.')->with('type', 'alert-danger');
        }
    }





    public function updatecategory(Request $request)
    {
        $req_category_serial = $request['category_serial'];
        $req_category_type = $request['category_type'];
        $req_category_name = $request['category_name'];

        $update = DB::table('categories')->where('sno', $req_category_serial)->update([
            'cat_type' => $req_category_type,
            'category_name' => $req_category_name,
        ]);

        if ($update) {
            return Redirect::back()->with('alertMsg', 'Category updated successfully!!')->with('type', 'alert-success');
        } else {
            return Redirect::back()->with('alertMsg', 'Could not update! Try later.')->with('type', 'alert-danger');
        }
    }











    public function deletecategory($category_sno)
    {
        $delete = DB::table('categories')->where('sno', $category_sno)->delete();
        if ($delete) {
            return Redirect::back()->with('alertMsg', 'Category Deleted successfully!!')->with('type', 'alert-success');
        } else {
            return Redirect::back()->with('alertMsg', 'Could not Delete! Try later.')->with('type', 'alert-danger');
        }
    }

















    public function resourceManagementPage()
    {
        $data = DB::table('resources')->where('sno', 1)->get();
        $all_menufacturers_lessons = DB::table('educational_resources')->where('resource_for', 'menufacture')->get();
        $all_influencers_lessons = DB::table('educational_resources')->where('resource_for', 'influencer')->get();
        $all_entreprenuers_lessons = DB::table('educational_resources')->where('resource_for', 'entrepreneur')->get();
        return view('admin.adminpages.resource_management_page', compact('data', 'all_menufacturers_lessons', 'all_influencers_lessons', 'all_entreprenuers_lessons'));
    }











    public function resourceManagementUpdate(Request $request)
    {
        if ($file = $request->file('traning_module')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/traning_module/';
            $webtraning_module_url = '/website/traning_module/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $webtraning_module_url = DB::table('resources')->where('id', 1)->value('traning_module');
        }

        if ($file = $request->file('invoicing_fullfilment')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/invoicing_fullfilment/';
            $webinvoicing_fullfilment_url = '/website/invoicing_fullfilment/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $webinvoicing_fullfilment_url = DB::table('resources')->where('id', 1)->value('invoicing_fullfilment');
        }

        if ($file = $request->file('receiving_guidelines')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/receiving_guidelines/';
            $webreceiving_guidelines_url = '/website/receiving_guidelines/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $webreceiving_guidelines_url = DB::table('resources')->where('id', 1)->value('receiving_guidelines');
        }

        if ($file = $request->file('setup_business_profile')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/setup_business_profile/';
            $websetup_business_profile_url = '/website/setup_business_profile/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $websetup_business_profile_url = DB::table('resources')->where('id', 1)->value('setup_business_profile');
        }

        if ($file = $request->file('orders_shipments')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/orders_shipments/';
            $weborders_shipments_url = '/website/orders_shipments/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $weborders_shipments_url = DB::table('resources')->where('id', 1)->value('orders_shipments');
        }


        $update = DB::table('resources')->where('sno', 1)->update([
            'traning_module' => $webtraning_module_url,
            'invoicing_fullfilment' => $webinvoicing_fullfilment_url,
            'receiving_guidelines' => $webreceiving_guidelines_url,
            'setup_business_profile' => $websetup_business_profile_url,
            'orders_shipments' => $weborders_shipments_url,
        ]);

        if ($update) {
            return Redirect::back()->with('alertMsg', 'Resources updated successfully!!')->with('type', 'alert-success');
        } else {
            return Redirect::back()->with('alertMsg', 'Could not update! Try later.')->with('type', 'alert-danger');
        }
    }
















    public function addNewMenufacturerVidLsns(Request $request)
    {
        $req_embedded_code = $request['embedded_code'];
        $insert = DB::table('educational_resources')->insert([
            'resource_for' => 'menufacture',
            'resource_code' => $req_embedded_code,
        ]);

        if ($insert) {
            return Redirect::back()->with('alertMsg', 'Educational Resources added successfully!!')->with('type', 'alert-success');
        } else {
            return Redirect::back()->with('alertMsg', 'Could not update! Try later.')->with('type', 'alert-danger');
        }
    }











    public function updateMenufacturerVidLsns(Request $request)
    {
        $req_serial = $request['serial'];
        $req_embedded_code = $request['embedded_code'];
        $update = DB::table('educational_resources')->where('sno', $req_serial)->update([
            'resource_code' => $req_embedded_code,
        ]);

        if ($update) {
            return Redirect::back()->with('alertMsg', 'Educational Resources updated successfully!!')->with('type', 'alert-success');
        } else {
            return Redirect::back()->with('alertMsg', 'Could not update! Try later.')->with('type', 'alert-danger');
        }
    }











    public function addNewinfluencersVidLsns(Request $request)
    {
        $req_embedded_code = $request['embedded_code'];
        $insert = DB::table('educational_resources')->insert([
            'resource_for' => 'influencer',
            'resource_code' => $req_embedded_code,
        ]);

        if ($insert) {
            return Redirect::back()->with('alertMsg', 'Educational Resources added successfully!!')->with('type', 'alert-success');
        } else {
            return Redirect::back()->with('alertMsg', 'Could not update! Try later.')->with('type', 'alert-danger');
        }
    }











    public function updateinfluencersVidLsns(Request $request)
    {
        $req_serial = $request['serial'];
        $req_embedded_code = $request['embedded_code'];
        $update = DB::table('educational_resources')->where('sno', $req_serial)->update([
            'resource_code' => $req_embedded_code,
        ]);

        if ($update) {
            return Redirect::back()->with('alertMsg', 'Educational Resources updated successfully!!')->with('type', 'alert-success');
        } else {
            return Redirect::back()->with('alertMsg', 'Could not update! Try later.')->with('type', 'alert-danger');
        }
    }










    public function addNewentrepreneursVidLsns(Request $request)
    {
        $req_embedded_code = $request['embedded_code'];
        $insert = DB::table('educational_resources')->insert([
            'resource_for' => 'entrepreneur',
            'resource_code' => $req_embedded_code,
        ]);

        if ($insert) {
            return Redirect::back()->with('alertMsg', 'Educational Resources added successfully!!')->with('type', 'alert-success');
        } else {
            return Redirect::back()->with('alertMsg', 'Could not update! Try later.')->with('type', 'alert-danger');
        }
    }











    public function updateentrepreneursVidLsns(Request $request)
    {
        $req_serial = $request['serial'];
        $req_embedded_code = $request['embedded_code'];
        $update = DB::table('educational_resources')->where('sno', $req_serial)->update([
            'resource_code' => $req_embedded_code,
        ]);

        if ($update) {
            return Redirect::back()->with('alertMsg', 'Educational Resources updated successfully!!')->with('type', 'alert-success');
        } else {
            return Redirect::back()->with('alertMsg', 'Could not update! Try later.')->with('type', 'alert-danger');
        }
    }









    public function deleteVideoLesson($video_lesson_sno)
    {
        $delete = DB::table('educational_resources')->where('sno', $video_lesson_sno)->delete();
        if ($delete) {
            return Redirect::back()->with('alertMsg', 'Particular Educational Resource Deleted successfully!!')->with('type', 'alert-success');
        } else {
            return Redirect::back()->with('alertMsg', 'Could not Delete! Try later.')->with('type', 'alert-danger');
        }
    }
    //
}
