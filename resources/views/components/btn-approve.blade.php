@if (auth()->user()->role != 'hse')
    <input type="radio" class="btn-check" name="status" id="success-outlined" autocomplete="off" value="1">
    <label class="btn btn-outline-success" for="success-outlined"> <i class="fas fa-check-circle "></i></label>
@endif


<input type="radio" class="btn-check" name="status" id="danger-outlined" autocomplete="off" value="0">
<label class="btn btn-outline-danger" for="danger-outlined"> <i class="fas fa-circle-xmark "></i>
</label>

@if (auth()->user()->role != 'admin')
    <input type="radio" class="btn-check" name="status" id="warning-outlined" autocomplete="off" value="2">
    <label class="btn btn-outline-warning" for="warning-outlined"><i class="fas fa-clipboard-list "></i></label>
@endif

<button type="submit" class="btn btn-primary ">Send</button>
<a href="{{ route('hse.followup.detail', $notification->id) }}" class="btn btn-primary">Next</a>

@push('script')
    <script>
        $(document).ready(function() {
            // Hide the "Next" button initially
            $('.btn.btn-primary:contains("Next")').hide();

            // Add event listener to radio buttons
            $('input[name="status"]').on('change', function() {
                if ($('#warning-outlined').is(':checked')) {
                    // Show the "Next" button and hide the "Send" button
                    $('.btn.btn-primary:contains("Next")').show();
                    $('.btn.btn-primary:contains("Send")').hide();
                } else {
                    // Show the "Send" button and hide the "Next" button
                    $('.btn.btn-primary:contains("Send")').show();
                    $('.btn.btn-primary:contains("Next")').hide();
                }
            });
        });
    </script>
@endpush
