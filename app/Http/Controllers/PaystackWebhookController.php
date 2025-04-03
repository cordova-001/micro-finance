<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscription;
use Illuminate\Support\Facades\Log;

class PaystackWebhookController extends Controller
{
    public function handleWebhook(Request $request)
    {
        $payload = $request->all();
        Log::info('Paystack Webhook', $payload);

        $subscription = Subscription::where('paystack_subscription_code', $payload['data']['subscription_code'])->first();
        
        if ($subscription) {
            $status = match ($payload['event']) {
                'subscription.create' => 'active',
                'invoice.payment_failed' => 'failed',
                'subscription.disable' => 'canceled',
                default => $subscription->status,
            };
            $subscription->update(['status' => $status]);
        }

        return response()->json(['status' => 'success']);
    }
}
