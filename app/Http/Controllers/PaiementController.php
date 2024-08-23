<?php

namespace App\Http\Controllers;

use Paydunya\Setup;
use Paydunya\Checkout\CheckoutInvoice;

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Marque;
use App\Models\Ville;
use App\Models\Type_marque;
use App\Models\Annonce;
use App\Models\Annonce_photo;
use App\Models\Annonce_error;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class PaiementController extends Controller
{
    public function index_paye()
    {
        return view('paiement.index');
    }

    public function initiatePayment(Request $request)
    {
        $user = '4';
        $amount = $request->input('amount');
        $transactionId = uniqid('trans_');

        // Configuration de PayDunya
        Setup::setMasterKey(env('PAYDUNYA_MASTER_KEY'));
        Setup::setPrivateKey(env('PAYDUNYA_PRIVATE_KEY'));
        Setup::setToken(env('PAYDUNYA_TOKEN'));
        Setup::setMode(env('PAYDUNYA_MODE'));

        Setup::setName("BolidesDealsCI");

        // Création de la facture
        // Initialisation de la facture
        $invoice = new CheckoutInvoice();

        // Ajoutez les autres informations nécessaires à la facture
        $invoice->addItem("Nom de l'article", 1, $amount, $amount);
        $invoice->setTotalAmount($amount);

        // Autres configurations comme la description, le logo, etc.
        $invoice->setDescription("Transaction pour l'utilisateur ID: ".$user);

        if ($invoice->create()) {
            // Enregistrer la transaction dans la base de données
            // Transaction::create([
            //     'user_id' => $user->id,
            //     'payment_id' => $transactionId,
            //     'amount' => $amount,
            //     'status' => 'pending',
            // ]);

            return back()->with('success', 'paiement éffectuée');
        } else {
            return back()->with('error', $invoice->response_text);
        }
    }

}
