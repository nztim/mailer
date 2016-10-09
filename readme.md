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
 
### Other

GMail filter for sending on behalf via Mailgun:
* From: me@domain.com
* Has the words: bcc:me@domain.com
* Skip the inbox, mark as read, apply the label Auto, never send to spam
