<?php namespace NZTim\Mailer;

use Html2Text\Html2Text;
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
    protected $backupFrom;

    public function sender(string $sender, string $senderName = '') : Message
    {
        $this->validateEmail($sender);
        $this->sender = $sender;
        $this->senderName = $senderName;
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
        $mailer = app(Mailer::class);
        $data = ['html' => CssInliner::process($html), 'text' => Html2Text::convert($html)];
        $mailer->send(['nztmailer::echo-html', 'nztmailer::echo-text'], $data, function($message) {
            /** @var \Illuminate\Mail\Message $message */
            $message
                ->subject($this->subject)
                ->to($this->recipientOverride ?: $this->recipient);
            if ($this->sender) {
                $message->from($this->sender, $this->senderName);
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
