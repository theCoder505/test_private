<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class allUsersLoginLogoutController extends Controller
{




    public function sendDemoMail()
    {
        $otp = rand(000000, 999999);
        $data = ['theOtp' => $otp];
        $user['to'] = 'coderash7867@gmail.com';
        Mail::send('mail.otp_to_user', $data, function ($message) use ($user) {
            $message->to($user['to']);
            $message->subject("Welcome to our website. You have a 6 Digit OTP to continue.");
        });
        
        echo 'sent!';
    }













    public function showLoginSignUpPage()
    {
        if ((Cookie::get('loggertype')) == 'menufacturer') {
            return redirect('/menufacturer/dashboard');
        } elseif ((Cookie::get('loggertype')) == 'influencer') {
            return redirect('/influencer/dashboard');
        } elseif ((Cookie::get('loggertype')) == 'entrepreneur') {
            return redirect('/entrepreneur/dashboard');
        } else {
            return view('surface.login_signUp.sign');
        }
    }





    public function addNewUserToDB(Request $request)
    {
        $req_user_acc_type = $request['user_acc_type'];
        $req_acc_name = $request['acc_name'];
        $req_full_name = $request['full_name'];
        $req_email_addr = $request['email_addr'];
        $req_user_pwd = bcrypt($request['user_pwd']);
        $uid = rand(11111111, 99999999);
        $otp = rand(000000, 999999);

        $count = DB::table('vendors')->where('type', $req_user_acc_type)->where('user_email', $req_email_addr)->count();
        if ($count > 0) {
            return 'User Already Exists';
        } else {
            $insert = DB::table('vendors')->insert([
                'type' => $req_user_acc_type,
                'user_unique_id' => $uid,
                'full_name' => $req_acc_name,
                'acc_name' => $req_full_name,
                'user_email' => $req_email_addr,
                'password' => $req_user_pwd,
                'otp' => $otp,
            ]);

            if ($insert) {
                return 'success';
            } else {
                return 'error';
            }
        }
    }







    public function checkOtpAddUser(Request $request)
    {
        $req_user_acc_type = $request['user_acc_type'];
        $req_email_addr = $request['email_addr'];
        $req_user_otp = $request['user_otp'];

        $db_otp = DB::table('vendors')->where('type', $req_user_acc_type)->where('user_email', $req_email_addr)->value('otp');
        if ($db_otp == $req_user_otp) {
            DB::table('vendors')->where('type', $req_user_acc_type)->where('user_email', $req_email_addr)->update([
                'status' => 1
            ]);
            return 'matched';
        } else {
            return 'missmatch';
        }
    }









    public function sendOtpToCheckPwd(Request $request)
    {
        $req_user_type = $request['type'];
        $req_user_email = $request['user_email'];
        $otp = rand(000000, 999999);

        $count = DB::table('vendors')->where('type', $req_user_type)->where('user_email', $req_user_email)->count();
        if ($count > 0) {
            $update =  DB::table('vendors')->where('type', $req_user_type)->where('user_email', $req_user_email)->update([
                'otp' => $otp,
            ]);

            // send otp to email 
            $data = ['user_otp', $otp];
            $user['to'] = $req_user_email;
            Mail::send('mail.otp_to_user', $data, function ($message) use ($user) {
                $message->to($user['to']);
                $message->subject("Welcome to our website. You have a 6 Digit OTP to continue.");
            });
            //mail part ends

            if ($update) {
                return 'otp sent';
            } else {
                return 'error';
            }
        } else {
            return 'nouser';
        }
    }
















    public function crossCheckForgetOtp(Request $request)
    {
        $req_user_type = $request['user_type'];
        $req_email_addr = $request['email_addr'];
        $req_typed_otp = $request['typed_otp'];
        $req_new_password = bcrypt($request['new_password']);


        $count = DB::table('vendors')->where('type', $req_user_type)->where('user_email', $req_email_addr)->count();
        if ($count > 0) {
            $db_otp =  DB::table('vendors')->where('type', $req_user_type)->where('user_email', $req_email_addr)->value('otp');

            if ($db_otp == $req_typed_otp) {
                DB::table('vendors')->where('type', $req_user_type)->where('user_email', $req_email_addr)->update([
                    'password' => $req_new_password,
                ]);
                return 'matched';
            } else {
                return 'missmatch';
            }
        } else {
            return 'nouser';
        }
    }

















    public function signInExistingUser(Request $request)
    {
        $req_user_type = $request['user_type'];
        $req_email_addr = $request['email_addr'];
        $askingPass = $request['login_pwd'];

        $check_activity_by_admin = DB::table('vendors')->where('type', $req_user_type)->where('user_email', $req_email_addr)->value('activity_status_by_admin');
        $check = DB::table('vendors')->where('type', $req_user_type)->where('user_email', $req_email_addr)->where('status', 1)->count();


        if ($check_activity_by_admin == 0) {
            return 'Your Account Is Deactivated By Admin! Contact Us For Further Informations. Thanks.';
        } else {
            if ($check > 0) {
                $loggerUniqueId =  DB::table('vendors')->where('type', $req_user_type)->where('user_email', $req_email_addr)->value('user_unique_id');
                $loggerAccName =  DB::table('vendors')->where('type', $req_user_type)->where('user_email', $req_email_addr)->value('acc_name');
                $dbpassword =  DB::table('vendors')->where('type', $req_user_type)->where('user_email', $req_email_addr)->value('password');
                $profile_status =  DB::table('vendor_profile')->where('vendor_user_id', $loggerUniqueId)->count();

                $verify = password_verify($askingPass, $dbpassword);
                if ($verify) {
                    $loggertype = $req_user_type;
                    $loggerEmail = $req_email_addr;
                    $mints = (60 * 24 * 30);

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


                    Cookie::queue('loggertype', $loggertype, $mints);
                    Cookie::queue('loggerUniqueId', $loggerUniqueId, $mints);
                    Cookie::queue('loggerAccName', $loggerAccName, $mints);
                    Cookie::queue('loggerEmail', $loggerEmail, $mints);
                    Cookie::queue('profile_status', $profile_status, $mints);
                    return 'success';
                } else {
                    return 'Passwords did not match';
                }
            } else {
                return 'Email/Account Type Not Matched! Or you are not a valid user Yet!';
            }
        }
    }

















    public function logoutExistingUser()
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
        return redirect('/sign-in');
    }

    //
}
