@component('mail::message')
# Nouvelle demande -

Bonjour admin,
l'utilisateur du nom de {{$demande->user->prenom.' '.$demande->user->prenom}}
a envoyé la demande ci-dessous:
**objet:** *{{ substr($demande->objet_demande,0,10).'...' }}*


@component('mail::button', ['url' => route('demandes.show',compact('demande'))])
Afficher la demande
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent
