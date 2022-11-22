<?php

namespace App\Helpers;

use Wallee\Sdk\ApiClient;
use Wallee\Sdk\Model\LineItemCreate;
use Wallee\Sdk\Model\LineItemType;
use Wallee\Sdk\Model\TransactionCreate;
use Wallee\Sdk\Model\AddressCreate;
use App\Models\Settings;

class Wallee
{
    protected $client;
    protected $type;

    public function __construct($type)
    {
        $post_finance_space_id  = Settings::where('meta_key', 'post_finance_space_id')->pluck('meta_value')->toArray();
        $post_finance_user_id   = Settings::where('meta_key', 'post_finance_user_id')->pluck('meta_value')->toArray();
        $post_finance_secret   = Settings::where('meta_key', 'post_finance_secret')->pluck('meta_value')->toArray();

        $this->space_id  = $post_finance_space_id[0];
        $this->user_id   = $post_finance_user_id[0];
        $this->secret   = $post_finance_secret[0];

        $this->client   = new ApiClient($this->user_id, $this->secret);
        $this->type     = $type;
    }

    public function process($request, $items = array(), $user = array())
    {
        
        $cartItems = [];
        foreach ($items as $item) {
            $lineItem = new LineItemCreate();
            $lineItem->setName($item['name']);
            $lineItem->setUniqueId($user->id.'-'.$item['unique_id'].'-'.time());
            $lineItem->setSku(str_slug($item['name'], '-'));
            $lineItem->setQuantity(1);
            $lineItem->setAmountIncludingTax($item['price']);
            $lineItem->setType(LineItemType::PRODUCT);

            $cartItems[] = $lineItem;
        }

        /*
         * Customer Billing Address
         */

        $billingAddress = new AddressCreate();

        if($user->city)
            $billingAddress->setCity($user->city->name);

        if($user->country)
            $billingAddress->setCountry($user->country->name);

        if($user->email)
            $billingAddress->setEmailAddress($user->email);

        $billingAddress->setFamilyName('Customer');
        $billingAddress->setGivenName('Good');

        if($user->phone)
            $billingAddress->setPhoneNumber($user->phone);

        // Create transaction
        $transactionPayload = new TransactionCreate();
        $transactionPayload->setCurrency('CHF');
        $transactionPayload->setLineItems($cartItems);
        $transactionPayload->setBillingAddress($billingAddress);
        $transactionPayload->setShippingAddress($billingAddress);

        $transactionPayload->setAutoConfirmationEnabled(true);
        
        if($this->type == 'card'){
            $transactionPayload->setSuccessUrl(route('escorts.register.subscription.pay.cash.success'));    
        }else if($this->type == 'post'){
            $transactionPayload->setSuccessUrl(route('escorts.register.subscription.pay.post.success'));
        }

        $transactionPayload->setFailedUrl(route('escorts.register.subscription.reviews'));

        $transaction = $this->client->getTransactionService()
                            ->create($this->space_id, $transactionPayload);

        // Create Payment Page URL:
        $redirectionUrl = $this->client->getTransactionPaymentPageService()->paymentPageUrl($this->space_id, $transaction->getId());

        return redirect($redirectionUrl);
        
    }
}