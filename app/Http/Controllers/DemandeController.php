<?php

namespace App\Http\Controllers;

use App\Mail\SendFailureMail;
use App\Mail\SendNotifToAdmins;
use App\Mail\SendSuccessMail;
use App\Models\Demande;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class DemandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (Auth::user()->role==1) {
            $alp=$alp=Auth::id();
            $demandes=Demande::where('statut','en attente')->orWhere('traiteur',$alp)->paginate(2);
            return view('admin_demandes.admin_home',compact('demandes'));
        }
        else{
            $alp=Auth::id();
            $demandes=Demande::where('user_id',$alp)->paginate(2);

            return view('demande.list',compact('demandes'));
        }

    }
    //methodes du traitement de l'administrateur
    //
    //
    //
    public function traitement(Demande $demande)
    {
        $demande->statut='en cours de traitement';
        $demande->traiteur=Auth::id();
        $demande->updateOrFail();
        $admins=User::where('role',1)->get();
        Mail::to($admins)->send(new SendNotifToAdmins($demande));

        return redirect()->route('demandes.index')->with('status_message','Traitement en cours... ');
    }
    public function finaliser(Demande $demande)
    {
        $demande->statut='traitée';
        $demande->updateOrFail();
        Mail::to($demande->user)->send(new SendSuccessMail($demande));
        return redirect()->route('demandes.index')->with('status_message','Demande traitée... ');
    }
    public function rejeter(Demande $demande)
    {
        $demande->statut='rejetée';
        $demande->updateOrFail();
        Mail::to($demande->user)->send(new SendFailureMail($demande));
        return redirect()->route('demandes.index')->with('status_message','demande rejeté...');
    }
    //Fin des methodes du traitement de l'administrateur


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if(Auth::user()->role==0)
        {
            $nom=Auth::user()->nom;
            $prenom=Auth::user()->prenom;
            $nom_utilisateur=Auth::user()->nom_utilisateur;
            $photo_profil=Auth::user()->photo_identite;
            return view('demande.create',compact('nom','prenom','nom_utilisateur','photo_profil'));
        }
        else
        {
            return response()->json('ERREUR PAGE INNACESSIBLE');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'objet_demande'=>'required'
        ]);
        $demandes=new Demande();
        $demandes->objet_demande=$request->objet_demande;
        $demandes->user_id=Auth::id();
        $demandes->saveOrFail();
        return redirect()->route('demandes.index')->with('congrats','votre demande a été envoyée');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Demande $demande)
    {
        //
        return view('demande.show',compact('demande'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
