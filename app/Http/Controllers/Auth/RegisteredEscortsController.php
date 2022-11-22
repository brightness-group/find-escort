<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Auth\Events\Registered;

use App\Helpers\Wallee;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Speciality;
use App\Models\City;
use App\Models\State;
use App\Models\Plan;
use App\Models\Addon;
use App\Models\AddonType;
use App\Models\Media;
use App\Models\Country;
use App\Models\EyesColor;
use App\Models\HairColor;
use App\Models\HairLength;
use App\Models\Ethnicity;

use App\Models\CupSize;
use App\Models\Boob;
use App\Models\PubicHair;
use App\Models\Client;
use App\Models\Smoke;
use App\Models\Tattoo;

use App\Models\Activity;

use App\Models\Body;
use App\Models\Language;
use App\Models\UserHiddenLocation;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\EscortsInformationRequest;
use App\Http\Requests\EscortsAdvertisingRequest;
use App\Http\Requests\EscortsPicturesRequest;
use App\Http\Requests\EscortsSubscriptionRequest;
use App\Http\Requests\EscortsSubscriptionAddonsRequest;
use Image;

class RegisteredEscortsController extends Controller
{


    public function getGirlsAccess(Request $request)
    {
        return view('auth.girls-access');
    }


    /**
     * Display the registration girls information view.
     *
     * @return \Illuminate\View\View
     */
    public function getInformation(Request $request)
    {
        /*
            212 is the country_id of the Switzerland
        */

        if ($request->has('ref')) {
            session(['referrer' => $request->query('ref')]);
        }

        $states_id  = State::where('country_id', 212)->pluck('id');
        $cities     = City::whereIn('state_id', $states_id)->get();
        return view('auth.escorts-register-information', compact('cities'));
    }

    /**
     * Handle an incoming registration girls information request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function postInformation(EscortsInformationRequest $request)
    {
        $input = $request->all();
        $input['password'] = Hash::make($request->password);
        $input['progress'] = 1;
        $input['role'] = 'escort';

        $referrer = User::whereUsername(session()->pull('referrer'))->first();
        $input['referrer_id'] = $referrer ? $referrer->id : null;
        $input['birthday'] = Carbon::createFromFormat('d/m/Y', $request->birthday)->format('Y-m-d');
        $user = User::create($input);

        Auth::login($user);
        event(new Registered($user));
        return redirect()->route('escorts.register.advertising');
    }

    /**
     * Display the registration advertising view.
     *
     * @return \Illuminate\View\View
     */
    public function getAdvertising(Request $request)
    {
        $user             = Auth::user();

        /*
            212 is the country_id of the Switzerland
        */
        $states     = State::where('country_id', 212)->get();
        $states_id  = $states->pluck('id');
        $cities     = City::whereIn('state_id', $states_id)->get();

        $countries        = Country::all();
        $eyes_colors      = EyesColor::all();
        $hair_colors      = HairColor::all();
        $bodies           = Body::all();
        $specialities     = Speciality::all();
        $alllanguages     = Language::all();
        $hair_length      = HairLength::all();
        $ethnicity        = Ethnicity::all();
        $cup_size         = CupSize::all();
        $boobs            = Boob::all();
        $pubic_hair       = PubicHair::all();
        $clients          = Client::all();
        $smoke            = Smoke::all();
        $tattoos          = Tattoo::all();
        $activities       = Activity::all();


        return view('auth.escorts-register-advertising', compact(
                                        'user',
                                        'states',
                                        'cities',
                                        'countries',
                                        'eyes_colors',
                                        'hair_colors',
                                        'bodies',
                                        'specialities',
                                        'alllanguages',
                                        'hair_length',
                                        'ethnicity',
                                        'cup_size',
                                        'boobs',
                                        'pubic_hair',
                                        'clients',
                                        'smoke',
                                        'tattoos',
                                        'activities'
                                    ));
    }

    /**
     * Handle an incoming registration advertising request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function postAdvertising(EscortsAdvertisingRequest $request)
    {
        $user = Auth::user();

        $user->specialities()->sync($request->specialities);
        $user->languages()->sync($request->languages);

        $input = $request->all();

        /*Delete and save in user_hidden_locations table*/
        UserHiddenLocation::where("user_id",$user['id'])->delete();

        foreach($request->hide_profile_country as $key => $country_id)
        {
            $UserHiddenLocation = new UserHiddenLocation();
            $UserHiddenLocation->user_id  = $user['id'];
            $UserHiddenLocation->country_id  = $country_id;
            $UserHiddenLocation->city_id  = $request->hide_profile_city[$key];
            $UserHiddenLocation->save();
        }

        $input['hide_profile']  = isset($request->hide_profile_from) ? $request->hide_profile_from : '0';

        $user->update($input);

        $this->manageProgress(2);

        return redirect(route('escorts.register.pictures'));
    }

    /**
     * Display the registration pictures view.
     *
     * @return \Illuminate\View\View
     */
    public function getPictures(Request $request)
    {
        return view('auth.escorts-register-pictures');
    }

    /**
     * Handle an incoming registration pictures request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function postPictures(EscortsPicturesRequest $request)
    {
        /**
            *Handling submitted pictures
        **/

        $user = Auth::user();

        if($request->hasfile('pictures')) {

            foreach($request->file('pictures') as $file)
            {
                $name = time().'_'.pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME). '.webp';

                $source     = storage_path().'/app/public/uploads/photo/'.$name;
                $target     = public_path('uploads/photo/' . $name);
                $stamp      = public_path('stamp/Stamp_Findher.png');

                $imgFile    = Image::make($file)->encode('webp', 90)->save( public_path('uploads/photo/'  .  $name ) );
               
                $imgFile->insert($stamp, 'bottom-right', 10, 10)->save($target);

                $fileModal = new Media();
                $fileModal->name  = $name;
                $fileModal->path  = $name;
                $fileModal->type  = 'photo';
                $fileModal->user_id = $user['id'];

                $fileModal->save();
            }
        }

        /**
            *Handling submitted selfie
        **/
        if($request->hasfile('selfie')) {

            foreach($request->file('selfie') as $file)
            {
                $name = time().'_'.pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME). '.webp';

                $source     = storage_path().'/app/public/uploads/selfie/'.$name;
                $target     = public_path('uploads/selfie/' . $name);
                $stamp      = public_path('stamp/Stamp_Findher.png');

                $imgFile    = Image::make($file)->encode('webp', 90)->save( public_path('uploads/selfie/'  .  $name ) );
                $imgFile->insert($stamp, 'bottom-right', 10, 10)->save($target);

                $fileModal          = new Media();
                $fileModal->name    = $name;
                $fileModal->path    = $name;
                $fileModal->type    = 'selfie';
                $fileModal->user_id = $user['id'];

                $fileModal->save();
            }
        }

        /**
            *Handling submitted video
        **/

        if($request->has('video')) {
            $file       = $request->video;
            $name       = time().'_'.$file->getClientOriginalName();

            $file->move(public_path().'/uploads/video/', $name);

            $fileModal          = new Media();
            $fileModal->name    = $name;
            $fileModal->path    = $name;
            $fileModal->type    = 'video';
            $fileModal->user_id = $user['id'];
            $fileModal->save();
        }

        $user->save();

        $this->manageProgress(3);

        return redirect(route('escorts.register.subscription'));
    }


    /**
     * Display the registration subscription view.
     *
     * @return \Illuminate\View\View
     */
    public function getSubscription(Request $request)
    {
        $plans = Plan::all();
        return view('auth.escorts-register-subscription', compact('plans'));
    }

    /**
     * Handle an incoming registration subscription request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function postSubscription(EscortsSubscriptionRequest $request)
    {
        $user = Auth::user();
        $plan = Plan::find($request->subscription);

        $user->plan_id = $request->subscription;
        $user->plan_purchased_at = Carbon::now()->toDateTimeString();
        $user->save();

        $this->manageProgress(4);

        return redirect(route('escorts.register.subscription.addons'));
    }


    /**
     * Display the registration subscription addon view.
     *
     * @return \Illuminate\View\View
     */
    public function getSubscriptionAddons()
    {
        $addons = Addon::all();
        $addon_types = AddonType::all();
        return view('auth.escorts-register-subscription-addons', compact('addons', 'addon_types'));
    }

    /**
     * Handle an incoming registration subscription addon request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function postSubscriptionAddons(EscortsSubscriptionAddonsRequest $request)
    {
        $boosters = array_filter([$request->booster, $request->smile]);

        $user = auth()->user();

        $user->addons()->sync($boosters);

        $this->manageProgress(5);
        return redirect(route('escorts.register.subscription.reviews'));
    }


    /**
     * Display the registration subscription reviews view.
     *
     * @return \Illuminate\View\View
     */
    public function getSubscriptionReviews()
    {
        $user = Auth::user();

        /*If use SKIP BOOST  and redirect here then progress must be save from here (post method will not execute if user click on "SKIP BOOST")*/
        $this->manageProgress(5);
        /*endhere*/

        return view('auth.escorts-register-subscription-reviews', compact('user'));
    }

    public function payment(Request $request, $type)
    {
        $user = auth()->user();
        
        $items          = [];
        /*
         *  Adding Plan to Items for Wallee/PostByFinanace payment gateway
         */
        $item['id']     = $user->plan->id;
        $item['unique_id'] = 'p-'.$user->plan->id;
        $item['name']   = $user->plan->name;
        $item['price']  = $user->plan->price;
        $item['type']   =  'plan';
        $items[]        = $item;

        $totalPrice = $user->plan->price;

        foreach ($user->addons as $key => $addon) {
            if (!$user->isFreeBooster($addon->id)) {
                $totalPrice +=  $addon->price;

                /*
                 *  Adding Addon Items for Wallee/PostByFinanace payment gateway
                 */
                $item['id']     = $addon->id;
                $item['unique_id'] = 'a-'.$addon->id;
                $item['name']   = $addon->name;
                $item['price']  = $addon->price;
                $item['type']   =  'addon';
                $items[]        = $item;
            }
        }

        if ($type == 'card' || $type == 'post' ){
            $wallee = new Wallee($type);
            return $wallee->process($request, $items, $user);
        }
        else {

            $purchase = $user->purchases()->create([
                'total_price' => $totalPrice,
                'type'        => $type
            ]);

            $purchase->items()->create([
                'plan_id' => $user->plan_id,
                'price'   => Plan::find(auth()->user()->plan_id)->price
            ]);

            foreach ($user->addons as $addon) {
                $purchase->items()->create([
                    'addon_id' => $addon->id,
                    'price'    =>  ($user->isFreeBooster($addon->id)) ? 0 : $addon->price
                ]);
            }

            return $this->getSubscriptionPay();
        }
    }

    /*
    This function will execute when payment is success and return to success url (route(escorts.register.subscription.pay.cash.success/))
    */
    public function paymentCashSuccess(Request $request){
        $user = auth()->user();

        $totalPrice = $user->plan->price;

        foreach ($user->addons as $key => $addon) {
            if (!$user->isFreeBooster($addon->id)) {
                $totalPrice +=  $addon->price;
            }
        }

        $purchase = $user->purchases()->create([
            'total_price' => $totalPrice,
            'type'        => 'card',
            'paid'        => 1,
        ]);

        $purchase->items()->create([
            'plan_id' => $user->plan_id,
            'price'   => Plan::find(auth()->user()->plan_id)->price
        ]);

        $plan = Plan::find($user->plan_id);

        $user->update([
            'plan_id'           => $user->plan_id,
            'plan_purchased_at' => Carbon::now()->toDateTimeString(),
            'plan_expiry'       => Carbon::now()->add($plan->interval, $plan->duration)->toDateTimeString(),
            'plan_paid'         => 1,
        ]);

        foreach ($user->addons as $addon) {
            $purchase->items()->create([
                'addon_id' => $addon->id,
                'price'    =>  ($user->isFreeBooster($addon->id)) ? 0 : $addon->price
            ]);

            $addon = Addon::find($addon->id);



            if (($addon->addon_type->name == 'Regional Smile')){
                $user->regional = 1;
                $user->save();
            }else if (($addon->addon_type->name == 'National Smile')){
                $user->national = 1;
                $user->save();

            }else if (($addon->addon_type->name == 'Booster Smile')){
                $boost_ranking =  User::max('boost_ranking');
                $user->booster = 1;
                $user->boost_ranking = $boost_ranking + 1;
                $user->save();
            }



            $expiry = Carbon::now()->add($addon->duration, $addon->interval)->toDateTimeString();
            $addon->users()->updateExistingPivot($user, array('expired_at' => $expiry, 'paid' => 1), false);
        }

        return redirect()->route('escorts.register.subscription.complete');
    }


    /*
    This function will execute when payment is success and return to success url (route(escorts.register.subscription.pay.post.success/))
    */
    public function paymentPostSuccess(Request $request){
        $user = auth()->user();

        $totalPrice = $user->plan->price;

        foreach ($user->addons as $key => $addon) {
            if (!$user->isFreeBooster($addon->id)) {
                $totalPrice +=  $addon->price;
            }
        }

        $purchase = $user->purchases()->create([
            'total_price' => $totalPrice,
            'type'        => 'post',
            'paid'        => 1,
        ]);

        $purchase->items()->create([
            'plan_id' => $user->plan_id,
            'price'   => Plan::find(auth()->user()->plan_id)->price
        ]);

        $plan = Plan::find($user->plan_id);

        $user->update([
            'plan_id'           => $user->plan_id,
            'plan_purchased_at' => Carbon::now()->toDateTimeString(),
            'plan_expiry'       => Carbon::now()->add($plan->interval, $plan->duration)->toDateTimeString(),
            'plan_paid'         => 1,
        ]);

        foreach ($user->addons as $addon) {
            $purchase->items()->create([
                'addon_id' => $addon->id,
                'price'    =>  ($user->isFreeBooster($addon->id)) ? 0 : $addon->price
            ]);


            $addon = Addon::find($addon->id);


            if (($addon->addon_type->name == 'Regional Smile')){
                $user->booster = 1;
                $user->save();
            }else if (($addon->addon_type->name == 'National Smile')){
                $user->national = 1;
                $user->save();

            }else if (($addon->addon_type->name == 'Booster Smile')){
                $boost_ranking =  User::max('boost_ranking');
                $user->regional = 1;
                $user->boost_ranking = $boost_ranking + 1;
                $user->save();
            }
            

            $expiry = Carbon::now()->add($addon->duration, $addon->interval)->toDateTimeString();
            $addon->users()->updateExistingPivot($user, array('expired_at' => $expiry, 'paid' => 1), false);
        }

        return redirect()->route('escorts.register.subscription.complete');
    }


    /**
     * Display the registration subscription pay view.
     *
     * @return \Illuminate\View\View
     */
    public function getSubscriptionPay()
    {
        /*If use click on anchor tag on review page, update progess (There is no post method for review page)*/
        $this->manageProgress(6);
        /*endhere*/

        return view('auth.escorts-register-subscription-pay');
    }

    /**
     * Display the registration subscription complete view.
     *
     * @return \Illuminate\View\View
     */
    public function getSubscriptionComplete()
    {
        /*
        If use click on anchor tag on Pay page, update progess (There is no post method for Pay page)
        7 means process completed
        */
        $this->manageProgress(7);
        /*endhere*/
        $user = Auth::user();

        return view('auth.escorts-register-subscription-complete');
    }


    public function manageProgress($step = 0)
    {
        $user = Auth::user();
        $user->progress = $step;
        $user->save();
    }

    public function payByCard($request)
    {
        $user = Auth::user();
        
       // dd($user);

        $totalPrice = $user->plan->price;
        foreach($user->addons as $key => $addon){
            $totalPrice +=  $addon->price;
        }

        $spaceId = 18228;
        $userId = 40504;
        $secret = '+v2aIaEXBpkcCB3Ah97QpFMhZj9Rdjm9Wv0J7FqzJ9s=';

        // Setup API client
        $client = new \Wallee\Sdk\ApiClient($userId, $secret);

        // Create transaction
        $lineItem = new \Wallee\Sdk\Model\LineItemCreate();
        $lineItem->setName($user->plan->name);
        $lineItem->setUniqueId($user->id.'-'.time());
        $lineItem->setSku(str_slug($user->plan->name, '-'));
        $lineItem->setQuantity(1);
        $lineItem->setAmountIncludingTax($totalPrice);
        $lineItem->setType(\Wallee\Sdk\Model\LineItemType::PRODUCT);

        // Customer Billing Address
        $billingAddress = new \Wallee\Sdk\Model\AddressCreate();

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

        // Transaction Payload
        $transactionPayload = new \Wallee\Sdk\Model\TransactionCreate();
        $transactionPayload->setCurrency('CHF');
        $transactionPayload->setLineItems(array($lineItem));
        $transactionPayload->setAutoConfirmationEnabled(true);
        $transactionPayload->setSuccessUrl(route('home'));
        $transactionPayload->setFailedUrl(route('escorts.register.subscription.reviews'));

        $transaction = $client->getTransactionService()->create($spaceId, $transactionPayload);

        // Create Payment Page URL:
        $redirectionUrl = $client->getTransactionPaymentPageService()->paymentPageUrl($spaceId, $transaction->getId());
        return redirect($redirectionUrl);
    }


    public function payByPostFinance(Request $request)
    {
        $user = Auth::user();

        $totalPrice = $user->plan->price;
        foreach($user->addons as $key => $addon){
            $totalPrice +=  $addon->price;
        }

        $spaceId = 405;
        $userId = 512;
        $secret = 'FKrO76r5VwJtBrqZawBspljbBNOxp5veKQQkOnZxucQ=';

                // Setup API client
        $client = new \PostFinanceCheckout\Sdk\ApiClient($userId, $secret);

        // Create transaction
        $lineItem = new \PostFinanceCheckout\Sdk\Model\LineItemCreate();
        $lineItem->setName('Red T-Shirt');
        $lineItem->setUniqueId('5412');
        $lineItem->setSku('red-t-shirt-123');
        $lineItem->setQuantity(1);
        $lineItem->setAmountIncludingTax(29.95);
        $lineItem->setType(\PostFinanceCheckout\Sdk\Model\LineItemType::PRODUCT);


        $transactionPayload = new \PostFinanceCheckout\Sdk\Model\TransactionCreate();
        $transactionPayload->setCurrency('CHF');
        $transactionPayload->setLineItems(array($lineItem));
        $transactionPayload->setAutoConfirmationEnabled(true);

        $transaction = $client->getTransactionService()->create($spaceId, $transactionPayload);

        // Create Payment Page URL:
        $redirectionUrl = $client->getTransactionPaymentPageService()->paymentPageUrl($spaceId, $transaction->getId());
        //dd($redirectionUrl);
        return redirect($redirectionUrl);
    }

    public function getFreeBooster($user, $free_by = NULL, $type = 'registered'){
        $modified_subscription_addons = array();
        $paused_at = $expired_at = NULL;
        $subscription_addons = Settings::where('meta_key', 'free_addon')->pluck('meta_value')->toArray();
        
        if($subscription_addons){
            foreach ($subscription_addons as $key => $addon_id) {

                $singlePivotEntry = $user->addons()->wherePivot('addon_id','=' , $addon_id)->get();

                if(!$singlePivotEntry->isEmpty()){
                   $expired_at = ($singlePivotEntry[0]->pivot->expired_at) ? $singlePivotEntry[0]->pivot->expired_at : "";
                }

                $addon_data = Addon::find($addon_id);

                if($expired_at)
                    $expired_at = Carbon::parse($expired_at)->addDays($addon_data->duration * 7);
                else
                    $expired_at = Carbon::now()->addDays($addon_data->duration * 7);

                $modified_subscription_addons[$addon_id] = array(
                                                                'free_by'       => $free_by,
                                                                'expired_at'    => $expired_at,
                                                                'type'          => $type,
                                                            );
            }

            $user->addons()->syncWithoutDetaching($modified_subscription_addons);
        }
    }
}
