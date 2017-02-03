@extends('jplatformui::layouts.withsidebar')
@section('pageTitle')
    {{isset($pageTitle) ? $pageTitle : "Dashboard de ejemplo"}}
@endsection
@section('styles')

@endsection
@section('content-header')
    <h2><i class="fa fa-users"></i> Dashboard de ejemplo</h2>
    <p>Este es el dashboard demo</p>
@endsection

@section('content')
    <div class="row">

    </div>
@endsection
@section('scripts')

@endsection