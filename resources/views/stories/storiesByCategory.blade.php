<x-layout>

    <x-collectionHeading title="Tutte le storie della categoria {{$category->name}}"/>
    <x-cardsCollection :stories="$stories"/>

</x-layout>