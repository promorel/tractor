@extends('emails.layout')

@section('title', 'Payment Confirmed')

@section('content')
    <div class="alert alert-success">
        <h2 style="margin-top: 0;">✅ Payment Confirmed!</h2>
        <p><strong>Your order has been successfully validated.</strong></p>
    </div>

    <div class="info-box">
        <h3>📋 Order Information</h3>
        <p><strong>Reference:</strong> {{ $order->reference }}</p>
        <p><strong>Date:</strong> {{ $order->created_at->format('d/m/Y at H:i') }}</p>
        <p><strong>Status:</strong> <span style="color: #28a745;">✓ Paid</span></p>
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
                <td><strong style="font-size: 18px; color: #28a745;">{{ number_format($order->total_amount, 0, ',', ' ') }} Ar</strong></td>
            </tr>
        </tfoot>
    </table>

    <div class="info-box">
        <h3>🏦 Bank Details for Your Future Orders</h3>
        <p><strong>Bank:</strong> {{ config('payment.bank_name') }}</p>
        <p><strong>Account Holder:</strong> {{ config('payment.account_holder') }}</p>
        <p><strong>Account Number:</strong> {{ config('payment.account_number') }}</p>
        <p><strong>RIB:</strong> {{ config('payment.rib') }}</p>
        <p><strong>SWIFT Code:</strong> {{ config('payment.swift') }}</p>
    </div>

    <div class="info-box">
        <h3>📦 Next Steps</h3>
        <p>1. We are preparing your order</p>
        <p>2. You will receive a shipping confirmation email</p>
        <p>3. Your order will be delivered to the specified address</p>
    </div>

    <div style="text-align: center; margin-top: 30px;">
        <a href="{{ route('orders.show', encrypt($order->id)) }}" class="button">
            👁️ Track my order
        </a>
    </div>

    <div class="info-box" style="margin-top: 30px; background-color: #d1ecf1;">
        <p style="margin: 0;"><strong>💡 Need help?</strong> Contact us at <a href="mailto:{{ config('payment.support_email') }}">{{ config('payment.support_email') }}</a></p>
    </div>
@endsection
