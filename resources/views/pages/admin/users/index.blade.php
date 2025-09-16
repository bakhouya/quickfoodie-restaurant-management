@extends('master.layouts.panel.layout')

@section('container')

    <main class="main_page">
        
        @livewire('admin.header.header' , ["title"=> __("app.staff"), "subTitle"=> __("app.welcome")])        
        @livewire('admin.users.index')

    </main>

@endsection
