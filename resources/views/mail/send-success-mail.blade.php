<x-mail::message>
# Succès demande

Bonjour,
votre demande a été traitée avec succès

<x-mail::button :url="{{route('demandes.show',compact('demande'))}}">
Voir ma demande
</x-mail::button>

Merci,<br>
{{ config('app.name') }}
</x-mail::message>
