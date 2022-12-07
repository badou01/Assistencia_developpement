<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">


    <title>Details | Demande</title>
</head>
<body>
    <section style="background-color: #eee;">
        <div class="container my-5 py-5">
          <div class="row d-flex justify-content-center">
            <div class="col-md-12 col-lg-10 col-xl-8">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-start align-items-center">
                    <img class="rounded-circle shadow-1-strong me-3"
                      src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(19).webp" alt="avatar" width="60"
                      height="60" />
                    <div>
                      <h6 class="fw-bold text-primary mb-1">
                      {{$demande->user->prenom.' '.$demande->user->nom}}
                      </h6>
                      <p class="text-muted small mb-0">
                        @@ {{$demande->user->nom_utilisateur}}
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
                            <form action="{{route('demande.rejeter',compact('demande'))}}" method="post">
                                @csrf
                                @method('PUT')
                                <button class="btn btn-danger btn-sm mx-4">Rejeter</button>
                            </form>
                        </div>
                    </div>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>
