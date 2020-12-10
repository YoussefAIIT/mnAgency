<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TraitementController extends Controller
{

    protected function create_v2(Request $request)
    {
        //******** Traitement registration ********* Etat =ok

        try{

            //** pour l'envoi de mail

            $to_email=$request->email;
            $to_name=$request->username;
            $password=$request->password;



            //Replissage de donner user
            $user=new User();


            $user->user_name=$to_name;
            $user->email=$to_email;
            $user->password=bcrypt($password);


            $user->first_name=$request->firstname;
            $user->last_name=$request->lastname;
            $user->contact_no=$request->contactno;
            $user->alternate_contact_no=$request->alternatecontact;




            //******** Traitement image ******* etat=ok
            $filename="User.png";
            if($request->hasFile('photo'))
            {
                $image = $request->file('photo');
                $filename = time().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('images'), $filename);
            }
            $user->photo=$filename;

            $user->save();






            // *********** Traitement Envoi Mail  *********** etat = OK

            $data=array("username"=>$to_name,"password"=> $password);

            Mail::send('mail.register',$data,function ($message) use ($to_name,$to_email){
                $message->to($to_email)
                    ->subject('Votre compte été bien crée');
            });

        }
        catch(\Exception $e){

            return  Response()->json(["etat"=>false]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'User added seccessfully',
        ], 200);


    }




}
