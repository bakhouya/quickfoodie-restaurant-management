@extends('master.layouts.panel.layout')

@section('container')

    <main class="main_page">
        @livewire('admin.header.header')
        <section class="main_container">

            <article class="container_primary">
                @livewire('admin.articles.create')
            </article>

            <article class="container_secoundary">
                <div class="item"><img src="{{asset("assets/media/posts/e-2.jpg")}}" alt=""></div>
                <div class="item"></div>
            </article>
            
        </section>

        

    </main>

@endsection
