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
            session(['auth' => true, 'email' => $input['email']]);
            return redirect()->route('connecter');
        }
        else{
            return "On a un problème sur le serveur, veuillez contacter l'administrateur";
        }
    }

    public function r_register(Request $request){
        $input = $request->all();
        $insert = DB::table('referant')->insert([
            'nom' => $input['name'],
            'prenom' => $input['fname'],
            'appelation' => $input['aname'],
            'email' => $input['email'],
            'tel' => $input['phone'],
            'password' => Hash::make($input['re_pass']),
        ]);
        if($insert == 1){
            session(['auth' => true, 'email' => $input['email'], 'ref' => true]);
            return redirect()->route('connecter');
        }
        else{
            return "On a un problème sur le serveur, veuillez contacter l'administrateur";
        }
    }

    public function verify_mail(Request $request){
        $email = $request->input('donne');
        $table = $request->input('table');
        $retour = DB::table($table) ->where('email', $email) ->get();
        return count($retour);
    }

    public function verify_pass(Request $request){
        $pass = $request->input('donne');
        $pass_mail = $request->input('pass_mail');
        $table = $request->input('table');
        $retour = DB::table($table)->select('password') ->where('email', $pass_mail) ->get();
        if (Hash::check($pass, $retour[0]->password)) {
            return 1;
        }
        else{
            return 0;
        }
    }

    public function login($su, Request $request){
        $email = $request->input('email');
        $pass = $request->input('pass');
        $table = $su.$request->input('e');
        $retour = DB::table($table)->select('password') ->where('email', $email) ->get();
        if (Hash::check($pass, $retour[0]->password)){
            session(['auth' => true, 'email' => $email]);
            if($table == 'referant'){
                session(['ref' => true]);
            }
            return redirect()->route('connecter');
        }
        else{
            return "Mail ou mot de passe incorrecte";
        }
    }

    public function connecter(Request $request){
        $table = 'etudiant';
        if($request->session()->has('ref') && session('ref') == true){
            $table = 'referant';
        }
        if($request->session()->has('auth') && $request->session()->has('email') && session('auth') == true){
            $user = DB::table($table)->where('email', session('email')) ->get();
            return view('home.home',[
                'user' => $user
            ]);
        }
        else{

            return redirect()->route('log_reg');
        }
    }

    public function deconnecter(Request $request){
        $request->session()->flush();
        return redirect()->route('log_reg');
    }
}
