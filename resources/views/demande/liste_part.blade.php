@extends('navbarbase')
@section('entete','demandes')
@section('contenu_affiche')

<div class="container-fluid px-4 mt-5  ">
  @if(Auth::user()->role==0)
  <div class="card mb-4 ">
    <div class="card-header d-inline-flex ">
        <div>
            <i class="fas fa-table me-1"></i>
        Toutes mes demandes
        </div>
        <div class="mx-auto"></div>
        <div class="mx-auto"></div>
        <div class="mx-auto"></div>
        <div class="mx-auto"></div>
        <div class="mx-auto"></div>
        <div class="mx-auto">
                <a href="{{route('demandes.create')}}" class="btn btn-primary"> Nouvelle demande</a>
        </div>

    </div>

    <div class="card-body">
        <div class="table-responsive  h-75">
            <table class="table table-striped
            table-hover
            table-borderless
            table-primary
            align-middle">
                <thead class="table-light">

                    <tr>
                        <th>Utilisateur</th>
                        <th>Demande</th>
                        <th>Details</th>
                        <th>Statut</th>
                        <th>Créée depuis</th>
                    </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @forelse ($demandes as $demande)
                        <tr class="table-primary" >
                            <td scope="row">{{$demande->user->prenom.' '.$demande->user->nom}}</td>
                            <td>{{substr($demande->objet_demande,0,10).'...' }}</td>
                            <td><a href="{{route('demandes.show',compact('demande'))}}" class="btn btn-primary">Details</a></td>
                            @if ($demande->statut=='en attente')
                                 <td><span class="badge bg-warning text-dark">{{$demande->statut}}</span></td>
                            @elseif ($demande->statut=='en cours de traitement')
                                <td><span class="badge bg-secondary text-dark">{{$demande->statut}}</span></td>
                            @elseif ($demande->statut=='rejetée')
                                <td><span class="badge bg-danger text-dark">{{$demande->statut}}</span></td>
                            @else
                                <td><span class="badge bg-success">{{$demande->statut}}</span></td>
                            @endif
                            <td>{{date('d/m/Y',strtotime($demande->created_at))}}</td>
                        </tr>
                        @empty
                        <div class="alert alert-secondary" style="height: 50px">Aucune demande a afficher</div>
                        @endforelse
                    </tbody>
                    <tfoot>

                    </tfoot>

            </table>
            {!! $demandes->links('pagination::bootstrap-5') !!}

        </div>
    </div>
</div>
  @else
  <div class="card mb-4 ">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        {{$title}}
    </div>
    <div class="card-body ">
        <table class="table table-dark table-striped">
            <thead>
                <th>Utilisateur</th>
                <th>Demande</th>
                <th>Details</th>
                <th>statut</th>
                <th>Action 1</th>
                <th>Action 2</th>
                <th>Crée depuis</th>
            </thead>
            <tbody>
                @forelse ($demandes as $demande )
                <tr>
                    @if ($demande->statut=='en attente')
                        <td>{{$demande->user->prenom.' '.$demande->user->nom }}</td>
                        <td>{{substr($demande->objet_demande,0,10).'...' }}</td>
                        <td><a href="{{route('demandes.show',compact('demande'))}}" class="btn btn-primary">Details</a></td>
                        @if ($demande->statut=='en attente')
                                    <td><span class="badge bg-warning text-dark">{{$demande->statut}}</span></td>
                        @elseif ($demande->statut=='en cours de traitement')
                                    <td><span class="badge bg-secondary text-dark">{{$demande->statut}}</span></td>
                        @elseif ($demande->statut=='rejetée')
                                    <td><span class="badge bg-danger text-dark">{{$demande->statut}}</span></td>
                        @else
                                    <td><span class="badge bg-success">{{$demande->statut}}</span></td>
                        @endif
                        <td>
                            <form action="{{route('demande.traiter',compact('demande'))}}" method="post">
                                @csrf
                                @method('PUT')
                                <button class="btn btn-primary">Traiter</button>
                            </form>
                        </td>
                        <td>Rien a faire</td>
                        <td>{{date('d/m/Y',strtotime($demande->created_at))}}</td>
                    @elseif ($demande->statut=='en cours de traitement')
                            <td>{{$demande->user->prenom.' '.$demande->user->nom }}</td>
                            <td>{{substr($demande->objet_demande,0,10).'...' }}</td>
                            <td><a href="{{route('demandes.show',compact('demande'))}}" class="btn btn-primary">Details</a></td>
                            @if ($demande->statut=='en attente')
                                        <td><span class="badge bg-warning text-dark">{{$demande->statut}}</span></td>
                            @elseif ($demande->statut=='en cours de traitement')
                                        <td><span class="badge bg-secondary text-dark">{{$demande->statut}}</span></td>
                            @elseif ($demande->statut=='rejetée')
                                        <td><span class="badge bg-danger text-dark">{{$demande->statut}}</span></td>
                            @else
                                        <td><span class="badge bg-success">{{$demande->statut}}</span></td>
                            @endif
                            <td>
                                <form action="{{route('demande.finaliser',compact('demande'))}}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-success">Finaliser</button>
                                </form>
                            </td>
                            <td>
                               <a href="{{route('motif_rejet',compact('demande'))}}" class="btn btn-danger"> Rejeter</a>
                                </form>
                            </td>
                            <td>{{date('d/m/Y',strtotime($demande->created_at))}}</td>

                    @else
                    <td>{{$demande->user->prenom.' '.$demande->user->nom }}</td>
                    <td>{{substr($demande->objet_demande,0,10).'...' }}</td>
                    <td><a href="{{route('demandes.show',compact('demande'))}}" class="btn btn-primary">Details</a></td>
                    @if ($demande->statut=='en attente')
                                <td><span class="badge bg-warning text-dark">{{$demande->statut}}</span></td>
                    @elseif ($demande->statut=='en cours de traitement')
                                <td><span class="badge bg-secondary text-dark">{{$demande->statut}}</span></td>
                    @elseif ($demande->statut=='rejetée')
                                <td><span class="badge bg-danger text-dark">{{$demande->statut}}</span></td>
                    @else
                                <td><span class="badge bg-success">{{$demande->statut}}</span></td>
                    @endif
                    <td><span class="badge bg-dark">Terminée</span></td>
                    <td><span class="badge bg-dark">Terminée</span></td>
                    <td>{{date('d/m/Y',strtotime($demande->created_at))}}</td>
                    @endif
                </tr>
                @empty
                    <div class="alert alert-secondary" style="height: 50px">Aucune demande a afficher</div>
                @endforelse
            </tbody>
          </table>
          {!! $demandes->links('pagination::bootstrap-5') !!}
    </div>

</div>
  @endif

    <div class="mt-5 fixed-bottom">
        <footer class="py-4 bg-light  " style="background-color: #212529 !important;color:white;">
            <div class="container-fluid px-4 ">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; LGI PROMO 19-20</div>
                    <div>
                        <p>Produit en 2022</p>

                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
@stop

