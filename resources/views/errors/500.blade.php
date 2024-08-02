@extends('errors::btf')

@section('title', __('Server Error'))
@section('code', '500')
@section('message', __('Internal Server Error'))
@section('submessage', __('You do not have permission to view this resource'))
