<?php

namespace App\Http\Controllers\surface;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class AllPagesController extends Controller
{





    public function showHomePage()
    {
        $homepageData = DB::table('homepage_data')->where('sno', 1)->get();
        $enterprenuer_profiles = DB::table('vendor_profile')->where('vendor_type', 'entrepreneur')->orderByDesc('serial')->get();
        $influencer_profiles = DB::table('vendor_profile')->where('vendor_type', 'influencer')->orderByDesc('serial')->get();
        return view('surface.pages.home', compact('homepageData', 'enterprenuer_profiles', 'influencer_profiles'));
    }





    public function readBlogsPage()
    {
        $blog_cats = DB::table('categories')->where('cat_type', 'blog')->orderByDesc('sno')->get();
        $blog_data = DB::table('blogs')->take(10)->orderByDesc('sno')->get();

        $citation_data = DB::table('admin_query_replies')->orderByDesc('id')->get();
        $admin_queries = DB::table('questions_for_users')->where('publish_status', 1)->take(10)->get();
        $industry_options = DB::table('industries')->get();
        return view('surface.pages.blogs', compact('blog_cats', 'blog_data', 'citation_data', 'industry_options', 'admin_queries'));
    }












    public function redParticularCatBlogsOnly($category_name) // for Q & A
    {
        $blog_cats = DB::table('categories')->where('cat_type', 'blog')->orderByDesc('sno')->get();
        $blog_data = DB::table('blogs')->orderByDesc('sno')->get();

        $citation_data = DB::table('admin_query_replies')->orderByDesc('id')->get();
        $admin_queries = DB::table('questions_for_users')->where('industries_data', 'LIKE', '%' . $category_name . '%')->where('publish_status', 1)->orderByDesc('question_id')->get();
        $industry_options = DB::table('industries')->get();

        return view('surface.pages.blog_with_spec_cat', compact('blog_cats', 'blog_data', 'citation_data', 'industry_options', 'admin_queries', 'category_name'));
    }








    public function readParticularWebSpecBlog($category_name) // for admin blogs 
    {
        $blog_cats = DB::table('categories')->where('cat_type', 'blog')->orderByDesc('sno')->get();
        $blog_data = DB::table('blogs')->where('blog_category', 'LIKE', '%' . $category_name . '%')->orderByDesc('sno')->get();

        $citation_data = DB::table('admin_query_replies')->orderByDesc('id')->get();
        $admin_queries = DB::table('questions_for_users')->get();
        $industry_options = DB::table('industries')->get();

        return view('surface.pages.blogs_web_specific', compact('blog_cats', 'blog_data', 'citation_data', 'industry_options', 'admin_queries', 'category_name'));
    }








    public function showSearchBlogResults(Request $request)
    {
        $search_item = $request->query('search');
        $blog_cats = DB::table('categories')->where('cat_type', 'blog')->orderByDesc('sno')->get();
        $blog_data = DB::table('blogs')->where('blog_title', 'LIKE', '%' . $search_item . '%')->orderByDesc('sno')->get();

        $citation_data = DB::table('admin_query_replies')->orderByDesc('id')->get();
        $admin_queries = DB::table('questions_for_users')->where('title', 'LIKE', '%' . $search_item . '%')->where('publish_status', 1)->orderByDesc('question_id')->get();
        $industry_options = DB::table('industries')->get();

        return view('surface.pages.blog_search_results', compact('blog_cats', 'blog_data', 'citation_data', 'industry_options', 'admin_queries', 'search_item'));
    }









    // public function readBlogsWithExpertsPage()
    // {
    //     $blo_cats = DB::table('categories')->where('cat_type', 'blog')->orderByDesc('sno')->get();
    //     $blog_data = DB::table('blogs')->orderByDesc('sno')->get();

    //     $citation_data = DB::table('admin_query_replies')->orderByDesc('id')->get();
    //     $admin_queries = DB::table('questions_for_users')->get();
    //     $industry_options = DB::table('industries')->get();

    //     return view('surface.pages.blogs_with_experts', compact('blo_cats', 'blog_data', 'citation_data', 'industry_options', 'admin_queries'));
    // }








    public function readParticularBlog($serial, $category, $title)
    {
        $blog_data = DB::table('blogs')->where('sno', $serial)->get();
        $related_blogs = DB::table('blogs')->where('blog_category', $category)->orderByDesc('sno')->where('sno', '!=', $serial)->get();
        return view('surface.pages.specific_blog', compact('related_blogs', 'blog_data'));
    }













    public function readParticularExpertsBlog($serial, $title)
    {
        $question_data = DB::table('questions_for_users')->where('question_id', $serial)->where('publish_status', 1)->get();
        // $question_for_user_type = DB::table('questions_for_users')->where('question_id', $serial)->where('publish_status', 1)->value('user_type');
        $main_question = DB::table('questions_for_users')->where('question_id', $serial)->where('publish_status', 1)->value('title');
        $today = Carbon::today();

        $main_question_details = DB::table('questions_for_users')
            ->where('question_id', $serial)
            ->where('publish_status', 1)->value('details');

        $related_questions = DB::table('questions_for_users')
            // ->where('user_type', $question_for_user_type)
            ->where('question_id', '!=', $serial)
            ->where('publish_status', 1)
            ->orderByDesc('question_id')->take(3)->get();

        // $related_blogs = DB::table('admin_query_replies')->where('question_serial', $serial)->orderBy('')->get(); // only published ones. will do it later.
        $related_blogs = DB::table('admin_query_replies')->where('question_serial', $serial)->where('citation', '1')->where('deadline', '<=', $today)->orderBy('published_date')->get();
        return view('surface.pages.specific_experts_blog', compact('related_blogs', 'question_data', 'related_questions', 'main_question', 'main_question_details'));
    }

















    public function esictingBrnadsPage()
    {
        $allfaqs = DB::table('faqs')->orderByDesc('sno')->get();
        $brand_data = DB::table('brand_section_data')->where('sno', 1)->get();
        $rest_data = DB::table('brand_rest_section_data')->where('sno', 1)->get();
        return view('surface.pages.existing-brands', compact('allfaqs', 'brand_data', 'rest_data'));
    }





    public function redirect_to_spec_user($user_uid)
    {
        if ((Cookie::get('loggertype'))) {
            $loggertype = (Cookie::get('loggertype'));
            $loggerUniqueId = (Cookie::get('loggerUniqueId'));

            if ($loggertype == 'menufacturer') {
                // return redirect('/see-vendor-profile/menufacturer/' . $user_uid);
                return redirect('/menufacturer/dashboard');
            }
            if ($loggertype == 'entrepreneur') {
                return redirect('/entrepreneur/dashboard');
            } else {
                return redirect('/influencer/dashboard');
            }
        } else {
            return '/sign-in';
        }
    }










    public function newBrandsPage()
    {
        $brand_data = DB::table('brand_section_data')->where('sno', 1)->get();
        $rest_data = DB::table('brand_rest_section_data')->where('sno', 1)->get();
        $allfaqs = DB::table('faqs')->orderByDesc('sno')->get();
        return view('surface.pages.new-brands', compact('allfaqs', 'brand_data', 'rest_data'));
    }







    public function showSpecPageData($pagetype)
    {

        if ($pagetype == 'terms-conditions') {
            $type = 'Our Terms & Conditions';
            $data = DB::table('more_page_data')->where('page_name', 'terms')->value('page_text');
        }

        if ($pagetype == 'privacy-policy') {
            $type = 'Our Privacy & Policies';
            $data = DB::table('more_page_data')->where('page_name', 'privacy')->value('page_text');
        }

        return view('surface.pages.more_page', compact('type', 'data'));
    }











    public function showUserProfile($user_unique_id, $user_acc_name)
    {
        $profile_data = DB::table('vendor_profile')->where('vendor_user_id', $user_unique_id)->get();
        $vendor_name = DB::table('vendor_profile')->where('vendor_user_id', $user_unique_id)->value('business_name');
        $all_related_products = DB::table('vendor_products')->where('vendor_unique_id', $user_unique_id)->orderByDesc('sno')->get();
        return view('surface.pages.user_profile', compact('profile_data', 'user_acc_name', 'all_related_products', 'vendor_name'));
    }












    //
}
