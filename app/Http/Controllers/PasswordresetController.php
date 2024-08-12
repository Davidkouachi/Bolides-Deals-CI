<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

use App\Models\User;
use App\Models\Role;
use App\Models\Password_reset;
use App\Models\Phpmailer_error;

class PasswordresetController extends Controller
{
    public function index_password()
    {
        return view('auth.password.reset.email');
    }

    public function trait_password(Request $request)
    {
        // Valider les champs du formulaire manuellement
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        // Si la validation échoue
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->only('email'))->with('error','Veuillez entrer un email valide SVP !!!.');
        }

        $verf = User::where('email', '=', $request->email)->first();

        if ($verf) {

            $token = Str::random(60);

            $delete = Password_reset::where('email', $request->email)->where('click', '0')->delete();

            if ($verf->update_mdp > 0) {

                $daysSinceUpdate = Carbon::now()->diffInDays(Carbon::parse($verf->date_mdp));

                if ($daysSinceUpdate < 60) {

                    return redirect()->back()->with('warning', 'Vous devez attendre 60 jours avant de modifier a nouveau votre mot de passe.');
                }
            }            

            

            $rest = new Password_reset();
            $rest->email = $request->email;
            $rest->token = $token;
            $rest->user_id = $verf->id;

            if ($rest->save()) {

                $resetLink = route('index_new_password', ['token' => $token]);

                try {
                    
                    $mail = new PHPMailer(true);
                    $mail->isHTML(true);
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'bolidesdealsci@gmail.com';
                    $mail->Password = 'mkgg ytws mgjm noir';
                    $mail->SMTPSecure = 'ssl';
                    $mail->Port = 465;
                        // Destinataire, sujet et contenu de l'email
                    $mail->setFrom('bolidesdealsci@gmail.com', 'BOLIDES DEALS CI');
                    $mail->addAddress($request->email);
                    $mail->Subject = 'Lien de reinitialisation du mot de passe !';
                    $mail->Body = $resetLink;
                        // Envoi de l'email
                    $mail->send();

                    if ($mail->send()) {
                        return redirect()->back()->with('success', 'Le lien de réinitialisation de votre mot de passe a été envoyer par Email');
                    } else {
                        return redirect()->back()->with('error', 'L\'email n\'a pas pu être envoyé');
                    }

                } catch (Exception $e) {

                    $error = new Phpmailer_error();
                    $error->email = $request->email;
                    $error->message = $mail->ErrorInfo;
                    $email->save();

                    return redirect()->back()->with('error', 'L\'email n\'a pas pu être envoyé');
                }
                
            }else{
                return redirect()->back()->with('error', 'Une erreur est serveue. veuillez réssayer.');
            }

        }else{
            return redirect()->back()->withInput($request->only('email'))->with('error','Aucun compte n\'est associé a cet email.');
        }
    }

    public function index_new_password($token)
    {
        $passwordReset = Password_reset::where('token', $token)->first();

        if (!$passwordReset || $passwordReset->click >= 1) {
            return abort(403, 'Ce lien de réinitialisation est invalide.');
        }

        return view('auth.password.reset.new_password',['token' => $token]);
    }

    public function trait_new_password(Request $request)
    {
        // Valider les champs du formulaire manuellement
        $validator = Validator::make($request->all(), [
            'token' => 'required',
            'password' => 'required|string',
            'cpassword' => 'required|string|same:password',
        ]);

        // Si la validation échoue
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->with('error','Mot de passe incorrect.');
        }

        $passwordReset = Password_reset::where('token', $request->token)->first();

        if (!$passwordReset || $passwordReset->click >= 1) {
            return abort(403, 'Ce lien de réinitialisation est invalide.');
        }

        // Réinitialisation du mot de passe
        $user = User::where('email', $passwordReset->email)->first();
        if (!$user) {
            return redirect()->back('login')->with('error','Une erreur est survenue.');
        }

        $user->password = bcrypt($request->password);
        $user->date_mdp = now();
        $user->increment('update_mdp');

        if ($user->save()) {

            $passwordReset->increment('click');

            return redirect()->route('success_password');
        }


        return redirect()->back()->with('error','Une erreur est survenue');

    }

    public function success_password()
    {
        return view('auth.password.reset.success');
    }
}
