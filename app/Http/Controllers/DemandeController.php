<?php

namespace App\Http\Controllers;

use App\Mail\SendFailureMail;
use App\Mail\SendFailureProofMail;
use App\Mail\SendNotifToAdmins;
use App\Mail\SendSuccessMail;
use App\Models\Demande;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Stmt\Return_;

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
            $demandes=Demande::where('statut','en attente')->orWhere('traiteur',$alp)->get();
            $taille_en_attente=Demande::where('statut','en attente')->get()->count();
            $taille_encours=Demande::where('statut','en cours de traitement')->where('traiteur',$alp)->get()->count();
            $taille_traité=Demande::where('statut','traitée')->where('traiteur',$alp)->get()->count();
            $taille_rejeté=Demande::where('statut','rejetée')->where('traiteur',$alp)->get()->count();
            return view('admin_demandes.admin_home',compact('demandes','taille_en_attente','taille_encours','taille_traité','taille_rejeté'));
        }
        else if(Auth::user()->role==0 ){
            $alp=Auth::id();
            $demandes=Demande::where('user_id',$alp)->get();
            $nom=Auth::user()->nom;
            $prenom=Auth::user()->prenom;
            $nom_utilisateur=Auth::user()->nom_utilisateur;
            $photo_profil=Auth::user()->photo_identite;
            $taille_en_attente=Demande::where('user_id',$alp)->where('statut','en attente')->get()->count();
            $taille_encours=Demande::where('user_id',$alp)->where('statut','en cours de traitement')->get()->count();
            $taille_traité=Demande::where('user_id',$alp)->where('statut','traitée')->get()->count();
            $taille_rejeté= Demande::where('user_id',$alp)->where('statut','rejetée')->get()->count();


            return view('demande.list',compact('demandes','taille_en_attente','taille_encours','taille_traité','taille_rejeté','nom','prenom','nom_utilisateur','photo_profil'));
        }
        else
        {
            $taille_en_attente=Demande::where('statut','en attente')->get()->count();
            $taille_encours=Demande::where('statut','en cours de traitement')->get()->count();
            $taille_traité=Demande::where('statut','traitée')->get()->count();
            $taille_rejeté= Demande::where('statut','rejetée')->get()->count();

            return view('assistancia_user.assistance',compact('taille_en_attente','taille_encours','taille_traité','taille_rejeté'));

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


        return redirect()->route('demandes.index')->with('status_message','Traitement en cours... ');
    }
    public function finaliser(Demande $demande)
    {
        $demande->statut='traitée';
        $demande->updateOrFail();
        Mail::to($demande->user)->send(new SendSuccessMail($demande));
        return redirect()->route('demandes.index')->with('status_message','Demande traitée... ');
    }
    public function rejeter(Request $request,Demande $demande)
    {
        $request->validate([
            'motif_rejet'=>'required|string',
        ]);
        $motif_rejet=$request->motif_rejet;
        $demande->statut='rejetée';
        $demande->updateOrFail();
        Mail::to($demande->user)->send(new SendFailureMail($demande,$motif_rejet));
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
            return response()->json('ERREUR PAGE NON AUTORISÉE');
        }
    }
    public function form_rejet(Demande $demande){
        if(Auth::user()->role==1)
        {
            return view('demande.motifrejet',compact('demande'));
        }
        else
        {
            return response()->json('ERREUR PAGE NON AUTORISÉE');
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
        $admins=User::where('role',1)->get();
        Mail::to($admins)->send(new SendNotifToAdmins($demandes));
        return redirect()->route('demandes.index')->with('congrats','votre demande a été envoyée');

    }
    //
    public function demande_du_mois(){
        $alp=Auth::id();
        if(Auth::user()->role==1)
        {
            $demandes=Demande::where(function($query){
               $query->where('statut','en attente')->orWhere('traiteur',Auth::id());
            })->whereMonth('created_at',Carbon::today()->month)->get();


        }
        else
        {
            $demandes=Demande::where('user_id',$alp)->whereMonth('created_at',Carbon::today()->month)->get();
        }
        $title='Demande du mois';
        return view('demande.liste_part',compact('demandes','title'));
    }
    //separation de pages
    //
    //
    public function en_attente()
    {
        if(Auth::user()->role==1)
            {
                $alp=$alp=Auth::id();
                $demandes=Demande::where('statut','en attente')->get();

            }
        else
        {
            $alp=Auth::id();
            $demandes=Demande::where('user_id',$alp)->where('statut','en attente')->get();
        }
        $title='Demandes en attente';
        return view('demande.liste_part',compact('demandes','title'));

    }
    //
    //
    public function en_cours()
    {
        if(Auth::user()->role==1)
        {
            $alp=$alp=Auth::id();
            $demandes=Demande::where('statut','en cours de traitement')->where('traiteur',$alp)->get();

        }
        else
        {
            $alp=Auth::id();
            $demandes=Demande::where('user_id',$alp)->where('statut','en cours de traitement')->get();

        }
        $title='Demandes en cours de traitement';
        return view('demande.liste_part',compact('demandes','title'));
    }
    //
    //

    public function traitees()
    {
        if(Auth::user()->role==1)
        {
            $alp=$alp=Auth::id();
            $demandes=Demande::where('statut','traitée')->where('traiteur',$alp)->get();
        }
    else
        {
            $alp=Auth::id();
            $demandes=Demande::where('user_id',$alp)->where('statut','traitée')->get();
        }
        $title='Demandes traitées';
        return view('demande.liste_part',compact('demandes','title'));
    }
    //
    public function rejetees()
    {
        if(Auth::user()->role==1)
        {
            $alp=$alp=Auth::id();
            $demandes=Demande::where('statut','rejetée')->where('traiteur',$alp)->get();
        }
        else
        {
            $alp=Auth::id();
            $demandes=Demande::where('user_id',$alp)->where('statut','rejetée')->get();

        }

        $title='Demandes rejetées';
        return view('demande.liste_part',compact('demandes','title'));
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
