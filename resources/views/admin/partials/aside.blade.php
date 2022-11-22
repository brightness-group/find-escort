<div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
    <!--begin::Brand-->
    <div class="aside-logo flex-column-auto" id="kt_aside_logo">
        <!--begin::Logo-->
        <a href="{{route('admin.dashboard')}}">
            <img alt="Logo" src="{{ asset('images/ft-logo.png') }}" class="h-60px logo" />
        </a>
        <!--end::Logo-->
        <!--begin::Aside toggler-->
        <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="aside-minimize">
            <!--begin::Svg Icon | path: icons/stockholm/Navigation/Angle-double-left.svg-->
            <span class="svg-icon svg-icon-1 rotate-180">
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
					<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<polygon points="0 0 24 0 24 24 0 24" />
						<path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)" />
						<path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.5" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)" />
					</g>
				</svg>
			</span>
            <!--end::Svg Icon-->
        </div>
        <!--end::Aside toggler-->
    </div>
    <!--end::Brand-->
    <!--begin::Aside menu-->
    <div class="aside-menu flex-column-fluid">
        <!--begin::Aside Menu-->
        <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">
            <!--begin::Menu-->
            <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500" id="#kt_aside_menu" data-kt-menu="true">
                <div class="menu-item">
                    <a class="menu-link active" href="{{route('admin.dashboard')}}">
						<span class="menu-icon">
							<!--begin::Svg Icon | path: icons/stockholm/Design/PenAndRuller.svg-->
							<span class="svg-icon svg-icon-2">
								<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3" />
									<path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000" />
								</svg>
							</span>
                            <!--end::Svg Icon-->
						</span>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </div>

                <div data-kt-menu-trigger="click" class="menu-item here menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: assets/media/icons/duotone/Contacts/Location-Arrow.svg-->
                            <span class="svg-icon svg-icon-muted svg-icon-2x"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path opacity="0.25" fill-rule="evenodd" clip-rule="evenodd" d="M21.522 5.74723C22.3806 3.68663 20.3134 1.61941 18.2528 2.478L4.03636 8.40151C1.25608 9.55996 1.72602 13.6348 4.69701 14.1299L9.13109 14.8689L9.8701 19.303C10.3653 22.274 14.4401 22.7439 15.5985 19.9637L21.522 5.74723Z" fill="#191213"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.8185 11.4284C14.9926 10.1221 13.8779 9.00741 12.5717 9.18158L5.16198 10.1695C2.90241 10.4708 2.82574 13.712 5.06854 14.1197L9.14003 14.86L9.8803 18.9315C10.2881 21.1743 13.5292 21.0976 13.8305 18.838L14.8185 11.4284Z" fill="#121319"/>
                            </svg></span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">Locations</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link active" href="{{route('locations.index')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Locations Listing</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="{{route('suggested-locations.index')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Suggested Locations</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div data-kt-menu-trigger="click" class="menu-item here menu-accordion">

                    @php
                        $membersCount = 0;
                        $girlsCount = 0;
                        
                        if(\App\Models\User::newMembersRegistered()->count()){
                            $membersCount =  \App\Models\User::newMembersRegistered()->count();
                        }

                        if( \App\Models\User::newGirlsRegistered()->count() ){
                            $girlsCount = \App\Models\User::newGirlsRegistered()->count();
                        }
                    @endphp

                    <span class="menu-link">
                        
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: assets/media/icons/duotone/Contacts/User.svg-->
                            <span class="svg-icon svg-icon-muted svg-icon-2x"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M17 6C17 8.76142 14.7614 11 12 11C9.23858 11 7 8.76142 7 6C7 3.23858 9.23858 1 12 1C14.7614 1 17 3.23858 17 6Z" fill="#121319"/>
                            <path opacity="0.25" fill-rule="evenodd" clip-rule="evenodd" d="M18.818 14.1248C18.2016 13.4101 17.1428 13.4469 16.3149 13.9001C15.0338 14.6013 13.5635 15 12 15C10.4365 15 8.96618 14.6013 7.68505 13.9001C6.85717 13.4469 5.79841 13.4101 5.182 14.1248C3.82222 15.7014 3 17.7547 3 20V21C3 22.1045 3.89543 23 5 23H19C20.1046 23 21 22.1045 21 21V20C21 17.7547 20.1778 15.7014 18.818 14.1248Z" fill="#191213"/>
                            </svg></span>
                            <!--end::Svg Icon-->
                        </span>
                        
                        <span class="menu-title">Users
                            @if( ($membersCount + $girlsCount) > 0 )
                                &nbsp;<span class="badge badge-circle badge-danger">{{ $membersCount + $girlsCount }}</span>
                            @endif
                        </span>

                        <span class="menu-arrow"></span>
                    </span>

                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link active" href="{{route('members.index')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Members Listing
                                        @if( $membersCount > 0 )
                                        &nbsp;<span class="badge badge-circle badge-danger">{{ $membersCount }}</span>
                                        @endif
                                </span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="{{route('girls.index')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Escorts Listing
                                        @if( $girlsCount > 0 )
                                        &nbsp;<span class="badge badge-circle badge-danger">{{ $girlsCount }}</span>
                                        @endif 
                                </span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="{{route('administrator.index')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Admin Listing</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div data-kt-menu-trigger="click" class="menu-item here menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: assets/media/icons/stockholm/Communication/Chat6.svg-->
                            <span class="svg-icon svg-icon-muted svg-icon-2x"><svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M14.4862 18L12.7975 21.0566C12.5304 21.54 11.922 21.7153 11.4386 21.4483C11.2977 21.3704 11.1777 21.2597 11.0887 21.1255L9.01653 18H5C3.34315 18 2 16.6569 2 15V6C2 4.34315 3.34315 3 5 3H19C20.6569 3 22 4.34315 22 6V15C22 16.6569 20.6569 18 19 18H14.4862Z" fill="black"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M6 7H15C15.5523 7 16 7.44772 16 8C16 8.55228 15.5523 9 15 9H6C5.44772 9 5 8.55228 5 8C5 7.44772 5.44772 7 6 7ZM6 11H11C11.5523 11 12 11.4477 12 12C12 12.5523 11.5523 13 11 13H6C5.44772 13 5 12.5523 5 12C5 11.4477 5.44772 11 6 11Z" fill="black"/>
                            </svg></span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">Reviews
                            @if(\App\Models\Review::pending()->count())
                                &nbsp;<span class="badge badge-circle badge-danger">{{ \App\Models\Review::pending()->count() }}</span>
                            @endif
                        </span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link active" href="{{route('reviews.index')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Reviews Listing</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div data-kt-menu-trigger="click" class="menu-item here menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: assets/media/icons/duotone/Business/Coin.svg-->
                            <span class="svg-icon svg-icon-muted svg-icon-2x"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <circle opacity="0.25" cx="12" cy="12" r="10" fill="#12131A"/>
                            <path d="M11 5C11 4.44772 11.4477 4 12 4C12.5523 4 13 4.44772 13 5V6C14.6569 6 16 7.34315 16 9C16 9.55229 15.5523 10 15 10C14.4477 10 14 9.55229 14 9C14 8.44772 13.5523 8 13 8H11C10.4477 8 10 8.44771 10 9V9.55848C10 9.98891 10.2754 10.3711 10.6838 10.5072L13.9487 11.5955C15.1737 12.0038 16 13.1502 16 14.4415V15C16 16.6569 14.6569 18 13 18V19C13 19.5523 12.5523 20 12 20C11.4477 20 11 19.5523 11 19V18C9.34315 18 8 16.6569 8 15C8 14.4477 8.44771 14 9 14C9.55229 14 10 14.4477 10 15C10 15.5523 10.4477 16 11 16H13C13.5523 16 14 15.5523 14 15V14.4415C14 14.0111 13.7246 13.6289 13.3162 13.4928L10.0513 12.4045C8.82629 11.9962 8 10.8498 8 9.55848V9C8 7.34315 9.34315 6 11 6V5Z" fill="#12131A"/>
                            </svg></span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">Booster</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link active" href="{{route('plans.index')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Plans</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="{{route('addons.index')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Addons</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div data-kt-menu-trigger="click" class="menu-item here menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: assets/media/icons/duotone/Business/Coin.svg-->
                            <span class="svg-icon svg-icon-muted svg-icon-2x"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path opacity="0.25" d="M4 10H8V17H10V10H14V17H16V10H20V17C21.1046 17 22 17.8954 22 19V20C22 21.1046 21.1046 22 20 22H4C2.89543 22 2 21.1046 2 20V19C2 17.8954 2.89543 17 4 17V10Z" fill="#12131A"/>
                            <path d="M2 7.35405C2 6.53624 2.4979 5.80083 3.25722 5.4971L11.2572 2.2971C11.734 2.10637 12.266 2.10637 12.7428 2.2971L20.7428 5.4971C21.5021 5.80083 22 6.53624 22 7.35405V7.99999C22 9.10456 21.1046 9.99999 20 9.99999H4C2.89543 9.99999 2 9.10456 2 7.99999V7.35405Z" fill="#12131A"/>
                            </svg></span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">Purchases</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link active" href="{{route('admin.purchases.pending')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Pending</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="{{route('admin.purchases.approved')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Approved</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div data-kt-menu-trigger="click" class="menu-item here menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: assets/media/icons/stockholm/Communication/Write.svg-->
                            <span class="svg-icon svg-icon-muted svg-icon-2x"><svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953) "/>
                                <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                            </svg></span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">Blogs</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link active" href="{{route('admin.blogs.index')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Post Listing</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="{{route('admin.categories.index')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Categories Listing</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="menu-item">
                    <a class="menu-link active" href="{{route('admin.pages.index')}}">
						<span class="menu-icon">
							<!--begin::Svg Icon | path: assets/media/icons/duotone/Interface/Bookmark.svg-->
                            <span class="svg-icon svg-icon-muted svg-icon-2x"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path opacity="0.25" fill-rule="evenodd" clip-rule="evenodd" d="M6.81113 1.14921C4.7967 1.2786 3.2974 2.8001 3.17794 4.81514C3.0811 6.44881 3.00002 8.77846 3 12C2.99997 17.0256 3.19727 20.4726 3.34399 22.3412C3.4031 23.0939 4.24523 23.4739 4.8621 23.0385L11.4233 18.4071C11.769 18.163 12.2309 18.163 12.5766 18.4071L19.1378 23.0385C19.7547 23.4739 20.5968 23.0939 20.6559 22.3412C20.8026 20.4726 20.9999 17.0256 20.9999 12C20.9999 8.77836 20.9189 6.44867 20.822 4.81499C20.7025 2.80002 19.2033 1.27861 17.1889 1.14922C15.8866 1.06557 14.1728 1 11.9999 1C9.8272 1 8.11343 1.06557 6.81113 1.14921Z" fill="#12131A"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.81115 1.14921C4.79672 1.2786 3.29741 2.8001 3.17796 4.81514C3.17436 4.8758 3.17079 4.93741 3.16724 5C5 5 19 5 20.8327 5C20.8292 4.93736 20.8256 4.8757 20.822 4.81499C20.7025 2.80002 19.2033 1.27861 17.1889 1.14922C15.8866 1.06557 14.1728 1 12 1C9.82721 1 8.11344 1.06557 6.81115 1.14921Z" fill="#12131A"/>
                            </svg></span>
                            <!--end::Svg Icon-->
						</span>
                        <span class="menu-title">CMS</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link active" href="{{route('admin.settings.index')}}">
                        <span class="menu-icon">

                            <!--begin::Svg Icon | path: assets/media/icons/duotone/Media/Settings.svg-->
                            <span class="svg-icon svg-icon-muted svg-icon-2x"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <g opacity="0.25">
                            <path d="M20 3C20 2.44772 19.5523 2 19 2C18.4477 2 18 2.44772 18 3L18 21C18 21.5523 18.4477 22 19 22C19.5523 22 20 21.5523 20 21V3Z" fill="#12131A"/>
                            <path d="M12 2C12.5523 2 13 2.44772 13 3L13 21C13 21.5523 12.5523 22 12 22C11.4477 22 11 21.5523 11 21L11 3C11 2.44772 11.4477 2 12 2Z" fill="#12131A"/>
                            <path d="M5 2C5.55229 2 6 2.44772 6 3L6 21C6 21.5523 5.55229 22 5 22C4.44772 22 4 21.5523 4 21L4 3C4 2.44772 4.44772 2 5 2Z" fill="#12131A"/>
                            </g>
                            <path d="M17 7C17 8.10457 17.8954 9 19 9C20.1046 9 21 8.10457 21 7C21 5.89543 20.1046 5 19 5C17.8954 5 17 5.89543 17 7Z" fill="#12131A"/>
                            <path d="M12 19C10.8954 19 10 18.1046 10 17C10 15.8954 10.8954 15 12 15C13.1046 15 14 15.8954 14 17C14 18.1046 13.1046 19 12 19Z" fill="#12131A"/>
                            <path d="M5 14C3.89543 14 3 13.1046 3 12C3 10.8954 3.89543 10 5 10C6.10457 10 7 10.8954 7 12C7 13.1046 6.10457 14 5 14Z" fill="#12131A"/>
                            </svg></span>
                            <!--end::Svg Icon-->
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">Settings</span>
                    </a>
                </div>
            </div>
            <!--end::Menu-->
        </div>
    </div>
    <!--end::Aside menu-->
    <!--begin::Footer-->
    <div class="aside-footer flex-column-auto" id="kt_aside_footer"></div>
    <!--end::Footer-->
</div>
