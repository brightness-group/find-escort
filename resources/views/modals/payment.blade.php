<div class="valid-plan-wrapper">
    <div id="boost-payment-content">

        <h3>{{ __('modals/payment.valid_your_boost') }}</h3>
        <div class="valid-plan-box-wrapper">
            <div class="valid-plan-box">
                <div class="valid-plan-box-inner">
                    <table>
                        <tr>
                            <th>{{ __('modals/payment.product') }}</th>
                            <th>{{ __('modals/payment.price') }} (CHF)</th>
                        </tr>

                        @if(!is_null($plan))
                            <tr>
                                <td>Plan {{$plan->name}} - {{$plan->duration}} {{$plan->interval}}</td>
                                <td>{{$plan->price}}.-</td>
                            </tr>
                        @endif

                        @foreach($addons as $addon)
                            <tr>
                                <td>{{ __('modals/payment.boost') }} {{$addon->name}} - {{$addon->duration}} {{$addon->interval}}</td>
                                <td>{{$addon->price}}.-</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="2"><img class="lazy" data-src="{{ asset('images/table-border.svg') }}" alt=""></td>
                        </tr>
                        <tfoot>
                        <tr>
                            <td>{{ __('modals/payment.totla_price') }}</td>
                            <td>{{$totalPrice}}.-</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><span class="tax">{{ __('modals/payment.tva_included') }}</span></td>
                        </tr>
                        </tfoot>
                    </table>
                    <div class="paycard-button">
                        <form method="POST" action="{{route('escorts.payment', 'card')}}">
                            @csrf

                            @if(!is_null($plan))
                                <input type="hidden" value="{{ $plan->id }}" name="plan">
                            @endif

                            @foreach($addons as $addon)
                                <input type="hidden" value="{{ $addon->id }}" name="addons[]">
                            @endforeach

                            <button class="btn pay-card" type="submit">{{ __('modals/payment.pay_by_card') }}</button>
                        </form>

                        <form method="POST" action="{{route('escorts.payment', 'cash')}}">
                            @csrf

                            @if(!is_null($plan))
                                <input type="hidden" value="{{ $plan->id }}" name="plan">
                            @endif

                            @foreach($addons as $addon)
                                <input type="hidden" value="{{ $addon->id }}" name="addons[]">
                            @endforeach

                            <button class="btn pay-cash" type="submit">{{ __('modals/payment.pay_by_cash') }}</button>
                        </form>

                        <form method="POST" action="{{route('escorts.payment', 'post')}}">
                            @csrf

                            @if(!is_null($plan))
                                <input type="hidden" value="{{ $plan->id }}" name="plan">
                            @endif

                            @foreach($addons as $addon)
                                <input type="hidden" value="{{ $addon->id }}" name="addons[]">
                            @endforeach

                            <button class="btn pay-finance" type="submit">{{ __('modals/payment.pay_by_post_finanace') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
