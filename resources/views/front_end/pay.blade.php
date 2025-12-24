@extends('front_end.layout.app')
@section('content')
    <div class="body-content">
 <div class="col-8">
    {{-- {{ dd($offer) }} --}}
                <h2 class="mb-4 text-center">You will pay <span class="text-danger">$
                        {{ number_format($offer->price * (1 - $offer->discount_value / 100), 2) }}</span> for <span
                        class="text-success">{{ $offer->name }}</span></h2>
                <script src="https://eu-test.oppwa.com/v1/paymentWidgets.js?checkoutId={{ $id }}"></script>
                <form action="{{ route('offers.status', $offer) }}" class="paymentWidgets" data-brands="VISA MASTER AMEX">
                </form>
            </div>
    </div>
@endsection
