<x-layout>

    <x-collectionHeading title="Tutte le storie del tag #{{$tag->name}}"/>

    <x-cardsCollection :stories="$stories"/>

</x-layout>