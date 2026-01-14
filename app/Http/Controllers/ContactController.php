<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\ContactFormMail;

class ContactController extends Controller
{
    /**
     * Traiter le formulaire de contact
     */
    public function submit(Request $request)
    {
        try {
            // Validation
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'nullable|string|max:20',
                'address' => 'required|string|max:255',
                'city' => 'required|string|max:100',
                'country' => 'required|string|max:100',
                'model' => 'nullable|string',
                'user_type' => 'nullable|string',
                'tractor_brand' => 'nullable|string',
                'message' => 'nullable|string|max:2000',
            ]);

            // Envoyer l'email
            Mail::to('contact@tractorrbumper.com')->send(new ContactFormMail($validated));

            return response()->json([
                'success' => true,
                'message' => 'Your message has been sent successfully! We will contact you soon.'
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Please fill in all required fields correctly.',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Erreur formulaire contact: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'An error occurred. Please try again or contact us directly.'
            ], 500);
        }
    }
}
