@component('mail::message')
# Echec Demande -

Bonjour,
Votre demande a été malheureusement rejetée pour
le motif suivant:


@component('mail::button', ['url' => route('demandes.show',compact('demande'))])
Voir ma demande
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent
