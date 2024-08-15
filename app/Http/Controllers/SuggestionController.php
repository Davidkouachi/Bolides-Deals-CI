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
use App\Models\Suggestion_file;

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

            if ($request->hasFile('file_pdf') && $request->file('file_pdf')->isValid()) {

                $originalFileName = time() . '.' . $request->file('file_pdf')->getClientOriginalName();
                $pdfPathname = $request->file('file_pdf')->storeAs('public/pdf', $originalFileName);

                $pdfFile = new Suggestion_file();
                $pdfFile->file_nom = $originalFileName;
                $pdfFile->file_chemin = $pdfPathname;
                $pdfFile->suggestion_id = $sugg->id;

                if ($pdfFile->save()) {
                    return redirect()->back()->with('success','Votre suggestion a bien été envoyée.');
                }else{
                    return redirect()->back()->with('warning','Votre suggestion a bien été envoyée, mais le fichier n\'a pas pu être envoyée.');
                }

            }

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
