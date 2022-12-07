@component('mail::message')
# Succès demande

Bonjour,
votre demande a été traitée avec succès

@component('mail::button', ['url' => route('demandes.show',compact('demande'))])
Voir ma demande
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent
