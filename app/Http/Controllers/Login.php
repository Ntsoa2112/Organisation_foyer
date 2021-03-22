<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Login extends Controller
{
    public function log_reg(){
        return view('registerLogin.index', [
            'foyers' => DB::table('foyer') ->select('id', 'nom') ->get(),
            'referants' => DB::table('referant') ->select('id', 'appelation') ->get(),
        ]);
    }

    public function register(Request $request){
        $input = $request->all();
        $insert = DB::table('etudiant')->insert([
            'nom' => $input['name'],
            'prenom' => $input['fname'],
            'appelation' => $input['aname'],
            'id_foyer' => $input['foyer'],
            'id_ref' => $input['referant'],
            'email' => $input['email'],
            'password' => Hash::make($input['re_pass']),
            'promotion' => $input['promotion']
        ]);
        if($insert == 1){
            session(['auth' => true]);
            return view('home.home',[
                'user' => $input
            ]);
        }
    }

    public function verify_mail(Request $request){
        $email = $request->input('donne');
        $retour = DB::table('etudiant') ->where('email', $email) ->get();
        return count($retour);
    }

    public function verify_pass(Request $request){
        $pass = $request->input('donne');
        $pass_mail = $request->input('pass_mail');
        $retour = DB::table('etudiant')->select('password') ->where('email', $pass_mail) ->get();
        if (Hash::check($pass, $retour[0]->password)) {
            return 1;
        }
        else{
            return 0;
        }
    }

    public function login(Request $request){
        $email = $request->input('email');
        $pass = $request->input('pass');
        $retour = DB::table('etudiant')->select('password') ->where('email', $email) ->get();
        if (Hash::check($pass, $retour[0]->password)) {
            return 1;
        }
        else{
            //redirigena @ login avec notif mail ou mdp incorrecte
        }
    }
}
