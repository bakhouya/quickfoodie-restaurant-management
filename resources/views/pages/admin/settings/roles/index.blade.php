@extends('master.layouts.panel.layout')

@section('container')

    <main class="main_page">   
        @livewire('admin.header.header', ["title"=> __("app.dashboard"), "subTitle"=> __("app.welcome")]) 
        @livewire('admin.settings.roles.index') 
    </main>

@endsection