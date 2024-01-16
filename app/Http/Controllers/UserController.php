<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
//       $user=  User::create([
//             'name'=>'waleed',
//             'email'=>'hamzeh4@gmail.com',
//             'password'=>'123456',
//             'profile_cover'=>'image1',
//             'friends'=>[
//                 '1' => 'accepted',
//                 '2' => 'pending',
//             ]

//         ]
// );
$user=User::all();


return view('frontend.home',compact('user'));
    }




    public function update($authid,$userid2){
        // $auth=User::find($authid);
        $user2=User::find($userid2);
        // $json =$auth->friends;
        $json2=$user2->friends;
        $num=0;
        if($json2 != null){

            foreach($json2 as $arr){
                if($arr['userid'] == $authid){
                    $num++;
                    break;
                }
            }
        }
        else{

            $json2 = ['userid' => $authid , 'status' => 'pending'];

        }
        if($num == 0){
        array_push($json2,['userid'=>$authid,'status'=> 'pending']);
        $user2->update([
            'friends'=> $json2,
        ]);
        }
        return redirect()->back();
    }
    public function canelreq($authid,$userid){


        $user2=User::find($userid);
        $json2=$user2->friends;
        foreach($json2 as $key =>$value){
            if($value['userid']==$authid){
                unset($json2[$key]);
                break;
            }
        }

        $user2->update([
            'friends'=> $json2,
        ]);

        return redirect()->back()->with('info' , 'cancel request succesfully');
    }
    public function accept($authid, $userid){
        $user = User::find($authid);
        $friends = $user->friends;

        foreach($friends as $key => $friend){
            if($friend['userid'] == $userid){
                $friends[$key]['status'] = 'accepted';
                break;
            }
        }

        $user->update([
            'friends' => $friends
        ]);

        return redirect()->back()->with('message', 'You accepted the friend');
    }


}
