<?php

namespace App\Http\Controllers;

use App\Mail\EnquiryMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    public function show()
    {
        return view('pages.contact', ['active' => 'contact']);
    }

    public function store(Request $request)
    {
        /* "website" is the honeypot field: humans never see it, bots fill it. */
        if (filled($request->input('website'))) {
            return back()->with('contact_success', config('site.contact_success'));
        }

        $data = $request->validate([
            'name'    => ['required', 'string', 'max:100'],
            'mobile'  => ['required', 'regex:/^[0-9+\-\s()]{7,20}$/'],
            'email'   => ['required', 'email:rfc', 'max:150'],
            'address' => ['required', 'string', 'max:255'],
            'service' => ['required', 'in:De-Addiction,Rehabilitation,Individual Counselling'],
        ], [
            'mobile.regex'  => 'Please enter a valid mobile number.',
            'service.in'    => 'Please choose one of the listed services.',
        ]);

        $data['ip'] = $request->ip();
        $data['submitted_at'] = now()->toDateTimeString();

        $this->archive($data);

        try {
            Mail::to(config('site.enquiry_email'))->send(new EnquiryMail($data));
        } catch (\Throwable $e) {
            Log::error('Enquiry mail failed: '.$e->getMessage());
        }

        return redirect()
            ->route('contact')
            ->with('contact_success', config('site.contact_success'));
    }

    /** Keep a local CSV copy so no enquiry is ever lost to a mail outage. */
    protected function archive(array $data): void
    {
        $file = 'enquiries.csv';
        if (! Storage::exists($file)) {
            Storage::put($file, "submitted_at,name,mobile,email,address,service,ip\n");
        }

        $row = array_map(
            fn ($v) => '"'.str_replace('"', '""', (string) $v).'"',
            [$data['submitted_at'], $data['name'], $data['mobile'], $data['email'], $data['address'], $data['service'], $data['ip']]
        );

        Storage::append($file, implode(',', $row));
    }
}
