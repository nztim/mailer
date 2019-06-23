# Mailer

### Installation
* `composer require nztim/mailer`
* Register the service provider: `NZTim\Mailer\MailerServiceProvider`
* (Optional) Publish the base template, partials and example email:
    * `php artisan vendor:publish --provider="NZTim\Mailer\MailerServiceProvider"`

### Architecture
* The email template hierarchy should contain the basic email structure as well as everything that doesn't change between messages
* The email message class:
    * Logic to define the variable settings for each message, e.g. recipient
    * The static settings for each message, e.g. the view
    * Logic to send the message

### Usage
* Create an email class that extends `NZTim\Mailer\Message`
* Add a `handle()` method that prepares and sends your email
* See `NZTim\Mailer\ExampleEmail` for a simple example
* All methods apart from `send()` are fluent and return the current object
* Example usage within an application:
    * `(new ExampleEmail)->recipient($user->email())->handle()`
* Example of queueing a new email with NZTim\Queue:
    * `QueueMgr::add((new ExampleEmail)->recipient($user->email()))`
* On message send a `NZTim\Mailer\MessageSent` event is fired.
    * Can be used to log or otherwise store outgoing messages.  
    * This is bypassed when a recipientOverride is specified.

### Testing
* Each Message must have a `testLabel()` and `test()` method.
* If you wish to use the TestMessages command then implement these methods:
    * `testLabel()` method should return a menu item (string).
    * `test()` should use `overrideRecipient()` to send an example message.
* Then extend `TestEmailsCommand` in your application and:
    * Set `$recipient` to an appropriate default receipient for your tests.
    * Register the Message classes to be tests in your `tests()` method.

### Other

GMail filter for sending on behalf via Mailgun:
* From: me@domain.com
* Has the words: bcc:me@domain.com
* Skip the inbox, mark as read, apply the label Auto, never send to spam

### Changelog
* 11/2/2019 v2.0: Added MessageSent event.
* 10/2/2019 v1.6: Added automatically generated plain text versions of HTML email.
