@extends('web.layouts.market')

@section('market')
    @livewire('sections.authorized.market.company', ['company' => $company])
@endsection