@extends('master')
@section('content')
<div id="content" class="site-content">
   <div class="container">
      <div class="row m-0">
         <div class="girl-profile-wrapper" style="background-image:url({{ asset('images/information-bg.jpg') }})">
            <div class="container">
               <div class="row m-0">
                  @include('customers.sidebar')
                  <div class="back-page-nav nav-gray">
                            <a href="{{route('customers.profile.account.details')}}" class="prev-page-link"></a> {{__('customers/account-details.account_details')}}
                        </div>
                  <div class="profile-right-section">
                     <div class="edit-profile-header">
                        <h2  class="d-none d-md-inline-block">{{__('customers/account-details.account_details')}}</h2>
                     </div>
                     <form method="POST" action="{{ route('customers.profile.account.details') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="girl-profile-inner girl-account-detail-inner">
                           <div class="girl-profile-form">
                              <div class="form-field">
                                 <label>{{__('customers/account-details.pseduo')}}</label>
                                 <input type="text" placeholder="john" readonly value="{{$user->username}}">
                                 @error('name')
                                 <span class="text-danger">{{ $message }}</span>
                                 @enderror
                              </div>
                              <div class="form-field">
                                 <label>{{__('customers/account-details.email')}}</label>
                                 <input type="email" placeholder="johndoe@gmail.com" name="email" value="{{old('email', $user->email)}}">
                                 @error('email')
                                 <span class="text-danger">{{ $message }}</span>
                                 @enderror
                              </div>
                              <div class="form-field">
                                 <label>{{__('customers/account-details.new_password')}}</label>
                                 <input type="password" name="password">
                                 @error('password')
                                 <span class="text-danger">{{ $message }}</span>
                                 @enderror
                              </div>
                              <div class="form-field">
                                 <label>{{__('customers/account-details.confirm_new_password')}}</label>
                                 <input type="password" name="password_confirmation">
                                 @error('password_confirmation')
                                 <span class="text-danger">{{ $message }}</span>
                                 @enderror
                              </div>
                              <hr class="cstm-hr">
                              <div class="txt-with-switch">
                                 <label>{{__('customers/account-details.allow_findher_to_send_notifications')}}</label>
                                 <div class="toggle-switch">
                                    <label class="switch">
                                    <input type="checkbox" name="email_notification" value="1" @if( old('email_notification') == 1 || $user->email_notification && $user->email_notification == 1) checked @endif>
                                    <span class="slider round"></span>
                                    </label>
                                 </div>
                              </div>
                              <div class="form-field radio-group-style left-group">
                                 <label class="cstm-lbl">{{__('customers/account-details.new_girls_alerts')}}</label>
                                 <div class="radio_group">
                                    <div class="custom-control custom-radio">
                                       <input type="radio" class="custom-control-input" id="customRadio1" name="girls_alert" value="1" @if(old('girls_alert') == 1 || $user->girls_alert == 1) checked @endif>
                                       <label class="p-0 custom-control-label" for="customRadio1">{{__('customers/account-details.off')}}</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                       <input type="radio" class="custom-control-input" id="customRadio2" name="girls_alert" value="2" @if(old('girls_alert') == 2 || $user->girls_alert == 2) checked @endif>
                                       <label class="p-0 custom-control-label" for="customRadio2">{{__('customers/account-details.from_my_preferences')}}</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                       <input  class="custom-control-input" type="radio" name="girls_alert" id="customRadio3" value="3" @if(old('girls_alert') == 3 || $user->girls_alert == 3) checked @endif>
                                       <label class="p-0 custom-control-label" for="customRadio3">{{__('customers/account-details.from_all_categories')}}</label>
                                    </div>
                                 </div>
                              </div>
                              <div class="form-field radio-group-style">
                                 <label class="cstm-lbl">{{__('customers/account-details.rge_alerts')}}</label>
                                 <div class="radio_group">
                                    <div class="custom-control custom-radio">
                                       <input type="radio"  class="custom-control-input" id="customRadio5"   name="real_girls_alert" value="1" @if(old('real_girls_alert') == 1 || $user->real_girls_alert == 1) checked @endif>
                                       <label class="p-0 custom-control-label" for="customRadio5">{{__('customers/account-details.off')}}</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                       <input type="radio"  class="custom-control-input" id="customRadio6"   name="real_girls_alert" value="2" @if(old('real_girls_alert') == 2 || $user->real_girls_alert == 2) checked @endif>
                                       <label class="p-0 custom-control-label" for="customRadio6">{{__('customers/account-details.girls_in_my_locations')}}</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                       <input type="radio"  class="custom-control-input" id="customRadio7"   name="real_girls_alert" value="3" @if(old('real_girls_alert') == 3 || $user->real_girls_alert == 3) checked @endif>
                                       <label class="p-0 custom-control-label" for="customRadio7">{{__('customers/account-details.girls_in_all_locations')}}</label>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="girl-profile-save">
                           <button type="submit" class="btn">{{__('customers/account-details.save')}}</button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- .row -->
   </div>
   <!-- .container -->
</div>
@endsection