<?php

namespace App\Http\Controllers\questioncontroleer;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class task_of_question_controller extends Controller
{












    public function loginControllerPage()
    {
        return view('question_controllers.pages.login_user');
    }

















    public function signInQuestionController(Request $request)
    {
        $req_email = $request->user_email;
        $req_password = $request->user_password;
        $check = DB::table('question_controllers')->where('controller_email', $req_email)->count();
        $questions_data = DB::table('questions_for_users')->orderByDesc('question_id')->get();
        $all_added_industries = DB::table('industries')->orderByDesc('sno')->get();


        if ($check > 0) {
            $user_password = DB::table('question_controllers')->where('controller_email', $req_email)->value('controller_password');
            if ($req_password == $user_password) {

                $loggertype = 'question_controller';
                $loggerEmail = $req_email;
                $loggerUniqueId = DB::table('question_controllers')->where('controller_email', $loggerEmail)->value('controller_id');
                $mints = (60 * 24 * 7);


                if ((Cookie::get('loggertype'))) {
                    Cookie::queue(Cookie::forget('loggertype'));
                }
                if ((Cookie::get('loggerUniqueId'))) {
                    Cookie::queue(Cookie::forget('loggerUniqueId'));
                }
                if ((Cookie::get('loggerAccName'))) {
                    Cookie::queue(Cookie::forget('loggerAccName'));
                }
                if ((Cookie::get('loggerEmail'))) {
                    Cookie::queue(Cookie::forget('loggerEmail'));
                }
                if ((Cookie::get('profile_status'))) {
                    Cookie::queue(Cookie::forget('profile_status'));
                }


                Cookie::queue('loggerUniqueId', $loggerUniqueId, $mints);
                Cookie::queue('loggertype', $loggertype, $mints);
                Cookie::queue('loggerEmail', $loggerEmail, $mints);

                return redirect('/question-controller-dashboard');
            } else {
                return Redirect::back()->with('alertMsg', 'Wrong Password')->with('type', 'alert-danger');
            }
        } else {
            return Redirect::back()->with('alertMsg', 'Wrong Email!')->with('type', 'alert-danger');
        }
    }
















    public function showControllersDashboard()
    {
        $loggerUniqueId = (Cookie::get('loggerUniqueId'));
        $loggerEmail = (Cookie::get('loggerEmail'));
        $today = Carbon::today();
        $all_added_industries = DB::table('industries')->orderByDesc('sno')->get();

        $questions_data = DB::table('questions_for_users')
            ->where('controller_id', $loggerUniqueId)
            ->orderByDesc('question_id')->get();



        $submitted_count = DB::table('questions_for_users')->where('controller_id', $loggerUniqueId)->count();

        $in_progress_count = DB::table('questions_for_users')->where('controller_id', $loggerUniqueId)
            ->where('deadline',  '>', $today)->where('publish_status', 0)->count();

        $completed_count = DB::table('questions_for_users')
            ->where('controller_id', $loggerUniqueId)->where('deadline',  '<=', $today)->where('publish_status', 0)->count();

        $published_count = DB::table('questions_for_users')->where('controller_id', $loggerUniqueId)
            ->where('deadline',  '<=', $today)->where('publish_status', 1)->count();

        $discarded_count = DB::table('questions_for_users')->where('controller_id', $loggerUniqueId)->where('publish_status', -1)->count();



        return view('question_controllers.pages.dashboard', compact(
            'all_added_industries',
            'questions_data',
            'submitted_count',
            'in_progress_count',
            'completed_count',
            'published_count',
            'discarded_count'
        ));
    }















    public function showQuestionsPage()
    {
        $loggerUniqueId = (Cookie::get('loggerUniqueId'));
        $questions_data = DB::table('questions_for_users')->orderByDesc('question_id')
            ->where('controller_id', $loggerUniqueId)
            ->get();
        $all_added_industries = DB::table('industries')->orderByDesc('sno')->get();
        return view('question_controllers.pages.all_questions', compact('questions_data', 'all_added_industries'));
    }










    public function showNewQuestionAddPage()
    {
        $loggerUniqueId = (Cookie::get('loggerUniqueId'));
        $questions_data = DB::table('questions_for_users')->orderByDesc('question_id')
            ->where('controller_id', $loggerUniqueId)
            ->orWhere('controller_id', null)
            ->get();
        $all_added_industries = DB::table('industries')->orderByDesc('sno')->get();
        return view('question_controllers.pages.add_new_questions', compact('questions_data', 'all_added_industries'));
    }


















    public function addNewQuestion(Request $request)
    {
        $loggerUniqueId = (Cookie::get('loggerUniqueId'));
        $loggerEmail = (Cookie::get('loggerEmail'));


        if ($file = $request->file('question_image')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/question_image/';
            $req_question_image = '/website/question_image/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        }


        $req_question_title = $request['question_title'];
        // $req_user_type = $request['user_type'];
        $req_industries_data = json_encode($request['industries_data']);
        $req_deadline = $request['deadline'];
        $req_source = $request['source'];

        $req_question_details = $request['question_details'];
        $insert = DB::table('questions_for_users')->insert([
            'controller_id' => $loggerUniqueId,
            'title' => $req_question_title,
            'question_image' => $req_question_image,
            // 'user_type' => $req_user_type,
            'user_type' => ' ',
            'industries_data' => $req_industries_data,
            'deadline' => $req_deadline,
            'source' => $req_source,
            'details' => $req_question_details,
        ]);


        if ($insert) {
            return Redirect::back()->with('alertMsg', 'New Question Been added successfully!!')->with('type', 'alert-success');
        } else {
            return Redirect::back()->with('alertMsg', 'Could not add New Question! Try later.')->with('type', 'alert-danger');
        }
    }












    public function getSpecQuestionResponse(Request $request)
    {
        $req_serial = $request['data_id'];
        $response = DB::table('questions_for_users')->where('question_id', $req_serial)->get();
        return $response;
    }












    public function updateExistingQuestion(Request $request)
    {
        $req_question_sno = $request['spec_id'];
        $req_question_title = $request['edit_question_title'];
        // $req_user_type = $request['edit_user_type'];
        $req_edit_industries_data = $request['edit_industries_data'];
        $req_question_details = $request['edit_question_details'];
        $req_deadline = $request['deadline'];
        $currentDateTime = Carbon::today();

        if ($file = $request->file('edit_question_image')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/question_add_img/';
            $req_question_add_img = '/website/question_add_img/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_question_add_img = DB::table('questions_for_users')->where('question_id', $req_question_sno)->value('question_image');
        }



        $prev_deadline = DB::table('questions_for_users')->where('question_id', $req_question_sno)->value('deadline');
        $prev_pub_status = DB::table('questions_for_users')->where('question_id', $req_question_sno)->value('publish_status');

        if ($prev_deadline > $req_deadline) {
            $decision_publish_status = $prev_pub_status;
        } else {
            $decision_publish_status = 0;
        }


        $update = DB::table('questions_for_users')->where('question_id', $req_question_sno)->update([
            'title' => $req_question_title,
            'question_image' => $req_question_add_img,
            // 'user_type' => $req_user_type,
            'industries_data' => $req_edit_industries_data,
            'details' => $req_question_details,
            'publish_status' => $decision_publish_status,
            'deadline' => $req_deadline,
        ]);


        $update2 = DB::table('admin_query_replies')->where('question_serial', $req_question_sno)->update([
            'deadline' => $req_deadline,
            'question' => $req_question_title,
        ]);


        if ($update) {
            return Redirect::back()->with('alertMsg', 'Question Been updated successfully!!')->with('type', 'alert-success');
        } else {
            return Redirect::back()->with('alertMsg', 'Could not update Question! Try later.')->with('type', 'alert-danger');
        }
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




















    public function seeQuestionResponses($question_sno)
    {
        $image = DB::table('questions_for_users')->where('question_id', $question_sno)->value('question_image');
        $query_replies = DB::table('admin_query_replies')->where('question_serial', $question_sno)->orderByDesc('id')->get();

        return view('question_controllers.pages.query_replies', compact('image', 'query_replies', 'question_sno'));
    }












    public function getSpecResponse(Request $request)
    {
        $req_serial = $request['data_id'];
        $data = DB::table('admin_query_replies')->where('id', $req_serial)->get();
        return $data;
    }









    public function addToCitation(Request $request)
    {
        $req_sno = $request['answer_serial'];
        $req_question_serial = $request['question_serial'];
        $req_replier_id = $request['replier_id'];
        $req_citation_status = $request['citation_status'];

        $prev_citations = DB::table('vendor_profile')->where('vendor_user_id', $req_replier_id)->value('tot_citations');
        $prev_citation_status = DB::table('admin_query_replies')->where('id', $req_sno)->value('citation');
        $update = DB::table('admin_query_replies')->where('id', $req_sno)->update(['citation' => $req_citation_status]);
        $update3 = DB::table('admin_query_replies')->where('id', $req_sno)->update(['published_date' => Carbon::today()]);



        if ($req_citation_status == 3 || $req_citation_status == 5 || $req_citation_status == 0) {
            if ($prev_citation_status == 1) {
                $update2 = DB::table('vendor_profile')->where('vendor_user_id', $req_replier_id)->update(['tot_citations' => ($prev_citations - 1)]);
                $update2 = DB::table('vendor_products')->where('vendor_unique_id', $req_replier_id)->update(['tot_citations' => ($prev_citations - 1)]);
            }
        } else {
            if ($prev_citation_status != 1) {
                $update2 = DB::table('vendor_profile')->where('vendor_user_id', $req_replier_id)->update(['tot_citations' => ($prev_citations + 1)]);
                $update2 = DB::table('vendor_products')->where('vendor_unique_id', $req_replier_id)->update(['tot_citations' => ($prev_citations + 1)]);
            }
        }




        $prev_qstn_resps = DB::table('questions_for_users')->where('question_id', $req_question_serial)->value('tot_resp');
        $question_title = DB::table('questions_for_users')->where('question_id', $req_question_serial)->value('title');

        if ($req_citation_status == 1) {
            DB::table('questions_for_users')->where('question_id', $req_question_serial)->update([
                'tot_resp' => $prev_qstn_resps + 1,
            ]);
        } else {
            if ($prev_qstn_resps > 0) {
                DB::table('questions_for_users')->where('question_id', $req_question_serial)->update([
                    'tot_resp' => $prev_qstn_resps - 1,
                ]);
            }
        }



        $vendor_email = DB::table('vendors')->where('user_unique_id', $req_replier_id)->value('user_email');
        $data = [
            'question_title' => $question_title,
            'status' => $req_citation_status,
        ];
        $user['to'] = $vendor_email;
        Mail::send('mail.citation_notify', $data, function ($message) use ($user) {
            $message->to($user['to']);
            $message->subject("Notification about answer status!");
        });












        return Redirect::back()->with('alertMsg', 'Citation Task Successfully Done!!')->with('type', 'alert-success');
    }















    public function bulkPublish(Request $request)
    {
        $bulk_options = $request->input('checkboxes', []);

        foreach ($bulk_options as $bulk_values) {
            $check_tot_resps = DB::table('questions_for_users')->where('question_id', $bulk_values)->value('tot_resp');
            if ($check_tot_resps > 0) {
                $update = DB::table('questions_for_users')->where('question_id', $bulk_values)->update(['publish_status' => 1]);
            }
        }
        return Redirect::back()->with('alertMsg', 'Selected Questions those have minimum 1 published answer, are published for the website successfully!!')->with('type', 'alert-success');
    }















    public function publishSpecificQuestion($question_serial)
    {
        $check_tot_resps = DB::table('questions_for_users')->where('question_id', $question_serial)->value('tot_resp');
        if ($check_tot_resps > 0) {
            $update = DB::table('questions_for_users')->where('question_id', $question_serial)->update(['publish_status' => 1]);
            if ($update) {
                return Redirect::back()->with('alertMsg', 'Publishing status changed successfully!!')->with('type', 'alert-success');
            } else {
                return Redirect::back()->with('alertMsg', 'Could not change status! Try later.')->with('type', 'alert-danger');
            }
        } else {
            return Redirect::back()->with('alertMsg', 'The Question have no published answer. </br> Thus, this question can\'t be published in the web! Click responses and publish some answers for this Question!')->with('type', 'alert-warning');
        }
    }











    public function seeQuestionProbableBlog($serial, $title)
    {
        $question_data = DB::table('questions_for_users')->where('question_id', $serial)->get();
        // $question_for_user_type = DB::table('questions_for_users')->where('question_id', $serial)->value('user_type');
        $main_question = DB::table('questions_for_users')->where('question_id', $serial)->value('title');
        $today = Carbon::today();

        $main_question_details = DB::table('questions_for_users')
            ->where('question_id', $serial)->value('details');

        $related_questions = DB::table('questions_for_users')
            // ->where('user_type', $question_for_user_type)
            ->where('question_id', '!=', $serial)
            ->orderByDesc('question_id')->take(3)->get();

        // $related_blogs = DB::table('admin_query_replies')->where('question_serial', $serial)->orderBy('')->get(); // only published ones. will do it later.
        $related_blogs = DB::table('admin_query_replies')->where('question_serial', $serial)
            ->where('citation', '1')->orderBy('published_date')->get();
        return view('surface.pages.specific_experts_future_blog', compact('related_blogs', 'question_data', 'related_questions', 'main_question', 'main_question_details'));
    }

















    public function PublishQuestion($question_serial)
    {
        $perv_val = DB::table('questions_for_users')->where('question_id', $question_serial)->value('publish_status');
        if ($perv_val == 0) {
            $next_val = 1;
        } else {
            $next_val = 0;
        }

        $check_tot_resps = DB::table('questions_for_users')->where('question_id', $question_serial)->value('tot_resp');
        if ($check_tot_resps > 0) {
            $update = DB::table('questions_for_users')->where('question_id', $question_serial)->update(['publish_status' => $next_val]);
            if ($update) {
                return Redirect::back()->with('alertMsg', 'Publishing status changed successfully!!')->with('type', 'alert-success');
            } else {
                return Redirect::back()->with('alertMsg', 'Could not change status! Try later.')->with('type', 'alert-danger');
            }
        } else {
            return Redirect::back()->with('alertMsg', 'The Question have no published answer. </br> Thus, this question can\'t be published in the web! Click responses and publish some answers for this Question!')->with('type', 'alert-warning');
        }
    }














    public function signOutController()
    {
        if ((Cookie::get('loggertype'))) {
            Cookie::queue(Cookie::forget('loggertype'));
        }
        if ((Cookie::get('loggerUniqueId'))) {
            Cookie::queue(Cookie::forget('loggerUniqueId'));
        }
        if ((Cookie::get('loggerAccName'))) {
            Cookie::queue(Cookie::forget('loggerAccName'));
        }
        if ((Cookie::get('loggerEmail'))) {
            Cookie::queue(Cookie::forget('loggerEmail'));
        }
        if ((Cookie::get('profile_status'))) {
            Cookie::queue(Cookie::forget('profile_status'));
        }
        return redirect('/question-controler/login');
    }












    //
}
