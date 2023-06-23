<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class adminCredentialsController extends Controller
{





    public function showLoginPage()
    {
        return view('admin.credentials.login');
    }





    public function showForgetPwdPage()
    {
        return view('admin.credentials.forgetsetup');
    }







    public function checkCredentials(Request $request)
    {
        $askingMail = $request->adminmail;
        $askingPass = $request->adminpassword;

        $check = DB::table('admin')->where('email', $askingMail)->count();
        if ($check > 0) {
            $dbpassword = DB::table('admin')->where('email', $askingMail)->value('password');
            $verify = password_verify($askingPass, $dbpassword);
            if ($verify) {
                // set cookies 
                $loggertype = 'admin';
                $loggerEmail = $askingMail;
                $mints = (60 * 24);

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
                Cookie::queue('loggerEmail', $loggerEmail, $mints);


                return redirect('/admin/admindashboard');
            } else {
                return Redirect::back()->with('alertMsg', 'Passwords did not match')->with('typedMail', $askingMail)->with('typedPass', $askingPass);
            }
        } else {
            return Redirect::back()->with('alertMsg', 'Admin Email did not match')->with('typedMail', $askingMail)->with('typedPass', $askingPass);
        }
    }










    public function checkMail(Request $request)
    {
        $typedMail = $request->askingMail;
        $check =  DB::table('admin')->where('email', $typedMail)->count();
        if ($check > 0) {

            $otp = rand(000000, 999999);


            //mail part start
            $data = ['name' => 'Vishal Sharma', 'theOtp' => $otp];
            $user['to'] = $typedMail;
            Mail::send('mail.forget', $data, function ($message) use ($user) {
                $message->to($user['to']);
                $message->subject(" Admin Change/Retrive Password");
            });
            //mail part ends


            // send mail now and if mail sent then update otp. If not sent then say try agin to send mail 
            $updateOtp = DB::table('admin')->where('sno', 1)->update([
                'otp' => $otp,
                'otp_sent_time' => time(),
            ]);
            if ($updateOtp) {
                return 'proceed';
            } else {
                return 'tryagain';
            }
        } else {
            return 'unmatch';
        }
    }













    public function checkOTP(Request $request)
    {
        $typedOTP = $request->askingOtp;
        $databaseOTP =  DB::table('admin')->where('sno', 1)->value('otp');
        $databaseOTPTime =  DB::table('admin')->where('sno', 1)->value('otp_sent_time');


        if (($databaseOTPTime + 900) >  time()) {
            if ($databaseOTP == $typedOTP) {
                return 'proceed';
            } else {
                return 'unmatch';
            }
        } else {
            return 'expires';
        }
    }

















    public function setNewPwd(Request $request)
    {
        $setNewPassword = $request->setNewPassword;
        $bcryptedPass = bcrypt($setNewPassword);

        $updateOtp = DB::table('admin')->where('sno', 1)->update([
            'password' => $bcryptedPass,
        ]);

        $adminMail = DB::table('admin')->where('sno', 1)->value('email');

        if ($updateOtp) {
            $loggertype = 'admin';
            $loggerEmail = $adminMail;
            $mints = (60 * 24);

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
            Cookie::queue('loggerEmail', $loggerEmail, $mints);
            return 'login';
        } else {
            return 'error';
        }
    }





















    public function checkOldMailPass(Request $request)
    {
        $askingMail = $request->oldmail;
        $askingPwd = $request->oldPwd;

        $dbAdminPassword = DB::table('admin')->where('sno', 1)->value('password');
        $check =  DB::table('admin')->where('email', $askingMail)->count();
        if ($check > 0) {

            $verify = password_verify($askingPwd, $dbAdminPassword);
            if ($verify) {

                $otp = rand(000000, 999999);



                //mail part start
                $data = ['name' => 'Vishal Sharma', 'theOtp' => $otp];
                $user['to'] = $askingMail;
                Mail::send('mail.change', $data, function ($message) use ($user) {
                    $message->to($user['to']);
                    $message->subject(" Admin account verification");
                });
                //mail part ends




                // send mail now and if mail sent then update otp. If not sent then say try agin to send mail 
                $updateOtp = DB::table('admin')->where('sno', 1)->update([
                    'otp' => $otp,
                    'otp_sent_time' => time(),
                ]);

                if ($updateOtp) {
                    return 'proceed';
                } else {
                    return 'tryagain';
                }
            } else {
                return 'passunmatch';
            }
        } else {
            return 'mailunmatch';
        }
    }











    public function setNewAdminMail(Request $request)
    {
        $askingMail = $request->setnewmail;
        $update = DB::table('admin')->where('sno', 1)->update([
            'email' => $askingMail,
        ]);

        if ($update) {
            $loggertype = 'admin';
            $loggerEmail = $askingMail;
            $mints = (60 * 24);


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
            Cookie::queue('loggerEmail', $loggerEmail, $mints);

            return 'success';
        } else {
            return 'error';
        }
    }








    public function logoutAdmin()
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
        
        return redirect('/admin/login');
    }
    //
}
