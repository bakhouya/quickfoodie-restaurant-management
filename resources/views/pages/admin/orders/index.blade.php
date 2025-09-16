@extends('master.layouts.panel.layout')

@section('container')

    <main class="main_page">
        
        @livewire('admin.header.header' , ["title"=> __("app.orders"), "subTitle"=> __("app.welcome")])   

        @livewire('admin.orders.index') 

    </main>

@endsection