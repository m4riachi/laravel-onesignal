<?php

namespace App\Jobs;

use App\Models\Application;
use App\Models\Notification;
use App\Models\OneSignalAccount;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;

class SendNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(public Notification $notification)
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        OneSignalAccount::where('enabled', 1)->get()->each(function(OneSignalAccount $account) {
            $account->applications()->where('enabled', 1)->get()->each(function(Application $application) {
                $fields = [
                    'app_id' => $application->onesignal_app,
                    'included_segments' => config('onesignal.included_segments'),
                    'contents' => [
                        "en" => $this->notification->sub_title,
                    ],
                    'headings' => [
                        "en" => $this->notification->title,
                    ],
                    'url' => $this->notification->link,
                    'big_picture' => $this->notification->image?->url,
                    'large_icon' => $this->notification->icon->url,
                    'priority' => config('onesignal.priority'),
                    'delayed_option' => config('onesignal.delayed_option'),
                ];


                $response = Http::withHeaders([
                    'Content-Type' => 'application/json; charset=utf-8',
                    'Authorization' => 'Basic ' . $application->rest_api_key,
                ])->post(config('onesignal.api_url') . 'notifications', $fields);
            });
        });
    }
}
