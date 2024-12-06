<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12">
        @include('components.readonly-form-foto')
        @include('components.readonly-form-waktu')
        @include('components.readonly-form-kronologi')
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12">
        @include('components.readonly-form-korban')
        <div class="d-flex justify-content-end gap-1">

            @if (auth()->user()->role == 'hse')
                @include('components.btn-document')
                @if ($notification->hse_name == null)
                    <div class="text-end">
                        @include('components.btn-approve')
                    </div>
                @endif
            @endif
            @if (auth()->user()->role == 'admin')
                @include('components.btn-document')
                @if ($notification->admin_name == null)
                    <div class="text-end">
                        @include('components.btn-approve')
                    </div>
                @endif
            @endif
        </div>
    </div>
</div>
