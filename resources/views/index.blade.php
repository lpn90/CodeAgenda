<?php
/**
 * User: Leonardo
 * Date: 07/11/2016
 * Time: 15:49
 */
?>
@extends('layout')

@section('butons')
    @include('persons.botoes')
@endsection

@section('content')
    @foreach($pessoas as $pessoa)
        <div class="col-md-6">
            @include('persons.contato')
        </div>
    @endforeach
@endsection