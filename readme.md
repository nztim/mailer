# Mailer

### Installation
* Install using composer and select the appropriate branch
    * `composer require nztim/mailer:5.1.*` or
    * `composer require nztim/mailer:5.3.*`
* Register the service provider: `NZTim\Mailer\MailerServiceProvider`


// GMail filter:
// From: me@domain.com
// Has the words: bcc:me@domain.com
// Skip the inbox, mark as read, apply the label Auto, never send to spam
