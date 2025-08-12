@extends('layouts.app')
@section('title', $title)
@section('subtitle', $subtitle)
@section('content')

    <section class="contact-info">
        <h2>Contact information</h2>
        <p>Email: {{ $email }}</p>
        <p>Address: {{ $address }}</p>
        <p>Telephone: {{ $number }}</p>
    </section>

@endsection
