<?php

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Models\EmailTemplate;

if (!function_exists('sendForgotPasswordEmail')) {
    function sendForgotPasswordEmail($to_user, $variables)
    {
        try {
            $emailTemplate = EmailTemplate::where('event_name', 'Forget Password')->first();
            // dd($emailTemplate);
            if (!$emailTemplate) {
                Log::error("sendForgotPasswordEmail error: Email template for 'Forget Password' not found.");
                return;
            }

            // Replace variables in subject/body
            $subject = $emailTemplate?->subject;
            $body = $emailTemplate?->body;

            foreach ($variables as $key => $value) {
                $subject = str_replace("[$key]", $value, $subject);
                $body = str_replace("[$key]", $value, $body);
            }

            // Send email
            Mail::to($to_user)->send(
                new \App\Mail\AllMail(
                    $subject,
                    // $user,
                    $body
                )
            );
            Log::info("sendForgotPasswordEmail success", [
                'to' => $to_user,
                'subject' => $subject,
            ]);

        } catch (\Exception $e) {
            Log::error("sendForgotPasswordEmail error: " . $e->getMessage(), [
                'to' => $to_user
            ]);
        }
    }
}
if (!function_exists('sendSuccessfullyPasswordChangedEmail')) {
    function sendSuccessfullyPasswordChangedEmail($to_user, $variables)
    {
        try {
            $emailTemplate = EmailTemplate::where('event_name', 'Password Changed')->first();
            // dd($emailTemplate);
            if (!$emailTemplate) {
                Log::error("sendSuccessfullyPasswordChangedEmail error: Email template for 'Password Changed' not found.");
                return;
            }

            // Replace variables in subject/body
            $subject = $emailTemplate?->subject;
            $body = $emailTemplate?->body;

            foreach ($variables as $key => $value) {
                $subject = str_replace("[$key]", $value, $subject);
                $body = str_replace("[$key]", $value, $body);
            }

            // Send email
            Mail::to($to_user)->send(
                new \App\Mail\AllMail(
                    $subject,
                    // $user,
                    $body
                )
            );
            Log::info("sendSuccessfullyPasswordChangedEmail success", [
                'to' => $to_user,
                'subject' => $subject,
            ]);

        } catch (\Exception $e) {
            Log::error("sendSuccessfullyPasswordChangedEmail error: " . $e->getMessage(), [
                'to' => $to_user
            ]);
        }
    }
}
