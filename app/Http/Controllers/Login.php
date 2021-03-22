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
        echo $insert;
    }

    public function verify_mail(Request $request){
        $email = $request->input('email');
        $retour = DB::table('etudiant') ->where('email', $email) ->get();
        return response ()-> count($retour);
    }
}
