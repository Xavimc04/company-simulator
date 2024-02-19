@extends('web.layouts.market')

@section('market')
    <div class="flex-1 border-t flex flex-col overflow-y-scroll">
        @livewire('sections.authorized.market')
    </div>
@endsection