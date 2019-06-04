{{--
  Template Name: Landing Page Template
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')
    @include('partials.content-textblock')
    @include('partials.content-slideshowblock')
    @include('partials.content-ctablocks')
    @include('partials.content-mapblock')
    @include('partials.content-productsblock')
    @include('partials.content-subscribeblock')
  @endwhile
@endsection
