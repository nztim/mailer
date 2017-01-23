<?php namespace NZTim\Mailer;

use Illuminate\Contracts\Mail\Mailer;
use NZTim\Queue\Job;

abstract class Message implements Job
{
    protected $sender;
    protected $senderName;
    protected $replyTo;
    protected $recipient;
    protected $recipientOverride;
    protected $cc;
    protected $bcc;
    protected $subject;
    protected $view;
    protected $data = [];

    public function sender(string $sender, string $senderName = '') : Message
    {
        $this->validateEmail($sender);
        $this->sender = $sender;
        $this->senderName = $senderName ?: null;
        return $this;
    }

    public function replyTo(string $replyTo) : Message
    {
        $this->validateEmail($replyTo);
        $this->replyTo = $replyTo;
        return $this;
    }

    public function recipient(string $recipient) : Message
    {
        $this->validateEmail($recipient);
        $this->recipient = $recipient;
        return $this;
    }

    public function overrideRecipient(string $recipientOverride) : Message
    {
        $this->validateEmail($recipientOverride);
        $this->recipientOverride = $recipientOverride;
        return $this;
    }

    public function cc(string $cc) : Message
    {
        $this->validateEmail($cc);
        $this->cc = $cc;
        return $this;
    }

    public function bcc(string $bcc) : Message
    {
        $this->validateEmail($bcc);
        $this->bcc = $bcc;
        return $this;
    }

    public function subject(string $subject) : Message
    {
        $this->subject = $subject;
        return $this;
    }

    public function view(string $view) : Message
    {
        $this->view = $view;
        return $this;
    }

    public function data(array $data) : Message
    {
        $this->data = array_merge($this->data, $data);
        return $this;
    }

    protected function validateEmail(string $email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            throw new \InvalidArgumentException('Invalid email address');
        }
    }

    // Build and send() it
    abstract public function handle();

    protected function send()
    {
        $this->data['nztmailerSubject'] = $this->subject;
        $html = view($this->view)->with($this->data)->render();
        $inlined = CssInliner::process($html);
        $mail = app(Mailer::class);
        $mail->send([], [], function(Message $message) use ($inlined) {
            $message->subject($this->subject)
                ->to($this->recipientOverride ?: $this->recipient)
                ->setBody($inlined, 'text/html');
            if ($this->sender) {
                $message->sender($this->sender, $this->senderName);
            }
            if ($this->replyTo) {
                $message->replyTo($this->replyTo);
            }
            if ($this->cc && !$this->recipientOverride) {
                $message->cc($this->cc);
            }
            if ($this->bcc && !$this->recipientOverride) {
                $message->bcc($this->bcc);
            }
        });
    }
}
