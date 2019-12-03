<!-- BEGIN: Topbar -->
<div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
    <div class="m-stack__item m-topbar__nav-wrapper">
        <ul class="m-topbar__nav m-nav m-nav--inline">
            @include('templates.admin.partials.topbar_search_dropdown')

            @include('templates.admin.partials.topbar_notifications')

            @include('templates.admin.partials.topbar_quick_actions')

            <li class="m-nav__item m-topbar__languages m-dropdown m-dropdown--small m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-right m-dropdown--mobile-full-width" m-dropdown-toggle="click" aria-expanded="true">
	<a href="#" class="m-nav__link m-dropdown__toggle">
		<span class="m-nav__link-text">
			<img class="m-topbar__language-selected-img"id='changed-flag' src="../assets/app/media/img/flags/020-flag.svg">	
		</span>
	</a>
	<div class="m-dropdown__wrapper" style="z-index: 101;">
		<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust" style="left: auto; right: 5px;"></span>
		<div class="m-dropdown__inner">
			<div class="m-dropdown__header m--align-center" style="background: url(../assets/app/media/img/misc/quick_actions_bg.jpg); background-size: cover;">
				<span class="m-dropdown__header-subtitle">Select your language</span>
			</div>
			<div class="m-dropdown__body">
				<div class="m-dropdown__content">
					<ul class="m-nav m-nav--skin-light">
						<li class="change-language m-nav__item m-nav__item--active">
							<a href="#" class="m-nav__link m-nav__link--active" id = "link">
								<span class="m-nav__link-icon" id='020-flag.svg'><img class="m-topbar__language-img"id='020-flag.svg' src="../assets/media/img/flags/020-flag.svg"></span>
								<span class="m-nav__link-title m-topbar__language-text m-nav__link-text" id='020-flag.svg'>English</span>
							</a> 
						</li>
						<li class="change-language m-nav__item">
							<a href="#" class="m-nav__link">
								<span class="m-nav__link-icon" id='008-saudi-arabia.svg'><img class="m-topbar__language-img" id='008-saudi-arabia.svg' src="../assets/media/img/flags/008-saudi-arabia.svg"></span>
								<span class="m-nav__link-title m-topbar__language-text m-nav__link-text" id='008-saudi-arabia.svg'>Arabic</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</li>

            @include('templates.admin.partials.topbar_user_profile')

            <li id="m_quick_sidebar_toggle" class="m-nav__item">
                <a href="#" class="m-nav__link m-dropdown__toggle">
                    <span class="m-nav__link-icon"><i class="flaticon-grid-menu"></i></span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- END: Topbar -->
