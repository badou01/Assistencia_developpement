@component('mail::message')
# Nouvelle demande -

Bonjour admin,
la demande de {{$demande->user->prenom.' '.$demande->user->prenom}}
est toujours en cours de traitement. Veuillez finaliser la demande.
**objet:** *{{ substr($demande->objet_demande,0,10).'...' }}*


@component('mail::button', ['url' => route('demandes.show',compact('demande'))])
Afficher la demande
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent
