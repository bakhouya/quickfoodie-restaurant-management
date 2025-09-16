@extends('master.layouts.panel.layout')

@section('container')

    <main class="main_page">   
        @livewire('admin.header.header', ["title"=> __("app.menu_categories"), "subTitle"=> __("app.welcome")]) 
        @livewire('admin.categories.index')
    </main>

@endsection
