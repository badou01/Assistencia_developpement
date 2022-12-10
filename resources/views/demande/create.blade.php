@extends('navbarbase')
@section('entete',' Faites une demande')
@section('contenu_affiche')
<section  class="container col-lg-8" style="">
    <div class="container my-5 py-5">

      <div class="row d-flex justify-content-center">
        <div class="col-md-12 col-lg-10 col-xl-8">
          <div class="card">
            <h4 class="text-center text-dark bg-light fw-bold">Formulaire de demande</h4>
            <div class="card-body">
              <div class="d-flex flex-start align-items-center">
                @if ($photo_profil!=null)
                <img class="rounded-circle shadow-1-strong me-3"
                  src="/photos/{{$photo_profil}}" alt="" width="60"
                  height="60" />
                @else
                <img class="rounded-circle shadow-1-strong me-3"
                src="/photos/photo_identites/noprofile.png" alt="avatar" width="60"
                height="60" />
                @endif
                <div>
                  <h6 class="fw-bold text-dark mb-1">
                    {{$prenom.' '.$nom}}
                  </h6>
                  <p class="text-muted small mb-0">
                    {{'@'.$nom_utilisateur}}
                  </p>
                </div>
              </div>


            </div>
            <form action="{{route('demandes.store')}}" method="post">
                @csrf
                <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                    <div class="d-flex flex-start w-100">
                        @if ($photo_profil!=null)
                        <img class="rounded-circle shadow-1-strong me-3"
                          src="/photos/{{$photo_profil}}" alt="" width="60"
                          height="60" />
                        @else
                        <img class="rounded-circle shadow-1-strong me-3"
                        src="/photos/photo_identites/noprofile.png" alt="avatar" width="60"
                        height="60" />
                        @endif
                      <div class="form-outline w-100">
                        <label class="form-label" for="objet_demande">Objet de la demande</label>
                        <textarea class="form-control" name="objet_demande" rows="4"
                          style="background: #fff;"></textarea>

                      </div>
                    </div>
                    <div class="float-end mt-2 pt-1">
                      <button type="submit" class="btn btn-primary btn-sm">
                        Envoyer
                      </button>
                      <button type="reset" class="btn btn-outline-danger btn-sm">
                        Réinitialiser
                      </button>
                    </div>
                  </div>
            </form>
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
