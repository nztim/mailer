<?php

namespace NZTim\Mailer;

use Illuminate\Console\Command;
use Illuminate\Support\Collection;

abstract class TestEmailsCommand extends Command
{
    protected $signature = 'testemails {recipient?}';
    protected $description = 'Send test emails.';
    protected $recipient = 'test@example.org';
    /** @var Collection|Message[] $ */
    protected $tests;

    public function handle(): int
    {
        $this->setRecipient();
        $this->info("\nSending test emails to: " . $this->recipient . "\n");
        $this->setTests();
        $selection = $this->menu();
        if ($this->tests->has($selection)) {
            $test = $this->tests->get($selection);
            $this->info('Sending: ' . $test->testLabel());
            $test->test($this->recipient);
            $this->info('Done');
            return 0;
        }
        if ($selection === 'all') {
            $this->info('Sending all tests:');
            $this->sendAll();
            return 0;
        }
        $this->warn('Selection not found!');
        return 1;
    }

    protected function setRecipient()
    {
        $recipient = $this->argument('recipient');
        if (filter_var($recipient, FILTER_VALIDATE_EMAIL) !== false) {
            $this->recipient = $recipient;
        }
    }

    // Sorted, 1-indexed list of test classes
    protected function setTests()
    {
        /** @var Collection|Message[] $tests */
        $this->tests = collect($this->tests());
        $this->tests = $this->tests->map(function (string $className) {
            return app($className);
        });
        $this->tests = $this->tests->sortBy(function (Message $test) {
            return $test->testLabel();
        })->values();
        $this->tests = $this->tests->keyBy(function ($test, int $key) {
            return $key + 1;
        });
    }

    abstract protected function tests(): array;

    /**
     * @return mixed
     */
    protected function menu()
    {
        foreach ($this->tests as $key => $test) {
            $this->info($key . ') ' . $test->testLabel());
        }
        return $this->ask("\nSelect message to send (or enter for all):", 'all');
    }

    protected function sendAll()
    {
        foreach ($this->tests as $test) {
            $this->info('Sending: ' . $test->testLabel());
            $test->test($this->recipient);
            $this->info('Done');
        }
    }
}
