<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<body style="background-image: url('{{asset('assets/reclam/cover form.jpg')}}'); background-repeat:no-repeat;background-size: cover;">

   <a class="btn btn-dark btn-sm mt-4 " href="{{route('demandes.index')}}">&lt;-RETOUR</a>

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
                      src="/public/photos/photo_identites/{{$photo_profil}}" alt="" width="60"
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
                        @@ {{$nom_utilisateur}}
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
                              src="/public/photos/photo_identites/{{$photo_profil}}" alt="" width="60"
                              height="60" />
                            @else
                            <img class="rounded-circle shadow-1-strong me-3"
                            src="/photos/photo_identites/noprofile.png" alt="avatar" width="60"
                            height="60" />
                            @endif
                          <div class="form-outline w-100">
                            <textarea class="form-control" name="objet_demande" rows="4"
                              style="background: #fff;"></textarea>
                            <label class="form-label" for="objet_demande">Objet de la demande</label>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
