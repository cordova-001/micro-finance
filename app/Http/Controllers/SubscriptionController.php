<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscription;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function initiateSubscription(Request $request)
    {
        $planCode = 'PLN_h75qcvijxsd1n48';
        $email = Auth::user()->email;
        $callback_url = route('paystack.subscription.callback');

        $response = Http::withToken(env('PAYSTACK_TEST_SECRET_KEY'))
            ->post(env('PAYSTACK_PAYMENT_URL') . '/transaction/initialize', [
                'email' => $email,
                'plan' => $planCode,
                'callback_url' => $callback_url,
            ]);

        $resData = $response->json();

        if ($resData['status']) {
            return redirect()->away($resData['data']['authorization_url']);
        }

        return back()->withErrors('Subscription initialization failed.');
    }

    public function handleSubscriptionCallback(Request $request)
    {
        $reference = $request->query('reference');

        $response = Http::withToken(env('PAYSTACK_TEST_SECRET_KEY'))
            ->get(env('PAYSTACK_PAYMENT_URL') . "/transaction/verify/{$reference}");

        $resData = $response->json();

        if ($resData['status'] && $resData['data']['status'] === 'success') {
            Subscription::updateOrCreate(
                ['user_id' => Auth::id()],
                [
                    // 'reference' => $reference,
                    'status' => 'active',
                    'plan_code' => $resData['data']['plan'],
                    'paystack_subscription_code' => $resData['data']['subscription_code'],
                    'paystack_email_token' => $resData['data']['email_token'],
                ]
            );

            return redirect()->route('dashboard')->with('success', 'Subscription activated successfully!');
        }

        return redirect()->route('dashboard')->withErrors('Payment verification failed.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
