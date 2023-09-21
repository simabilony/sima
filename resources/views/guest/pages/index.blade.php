{{-- @extends('layouts.layout')
@section('content')
@section('title')
my categories
@stop --}}
<x-guest-layout >
    <x-slot name='title'>
        Sanad
    </x-slot>
    <x-slot name='masterHeader'>
        <x-master-header header-text="Hello..."/>
    </x-slot>
    <!-- Services-->
    <section class="page-section" id="services">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Categories</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
            <div class="row text-center">
                @foreach ($categories as $category)
                <div class="col-md-4">
                    <img class="img-fluid" src="{{ $category['image'] }}" alt="..." />
                    <h4 class="my-3">{{$category['id']."-".$category['name']}}</h4>
                    </div>
            @endforeach

        </div>
    </div>
</section>
{{-- @stop --}}
</x-guest-layout>
