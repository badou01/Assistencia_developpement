
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Glassmorphism login Form Tutorial in html css</title>


</head>
<body>
<!-- partial:index.partial.html -->
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Design by foolishdeveloper.com -->
    <title>Glassmorphism login Form Tutorial in html css</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    <style media="screen">

      *,
*:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
    background-color: #080710;
}
.background{
    width: 430px;
    height: 520px;
    position: absolute;
    transform: translate(-50%,-50%);
    left: 50%;
    top: 50%;
}
.background .shape{
    height: 200px;
    width: 200px;
    position: absolute;
    border-radius: 50%;
}
.shape:first-child{
    background: linear-gradient(
        #1845ad,
        #23a2f6
    );
    left: -80px;
    top: -70px;
}
.shape:last-child{
    background: linear-gradient(
        to right,
        #ff512f,
        #f09819
    );
    right: -30px;
    bottom: -80px;
}
form{

    height: auto;
    width: 400px;
    background-color: rgba(255,255,255,0.13);
    position: absolute;
    transform: translate(-50%,-50%);
    top: 82%;
    left: 50%;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 60px 35px;
}
form *{
    font-family: 'Poppins',sans-serif;
    color: #ffffff;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
}
form h3{
    font-size: 32px;
    font-weight: 500;
    line-height: 42px;
    text-align: center;
}

label{
    display: block;
    margin-top: 30px;
    font-size: 16px;
    font-weight: 500;
}
input{
    display: block;
    height: 40px;
    width: 100%;
    background-color: rgba(255,255,255,0.07);
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;
}
::placeholder{
    color: #e5e5e5;
}
button{
    margin-top: 50px;
    width: 100%;
    background-color: #ffffff;
    color: #080710;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
}
.social{
  margin-top: 30px;
  display: flex;
}
.social div{
  background: red;
  width: 150px;
  border-radius: 3px;
  padding: 5px 10px 10px 5px;
  background-color: rgba(255,255,255,0.27);
  color: #eaf0fb;
  text-align: center;
}
.social div:hover{
  background-color: rgba(255,255,255,0.47);
}
.social .fb{
  margin-left: 25px;
}
.social i{
  margin-right: 4px;
}

    </style>
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    {{-- <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <div class="row mb-3">
            <label for="nom" class="col-md-4 col-form-label text-md-end">{{ __('Nom') }}</label>

            <div class="col-md-6">
                <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}" required autocomplete="name" autofocus>

                @error('nom')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="prenom" class="col-md-4 col-form-label text-md-end">{{ __('Prenom') }}</label>

            <div class="col-md-6">
                <input id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}" required autocomplete="given-name" autofocus>

                @error('prenom')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="nom_utilisateur" class="col-md-4 col-form-label text-md-end">{{ __('Nom d\'utilisateur') }}</label>

            <div class="col-md-6">
                <input id="nom_utilisateur" type="text" class="form-control @error('nom_utilisateur') is-invalid @enderror" name="nom_utilisateur" value="{{ old('nom_utilisateur') }}" required autocomplete="username" autofocus>

                @error('nom_utilisateur')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Addresse email') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="photo_identite" class="col-md-4 col-form-label text-md-end">{{ __('Photo d\'identité') }}</label>

            <div class="col-md-6">
                <input id="photo_identite" type="file" class="form-control @error('photo_identite') is-invalid @enderror" name="photo_identite"  autocomplete="photo">

                @error('photo_identite')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>


        <div class="row mb-3">
            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Mot de passe') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="password_confirmation" class="col-md-4 col-form-label text-md-end">{{ __('Confirmer mot de passe') }}</label>

            <div class="col-md-6">
                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>

        <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('S\'inscrire') }}
                </button>
            </div>
        </div>
    </form> --}}

    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf
        <h3>Inscrivez-vous ici</h3>

                <label for="nom" class="col-md-4 col-form-label text-md-end">{{ __('Nom') }}</label>


                    <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}" required autocomplete="name" autofocus>

                    @error('nom')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>

            <label for="prenom" class="col-md-4 col-form-label text-md-end">{{ __('Prenom') }}</label>

            <div class="">
                <input id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}" required autocomplete="given-name" autofocus>

                @error('prenom')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <label for="nom_utilisateur" class="col-md-4 col-form-label text-md-end">{{ __('Nom d\'utilisateur') }}</label>

            <div class="">
                <input id="nom_utilisateur" type="text" class="form-control @error('nom_utilisateur') is-invalid @enderror" name="nom_utilisateur" value="{{ old('nom_utilisateur') }}" required autocomplete="username" autofocus>

                @error('nom_utilisateur')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Addresse email') }}</label>

            <div class="">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <label for="photo_identite" class="col-md-4 col-form-label text-md-end">{{ __('Photo d\'identité') }}</label>

            <div class="">
                <input id="photo_identite" type="file" class="form-control @error('photo_identite') is-invalid @enderror" name="photo_identite"  autocomplete="photo">

                @error('photo_identite')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Mot de passe') }}</label>

            <div class="">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="">
                <label for="password_confirmation" class="col-md-4 col-form-label text-md-end">{{ __('Confirmer mot de passe') }}</label>

                <div class="">
                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>

                    <button> {{ __('S\'inscrire ') }} </button>
        <div class="social">
          <a href="{{ route('login') }}"><div class="fb"> Se Connecter </div></a>
        </div>
    </form>
</body>
</html>
<!-- partial -->

</body>
</html>
