@extends('form.formlogin')

@section('content')
<br><br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifier votre adresse Email.') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Avant de continuer, veuillez vérifier votre e-mail pour un lien de vérification. ') }}
                    {{ __('Si vous n’avez pas reçu l’e-mail,') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('cliquer-ici pour en demander un autre') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
