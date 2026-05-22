@extends('layouts.admin')
@section('title', 'Contact Message')
@section('content')
<article class="content">
    <p class="eyebrow">{{ $message->created_at->format('Y-m-d H:i') }}</p>
    <h2>{{ $message->subject }}</h2>
    <p><strong>{{ $message->name }}</strong> &lt;{{ $message->email }}&gt;</p>
    @if($message->company)<p>Company: {{ $message->company }}</p>@endif
    @if($message->phone)<p>Phone: {{ $message->phone }}</p>@endif
    <hr>
    <p>{!! nl2br(e($message->message)) !!}</p>
    <div class="actions"><a class="button ghost" href="{{ route('admin.contact-messages.index') }}">Back</a></div>
</article>
@endsection
