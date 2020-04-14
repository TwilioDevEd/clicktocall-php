<a href="https://www.twilio.com">
  <img src="https://static0.twilio.com/marketing/bundles/marketing/img/logos/wordmark-red.svg" alt="Twilio" width="250" />
</a>

# Click to Call PHP

![](https://github.com/TwilioDevEd/clicktocall-php/workflows/Composer/badge.svg)

> We are currently in the process of updating this sample template. If you are encountering any issues with the sample, please open an issue at [github.com/twilio-labs/code-exchange/issues](https://github.com/twilio-labs/code-exchange/issues) and we'll try to help you.

An application example implementing Click to Call using Twilio.

[Read the full tutorial here](https://www.twilio.com/docs/tutorials/walkthrough/click-to-call/php)!

## Installation

Step-by-step on how to deploy, configure and develop on this example app.

## Local Development

1. Grab latest source

    ```bash
     $ git clone git://github.com/TwilioDevEd/clicktocall-php.git
    ```

1. Copy the `.env.example` file to `.env`, and edit it including your credentials
   for the Twilio API (found at https://www.twilio.com/user/account/settings). You
   will also need a [Twilio Number](https://www.twilio.com/user/account/phone-numbers/incoming).

1. Install the dependencies with [Composer](https://getcomposer.org/).

   ```bash
   $ composer install
   ```

1. Start the server.

   ```bash
   $ php -S localhost:3000 -t ./src
   ```

1. [Expose the application to the wider internet](#expose-the-application-to-the-wider-internet)

1. Check out the app at `http://<sub-domain>.ngrok.io`.

### Expose the Application to the Wider Internet

1. Expose your application to the wider internet using [ngrok](http://ngrok.com).
   You can click [here](#expose-the-application-to-the-wider-internet)
   for more details. This step is important because the application won't
   work as expected if you run it through localhost.

  ```bash
   $ ngrok http 3000
  ```

  Once ngrok is running, open up your browser and go to your ngrok URL.
  It will look something like this: `http://<sub-domain>.ngrok.io`

## Meta

 * No warranty expressed or implied. Software is as is. Diggity.
 * The CodeExchange repository can be found [here](https://github.com/twilio-labs/code-exchange/).
 * [MIT License](http://www.opensource.org/licenses/mit-license.html)
 * Lovingly crafted by Twilio Developer Education.
