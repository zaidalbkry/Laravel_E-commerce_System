@extends('frontend.layout')

@section('css-custom-files')
@endsection

@section('js-custom-files')
@endsection

@section('content')
<div class="mx-auto max-w-3xl rounded-3xl bg-white p-8 shadow-soft">
    <h1 class="text-2xl font-bold text-mint-900">Contact</h1>
    <p class="mt-2 text-slate-600">Send your message and our team will respond as soon as possible.</p>

    <form id="contactFogfdrm" action="{{route('new-msg.store')}}" method="POST" class="mt-6 space-y-4">
        @csrf
        <div>
            <input type="text" id="name" name="name" placeholder="Your Name" required class="w-full rounded-xl border-mint-200">
        </div>
        <div>
            <input type="text" id="phone" name="phone_number" placeholder="Your phone" required class="w-full rounded-xl border-mint-200">
        </div>
        <div>
            <textarea id="message" name="messages" placeholder="Your Message" rows="4" required class="w-full rounded-xl border-mint-200"></textarea>
        </div>
        <button class="fb-btn w-full" id="submit" type="submit">Send Message</button>
    </form>
</div>
@endsection