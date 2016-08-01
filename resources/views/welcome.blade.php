@extends('layouts.app')

@section('content')

<section class="container">
    <div class="jumbotron" id="section2">
        <div class="center-block">
            <blockquote id="quote">
                <p >"He who would learn to fly one day must learn to stand and walk and run and climb and dance, one cannot fly into flying"</p>
                <footer><cite >Friedrich Nietzsche</cite></footer>
            </blockquote>
        </div>
    </div>
</section>

<section class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 text-center">
            <a href="" class="btn btn-lg btn-black"><i class="fa fa-github"></i> Login with Github</a>
        </div>
    </div>
</section>

<section class="container">
    <h1 class="text-center">Check out our projects</h1>
    @include('includes.project-listing')
</section>

<div class="container">
    <div class="row">
        <div class="col-md-8">

        </div>

        <div class="col-md-4">
            @include('includes.profile-sidebar')
        </div>
    </div>
</div>
@endsection