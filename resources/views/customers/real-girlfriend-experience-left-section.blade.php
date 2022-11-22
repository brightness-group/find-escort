@foreach ($experiences As $key => $single_user_data)

    @foreach ($single_user_data->user_experiences as $key => $singleExperience)
        <div class="usr-d-row">
            <div class="innr-wrp" data-toggle="collapse" href="#collapseContact{{$singleExperience->id}}" role="button">
                <div class="u-img">
                    <img class="lazy" data-src="{{ asset('uploads/avatars/'.$single_user_data->avatar) }}" alt="">
                </div>
                <div class="usr-lpcaton-d">
                    <div class="bottom-d">
                        <h5 class="u-nm">{{ $single_user_data->name }}</h5>
                        <p class="currnt-loc-txt">{{ $singleExperience->message }} ... {{  __('customers/real-girlfriend-experience-left-section.join_me') }}</p>
                    </div>
                    <div class="top-d">
                        <div class="usr-h-nm">
                            {{ $singleExperience->location->name }}
                        </div>
                        <div class="time-status">
                            {{\Carbon\Carbon::createFromTimeString($singleExperience->from)->format('g:i A')}} -
                            {{\Carbon\Carbon::createFromTimeString($singleExperience->to)->format('g:i A')}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="collapse" id="collapseContact{{$singleExperience->id}}">
                <div class="collaps-main-wrp">
                    <div class="btn-wrps">
                        <a href="#contactmemodal{{$singleExperience->id}}"  data-toggle="modal" title="{{  __('customers/real-girlfriend-experience-left-section.contact_her') }}" class="btn contact-btn" title="{{  __('customers/real-girlfriend-experience-left-section.contact_her') }}">{{  __('customers/real-girlfriend-experience-left-section.contact_her') }}</a>
                        <a class="btn view-profile-btn" href="/escort/{{$single_user_data->username}}" title="{{  __('customers/real-girlfriend-experience-left-section.view_profile') }}"> {{  __('customers/real-girlfriend-experience-left-section.view_profile') }}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade  contactmemodal" id="contactmemodal{{$singleExperience->id}}" tabindex="-1" role="dialog" aria-labelledby="contactmemodalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><img class="lazy" data-src="{{ asset('images/close-btn.svg') }}" alt=""></span>
                    </button>
                    <div class="modal-body">
                        <h4 class="title">Contact {{ $single_user_data->name }}</h4>
                        <p class="p-txt">{{  __('customers/real-girlfriend-experience-left-section.send_sms_desc') }}</p>
                        <hr class="cstm-hr d-none d-md-block">
                        <a href="callto:+{{$single_user_data->phone}}" class="contact-number d-none d-md-block">+{{$single_user_data->phone}}</a>
                        <div class="cstm-btn-group">
                            <a href="sms:+{{$single_user_data->phone}}&body=Hi%2520there%252C%2520I%2527d%2520like%2520to%2520connect%2520with%2520you%2520for..." class="btn mail-btn">{{  __('customers/real-girlfriend-experience-left-section.send_sms') }}</a>
                            <a href="https://api.whatsapp.com/send?phone=+{{$single_user_data->phone}}" class="btn whatsapp-btn">{{  __('customers/real-girlfriend-experience-left-section.whatsapp') }}</a>
                        </div>
                        <a href="callto:+{{$single_user_data->phone}}" class="contact-number btn d-block d-md-none">+{{$single_user_data->phone}}</a>

                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endforeach
