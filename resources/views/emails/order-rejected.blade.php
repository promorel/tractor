@extends('emails.layout')

@section('title', 'Order Rejected')

@section('content')
    <div class="alert alert-danger">
        <h2 style="margin-top: 0;">❌ Payment Not Validated</h2>
        <p><strong>Your payment could not be validated.</strong></p>
    </div>

    <div class="info-box">
        <h3>📋 Order Information</h3>
        <p><strong>Reference:</strong> {{ $order->reference }}</p>
        <p><strong>Date:</strong> {{ $order->created_at->format('d/m/Y at H:i') }}</p>
        <p><strong>Status:</strong> <span style="color: #dc3545;">✗ Rejected</span></p>
    </div>

    <div class="info-box" style="background-color: #f8d7da; border: 1px solid #f5c6cb;">
        <h3 style="color: #721c24;">🚫 Rejection Reason</h3>
        <p style="color: #721c24; font-size: 16px;"><strong>{{ $reason }}</strong></p>
    </div>

    <h3>🛑️ Order Summary</h3>
    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Brand</th>
                <th>Qty</th>
                <th>Unit Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->items as $item)
            <tr>
                <td>{{ $item->product->name }}</td>
                <td>{{ $item->brand ? $item->brand->brand_name : 'N/A' }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ number_format($item->price, 0, ',', ' ') }} Ar</td>
                <td><strong>{{ number_format($item->price * $item->quantity, 0, ',', ' ') }} Ar</strong></td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr style="background-color: #f8f9fa;">
                <td colspan="4" style="text-align: right;"><strong>TOTAL</strong></td>
                <td><strong style="font-size: 18px;">{{ number_format($order->total_amount, 0, ',', ' ') }} Ar</strong></td>
            </tr>
        </tfoot>
    </table>

    <div class="info-box">
        <h3>🏦 Bank Details for New Payment</h3>
        <p><strong>Bank:</strong> {{ config('payment.bank_name') }}</p>
        <p><strong>Account Holder:</strong> {{ config('payment.account_holder') }}</p>
        <p><strong>Account Number:</strong> {{ config('payment.account_number') }}</p>
        <p><strong>RIB:</strong> {{ config('payment.rib') }}</p>
        <p><strong>SWIFT Code:</strong> {{ config('payment.swift') }}</p>
    </div>

    <div class="info-box" style="background-color: #fff3cd;">
        <h3 style="color: #856404;">💡 What to do now?</h3>
        <p>1. Check that the transfer was made to the correct account</p>
        <p>2. Make sure the amount exactly matches the order</p>
        <p>3. Submit a new clear and readable payment proof</p>
        <p>4. Contact us if you have any questions</p>
    </div>

    <div style="text-align: center; margin-top: 30px;">
        <a href="{{ route('checkout.payment', encrypt($order->id)) }}" class="button">
            📤 Submit new proof
        </a>
    </div>

    <div class="info-box" style="margin-top: 30px; background-color: #d1ecf1;">
        <p style="margin: 0;"><strong>💡 Need help?</strong> Contact us at <a href="mailto:{{ config('payment.support_email') }}">{{ config('payment.support_email') }}</a> or by WhatsApp at <a href="https://wa.me/33602926393">06 02 92 63 93</a></p>
    </div>
@endsection
