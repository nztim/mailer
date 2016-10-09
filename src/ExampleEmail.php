<?php namespace NZTim\Mailer;

class ExampleEmail extends Message
{
    public function handle()
    {
        $this->view('emails.example')
            ->subject('Example transactional email')
            ->send();
    }
}
