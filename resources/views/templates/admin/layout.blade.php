<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">

    @include('templates.admin.partials.header_base')

    <!-- begin::Body -->
    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

        @include('templates.admin.partials.aside_left')

        <div class="m-grid__item m-grid__item--fluid m-wrapper">

            @include('templates.admin.partials.subheader_default')

            <div class="m-content">
                @include('templates.admin.partials.alerts')
                @yield('content')
            </div>
        </div>
    </div>

    <!-- end:: Body -->

    @include('templates.admin.partials.footer_default')
</div>

<!-- end:: Page -->

{{-- @include('templates.admin.partials.layout_quick_sidebar') --}}

@include('templates.admin.partials.layout_scroll_top')
