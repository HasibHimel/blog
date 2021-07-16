@extends('layouts.arsha')

<?php
$data_why_us = array(
    array( "title"=> "Euro 2020", "content" => "Italy has managed to achieve the Euro 2020 title"),
    array( "title"=> "Euro 2016", "content" => "Portugal managed to achieve the Euro 2016 title"),
    array( "title" => "Euro 2012", "content" => "Spain managed to achieve the Euro 2012 title"),

);

$data_skills = array(
    array( "skill"=> "HTML", "percent" => 100),
    array( "skill"=> "CSS", "percent" => 100),
    array( "skill" => "JAVASCRIPT", "percent" => 90),
    array( "skill" => "PHOTOSHOP", "percent" => 85),

);

$data_services = array(
    array( "name"=> "Coaching", "details" => "We won Euro", "icon" => "bx bxl-dribbble" ),
    array( "name"=> "Physiotheraping", "details" => "We treated Neymar", "icon" => "bx bx-file" ),
    array( "name" => "Counselling", "details" => "We treated Suarez", "icon" => "bx bx-tachometer" ),
    array( "name" => "Cleaning", "details" => "We cleaned Wembly", "icon" => "bx bx-layer" ),

);
?>

@section('content')

<main id="main">

    @include('arsha.common.header')

    @include('arsha.clients')

    @include('arsha.about-us')

    @include('arsha.why-us', ['data_why_us' => $data_why_us])

    @include('arsha.skills', ['data_skills' => $data_skills])

    @include('arsha.services', ['data_services' => $data_services])

    @include('arsha.call-to-action')

    @include('arsha.portfolio')

    @include('arsha.team')

    @include('arsha.pricing')

    @include('arsha.faq')

    @include('arsha.contact')

</main><!-- End #main -->

@include('arsha.common.footer')

@endsection