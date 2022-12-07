<x-mail::message>
# Echec Demande -

Bonjour,
Votre demande a été malheureusement rejetée pour
le motif suivant:


<x-mail::button :url="{{route('demandes.show',compact('demande'))}}">
Voir ma demande
</x-mail::button>

Merci,<br>
{{ config('app.name') }}
</x-mail::message>
