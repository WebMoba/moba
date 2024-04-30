@extends('layouts.app')

@section('template_title')
    {{ __('Crear') }} Persona
@endsection

@section('content')
@include('person.form')

@endsection
