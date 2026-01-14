@props(['user'])

@php
    $totalOrders = $user->orders()->count();
    $pendingOrders = $user->orders()->where('payment_status', 'pending')->count();
    $paidOrders = $user->orders()->where('payment_status', 'paid')->count();
    $totalSpent = $user->orders()->where('payment_status', 'paid')->sum('total_amount');
@endphp

<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
    <h3 class="text-lg font-semibold text-gray-900 mb-4">📊 Mes statistiques de commandes</h3>
    
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <!-- Total Orders -->
        <div class="bg-blue-50 rounded-lg p-4 text-center">
            <div class="text-3xl font-bold text-blue-600">{{ $totalOrders }}</div>
            <div class="text-sm text-gray-600 mt-1">Commandes totales</div>
        </div>
        
        <!-- Pending Orders -->
        <div class="bg-yellow-50 rounded-lg p-4 text-center">
            <div class="text-3xl font-bold text-yellow-600">{{ $pendingOrders }}</div>
            <div class="text-sm text-gray-600 mt-1">En attente</div>
        </div>
        
        <!-- Paid Orders -->
        <div class="bg-green-50 rounded-lg p-4 text-center">
            <div class="text-3xl font-bold text-green-600">{{ $paidOrders }}</div>
            <div class="text-sm text-gray-600 mt-1">Payées</div>
        </div>
        
        <!-- Total Spent -->
        <div class="bg-purple-50 rounded-lg p-4 text-center">
            <div class="text-3xl font-bold text-purple-600">€{{ number_format($totalSpent, 2) }}</div>
            <div class="text-sm text-gray-600 mt-1">Total dépensé</div>
        </div>
    </div>

    @if($totalOrders > 0)
        <div class="mt-6 pt-6 border-t border-gray-200">
            <h4 class="text-md font-semibold text-gray-900 mb-3">Dernières commandes</h4>
            <div class="space-y-2">
                @foreach($user->orders()->latest()->take(3)->get() as $order)
                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                        <div class="flex-1">
                            <div class="font-medium text-gray-900">{{ $order->reference }}</div>
                            <div class="text-sm text-gray-500">{{ $order->created_at->format('d/m/Y à H:i') }}</div>
                        </div>
                        <div class="text-right mr-4">
                            <div class="font-semibold text-gray-900">€{{ number_format($order->total_amount, 2) }}</div>
                            <div class="text-xs">{!! $order->getStatusBadge() !!}</div>
                        </div>
                        <a href="{{ route('orders.show', encrypt($order->id)) }}" class="inline-flex items-center px-3 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-md transition">
                            Voir
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="mt-4 text-center">
                <a href="{{ route('orders.index') }}" class="text-blue-600 hover:text-blue-800 font-medium text-sm">
                    Voir toutes mes commandes →
                </a>
            </div>
        </div>
    @else
        <div class="mt-6 pt-6 border-t border-gray-200 text-center">
            <p class="text-gray-500 mb-4">Vous n'avez pas encore passé de commande.</p>
            <a href="{{ route('products') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-md transition">
                Découvrir nos produits
            </a>
        </div>
    @endif
</div>
