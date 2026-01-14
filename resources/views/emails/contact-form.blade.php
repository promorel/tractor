@extends('emails.layout')

@section('title', 'New Contact Form')

@section('content')
    <div class="alert alert-info">
        <h2 style="margin-top: 0;">📨 New Contact Message</h2>
        <p><strong>A visitor contacted you via the form.</strong></p>
    </div>

    <div class="info-box">
        <h3>👤 Contact Information</h3>
        <p><strong>Name:</strong> {{ $data['name'] }}</p>
        <p><strong>Email:</strong> <a href="mailto:{{ $data['email'] }}">{{ $data['email'] }}</a></p>
        @if(!empty($data['phone']))
        <p><strong>Phone:</strong> {{ $data['phone'] }}</p>
        @endif
        <p><strong>Address:</strong> {{ $data['address'] }}</p>
        <p><strong>City:</strong> {{ $data['city'] }}</p>
        <p><strong>Country:</strong> {{ $data['country'] }}</p>
    </div>

    @if(!empty($data['model']) || !empty($data['user_type']) || !empty($data['tractor_brand']))
    <div class="info-box">
        <h3>🚜 Interest Details</h3>
        @if(!empty($data['model']))
        <p><strong>Interested Model:</strong> {{ $data['model'] }}</p>
        @endif
        @if(!empty($data['user_type']))
        <p><strong>User Type:</strong> {{ $data['user_type'] }}</p>
        @endif
        @if(!empty($data['tractor_brand']))
        <p><strong>Tractor Brand:</strong> {{ $data['tractor_brand'] }}</p>
        @endif
    </div>
    @endif

    @if(!empty($data['message']))
    <div class="info-box">
        <h3>💬 Message</h3>
        <p style="white-space: pre-wrap;">{{ $data['message'] }}</p>
    </div>
    @endif

    <div class="info-box" style="background-color: #d1ecf1;">
        <p style="margin: 0;"><strong>💡 Action required:</strong> Reply to this message using the contact's email address: <a href="mailto:{{ $data['email'] }}">{{ $data['email'] }}</a></p>
    </div>
@endsection
