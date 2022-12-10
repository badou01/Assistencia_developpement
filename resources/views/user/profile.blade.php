@extends('navbarbase')
@section('entete','PAGE | Profil')
@section('contenu_affiche')
<section class="vh-100" style="background-color: #eee;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-75">
        <div class="col-md-12 col-xl-4">

          <div class="card" style="border-radius: 15px;">
            <div class="card-body text-center">
              <div class="mt-3 mb-4">
                @if (Auth::user()->photo_identite)
                    <img src="/photos/{{Auth::user()->photo_identite}}"
                    class="rounded-circle img-fluid" style="width: 100px;" />
                @else
                <img src="/photos/photo_identites/noprofile.png"
                class="rounded-circle img-fluid" style="width: 100px;" />
                @endif
              </div>
              <h4 class="mb-2">{{ Auth::user()->prenom.' '.Auth::user()->nom}}</h4>
              <p class="text-muted mb-4">{{'@'.Auth::user()->nom_utilisateur}} <span class="mx-2">|</span> ASSISTANCIA</p>
              <p><span class="badge rounded-pill text-light bg-secondary">{{ Auth::user()->email }}</span></p>
              <div class="d-flex justify-content-center text-center mt-5 mb-2">
                <div>
                  <a class="btn btn-dark border-primary disabled" href="#" style="background-color: black !important;" role="button">{{'inscrit le '.date('d/m/Y',strtotime(Auth::user()->created_at))}}</a>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
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
@stop
