<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class QuestionAnswersController extends Controller
{




    public function showAddNewQuestionsPage()
    {
        $questions_data = DB::table('questions_for_users')->orderByDesc('question_id')->get();
        $all_added_industries = DB::table('industries')->orderByDesc('sno')->get();
        return view('admin.adminpages.add_new_questions', compact('questions_data', 'all_added_industries'));
    }



    public function showManageQuestionsPage()
    {
        $questions_data = DB::table('questions_for_users')->orderByDesc('question_id')->get();
        $all_added_industries = DB::table('industries')->orderByDesc('sno')->get();
        return view('admin.adminpages.all_questions', compact('questions_data', 'all_added_industries'));
    }





    public function showQuestionRequestsPage()
    {
        $controllers_qstns_data = DB::table('questions_for_users')->where('controller_id', '!=', null)->orderByDesc('question_id')->get();
        $all_added_industries = DB::table('industries')->orderByDesc('sno')->get();
        $all_q_controllers = DB::table('question_controllers')->get();
        return view('admin.adminpages.controllers_questions', compact('controllers_qstns_data', 'all_added_industries', 'all_q_controllers'));
    }






    public function changeActiveStatus($discard_status, $questionId)
    {
        $currentDateTime = Carbon::today();
        if ($discard_status == 'discard') {
            $change = DB::table('questions_for_users')->where('question_id', $questionId)->update(['publish_status' => -1, 'discart_time' => $currentDateTime]);
        } else {
            $change = DB::table('questions_for_users')->where('question_id', $questionId)->update(['publish_status' => 0]);
        }

        if ($change) {
            return Redirect::back()->with('alertMsg', 'Question Status Been updated successfully!!')->with('type', 'alert-success');
        } else {
            return Redirect::back()->with('alertMsg', 'Could not update! Try later.')->with('type', 'alert-danger');
        }
    }









    public function discardQuestion(Request $request)
    {
        $questionId = $request->spec_id;
        $comment = $request->comment_text;
        $currentDateTime = Carbon::today();

        $change = DB::table('questions_for_users')->where('question_id', $questionId)->update(
            [
                'publish_status' => -1,
                'comment' => $comment,
                'discart_time' => $currentDateTime
            ]
        );



        $question_title = DB::table('questions_for_users')->where('question_id', $questionId)->value('title');
        $controller_id = DB::table('questions_for_users')->where('question_id', $questionId)->value('controller_id');
        $controller_mail = DB::table('question_controllers')->where('controller_id', $controller_id)->value('controller_email');
        $data = [
            'question_title' => $question_title,
            'comment' => $comment,
        ];
        $user['to'] = $controller_mail;
        Mail::send('mail.controller_discard', $data, function ($message) use ($user) {
            $message->to($user['to']);
            $message->subject("Notification about question status!");
        });



        if ($change) {
            return Redirect::back()->with('alertMsg', 'Question Status Been updated successfully!!')->with('type', 'alert-success');
        } else {
            return Redirect::back()->with('alertMsg', 'Could not update! Try later.')->with('type', 'alert-danger');
        }
    }












    public function addNewQuestion(Request $request)
    {
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

        return view('admin.adminpages.query_replies', compact('image', 'query_replies', 'question_sno'));
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


        $question_title = DB::table('questions_for_users')->where('question_id', $req_question_serial)->value('title');
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























    // show specific questions to specific users 
    public function showAdminSpecQuestions()
    {
        $loggerType = (Cookie::get('loggertype'));
        $loggerUniqueId = (Cookie::get('loggerUniqueId'));
        $users_industries_data = DB::table('vendor_profile')->where('vendor_user_id', $loggerUniqueId)->value('industry_options');
        $currentDateTime = Carbon::today();

        $questions_data = DB::table('questions_for_users')
            // ->where('user_type', $loggerType)
            ->where('publish_status', '!=', -1)
            ->where('deadline', '>=', $currentDateTime)
            ->orderByDesc('question_id')->get();



        if ($loggerType == 'menufacturer') {
            return view('menufacturers.pages.admin_question_reply', compact('questions_data', 'users_industries_data'));
        }
        if ($loggerType == 'influencer') {
            return view('influencers.pages.admin_question_reply', compact('questions_data', 'users_industries_data'));
        }
        if ($loggerType == 'entrepreneur') {
            return view('entrepreneurs.pages.admin_question_reply', compact('questions_data', 'users_industries_data'));
        }
    }
















    // show specific questions to specific users 
    public function trackMyAnswers()
    {
        $loggerType = (Cookie::get('loggertype'));
        $loggerUniqueId = (Cookie::get('loggerUniqueId'));
        $users_industries_data = DB::table('vendor_profile')->where('vendor_user_id', $loggerUniqueId)->value('industry_options');
        $today = Carbon::today();

        $answers_data = DB::table('admin_query_replies')
            ->where('replier_type', $loggerType)
            ->where('replier_id', $loggerUniqueId)
            ->orderByDesc('id')->get();

        $total_count = DB::table('admin_query_replies')->where('replier_type', $loggerType)
            ->where('replier_id', $loggerUniqueId)->count();

        $published_count = DB::table('admin_query_replies')->where('replier_type', $loggerType)
            ->where('replier_id', $loggerUniqueId)->where('citation', 1)->where('deadline',  '<=', $today)->count();

        $inreview_count = DB::table('admin_query_replies')->where('replier_type', $loggerType)
            ->where('replier_id', $loggerUniqueId)->where('citation', 0)->count();

        $selected_count = DB::table('admin_query_replies')->where('replier_type', $loggerType)
            ->where('replier_id', $loggerUniqueId)->where('citation', 1)->where('deadline',  '>', $today)->count();

        $not_selected_count = DB::table('admin_query_replies')->where('replier_type', $loggerType)
            ->where('replier_id', $loggerUniqueId)->where('citation', 3)->count();


        if ($loggerType == 'menufacturer') {
            return view('menufacturers.pages.track_your_answers', compact(
                'answers_data',
                'users_industries_data',
                'total_count',
                'published_count',
                'inreview_count',
                'selected_count',
                'not_selected_count'
            ));
        }
        if ($loggerType == 'influencer') {
            return view('influencers.pages.track_your_answers', compact(
                'answers_data',
                'users_industries_data',
                'total_count',
                'published_count',
                'inreview_count',
                'selected_count',
                'not_selected_count'
            ));
        }
        if ($loggerType == 'entrepreneur') {
            return view('entrepreneurs.pages.track_your_answers', compact(
                'answers_data',
                'users_industries_data',
                'total_count',
                'published_count',
                'inreview_count',
                'selected_count',
                'not_selected_count'
            ));
        }
    }








    public function showPArticularQuestion($question_sno)
    {
        $loggerType = (Cookie::get('loggertype'));
        $loggerUniqueId = (Cookie::get('loggerUniqueId'));
        $question_spec_data = DB::table('questions_for_users')->where('user_type', $loggerType)->where('question_id', $question_sno)->get();

        $count_query = DB::table('admin_query_replies')->where('question_serial', $question_sno)->where('replier_id', $loggerUniqueId)->count();
        $citation_status = DB::table('admin_query_replies')->where('question_serial', $question_sno)->where('replier_id', $loggerUniqueId)->value('citation');


        if ($count_query > 0) {
            $reply_data = DB::table('admin_query_replies')->where('question_serial', $question_sno)->where('replier_id', $loggerUniqueId)->get();
            return $reply_data;
        } else {
            return 'empty';
        }

        // if ($loggerType == 'menufacturer') {
        //     return view('menufacturers.pages.show_spec_question', compact('question_spec_data', 'question_sno', 'count_query', 'reply_data', 'citation_status'));
        // }
        // if ($loggerType == 'influencer') {
        //     return view('influencers.pages.show_spec_question', compact('question_spec_data', 'question_sno', 'count_query', 'reply_data', 'citation_status'));
        // }
        // if ($loggerType == 'entrepreneur') {
        //     return view('entrepreneurs.pages.show_spec_question', compact('question_spec_data', 'question_sno', 'count_query', 'reply_data', 'citation_status'));
        // }
    }








    public function submitQueryReply(Request $request)
    {
        $qstn_serial = $request['question_sno'];
        $loggerType = (Cookie::get('loggertype'));
        $loggerUniqueId = (Cookie::get('loggerUniqueId'));
        $req_headline = $request['headline_user_reply'];
        $req_reply = $request['user_answer'];

        $req_deadline = DB::table('questions_for_users')->where('question_id', $qstn_serial)->value('deadline');
        $req_question = DB::table('questions_for_users')->where('question_id', $qstn_serial)->value('title');
        $req_source = DB::table('questions_for_users')->where('question_id', $qstn_serial)->value('source');
        $vendor_full_name = DB::table('vendors')->where('user_unique_id', $loggerUniqueId)->value('full_name');
        $vendor_acc_name = DB::table('vendors')->where('user_unique_id', $loggerUniqueId)->value('acc_name');
        $vendor_website = DB::table('vendor_profile')->where('vendor_user_id', $loggerUniqueId)->value('website_url');
        $vendor_business_name = DB::table('vendor_profile')->where('vendor_user_id', $loggerUniqueId)->value('business_name');
        $vendor_linkedin_url = DB::table('vendor_profile')->where('vendor_user_id', $loggerUniqueId)->value('linkedin_url');
        $vendor_company_logo = DB::table('vendor_profile')->where('vendor_user_id', $loggerUniqueId)->value('company_logo');
        $req_industries = DB::table('vendor_profile')->where('vendor_user_id', $loggerUniqueId)->value('industry_options');

        $prev_qstn_resps = DB::table('questions_for_users')->where('question_id', $qstn_serial)->value('tot_resp');
        $tot_resp_upload = DB::table('questions_for_users')->where('question_id', $qstn_serial)->update(['tot_resp' => $prev_qstn_resps + 1,]);



        $get_controller_id = DB::table('questions_for_users')->where('question_id', $qstn_serial)->value('controller_id');
        if ($get_controller_id != null) {
            $get_controller_email = DB::table('question_controllers')->where('controller_id', $get_controller_id)->value('controller_email');



            $data = [
                'question_title' => $req_question,
                'serial' => $qstn_serial,
                'ans_headline' => $req_headline,
                'user_ans' => $req_reply,
            ];
            $user['to'] = $get_controller_email;
            Mail::send('mail.query_ans_submit_notify', $data, function ($message) use ($user) {
                $message->to($user['to']);
                $message->subject("User submitted answer to one of your Question!");
            });
        }










        $count_query = DB::table('admin_query_replies')->where('question_serial', $qstn_serial)->where('replier_id', $loggerUniqueId)->count();
        if ($count_query > 0) {
            $dedline = DB::table('admin_query_replies')->where('question_serial', $qstn_serial)->where('replier_id', $loggerUniqueId)->value('deadline');

            $update = DB::table('admin_query_replies')->where('question_serial', $qstn_serial)->where('replier_id', $loggerUniqueId)
                ->update([
                    'question' => $req_question,
                    'source' => $req_source,

                    'question_serial' => $qstn_serial,
                    'replier_id' => $loggerUniqueId,

                    'user_acc_name' => $vendor_acc_name,
                    'user_linkedin_url' => $vendor_linkedin_url,

                    'replier_type' => $loggerType,
                    'user_full_name' => $vendor_full_name,

                    'user_business_name' => $vendor_business_name,
                    'user_website' => $vendor_website,

                    'answer_headline' => $req_headline,
                    'user_answer' => $req_reply,

                    'user_comp_image' => $vendor_company_logo,
                    'industries' => $req_industries,

                    'deadline' => $req_deadline,
                ]);

            if ($update) {
                return Redirect::back()->with('alertMsg', 'Your answer updated successfully!!')->with('type', 'alert-success');
            } else {
                return Redirect::back()->with('alertMsg', 'Could not update! Try later.')->with('type', 'alert-danger');
            }
        } else {



            $insert = DB::table('admin_query_replies')->insert([
                'question' => $req_question,

                'question_serial' => $qstn_serial,
                'replier_id' => $loggerUniqueId,

                'user_acc_name' => $vendor_acc_name,
                'user_linkedin_url' => $vendor_linkedin_url,

                'replier_type' => $loggerType,
                'user_full_name' => $vendor_full_name,

                'user_business_name' => $vendor_business_name,
                'user_website' => $vendor_website,

                'answer_headline' => $req_headline,
                'user_answer' => $req_reply,

                'user_comp_image' => $vendor_company_logo,
                'industries' => $req_industries,

                'deadline' => $req_deadline,
            ]);

            if ($insert) {
                return Redirect::back()->with('alertMsg', 'Your answer added successfully!!')->with('type', 'alert-success');
            } else {
                return Redirect::back()->with('alertMsg', 'Could not add! Try later.')->with('type', 'alert-danger');
            }
        }
    }


















    public function showMyCitations()
    {
        $loggerType = (Cookie::get('loggertype'));
        $loggerUniqueId = (Cookie::get('loggerUniqueId'));
        $citation_data = DB::table('admin_query_replies')->where('replier_id', $loggerUniqueId)->where('citation', 1)->orderByDesc('id')->get();
        $admin_queries = DB::table('questions_for_users')->get();

        if ($loggerType == 'menufacturer') {
            return view('menufacturers.pages.my_citations', compact('citation_data', 'admin_queries'));
        }
        if ($loggerType == 'influencer') {
            return view('influencers.pages.my_citations', compact('citation_data', 'admin_queries'));
        }
        if ($loggerType == 'entrepreneur') {
            return view('entrepreneurs.pages.my_citations', compact('citation_data', 'admin_queries'));
        }
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








    public function updateQuestionReply(Request $request)
    {
        $req_reply_id = $request->reply_id;
        $req_reply_headline = $request->reply_headline;
        $req_reply_answer = $request->reply_answer;

        $update = DB::table('admin_query_replies')->where('id', $req_reply_id)->update([
            'answer_headline' => $req_reply_headline,
            'user_answer' => $req_reply_answer,
        ]);

        if ($update) {
            return 'updated';
        } else {
            return 'error';
        }
    }



















    public function updateSpecificQuestion(Request $request)
    {
        $req_question_id = $request['question_id'];
        $req_main_question = $request['main_question'];
        $req_question_details = $request['question_details'];


        if ($file = $request->file('question_image')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'website/question_image/';
            $req_question_image = '/website/question_image/' . $image_full_name;
            $file->move($upload_path, $image_full_name);
        } else {
            $req_question_image = DB::table('questions_for_users')->where('question_id', $req_question_id)->value('question_image');
        }


        $update = DB::table('questions_for_users')->where('question_id', $req_question_id)->update([
            'question_image' => $req_question_image,
            'title' => $req_main_question,
            'details' => $req_question_details,
        ]);

        $update2 = DB::table('admin_query_replies')->where('question_serial', $req_question_id)->update([
            'question' => $req_main_question,
        ]);

        if ($update) {
            return 'updated';
        } else {
            return 'error' . $req_question_id;
        }
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






    //
}
