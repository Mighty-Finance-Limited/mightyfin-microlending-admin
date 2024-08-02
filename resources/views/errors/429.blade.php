@extends('errors::btf')

@section('title', __('Too Many Requests'))
@section('code', '429')
@section('message', __('Too Many Requests'))
@section('submessage', __('Server Error'))
