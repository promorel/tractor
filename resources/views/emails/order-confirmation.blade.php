@extends('emails.layout')

@section('title', 'Confirmation de commande')

@section('content')
    <div class="alert alert-success">
        <h2 style="margin-top: 0;">✅ Commande créée avec succès !</h2>
        <p><strong>Merci pour votre commande.</strong></p>
    </div>

    <div class="info-box">
        <h3>📋 Informations de la commande</h3>
        <p><strong>Référence :</strong> {{ $order->reference }}</p>
        <p><strong>Date :</strong> {{ $order->created_at->format('d/m/Y à H:i') }}</p>
        <p><strong>Statut :</strong> <span style="color: #FFC107;">⏳ En attente de paiement</span></p>
    </div>

    <div class="info-box">
        <h3>👤 Vos informations</h3>
        <p><strong>Nom :</strong> {{ $order->customer_name }}</p>
        <p><strong>Email :</strong> {{ $order->customer_email }}</p>
        @if($order->customer_phone)
        <p><strong>Téléphone :</strong> {{ $order->customer_phone }}</p>
        @endif
    </div>

    <h3>🛍️ Récapitulatif de votre commande</h3>
    <table>
        <thead>
            <tr>
                <th>Produit</th>
                <th>Marque</th>
                <th>Qté</th>
                <th>Prix unitaire</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->items as $item)
            <tr>
                @if($item->sparepart_id)
                    @php
                        $sparepartData = \App\Http\Controllers\SparepartsController::getSparepartById($item->sparepart_id);
                    @endphp
                    <td>{{ $sparepartData['name'] ?? 'Unknown Product' }}</td>
                    <td><span class="badge bg-info">{{ ucfirst($sparepartData['category'] ?? 'sparepart') }}</span></td>
                @else
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->brand ? $item->brand->brand_name : 'N/A' }}</td>
                @endif
                <td>{{ $item->quantity }}</td>
                <td>{{ number_format($item->price, 0, ',', ' ') }} Ar</td>
                <td><strong>{{ number_format($item->price * $item->quantity, 0, ',', ' ') }} Ar</strong></td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr style="background-color: #f8f9fa;">
                <td colspan="4" style="text-align: right;"><strong>TOTAL</strong></td>
                <td><strong style="font-size: 18px; color: #FFC107;">{{ number_format($order->total_amount, 0, ',', ' ') }} Ar</strong></td>
            </tr>
        </tfoot>
    </table>

    <div class="info-box" style="background-color: #fff3cd;">
        <h3 style="color: #856404;">💳 Prochaines étapes</h3>
        <p>1. Effectuez le virement bancaire du montant total</p>
        <p>2. Soumettez votre preuve de paiement</p>
        <p>3. Attendez la validation de votre paiement</p>
        <p>4. Nous préparons et expédions votre commande</p>
    </div>

    <div style="text-align: center; margin-top: 30px;">
        <a href="{{ route('checkout.payment', encrypt($order->id)) }}" class="button">
            💳 Soumettre ma preuve de paiement
        </a>
    </div>

    <div class="info-box" style="margin-top: 30px; background-color: #d1ecf1;">
        <p style="margin: 0;"><strong>💡 Besoin d'aide ?</strong> Contactez-nous à <a href="mailto:contact@tractorrbumper.com">contact@tractorrbumper.com</a> ou par WhatsApp au <a href="https://wa.me/33602926393"> 06 02 92 63 93</a></p>
    </div>
@endsection
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #2c3e50;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 5px 5px 0 0;
        }
        .content {
            background-color: #f9f9f9;
            padding: 30px;
            border: 1px solid #ddd;
        }
        .order-info {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            margin: 20px 0;
        }
        .order-info h3 {
            color: #2c3e50;
            border-bottom: 2px solid #3498db;
            padding-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
        }
        table th, table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        table th {
            background-color: #f5f5f5;
            font-weight: bold;
        }
        .total {
            font-size: 1.3em;
            font-weight: bold;
            color: #27ae60;
            text-align: right;
            margin-top: 15px;
        }
        .payment-info {
            background-color: #fff3cd;
            border-left: 4px solid #ffc107;
            padding: 15px;
            margin: 20px 0;
        }
        .payment-info h4 {
            margin-top: 0;
            color: #856404;
        }
        .bank-details {
            background-color: white;
            padding: 15px;
            border-radius: 5px;
            margin: 10px 0;
        }
        .footer {
            text-align: center;
            padding: 20px;
            color: #666;
            font-size: 0.9em;
        }
        .button {
            display: inline-block;
            padding: 12px 30px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>✅ Commande Confirmée</h1>
    </div>

    <div class="content">
        <p>Bonjour <strong>{{ $order->customer_name }}</strong>,</p>
        
        <p>Nous avons bien reçu votre commande. Voici les détails :</p>

        <div class="order-info">
            <h3>📋 Informations de la commande</h3>
            <p><strong>Référence :</strong> {{ $order->reference }}</p>
            <p><strong>Date :</strong> {{ $order->created_at->format('d/m/Y à H:i') }}</p>
            <p><strong>Email :</strong> {{ $order->customer_email }}</p>
            @if($order->customer_phone)
                <p><strong>Téléphone :</strong> {{ $order->customer_phone }}</p>
            @endif
        </div>

        <div class="order-info">
            <h3>🛒 Articles commandés</h3>
            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th style="text-align: center;">Qty</th>
                        <th style="text-align: right;">Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->items as $item)
                        <tr>
                            <td>
                                @if($item->sparepart_id)
                                    @php
                                        $sparepartData = \App\Http\Controllers\SparepartsController::getSparepartById($item->sparepart_id);
                                    @endphp
                                    <strong>{{ $sparepartData['name'] ?? 'Unknown Product' }}</strong><br>
                                    <small style="color: #666;"><span class="badge bg-info">{{ ucfirst($sparepartData['category'] ?? 'sparepart') }}</span></small>
                                @else
                                    <strong>{{ $item->product->name }}</strong><br>
                                    <small style="color: #666;">{{ $item->brand->name ?? 'N/A' }}</small>
                                @endif
                            </td>
                            <td style="text-align: center;">× {{ $item->quantity }}</td>
                            <td style="text-align: right;">€ {{ number_format($item->getSubtotal(), 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="total">
                Total : € {{ number_format($order->total_amount, 2) }}
            </div>
        </div>

        <div class="payment-info">
            <h4>💳 Payment Information</h4>
            <p><strong>⚠️ IMPORTANT:</strong> Use reference <strong>{{ $order->reference }}</strong> as your payment description</p>
            
            <div class="bank-details">
                <p><strong>Bank:</strong> {{ config('payment.bank_name') }}</p>
                <p><strong>Account Holder:</strong> {{ config('payment.account_holder') }}</p>
                <p><strong>IBAN:</strong> {{ config('payment.iban') }}</p>
                <p><strong>BIC:</strong> {{ config('payment.bic') }}</p>
                <p><strong>Amount:</strong> <span style="color: #e74c3c; font-weight: bold;">€ {{ number_format($order->total_amount, 2) }}</span></p>
            </div>

            <p><strong>Steps to follow:</strong></p>
            <ol>
                @foreach(config('payment.instructions') as $instruction)
                    <li>{{ $instruction }}</li>
                @endforeach
            </ol>
        </div>

        @if($order->notes)
            <div class="order-info">
                <h3>📝 Your Notes</h3>
                <p>{{ $order->notes }}</p>
            </div>
        @endif

        <div style="text-align: center;">
            <p>You can track your order by clicking the button below:</p>
            <a href="{{ route('checkout.payment', encrypt($order->id)) }}" class="button">View My Order</a>
        </div>

        <p style="margin-top: 30px;">If you have any questions, please don't hesitate to contact us:</p>
        <p>
            📧 Email: {{ config('payment.support_email') }}<br>
            📞 Phone: {{ config('payment.support_phone') }}
        </p>
    </div>

    <div class="footer">
        <p>Thank you for your trust!</p>
        <p>&copy; {{ date('Y') }} Tractor Bumper - All rights reserved</p>
    </div>
</body>
</html>
