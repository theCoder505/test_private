<?php

use App\Http\Controllers\admin\adminCredentialsController;
use App\Http\Controllers\admin\AdminRedirects;
use App\Http\Controllers\admin\allBasicWorksController;
use App\Http\Controllers\admin\blogsController;
use App\Http\Controllers\admin\homepageSetupController;
use App\Http\Controllers\admin\siteinfoController;
use App\Http\Controllers\allUsersLoginLogoutController;
use App\Http\Controllers\BrandPagesController;
use App\Http\Controllers\influencer\productController as InfluencerProductController;
use App\Http\Controllers\influencer\vendors_productController;
use App\Http\Controllers\menufacturer\allBasicPagesController;
use App\Http\Controllers\menufacturer\productController;
use App\Http\Controllers\menufacturer\profilesetupController;
use App\Http\Controllers\menufacturer\rfpSetupController;
use App\Http\Controllers\QuestionAnswersController;
use App\Http\Controllers\questioncontroleer\task_of_question_controller;
use App\Http\Controllers\surface\AllPagesController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;




// main website routers 
Route::get('/', [AllPagesController::class, 'showHomePage']);

Route::get('/read-blogs', [AllPagesController::class, 'readBlogsPage']);

Route::get('/read-blog-with-experts', [AllPagesController::class, 'readBlogsWithExpertsPage']);

Route::get('/read-blog-with-experts/category/{category_name}', [AllPagesController::class, 'redParticularCatBlogsOnly']);

Route::get('/read-specific-blogs/category/{category_name}', [AllPagesController::class, 'readParticularWebSpecBlog']);

Route::get('/search-results', [AllPagesController::class, 'showSearchBlogResults']);

Route::get('/see-blog/{serial}/{category}/{title}', [AllPagesController::class, 'readParticularBlog']);

Route::get('/read-experts-articles/{serial}/{title}', [AllPagesController::class, 'readParticularExpertsBlog']);

Route::get('/see-profile/{user_uid}', [AllPagesController::class, 'redirect_to_spec_user']);

Route::get('/existing-brands', [AllPagesController::class, 'esictingBrnadsPage']);

Route::get('/new-brands', [AllPagesController::class, 'newBrandsPage']);

Route::get('/more-pages/{pagetype}', [AllPagesController::class, 'showSpecPageData']);

Route::get('/see-user-profile/{user_unique_id}/{user_acc_name}', [AllPagesController::class, 'showUserProfile']);













// sign in and up to all type usres 
Route::get('/sign-up', [allUsersLoginLogoutController::class, 'showLoginSignUpPage']);

Route::get('/sign-in', [allUsersLoginLogoutController::class, 'showLoginSignUpPage']);

Route::post('/add-new-user-with-otp', [allUsersLoginLogoutController::class, 'addNewUserToDB']);

Route::post('/check-user-otp-and-add-user', [allUsersLoginLogoutController::class, 'checkOtpAddUser']);

Route::post('/send-otp-to-forget-pwd', [allUsersLoginLogoutController::class, 'sendOtpToCheckPwd']);

Route::post('/check-forget-pwd-otp', [allUsersLoginLogoutController::class, 'crossCheckForgetOtp']);

Route::post('/sign-in-existing-user', [allUsersLoginLogoutController::class, 'signInExistingUser']);

Route::get('/logout', [allUsersLoginLogoutController::class, 'logoutExistingUser']);


















// all menufacturers profile and pages 
Route::get('/menufacturer/dashboard', [allBasicPagesController::class, 'sowDashboard'])->middleware('menufacturerCheck');

Route::get('/menufacturer/Educational-Resources', [allBasicPagesController::class, 'educationalPage'])->middleware('menufacturerCheck');

Route::get('/influencer/Educational-Resources', [allBasicPagesController::class, 'educationalPageForInluencer'])->middleware('influencerCheck');

Route::get('/menufacturer/Orders-&-Shipments', [allBasicPagesController::class, 'ordersAndShipmentsForMenufacturer'])->middleware('menufacturerCheck');

Route::post('/menufacturer/change-order-status', [vendors_productController::class, 'updateStatus'])->middleware('menufacturerCheck');

Route::get('/menufacturer/Set-Up-Profile', [profilesetupController::class, 'setUpProfile'])->middleware('menufacturerCheck');

Route::post('/menufacturer/complete-user-profile', [profilesetupController::class, 'setupVendorProfile'])->middleware('menufacturerCheck');

Route::get('/menufacturer/Set-Up-Products', [productController::class, 'setUpProduct'])->middleware('menufacturerCheck');

Route::post('/menufacturer/add-new-project', [productController::class, 'addNewProduct'])->middleware('menufacturerCheck');

Route::get('/menufacturer/edit-product/{productid}', [productController::class, 'showEditingPage'])->middleware('menufacturerCheck');

Route::post('/menufacturer/edit-existing-product', [productController::class, 'editExistingProduct'])->middleware('menufacturerCheck');

Route::get('/menufacturer/make-custom-request', [productController::class, 'makeCustomRequest'])->middleware('menufacturerCheck');

Route::post('/menufacturer/new-custom-project-add', [productController::class, 'addNewCustomRequest'])->middleware('menufacturerCheck');

Route::get('/menufacturer/show-all-rfps', [rfpSetupController::class, 'showAllRfpDatatomenufacturer'])->middleware('menufacturerCheck');

Route::get('/see-particular-request-for-proposal/{proposal_sno}/{category}/{title}', [rfpSetupController::class, 'particularRequest']);

Route::post('/add-response-on-rfp', [rfpSetupController::class, 'addNewBid']);











Route::get('/{usertype}/Messages', [allBasicPagesController::class, 'sendToPersonalWp']);
Route::get('/contact/menufacturer/{username}/{user_id}', [allBasicPagesController::class, 'sendtoWhatsApp'])->middleware('menufacturerCheck');













// all influencers profile and pages 
Route::get('/influencer/dashboard', [allBasicPagesController::class, 'showInfluencerDashboard'])->middleware('influencerCheck');

Route::get('/influencer/Orders-&-Shipments', [allBasicPagesController::class, 'ordersAndShipments'])->middleware('influencerCheck');

Route::post('/influencer/change-order-status', [vendors_productController::class, 'updateInfluencerOrderStatus'])->middleware('influencerCheck');

Route::get('/influencer/Set-Up-Profile', [profilesetupController::class, 'setUpInfluencerProfile'])->middleware('influencerCheck');

Route::get('/influencer/Set-Up-Products', [productController::class, 'setUpInfluencerProduct'])->middleware('influencerCheck');

Route::get('/influencer/edit-product/{productid}', [productController::class, 'showInfluencerEditingPage'])->middleware('influencerCheck');

Route::get('/influencer/make-custom-request', [productController::class, 'makeCustomInfluencerRequest'])->middleware('influencerCheck');

Route::post('/influencer/new-custom-project-add', [productController::class, 'addNewInfluencerCustomRequest'])->middleware('influencerCheck');

Route::get('/influencer/edit-custom-request-product/{productid}', [productController::class, 'editCustomInfluencerProductPage'])->middleware('influencerCheck');

Route::post('/influencer/edit-existing-custom-requested-product', [productController::class, 'editExistingCustomRequestProduct'])->middleware('influencerCheck');

Route::post('/influencer/add-new-project', [productController::class, 'addNewProduct'])->middleware('influencerCheck');

Route::post('/influencer/complete-user-profile', [profilesetupController::class, 'setupVendorProfile'])->middleware('influencerCheck');

Route::post('/influencer/edit-existing-product', [productController::class, 'editExistingProduct'])->middleware('influencerCheck');

Route::get('/influencer/Add-New-RFP', [rfpSetupController::class, 'addNewRFP'])->middleware('influencerCheck');

Route::get('/influencer/see-entrepreneur-RFP', [rfpSetupController::class, 'showentrepreneursRFP'])->middleware('influencerCheck');


Route::post('/influencer/create-new-rfp-post', [rfpSetupController::class, 'postNewInfluencerRFP'])->middleware('influencerCheck');

Route::get('/view-or-edit-rpf/{rfp_serial}/{rfp_category}/{rfp_title}', [rfpSetupController::class, 'showParticularRfpData']);

Route::get('/delete-rpf/{rfp_serial}/{rfp_category}/{rfp_title}', [rfpSetupController::class, 'deleteRFP']);

Route::post('/influencer/edit-particular-rfp-post', [rfpSetupController::class, 'updateExistingInfluencer'])->middleware('influencerCheck');

Route::get('/influencer/see-rfp-responses/{rfp_serial}/{rfp_category}/{rfp_title}', [rfpSetupController::class, 'seeResponses'])->middleware('influencerCheck');

Route::get('/get-order-review/{order_id}', [allBasicPagesController::class, 'getReviewData']); // no middleware

Route::get('/influencer/see-particular-request-for-proposal/{proposal_sno}/{category}/{title}', [rfpSetupController::class, 'particularRequestForInfluencer'])->middleware('influencerCheck');

Route::post('/influencer/add-response-on-rfp', [rfpSetupController::class, 'addNewinfluencerBid'])->middleware('influencerCheck');








Route::get('/answer-admin-queries', [QuestionAnswersController::class, 'showAdminSpecQuestions']);

Route::get('/track-my-answers', [QuestionAnswersController::class, 'trackMyAnswers']);

Route::get('/see-specific-admin-question/{question_sno}', [QuestionAnswersController::class, 'showPArticularQuestion']);

Route::get('/my-citations', [QuestionAnswersController::class, 'showMyCitations']);

Route::post('/admin/submit-questions-reply', [QuestionAnswersController::class, 'submitQueryReply']); // no admin login, it's for users.












// Show products to influencers 
Route::get('/see-product/{prod_serial}/{prod_cat}/{prod_name}', [vendors_productController::class, 'showParticularProduct']);

Route::get('/see-custom-product/{prod_serial}/{prod_cat}/{prod_name}', [vendors_productController::class, 'showCustomProduct']);

Route::post('/send-to-order-product', [vendors_productController::class, 'orderProduct']);

Route::post('/send-to-order-custom-request-product', [vendors_productController::class, 'customOrderProduct']);

Route::post('/accept-order-request', [vendors_productController::class, 'acceptOrderRequest']);

Route::get('/see-vendor-profile/{vendortype}/{vendoruid}', [vendors_productController::class, 'showVendorProfile']);

Route::get('/review-order/{order_serial}/{prod_serial}/{prod_cat}/{prod_name}', [vendors_productController::class, 'reviewPArticularOrder']);

Route::post('/review-the-product', [vendors_productController::class, 'addNewReview']);






















// all entrepreneurs profiles pages and everything | entrepreneur
Route::get('/entrepreneur/dashboard', [allBasicPagesController::class, 'showentrepreneurDashboard'])->middleware('enterprenuerCheck');

Route::get('/entrepreneur/Set-Up-Profile', [profilesetupController::class, 'setUpentrepreneurProfile'])->middleware('enterprenuerCheck');

Route::post('/entrepreneur/complete-user-profile', [profilesetupController::class, 'setupVendorProfile'])->middleware('enterprenuerCheck');

Route::get('/entrepreneur/Add-New-RFP', [rfpSetupController::class, 'addNewentrepreneurRFP'])->middleware('enterprenuerCheck');

Route::post('/entrepreneur/create-new-rfp-post', [rfpSetupController::class, 'postNewentrepreneurRFP'])->middleware('enterprenuerCheck');

Route::get('/entrepreneur/view-or-edit-rpf/{rfp_serial}/{rfp_category}/{rfp_title}', [rfpSetupController::class, 'showParticularRfpDataToEnterprenuer'])->middleware('enterprenuerCheck');

Route::get('/entrepreneur/delete-rpf/{rfp_serial}/{rfp_category}/{rfp_title}', [rfpSetupController::class, 'deleteRFP'])->middleware('enterprenuerCheck');

Route::post('/entrepreneur/edit-particular-rfp-post', [rfpSetupController::class, 'updateExistingentrepreneurRFP'])->middleware('enterprenuerCheck');

Route::get('/entrepreneur/see-rfp-responses/{rfp_serial}/{rfp_category}/{rfp_title}', [rfpSetupController::class, 'seeResponsesToentrepreneur'])->middleware('enterprenuerCheck');

Route::get('/entrepreneur/Educational-Resources', [allBasicPagesController::class, 'educationalPageForEntrepreneur'])->middleware('enterprenuerCheck');

Route::get('/entrepreneur/Orders-&-Shipments', [allBasicPagesController::class, 'entrepreneurOrdersAndShipments'])->middleware('enterprenuerCheck');




// Show products to entrepreneurs 
Route::get('/entrepreneur/see-product/{prod_serial}/{prod_cat}/{prod_name}', [vendors_productController::class, 'showParticularProductEnterprenuer'])->middleware('enterprenuerCheck');

Route::get('/for-entrepreneur/see-custom-product/{prod_serial}/{prod_cat}/{prod_name}', [vendors_productController::class, 'showCustomProductForentrepreneur']);

Route::post('/entrepreneur/send-to-order-product', [vendors_productController::class, 'orderProductForentrepreneur'])->middleware('enterprenuerCheck');

Route::post('/entrepreneur/send-custom-request-product-to-order', [vendors_productController::class, 'customOrderProductForentrepreneur'])->middleware('enterprenuerCheck');

Route::get('/entrepreneur/see-vendor-profile/{vendortype}/{vendoruid}', [vendors_productController::class, 'showVendorProfile'])->middleware('enterprenuerCheck');

Route::get('/entrepreneur/review-order/{order_serial}/{prod_serial}/{prod_cat}/{prod_name}', [vendors_productController::class, 'reviewParticularOrderForEnterprenuer'])->middleware('enterprenuerCheck');

Route::post('/entrepreneur/review-the-product', [vendors_productController::class, 'addNewEnterprenuerReview'])->middleware('enterprenuerCheck');

















































// all admin routes 
// admin basic login regestration ->middleware('adminlogincheck')
Route::get('/admin/login', [adminCredentialsController::class, 'showLoginPage']);

Route::get('/admin/forget-password', [adminCredentialsController::class, 'showForgetPwdPage']);

Route::get('/admin/logout', [adminCredentialsController::class, 'logoutAdmin']);

Route::get('/admin/change-admin-email', [AdminRedirects::class, 'mailChangeManagement']);

Route::get('/admin/change-admin-password', [AdminRedirects::class, 'passChangeManagement']);


// admin login credentials all for ******************* ADMIN *******************
Route::post('/check-admin-credential', [adminCredentialsController::class, 'checkCredentials']);

Route::post('/check-forgetting-mail', [adminCredentialsController::class, 'checkMail']);

Route::post('/check-admin-otp', [adminCredentialsController::class, 'checkOTP']);

Route::post('/set-new-password', [adminCredentialsController::class, 'setNewPwd']);


Route::post('/check-admin-old-mail-pass', [adminCredentialsController::class, 'checkOldMailPass']);

Route::post('/set-new-admin-mail', [adminCredentialsController::class, 'setNewAdminMail']);



// admin pages 
Route::get('/admin/admindashboard', [AdminRedirects::class, 'showDashBoard'])->middleware('admincheck');

Route::get('/admin/manage-categories', [allBasicWorksController::class, 'setCategoriesPage'])->middleware('admincheck');

Route::get('/admin/manage-industry-options', [allBasicWorksController::class, 'setIndustryOptions'])->middleware('admincheck');

Route::post('/admin/add-new-industry-option', [allBasicWorksController::class, 'addNewIndustryOption'])->middleware('admincheck');

Route::post('/admin/update-existing-industry', [allBasicWorksController::class, 'updateIndustryOption'])->middleware('admincheck');

Route::get('/admin/delete-industry/{deleting_id}', [allBasicWorksController::class, 'deleteIndustryOption'])->middleware('admincheck');

Route::post('/admin/add-new-category', [allBasicWorksController::class, 'addNewcategory'])->middleware('admincheck');

Route::post('/admin/update-category', [allBasicWorksController::class, 'updatecategory'])->middleware('admincheck');

Route::get('/admin/delete-category/{category_sno}', [allBasicWorksController::class, 'deletecategory'])->middleware('admincheck');



Route::get('/admin/manage-resources', [allBasicWorksController::class, 'resourceManagementPage'])->middleware('admincheck');

Route::post('/admin/update-resources', [allBasicWorksController::class, 'resourceManagementUpdate'])->middleware('admincheck');

Route::post('/admin/add-new-menufacturers-resource', [allBasicWorksController::class, 'addNewMenufacturerVidLsns'])->middleware('admincheck');

Route::post('/admin/update-menufacturers-resource', [allBasicWorksController::class, 'updateMenufacturerVidLsns'])->middleware('admincheck');


Route::post('/admin/add-new-influencers-resource', [allBasicWorksController::class, 'addNewinfluencersVidLsns'])->middleware('admincheck');

Route::post('/admin/update-influencers-resource', [allBasicWorksController::class, 'updateinfluencersVidLsns'])->middleware('admincheck');


Route::post('/admin/add-new-entrepreneurs-resource', [allBasicWorksController::class, 'addNewentrepreneursVidLsns'])->middleware('admincheck');

Route::post('/admin/update-entrepreneurs-resource', [allBasicWorksController::class, 'updateentrepreneursVidLsns'])->middleware('admincheck');

Route::get('/admin/delete-resource/{video_lesson_sno}', [allBasicWorksController::class, 'deleteVideoLesson'])->middleware('admincheck');

Route::get('/admin/show-blogs-page', [blogsController::class, 'showBlogPage'])->middleware('admincheck');

Route::post('/admin/add-new-blog', [blogsController::class, 'addNewBlogItem'])->middleware('admincheck');

Route::get('admin/update-blogs/{blog_serial}', [blogsController::class, 'showParticularBlog'])->middleware('admincheck');

Route::post('/admin/update-particular-blog', [blogsController::class, 'updateExistingBlogItem'])->middleware('admincheck');

Route::get('/admin/delete-particular-blog/{blog_serial}', [blogsController::class, 'deleteExistingBlogItem'])->middleware('admincheck');



Route::get('/admin/manage-faqs', [AdminRedirects::class, 'manageFaqs'])->middleware('admincheck');

Route::post('/admin/add-new-faq', [AdminRedirects::class, 'addNewFaq'])->middleware('admincheck');

Route::post('/admin/update-faq', [AdminRedirects::class, 'updateFaq'])->middleware('admincheck');

Route::get('/admin/delete-faq/{faq_sno}', [AdminRedirects::class, 'deletefaq'])->middleware('admincheck');



// setup site infos
Route::get('/admin/site-information-setup', [siteinfoController::class, 'showPage'])->middleware('admincheck');

Route::post('/admin/edit-site-information', [siteinfoController::class, 'editInformation'])->middleware('admincheck');

Route::get('/admin/homepage-edit', [homepageSetupController::class, 'showHomePageInformation'])->middleware('admincheck');

Route::post('/admin/update-homepage', [homepageSetupController::class, 'updateHomePageInformation'])->middleware('admincheck');

Route::get('/admin/edit-brand-pages', [BrandPagesController::class, 'showBrandPageInformation'])->middleware('admincheck');

Route::post('/admin/update-brand-pages-data', [BrandPagesController::class, 'updateBrandPageInformation'])->middleware('admincheck');


// add site questions from admin 
Route::get('/admin/add-new-questions', [QuestionAnswersController::class, 'showAddNewQuestionsPage'])->middleware('admincheck');

Route::get('/admin/manage-questions', [QuestionAnswersController::class, 'showManageQuestionsPage'])->middleware('admincheck');

Route::get('/admin/questions-requests', [QuestionAnswersController::class, 'showQuestionRequestsPage'])->middleware('admincheck');

Route::get('/admin/{discard_status}-question/{questionId}', [QuestionAnswersController::class, 'changeActiveStatus'])->middleware('admincheck');

Route::get('/admin/see-experts-blog-view/{serial}/{title}', [task_of_question_controller::class, 'seeQuestionProbableBlog'])->middleware('admincheck');

Route::post('/admin/discard-question', [QuestionAnswersController::class, 'discardQuestion'])->middleware('admincheck');

Route::post('/admin/add-new-question-to-database', [QuestionAnswersController::class, 'addNewQuestion'])->middleware('admincheck');

Route::post('/admin/get-question-specific-response', [QuestionAnswersController::class, 'getSpecQuestionResponse'])->middleware('admincheck');

Route::post('/admin/update-existing-question', [QuestionAnswersController::class, 'updateExistingQuestion'])->middleware('admincheck');

Route::get('/admin/delete-particular-question-data/{question_sno}', [QuestionAnswersController::class, 'deleteQuestion'])->middleware('admincheck');

Route::get('/admin/see-question-responses/{question_sno}', [QuestionAnswersController::class, 'seeQuestionResponses'])->middleware('admincheck');

Route::post('/admin/get-response-data', [QuestionAnswersController::class, 'getSpecResponse'])->middleware('admincheck');

Route::post('/admin/add-for-citation', [QuestionAnswersController::class, 'addToCitation'])->middleware('admincheck');

Route::get('/admin/publish-question-qsno/{question_serial}', [QuestionAnswersController::class, 'PublishQuestion'])->middleware('admincheck');

Route::post('/admin/bulk-publish', [QuestionAnswersController::class, 'bulkPublish'])->middleware('admincheck');


// both admin and question controller can maintain this
Route::post('/update-question-reply', [QuestionAnswersController::class, 'updateQuestionReply']);

Route::post('/update-specific-question', [QuestionAnswersController::class, 'updateSpecificQuestion']);


// some other admin controllers 
Route::get('/admin/users-activity-management', [allBasicWorksController::class, 'showUsersActivity'])->middleware('admincheck');

Route::post('/admin/update-users-activity', [allBasicWorksController::class, 'changeActivity'])->middleware('admincheck');

Route::get('/admin/questions-controller', [allBasicWorksController::class, 'showQuestionControllers'])->middleware('admincheck');

Route::get('/admin/controller-questions', [allBasicWorksController::class, 'controllerQuestions'])->middleware('admincheck');

Route::get('/admin/delete-particular-question-data/{question_sno}', [allBasicWorksController::class, 'deleteQuestion'])->middleware('admincheck');

Route::post('/admin/add-new-question-controler', [allBasicWorksController::class, 'addNewQuestionController'])->middleware('admincheck');

Route::post('/admin/update-controller-access', [allBasicWorksController::class, 'updateQuestionControllersData'])->middleware('admincheck');

Route::get('/admin/remove-controller/{removing_id}', [allBasicWorksController::class, 'deleteQuestionController'])->middleware('admincheck');












// question controllers 
Route::get('/question-controler/login', [task_of_question_controller::class, 'loginControllerPage']);

Route::post('/sign-in-question-controler', [task_of_question_controller::class, 'signInQuestionController']);

Route::get('/question-controller/logout', [task_of_question_controller::class, 'signOutController']);



Route::get('/question-controller-dashboard', [task_of_question_controller::class, 'showControllersDashboard'])->middleware('question_controller');

Route::get('/question-controller-manage-questions', [task_of_question_controller::class, 'showQuestionsPage'])->middleware('question_controller');

Route::get('/question-controller-add-new-question', [task_of_question_controller::class, 'showNewQuestionAddPage'])->middleware('question_controller');

Route::post('/question-controler/add-new-question-to-database', [task_of_question_controller::class, 'addNewQuestion'])->middleware('question_controller');

Route::post('/question-controler/get-question-specific-response', [task_of_question_controller::class, 'getSpecQuestionResponse'])->middleware('question_controller');

Route::post('/question-controler/update-existing-question', [task_of_question_controller::class, 'updateExistingQuestion'])->middleware('question_controller');

Route::get('/question-controler/delete-particular-question-data/{question_sno}', [task_of_question_controller::class, 'deleteQuestion'])->middleware('question_controller');

Route::get('/question-controler/see-question-responses/{question_sno}', [task_of_question_controller::class, 'seeQuestionResponses'])->middleware('question_controller');

Route::post('/question-controler/get-response-data', [task_of_question_controller::class, 'getSpecResponse'])->middleware('question_controller');

Route::post('/question-controler/add-for-citation', [task_of_question_controller::class, 'addToCitation'])->middleware('question_controller');

Route::get('/question-controler/publish-question-qsno/{question_serial}', [task_of_question_controller::class, 'PublishQuestion'])->middleware('question_controller');

Route::post('/question-controler/bulk-publish', [task_of_question_controller::class, 'bulkPublish'])->middleware('question_controller');

Route::get('/question-controller/publish-question/{question_serial}', [task_of_question_controller::class, 'publishSpecificQuestion'])->middleware('question_controller');

Route::get('/question-controler/see-experts-blog-view/{serial}/{title}', [task_of_question_controller::class, 'seeQuestionProbableBlog'])->middleware('question_controller');







Route::get('/send-email', [allUsersLoginLogoutController::class, 'sendDemoMail']);








Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    return "Cleared!";
});
