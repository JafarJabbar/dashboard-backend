<nav style="z-index: 999999" class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow">
    <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">
            <ul class="nav navbar-nav ">
                <li class="nav-item d-lg-block">
                    <a href="{{url('orders')}}" class="nav-link">
                        <i class="ficon" data-feather='bell'></i>
                        <span class="badge badge-pill badge-danger order-badge badge-up"></span>
                    </a>
                </li>
            </ul>
        </div>
        <ul class="nav navbar-nav align-items-center ml-auto">
                        @if($languages)
                            <li class="nav-item dropdown dropdown-language">
                                <a class="nav-link dropdown-toggle" id="dropdown-flag" href="javascript:void(0);"
                                   data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">
                                    <img width="25"
                                         src="{{asset('admin/appassets/images/flags/'.$global_lang.'.png')}}"
                                         alt="{{$global_lang}}">
                                    <span class="selected-language">{{strtoupper($global_lang)}}</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-flag">
                                    @foreach($languages as $language)
                                        @if($language->lang_code != $global_lang)
                                            <a class="dropdown-item" href="{{route('language',['lang'=>$language->lang_code])}}">
                                                <img width="25"
                                                     src="{{asset('admin/appassets/images/flags/'.$language->lang_code.'.png')}}"
                                                     alt="{{$language->lang_code}}">
                                                {{strtoupper($language->lang_code)}}
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                            </li>
                        @endif

                        <li class="nav-item d-none d-lg-block">
                            <a class="nav-link nav-link-style">
                                <i class="ficon" data-feather="moon"></i>
                            </a>
                        </li>
            <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link"
                                                           id="dropdown-user" href="javascript:void(0);"
                                                           data-toggle="dropdown" aria-haspopup="true"
                                                           aria-expanded="false">
                    <div class="user-nav d-sm-flex d-none"><span
                            class="user-name font-weight-bolder">{{auth()->check()?auth()->user()->name:''}}</span><span
                            class="user-status">{{auth()->check()?auth()->user()->role->role_name:''}}</span>
                    </div>
                    <span class="avatar"><img class="round"
                                              src="{{asset('admin/default_profile.png')}}"
                                              alt="avatar" height="40" width="40"><span
                            class="avatar-status-online"></span></span></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{url('admin/logout')}}">
                        <i class="mr-50" data-feather="power"></i>
                        {{__('button.logout')}}
                    </a>
                </div>
            </li>
        </ul>
    </div>
</nav>
<ul class="main-search-list-defaultlist d-none">
    <li class="d-flex align-items-center"><a href="javascript:void(0);">
            <h6 class="section-label mt-75 mb-0">Files</h6></a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100"
                                   href="app-file-manager.html">
            <div class="d-flex">
                <div class="mr-75"><img src="{{asset('admin/appassets/images/icons/xls.png')}}" alt="png" height="32">
                </div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Two new item submitted</p><small class="text-muted">Marketing
                        Manager</small>
                </div>
            </div>
            <small class="search-data-size mr-50 text-muted">&apos;17kb</small></a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100"
                                   href="app-file-manager.html">
            <div class="d-flex">
                <div class="mr-75"><img src="{{asset('admin/appassets/images/icons/jpg.png')}}" alt="png" height="32">
                </div>
                <div class="search-data">
                    <p class="search-data-title mb-0">52 JPG file Generated</p><small class="text-muted">FontEnd
                        Developer</small>
                </div>
            </div>
            <small class="search-data-size mr-50 text-muted">&apos;11kb</small></a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100"
                                   href="app-file-manager.html">
            <div class="d-flex">
                <div class="mr-75"><img src="{{asset('admin/appassets/images/icons/pdf.png')}}" alt="png" height="32">
                </div>
                <div class="search-data">
                    <p class="search-data-title mb-0">25 PDF File Uploaded</p><small class="text-muted">Digital
                        Marketing Manager</small>
                </div>
            </div>
            <small class="search-data-size mr-50 text-muted">&apos;150kb</small></a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100"
                                   href="app-file-manager.html">
            <div class="d-flex">
                <div class="mr-75"><img src="{{asset('admin/appassets/images/icons/doc.png')}}" alt="png" height="32">
                </div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Anna_Strong.doc</p><small class="text-muted">Web Designer</small>
                </div>
            </div>
            <small class="search-data-size mr-50 text-muted">&apos;256kb</small></a></li>
    <li class="d-flex align-items-center"><a href="javascript:void(0);">
            <h6 class="section-label mt-75 mb-0">Members</h6></a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100"
                                   href="app-user-view.html">
            <div class="d-flex align-items-center">
                <div class="avatar mr-75"><img src="{{asset('admin/appassets/images/portrait/small/avatar-s-8.jpg')}}"
                                               alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">John Doe</p><small class="text-muted">UI designer</small>
                </div>
            </div>
        </a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100"
                                   href="app-user-view.html">
            <div class="d-flex align-items-center">
                <div class="avatar mr-75"><img src="{{asset('admin/appassets/images/portrait/small/avatar-s-1.jpg')}}"
                                               alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Michal Clark</p><small class="text-muted">FontEnd
                        Developer</small>
                </div>
            </div>
        </a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100"
                                   href="app-user-view.html">
            <div class="d-flex align-items-center">
                <div class="avatar mr-75"><img src="{{asset('admin/appassets/images/portrait/small/avatar-s-14.jpg')}}"
                                               alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Milena Gibson</p><small class="text-muted">Digital Marketing
                        Manager</small>
                </div>
            </div>
        </a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100"
                                   href="app-user-view.html">
            <div class="d-flex align-items-center">
                <div class="avatar mr-75"><img src="{{asset('admin/appassets/images/portrait/small/avatar-s-6.jpg')}}"
                                               alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Anna Strong</p><small class="text-muted">Web Designer</small>
                </div>
            </div>
        </a></li>
</ul>
<ul class="main-search-list-defaultlist-other-list d-none">
    <li class="auto-suggestion justify-content-between"><a
            class="d-flex align-items-center justify-content-between w-100 py-50">
            <div class="d-flex justify-content-start"><span class="mr-75" data-feather="alert-circle"></span><span>No results found.</span>
            </div>
        </a></li>
</ul>
