@extends('errors::btf')

@section('title', __('Forbidden'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Forbidden Error!'))
@section('submessage', __('It seems that you do not have the necessary permissions to access this page. If you believe this is an error, please contact our support team for assistance.'))
