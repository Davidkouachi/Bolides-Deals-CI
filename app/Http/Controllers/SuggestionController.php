<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

use App\Models\Suggestion;

class SuggestionController extends Controller
{
    public function trait_sugg(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->with('error','Une erreur est survenue.');
        }

        $sugg = new Suggestion();
        $sugg->nom = $request->nom;
        $sugg->email = $request->email;
        $sugg->message = $request->message;
        $sugg->lu = 'non';

        if ($sugg->save()) {

            return redirect()->back()->with('success','Votre suggestion a bien été envoyée.');

        }

        return redirect()->back()->with('error','Une erreur est survenue lors de l\'envoie de la suggestion.');
        
    }

    public function send_sugg($id)
    {
        $verf = Suggestion::find($id);
        $verf->lu = 'oui';

        if ($verf->save()) {
            return redirect()->back()->with('success','Message bien lu.');
        }else{
            return redirect()->back()->with('error','Message non lu.');
        }
    }
}
