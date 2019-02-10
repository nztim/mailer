<?php namespace NZTim\Mailer;

use NZTim\Queue\Job;

class MessageSent implements Job
{
    protected $sender;
    protected $senderName;
    protected $replyTo;
    protected $recipient;
    protected $cc;
    protected $bcc;
    protected $subject;
    protected $html;
    protected $text;

    public function __construct(array $data)
    {
        $fields = [
            'sender',
            'senderName',
            'replyTo',
            'recipient',
            'cc',
            'bcc',
            'subject',
            'html',
            'text',
        ];
        foreach ($fields as $field) {
            $this->$field = $data[$field] ?? '';
        }
    }

    public function handle()
    {
        event($this);
    }

    public function sender(): string
    {
        return $this->sender;
    }

    public function senderName(): string
    {
        return $this->senderName;
    }

    public function replyTo(): string
    {
        return $this->replyTo;
    }

    public function recipient(): string
    {
        return $this->recipient;
    }

    public function cc(): string
    {
        return $this->cc;
    }

    public function bcc(): string
    {
        return $this->bcc;
    }

    public function subject(): string
    {
        return $this->subject;
    }

    public function html(): string
    {
        return $this->html;
    }

    public function text(): string
    {
        return $this->text;
    }
}
