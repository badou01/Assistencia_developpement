@extends('navbarbase')
@section('entete','Motif du rejet')
@section('contenu_affiche')
<section  class="container col-lg-8" style="">
    <div class="container my-5 py-5">

      <div class="row d-flex justify-content-center">
        <div class="col-md-12 col-lg-10 col-xl-8">
          <div class="card">
            <h4 class="text-center text-dark bg-light fw-bold">Motif du rejet</h4>
            <div class="card-body">
              <div class="d-flex flex-start align-items-center">
                <div>
                  <h6 class="fw-bold text-dark mb-1">
                    {{'Demande de '.$demande->user->prenom.' '.$demande->user->nom}}
                  </h6>

                </div>
              </div>


            </div>
            <form action="{{route('demande.rejeter',compact('demande'))}}" method="post">
                @csrf
                @method('PUT')
                <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                    <div class="d-flex flex-start w-100">
                      <div class="form-outline w-100">
                        <label class="form-label" for="motif_rejet">Justificatif</label>
                        <textarea class="form-control" name="motif_rejet" rows="3"
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
@stop
