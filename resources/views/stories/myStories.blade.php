<x-layout>

    <x-collectionHeading title="Tutte le storie di {{$user->name}}"/>

    <x-cardsCollection :stories="$user->stories"/>

</x-layout>