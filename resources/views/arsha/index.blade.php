@extends('layouts.arsha')

@section('content')

<main id="main">

    @include('arsha.common.header')

    @include('arsha.clients')

    @include('arsha.about-us')

    @include('arsha.why-us')

    @include('arsha.skills')

    @include('arsha.services')

    @include('arsha.call-to-action')

    @include('arsha.portfolio')

    @include('arsha.team')

    @include('arsha.pricing')

    @include('arsha.faq')

    @include('arsha.contact')

</main><!-- End #main -->

@include('arsha.common.footer')

@endsection