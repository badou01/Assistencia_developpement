<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - Reclamations Employe</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="{{asset('assets/dash_assets/css/styles.css')}}" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="{{url('/')}}">ASSISTANCIA</a>

            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            {{-- <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form> --}}
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{route('user.profile')}}">Mon profil</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="{{route('logout')}}"
                         onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Deconnexion')}}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Corps</div>
                            <a class="nav-link" href="{{url('/dashboardadmin')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>

                            <div class="sb-sidenav-menu-heading">Autres</div>
                            <a class="nav-link" href="{{url('/')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Accueil
                            </a>
                            <a class="nav-link" href="{{route('demande_du_mois')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Demandes du mois
                            </a>

                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Connecté en tant que:</div>
                        {{Auth::user()->nom_utilisateur}}
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard Employé</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        {{-- <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Demandes en attente</div>
                                    <h5 class="text-center">{{$taille_en_attente}}</h5>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{route('en_attente')}}">Voir Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Demandes en cours de...</div>
                                    <h5 class="text-center">{{$taille_encours}}</h5>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{route('en_cours')}}">Voir Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Demandes Traitées</div>
                                    <h5 class="text-center">{{$taille_traité}}</h5>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{route('traitees')}}">Voir Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Demandes rejetées</div>
                                    <h5 class="text-center">{{$taille_rejeté}}</h5>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{route('rejetees')}}">Voir Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="row ">
                            <div class="col-md-5">
                              <div class="card bg-light">
                                <h4 class="text-center text-dark bg-light fw-bold">Formulaire de demande</h4>
                                <div class="card-body bg-light">
                                  <div class="d-flex flex-start  align-items-center">
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
                                        <div class="d-flex flex-start w-100 ">
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
<br>
                        <div class="card mb-4">
                            <div class="card-header d-inline-flex">
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
                                        {{-- <a href="{{route('demandes.create')}}" class="btn btn-primary"> Nouvelle demande</a> --}}
                                </div>

                            </div>

                            <div class="card-body">
                                <div class="table-responsive  h-75">
                                    <table class="table table-striped
                                    table-hover
                                    table-borderless
                                    table
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
                                                <tr  >
                                                    <td scope="row">{{$demande->user->prenom.' '.$demande->user->nom}}</td>
                                                    <td>{{substr($demande->objet_demande,0,10).'...' }}</td>
                                                    <td><a href="{{route('demandes.show',compact('demande'))}}" class="btn btn-primary">Details</a></td>
                                                    @if ($demande->statut=='en attente')
                                                         <td><span class="badge bg-info ">{{$demande->statut}}</span></td>
                                                    @elseif ($demande->statut=='en cours de traitement')
                                                        <td><span class="badge bg-warning ">{{$demande->statut}}</span></td>
                                                    @elseif ($demande->statut=='rejetée')
                                                        <td><span class="badge bg-danger ">{{$demande->statut}}</span></td>
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

                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto h-50" style="background-color: #212529 !important;color:white;">
                    <div class="container-fluid px-4">
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('assets/dash_assets/js/scripts.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('assets/dash_assets/assets/demo/chart-area-demo.js')}}"></script>
        <script src="{{asset('assets/dash_assets/assets/demo/chart-bar-demo.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="{{asset('assets/dash_assets/js/datatables-simple-demo.js')}}"></script>
    </body>
</html>
