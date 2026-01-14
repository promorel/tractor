@extends('emails.layout')

@section('title', 'Nouvelle Commande')

@section('content')
    <div class="alert alert-info">
        <h2 style="margin-top: 0;">🛒 Nouvelle Commande</h2>
        <p><strong>Une nouvelle commande nécessite votre validation !</strong></p>
    </div>

    <div class="info-box">
        <h3>📋 Informations de la commande</h3>
        <p><strong>Référence :</strong> {{ $order->reference }}</p>
        <p><strong>Date :</strong> {{ $order->created_at->format('d/m/Y à H:i') }}</p>
        <p><strong>Statut :</strong> <span style="color: #FFC107;">⏳ En attente de validation</span></p>
    </div>

    <div class="info-box">
        <h3>👤 Informations client</h3>
        <p><strong>Nom :</strong> {{ $order->customer_name }}</p>
        <p><strong>Email :</strong> {{ $order->customer_email }}</p>
        <p><strong>Téléphone :</strong> {{ $order->customer_phone ?? 'Non fourni' }}</p>
        <p><strong>Adresse :</strong> {{ $order->customer_address }}</p>
    </div>

    <h3>🛍️ Détails de la commande</h3>
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
                <td><strong style="font-size: 18px; color: #FFC107;">{{ number_format($order->total_amount, 0, ',', ' ') }} Ar</strong></td>
            </tr>
        </tfoot>
    </table>

    @if($order->payment_proof)
    <div class="info-box">
        <h3>📎 Preuve de paiement</h3>
        <p>Le client a soumis une preuve de paiement.</p>
        <p><a href="{{ route('admin.commandes.downloadProof', encrypt($order->id)) }}" class="button">📥 Télécharger la preuve</a></p>
    </div>
    @endif

    <div style="text-align: center; margin-top: 30px;">
        <a href="{{ route('admin.commandes.show', encrypt($order->id)) }}" class="button">
            👁️ Voir et valider la commande
        </a>
    </div>

    <div class="info-box" style="margin-top: 30px; background-color: #fff3cd;">
        <p style="margin: 0;"><strong>⚠️ Action requise :</strong> Veuillez vérifier la preuve de paiement et valider ou rejeter la commande.</p>
    </div>
@endsection
