## Requirements

The website works with dependencies available with [Composer](https://getcomposer.org/).

You need PHP >=5.6.0 to use the ProAbono client library with the website. 

It does not require any database as the subscription is managed in ProAbono and the authentication with [Auth0](https://auth0.com/).

## Auth0
We assume your website is configured on localhost (which is probably a good idea to have Auth0 work properly without https).

### Auth0 - Configuration

1° Create an account on [Auth0](https://auth0.com/).

2° Go to Applications > Default App > Settings
- Allowed Callback URLs: http://localhost/auth.php
- Allowed Logout URLs: http://localhost/
- Note the 3 values : Client Id, Domain and Client Secret.

### Auth0 - Settings
In the **.env** file, you need to set the 3 Auth0 Settings :
- AUTH0_CLIENT_ID=yourClientId
- AUTH0_DOMAIN=yourDomain
- AUTH0_CLIENT_SECRET=yourClientSecret

If Auth0 suits your production website, [find here more information about Auth0 with PHP](https://auth0.com/docs/quickstart/webapp/php).

## ProAbono

### ProAbono - Configuration

1° Create an account on ProAbono

2° On the Home page, click  ‘Create a Test Offer’ and follow the procedure.
Note that the button is available only for brand new accounts.

3° Go to Hosted Pages > URL redirections

In the 5 following fields, enter this url : http://localhost/page/congratulation.php

- In Validation without charge:
    - Free subscription
    - Extra subscription
    - Change current plan
- In Payment:
    - Success
    - Pending

4° Open the top right menu by clicking your name, then select Integration.
- Note the 4 values : keyAgent, keyApi, endpoint, public pricing url.

### ProAbono - Settings

In the **config.php** file, you need to set the 4 ProAbono Settings :

- keyAgent (ex: ce0d53ed-19b6-423c-bf0f-2076e4886758 )
- keyApi (ex: 83d47ce5-ae32-4895-82e1-151cb7297914 )
- endpoint (ex: https://api-42.proabono.com )
- public pricing url (ex: https://demo-php-eur.proabono.com/pricing )
