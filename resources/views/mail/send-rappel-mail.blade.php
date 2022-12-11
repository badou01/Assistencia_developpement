@component('mail::message')
# Nouvelle demande -

Bonjour admin,
la demande de {{$demande->user->prenom.' '.$demande->user->prenom}}
est toujours en attente. Veuillez la prendre en compte
**objet:** *{{ substr($demande->objet_demande,0,10).'...' }}*


@component('mail::button', ['url' => route('demandes.show',compact('demande'))])
Afficher la demande
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent
