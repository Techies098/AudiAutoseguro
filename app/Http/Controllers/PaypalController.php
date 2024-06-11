<?php

namespace App\Http\Controllers;

use App\Mail\ComprobantePagoContrato;
use App\Models\Contrato;
use App\Models\Cuota;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Models\Payment;
use App\Models\Vehiculo;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;

class PaypalController extends Controller
{
    public function paypal(Request $request)
    {
        $contrato = Contrato::find($request->contrato_id);
        $cuota = Cuota::find($request->cuota_id);

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('success'),
                "cancel_url" => route('cancel')
            ],
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $cuota->monto
                    ]
                ]
            ]
        ]);
        //dd($response);
        if (isset($response['id']) && $response['id'] != null) {
            foreach ($response['links'] as $link) {
                if ($link['rel'] == 'approve') {
                    session()->put('product_name', $contrato->seguro->nombre);
                    session()->put('quantity', 1);
                    session()->put('contrato_id', $contrato->id);
                    session()->put('cuota_id', $cuota->id);
                    session()->put('numero_cuota', $cuota->numero);
                    return redirect()->away($link['href']);
                }
            }
        } else {
            return redirect()->route('cancel');
        }
    }

    public function success(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request->token);
        // dd($response);
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {

            // Insert data into database
            $payment = new Payment;
            $payment->payment_id = $response['id'];
            $payment->cuota_id = session()->get('cuota_id');
            $payment->tipo = "Prima";
            $payment->product_name = session()->get('product_name');
            $payment->quantity = session()->get('quantity');
            $payment->amount = $response['purchase_units'][0]['payments']['captures'][0]['amount']['value'];
            $payment->currency = $response['purchase_units'][0]['payments']['captures'][0]['amount']['currency_code'];
            $payment->payer_name = $response['payer']['name']['given_name'];
            $payment->payer_email = $response['payer']['email_address'];
            $payment->payment_status = $response['status'];
            $payment->payment_method = "PayPal";
            $payment->save();

            // Update cuota
            $cuota = Cuota::find(session()->get('cuota_id'));
            $cuota->fecha_pagada = now();
            $cuota->estado = "Pagada";
            $cuota->save();

            // Prepare data for the PDF
            $data = [
                'payment' => $payment,
                'contrato' => Contrato::find(session()->get('contrato_id')),
                'cuota' => Cuota::find(session()->get('cuota_id'))
            ];

            // Generate the PDF
            $pdf = PDF::loadView('cliente.contratos.comprobante', compact('data'));
            $pdfOutput = $pdf->output();

             //Send email with the PDF attached:
             Mail::to(auth()->user()->email)->send(new ComprobantePagoContrato($pdfOutput, $data));

            // Store the PDF in a temporary file
            $pdfFilePath = storage_path('app/public/comprobante.pdf');
            file_put_contents($pdfFilePath, $pdfOutput);

            // Redirect to contratos.show and include a link to open the PDF in a new tab
            return redirect()->route('cliente.contratos.show', session()->get('contrato_id'))
                ->with('msj_ok', 'Pago realizado con éxito. <a href="' . url('storage/comprobante.pdf') . '" target="_blank" class="btn btn-primary">Ver Comprobante</a>');
            
            // Clear the session data
            session()->forget(['product_name', 'quantity', 'contrato_id', 'cuota_id', 'numero_cuota']);

        } else {
            return redirect()->route('cancel');
        }
    }

    public function cancel()
    {
        return "Payment is cancelled.";
    }

}
