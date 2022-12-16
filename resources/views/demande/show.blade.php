@extends('navbarbase')
@section('entete','Demandes | Details')
@section('contenu_affiche')
<section style="background-color: #eee;">
    <div class="container my-5 py-5">
      <div class="row d-flex justify-content-center">
        <div class="col-md-12 col-lg-10 col-xl-8">
          <div class="card">
            <div class="card-body">
              <div class="d-flex flex-start align-items-center">
                @if ($demande->user->photo_identite!=null)
                    <img class="rounded-circle shadow-1-strong me-3"
                    src="/photos/{{$demande->user->photo_identite}}" alt="avatar" width="60"
                    height="60" />
                @else
                    <img class="rounded-circle shadow-1-strong me-3"
                    src="/photos/photo_identites/noprofile.png" alt="avatar" width="60"
                    height="60" />
                @endif
                <div>
                  <h6 class="fw-bold text-primary mb-1">
                  {{$demande->user->prenom.' '.$demande->user->nom}}
                  </h6>
                  <p class="text-muted small mb-0">
                    {{'@'.$demande->user->nom_utilisateur}}
                  </p>
                </div>
              </div>

              <p class="mt-3 mb-4 pb-2">

              </p>
            <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                {{$demande->objet_demande}}
              @if (Auth::user()->role==1)
                <div class=" mt-2 d-flex pt-1">
                    <div class="">
                        <form action="{{route('demande.finaliser',compact('demande'))}}" method="post">
                        @csrf
                        @method('PUT')
                        <button class="btn btn-success btn-sm">Finaliser</button>
                        </form>
                    </div>
                    <div class="">
                      <a href="{{route('motif_rejet',compact('demande'))}}" class="btn btn-danger btn-sm mx-4">Rejeter</a>
                    </div>
                </div>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class=" mt-5 fixed-bottom">
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
@stop
