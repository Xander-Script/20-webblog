@extends('errors.illustrated-layout')

@section('title', __($exception->getMessage()))
@section('code', 'Premium membership required')
@section('message', __($exception->getMessage()))
