@extends('base')
@section('headtitle','accueil')

@section('content')
<header id="header" class="header">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="text-container">
                    <h1 class="h1-large">Faites vos reclamations sans vous deplacer!</h1>
                    <a class="btn-solid-lg page-scroll" href="{{route('demandes.index')}}">Démarrer</a>
                    <a class="btn-outline-lg page-scroll" href="#contact"><i class="fas fa-user"></i>Contactez-nous</a>
                </div> <!-- end of text-container -->
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</header> <!-- end of header -->
<!-- end of header -->


<!-- About-->
<div id="about" class="basic-1 bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-10">
                <div class="text-container first">
                    <h2>A propos</h2>
                    <p>Cette plateforme permettra une meilleure gestion des réclamations avec un gain de
                        de temps considérable.Elle a été developpée en Novembre 2022 par un  groupe de jeunes etudiant Sénégalais de l'université Iba Der Thiam
                        de Thies.
                    </p>
                </div> <!-- end of text-container -->
            </div> <!-- end of col -->

        </div> <!-- end of row -->
    </div> <!-- fin du container -->
</div> <!-- end of basic-1 -->
<!-- end of about -->













<!-- Testimonials -->
<div class="cards-1" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="h2-heading">CONTACTS</h2>
            </div> <!-- end of col -->
        </div> <!-- end of row -->
        <div class="row">
            <div class="col-lg-12">

                <!-- Card -->
                <div class="card">
                    <div class="card-body">
                        <div class="details">
                            <img src="{{asset('assets/home_assets/images/Alioune.jpg')}}" alt="alternative">
                            <div class="text">
                                <div class="testimonial-author">Alioune Badara Ndao</div>
                                <div class="occupation">Etudiant en Genie Logciel</div>
                            </div> <!-- end of text -->
                        </div> <!-- end of testimonial-details -->
                        <p class="testimonial-text">“email: zepekzach@gmail.com” <br>Telephone : +221 76 330 13 18</p>

                    </div>
                </div>
                <!-- end of card -->

                <!-- Card -->
                <div class="card">
                    <div class="card-body">
                        <div class="details">
                            <img src="{{asset('assets/home_assets/images/Ousmane.jpg')}}" alt="alternative">
                            <div class="text">
                                <div class="testimonial-author">Ousmane Alexander Gueye</div>
                                <div class="occupation">Etudiant en genie Logiciel</div>
                            </div> <!-- end of text -->
                        </div> <!-- end of testimonial-details -->
                        <p class="testimonial-text">“email: ousmanea.gueye@gmail.com” <br>Telephone : +221 78 011 12 45</p>
                    </div>
                </div>
                <!-- end of card -->

                <!-- Card -->
                <div class="card">
                    <div class="card-body">
                        <div class="details">
                            <img src="{{asset('assets/home_assets/images/Thiate.jpg')}}" alt="alternative">
                            <div class="text">
                                <div class="testimonial-author">Serigne Thiate Thioune</div>
                                <div class="occupation">Etudiant en genie Logiciel</div>
                            </div> <!-- end of text -->
                        </div> <!-- end of testimonial-details -->
                        <p class="testimonial-text">“email: thiouneserignethiate@gmail.com” <br>Telephone : +221 77 329 37 49</p>

                    </div>
                </div>
                <!-- end of card -->

            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div> <!-- end of cards-1 -->
<!-- end of testimonials -->


<!-- Section Divider -->
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <hr class="section-divider">
        </div> <!-- end of col -->
    </div> <!-- end of row -->
</div> <!-- end of container -->
<!-- end of section divider -->






<!-- Footer -->
<div class="footer bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="social-container">
                    <span class="fa-stack">
                        <a href="#your-link">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fab fa-facebook-f fa-stack-1x"></i>
                        </a>
                    </span>
                    <span class="fa-stack">
                        <a href="#your-link">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fab fa-twitter fa-stack-1x"></i>
                        </a>
                    </span>
                    <span class="fa-stack">
                        <a href="#your-link">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fab fa-pinterest-p fa-stack-1x"></i>
                        </a>
                    </span>
                    <span class="fa-stack">
                        <a href="#your-link">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fab fa-instagram fa-stack-1x"></i>
                        </a>
                    </span>
                    <span class="fa-stack">
                        <a href="#your-link">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fab fa-youtube fa-stack-1x"></i>
                        </a>
                    </span>
                </div> <!-- end of social-container -->
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div> <!-- end of footer -->
<!-- end of footer -->



<!-- end of copyright -->
@endsection





























{{-- @extends('base')
@section('headtitle',' Accueil')

@section('content')
<header class="masthead">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-12 text-center">
          <h1 class="fw-bold text-white">Effectuez toutes vos Reclamations sans vous déplacer</h1>
          <p class="lead text-white fw-normal">Faites <a class="btn btn-secondary" href="{{url('/dashboardadmin')}}">votre reclamation ici</a></p>
        </div>
      </div>
    </div>
  </header>

  <!-- Page Content -->
  <section class="py-5">
    <div class="container">
      <h2 class="fw-light" >A propos</h2>
      <p id="tkt">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus ab nulla dolorum autem nisi officiis
        blanditiis voluptatem hic, assumenda aspernatur facere ipsam nemo ratione cumque magnam enim fugiat
        reprehenderit expedita.</p>
    </div>
  </section> --}}
{{-- @stop --}}
