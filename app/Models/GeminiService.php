<?php

namespace App\Models;

use Illuminate\Support\Facades\Http;

class GeminiService
{
    private static string $baseUrl = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent";

    public static function analyzeReview(string $review)
    {
        $payload = [
            "contents" => [
                [
                    "parts" => [
                        [
                            "text" => "You are a book review analyzer. Analyze the given comment and return only one label:Rules:- 'Appropriate' → if the comment is positive or gives constructive criticism.  - 'Not Appropriate' → if the comment contains curse words, hate speech, personal attacks, or bashing the book/platform.  Output must be only: 'Appropriate' or 'Not Appropriate'."
                        ],
                        [
                            "text" => $review
                        ]
                    ]
                ]
            ]
        ];

        $response = Http::withHeaders([
            "Content-Type" => "application/json",
            "X-goog-api-key" => "AIzaSyCrRbzMIgVilC1UyuN2snirEebEiQzXb8U",
        ])->post("https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent", $payload);

        $response =  $response->json();
        $status = $response['candidates'][0]['content']['parts'][0]['text'] ?? 'Unknown';
        // $data = json_decode($response);
        // dd($response, $status);
        return $status;
    }
}
