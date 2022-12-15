<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - Reclamations Admin</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="dist/css/adminlte.min.css">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="{{asset('assets/dash_assets/css/styles.css')}}" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed ">
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
                                demandes du mois
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
                        <h1 class="mt-4">Dashboard Admin</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row ">
                            <div class="col-xl-3 col-md-6">
                                <div class="info-box mb-3 dark-mode">
                                    <span class="info-box-icon bg-warning elevation-1"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-hourglass-split" viewBox="0 0 16 16">
                                      <path d="M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1h-11zm2-13v1c0 .537.12 1.045.337 1.5h6.326c.216-.455.337-.963.337-1.5V2h-7zm3 6.35c0 .701-.478 1.236-1.011 1.492A3.5 3.5 0 0 0 4.5 13s.866-1.299 3-1.48V8.35zm1 0v3.17c2.134.181 3 1.48 3 1.48a3.5 3.5 0 0 0-1.989-3.158C8.978 9.586 8.5 9.052 8.5 8.351z"/>
                                    </svg></span>

                                    <div class="info-box-content">
                                      <span class="info-box-text">En cours</span>
                                      <span class="info-box-number">{{$taille_encours}}</span>
                                    </div>
                                    <!-- /.info-box-content -->
                                  </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="info-box mb-3 dark-mode">
                                    <span class="info-box-icon bg-success elevation-1"> <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="bi bi-envelope-check-fill" viewBox="0 0 16 16">
                                      <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.026A2 2 0 0 0 2 14h6.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586l-1.239-.757ZM16 4.697v4.974A4.491 4.491 0 0 0 12.5 8a4.49 4.49 0 0 0-1.965.45l-.338-.207L16 4.697Z"/>
                                      <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-1.993-1.679a.5.5 0 0 0-.686.172l-1.17 1.95-.547-.547a.5.5 0 0 0-.708.708l.774.773a.75.75 0 0 0 1.174-.144l1.335-2.226a.5.5 0 0 0-.172-.686Z"/>
                                    </svg></span>

                                    <div class="info-box-content">
                                      <span class="info-box-text">Traiter</span>
                                      <span class="info-box-number">{{$taille_traité}}</span>
                                    </div>
                                    <!-- /.info-box-content -->
                                  </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="info-box mb-3 dark-mode">
                                    <span class="info-box-icon bg-danger elevation-1"> <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="bi bi-envelope-x" viewBox="0 0 16 16">
                                      <path d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825ZM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2-7-4.2Z"/>
                                      <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-4.854-1.354a.5.5 0 0 0 0 .708l.647.646-.647.646a.5.5 0 0 0 .708.708l.646-.647.646.647a.5.5 0 0 0 .708-.708l-.647-.646.647-.646a.5.5 0 0 0-.708-.708l-.646.647-.646-.647a.5.5 0 0 0-.708 0Z"/>
                                    </svg></i></span>

                                    <div class="info-box-content">
                                      <span class="info-box-text">Rejeter</span>
                                      <span class="info-box-number">{{$taille_rejeté}}</span>
                                    </div>
                                    <!-- /.info-box-content -->
                                  </div>
                            </div>
                            {{-- <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Demandes rejetées</div>
                                    <h5 class="text-center">{{$taille_rejeté}}</h5>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{route('rejetees')}}">Voir Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>




                        {{-- //ADMIN --}}


                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Toutes les demandes
                            </div>
                            <div class="card-body">
                                <div class="table-responsive  h-75">
                                <table class="table  table-striped">
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
                                                            <td><span class="badge bg-info ">{{$demande->statut}}</span></td>
                                                @elseif ($demande->statut=='en cours de traitement')
                                                            <td><span class="badge bg-warning ">{{$demande->statut}}</span></td>
                                                @elseif ($demande->statut=='rejetée')
                                                            <td><span class="badge bg-danger ">{{$demande->statut}}</span></td>
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
                                                                <td><span class="badge bg-info ">{{$demande->statut}}</span></td>
                                                    @elseif ($demande->statut=='en cours de traitement')
                                                                <td><span class="badge bg-warning ">{{$demande->statut}}</span></td>
                                                    @elseif ($demande->statut=='rejetée')
                                                                <td><span class="badge bg-danger ">{{$demande->statut}}</span></td>
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
                                                        <td><span class="badge bg-info ">{{$demande->statut}}</span></td>
                                            @elseif ($demande->statut=='en cours de traitement')
                                                        <td><span class="badge bg-warning ">{{$demande->statut}}</span></td>
                                            @elseif ($demande->statut=='rejetée')
                                                        <td><span class="badge bg-danger ">{{$demande->statut}}</span></td>
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
                                </div>
                            </div>
                        </div>
                    </div>

                </main>
                <footer class="py-4 bg-light mt-auto h-50 " style="background-color: #212529 !important;color:white;">
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
