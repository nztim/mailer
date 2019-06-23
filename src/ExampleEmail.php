<?php namespace NZTim\Mailer;

class ExampleEmail extends Message
{
    public function handle()
    {
        $this->view('emails.example')
            ->subject('Example transactional email')
            ->send();
    }

    public function testLabel(): string
    {
        return 'Example transactional email';
    }

    public function test(string $recipient): void
    {
        $this->data(['a' => 'b'])->overrideRecipient($recipient)->send();
    }
}
