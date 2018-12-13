<?php

// CASE BILLING ADDRESS MISSING
if (($response->status == 403)
    && ($response->error->code === 'Error.Customer.PaymentSettings.Missing')) {

$messageError = 'Operation rejected, you have to fill your payment information first';
$labelUrl = 'Update your payment information';
$url = '/../page/portal-register.php';

include __DIR__ . '/../view/feature-update-rejected.php';
}


// CASE CAPPING REACHED
else if (($response->status == 403)
    && ($response->error->code === 'Error.Customer.Billing.CappingReached')) {

$messageError = 'Operation rejected, you have to pay your previous bills first';
$labelUrl = 'Clear your bills here';
$url = '/../page/portal-home.php';

include __DIR__ . '/../view/feature-update-rejected.php';
}


// CASE NO SUBSCRIPTION
else if ((($response->status == 404)
    && ($response->error->code === 'Error.Api.Usage.NoneMatching'))
    // OR NO DATA AT ALL
    || ($response->status == 204)) {

    // here we have 2 cases :
    // - subscription does not includes the feature
    // - no subscription at all
    // fetch the subscription to determine the issue

    $user = User::getCurrentUser();
    $refCustomer = $user->getId();

    $subscription = new Subscription();
    $subscription->fetchByCustomer($refCustomer);
    // if any and if running
    if ($subscription
        && ($subscription->stateSubscription == 'Running')) {

        $messageError = 'Operation rejected, your have to upgrade your subscription';
        $labelUrl = 'Click here to upgrade';
        $url = '/../page/portal-upgrade.php';
    }
    // if no sub
    else{
        $messageError = 'Operation rejected, you have to subscribe first';
        $labelUrl = 'Click here to subscribe';
        $url = '/../page/portal-home.php';
    }

include __DIR__ . '/../view/feature-update-rejected.php';
}

// IS NOT SUCCESS
else {
$messageError = $response->error->message;
include __DIR__ . '/../view/error.php';
}
