<style>
.btn-xs {
  padding: .25rem .4rem;
  font-size: .875rem;
  line-height: .5;
  border-radius: .2rem;
}
</style>
<div class="row py-5">
    <div class="col-lg-12 col-md-12 mb-4 mb-xl-0 mb-lg-4">
        
            <x-forms.button-primary icon="plus" id="add-project-sow" class="type-btn mb-3">
                @lang('Add Vendors')
            </x-forms.button-primary>
              <x-cards.data :title="__('Vendors')"
                otherClasses="border-0 p-0 d-flex justify-content-between align-items-center table-responsive-sm">
                <x-table class="border-0 pb-3 admin-dash-table table-hover">
                    <x-slot name="thead">
                        <th class="pl-20">#</th>
                        <th>@lang('Vendor Name')</th>
                        <th>@lang('Link Sent By')</th>
                        <th>@lang('Sow')</th>
                        <th>@lang('Link Status')</th>
                        <th class="text-right pr-20">@lang('app.action')</th>
                    </x-slot>

                    @forelse($project->projectvendor as $key => $item)
                        <tr id="row-{{ $item->id }}">
                            <td class="pl-20">{{ $key + 1 }}</td>
                            <td>
                                <a href="javascript:;" class="sow-detail text-darkest-grey f-w-500"
                                    data-sow-id="{{ $item->id }}">{{ $item->vendor_name }}</a>
                            </td>
                            <td>
                                {{ $item->linksentby->name }}
                            </td>
                            <td>
                                @foreach($item->sow_id as $sow)
                                    {{ $item->sowname($sow) }}<br/>
                                @endforeach
                            </td>
                            <td>
                                {{$item->link_status}}
                            </td>
                            <td class="text-right pr-20">
                                <a href="javascript:;" class="text-dark toggle-contact-information" data-target="#contact-information-{{ $item->id }}" data-date="{{$item->id}}">
                                    <i class="fa fa-chevron-down"></i> @lang('Show More')
                                </a>
                            </td>
                        </tr>
                        <tr id="contact-information-{{ $item->id }}" class="contact-information-row d-none">
                            <td colspan="6">
                                <x-form id="updateProjectVendor-{{ $item->id }}" method="PUT">
                                    <div class="row justify-content-center border rounded mr-0 bg-additional-grey">
                                        <input type="hidden" name="project_id" value="{{ $project->id }}">
                                        <div class="col-md-3 col-lg-3">
                                            <x-forms.select fieldId="wo_status-{{ $item->id }}"
                                                :fieldLabel="__('Work Order Status')" fieldName="wo_status" search="true">
                                                @foreach ($projectStatus as $status)
                                                    <option
                                                    data-content="<i class='fa fa-circle mr-1 f-15' style='color:{{$status->color}}'></i>{{ $status->status_name }}"
                                                    @selected($item->wo_status == $status->status_name)
                                                    value="{{$status->status_name}}">
                                                    </option>
                                                @endforeach
                                            </x-forms.select>
                                        </div>
                                        <div class="col-lg-3">
                                            <x-forms.datepicker fieldId="inspection_date-{{ $item->id }}" custom="true"
                                                :fieldLabel="__('Inspection Date')" fieldName="inspection_date"
                                                :fieldValue="($item->inspection_date ? $item->inspection_date->format(company()->date_format) : '')"
                                                :fieldPlaceholder="__('placeholders.date')" />
                                        </div>
                                        <div class="col-md-3 col-lg-3">
                                            <div>
                                            <x-forms.text :fieldLabel="__('Inspection Time')"
                                                :fieldPlaceholder="__('placeholders.hours')" fieldName="inspection_time"
                                                fieldId="inspection_time-{{ $item->id }}" 
                                                :fieldValue="($item->inspection_time ? \Carbon\Carbon::createFromFormat('H:i:s', $item->inspection_time)->format(company()->time_format) : '')" />        
                                            </div>          
                                        </div>
                                        <div class="col-md-3 col-lg-3">
                                            <x-forms.datepicker fieldId="re_inspection_date-{{ $item->id }}" custom="true"
                                                :fieldLabel="__('Re-Inspection Date')" fieldName="re_inspection_date"
                                                :fieldValue="($item->re_inspection_date ? $item->re_inspection_date->format(company()->date_format) : '')"
                                                :fieldPlaceholder="__('placeholders.date')" />
                                        </div>
                                        <div class="col-md-3 col-lg-3">
                                            <div class="">
                                                <x-forms.text :fieldLabel="__('Re-inspection Time')"
                                                            :fieldPlaceholder="__('placeholders.hours')" fieldName="re_inspection_time"
                                                            fieldId="re_inspection_time-{{ $item->id }}" 
                                                            :fieldValue="($item->re_inspection_time ? \Carbon\Carbon::createFromFormat('H:i:s', $item->re_inspection_time)->format(company()->time_format) : '')" />
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-lg-3">
                                            <x-forms.datepicker fieldId="bid_ecd-{{ $item->id }}" custom="true"
                                                :fieldLabel="__('Bid Ecd Date')" fieldName="bid_ecd"
                                                :fieldValue="($item->bid_ecd ? $item->bid_ecd->format(company()->date_format) : '')"
                                                :fieldPlaceholder="__('placeholders.date')" />
                                        </div>
                                        <div class="col-md-3 col-lg-3">
                                            <x-forms.datepicker fieldId="bid_submitted_date-{{ $item->id }}" custom="true"
                                                :fieldLabel="__('Bid Submitted Date')" fieldName="bid_submitted_date"
                                                :fieldValue="($item->bid_submitted_date ? $item->bid_submitted_date->format(company()->date_format) : '')"
                                                :fieldPlaceholder="__('placeholders.date')" />
                                        </div>
                                        <div class="col-lg-3 col-md-3">
                                            <x-forms.text class="" :fieldLabel="__('Bid Amount')"
                                                        fieldName="bid_amount"  fieldId="bid_amount-{{ $item->id }}"
                                                        :fieldPlaceholder="__('Bid Amount')" :fieldValue="$item->bid_amount" />
                                        </div>
                                        <div class="col-md-3 col-lg-3">
                                            <x-forms.datepicker fieldId="bid_rejected_date-{{ $item->id }}" custom="true"
                                                :fieldLabel="__('Bid Rejected Date')" fieldName="bid_rejected_date"
                                                :fieldValue="($item->bid_rejected_date ? $item->bid_rejected_date->format(company()->date_format) : '')"
                                                :fieldPlaceholder="__('placeholders.date')" />
                                        </div>
                                        <div class="col-md-3 col-lg-3">
                                            <x-forms.datepicker fieldId="bid_approval_date-{{ $item->id }}" custom="true"
                                                :fieldLabel="__('Bid Approval Date')" fieldName="bid_approval_date"
                                                :fieldValue="($item->bid_approval_date ? $item->bid_approval_date->format(company()->date_format) : '')"
                                                :fieldPlaceholder="__('placeholders.date')" />
                                        </div>
                                        <div class="col-md-3 col-lg-3">
                                            <x-forms.datepicker fieldId="work_schedule_date-{{ $item->id }}" custom="true"
                                                :fieldLabel="__('Work Schedule Date')" fieldName="work_schedule_date"
                                                :fieldValue="($item->work_schedule_date ? $item->work_schedule_date->format(company()->date_format) : '')"
                                                :fieldPlaceholder="__('placeholders.date')" />
                                        </div>
                                        <div class="col-md-3 col-lg-3">
                                                    <div class="">
                                                        <x-forms.text :fieldLabel="__('Work Schedule Time')"
                                                            :fieldPlaceholder="__('placeholders.hours')" fieldName="work_schedule_time"
                                                            fieldId="work_schedule_time-{{ $item->id }}" 
                                                            :fieldValue="($item->work_schedule_time ? \Carbon\Carbon::createFromFormat('H:i:s', $item->work_schedule_time)->format(company()->time_format) : '')" />
                                                    </div>
                                        </div>
                                        <div class="col-md-3 col-lg-3">
                                            <x-forms.datepicker fieldId="work_schedule_re_date-{{ $item->id }}" custom="true"
                                                :fieldLabel="__('Work Re-Schedule Date')" fieldName="work_schedule_re_date"
                                                :fieldValue="($item->work_schedule_re_date ? $item->work_schedule_re_date->format(company()->date_format) : '')"
                                                :fieldPlaceholder="__('placeholders.date')" />
                                        </div>
                                        <div class="col-md-3 col-lg-3">
                                                    <div class="">
                                                        <x-forms.text :fieldLabel="__('Work Re-Schedule Time')"
                                                            :fieldPlaceholder="__('placeholders.hours')" fieldName="work_schedule_re_time"
                                                            fieldId="work_schedule_re_time-{{ $item->id }}" 
                                                            :fieldValue="($item->work_schedule_re_time ? \Carbon\Carbon::createFromFormat('H:i:s', $item->work_schedule_re_time)->format(company()->time_format) : '')" />
                                                    </div>
                                        </div>
                                        <div class="col-md-3 col-lg-3">
                                            <x-forms.datepicker fieldId="work_completion_date-{{ $item->id }}" custom="true"
                                                :fieldLabel="__('Work Completion Date')" fieldName="work_completion_date"
                                                :fieldValue="($item->work_completion_date ? $item->work_completion_date->format(company()->date_format) : '')"
                                                :fieldPlaceholder="__('placeholders.date')" />
                                        </div>
                                        <div class="col-md-3 col-lg-3">
                                            <x-forms.datepicker fieldId="work_ecd-{{ $item->id }}" custom="true"
                                                :fieldLabel="__('Work Completion Date')" fieldName="work_ecd"
                                                :fieldValue="($item->work_ecd ? $item->work_ecd->format(company()->date_format) : '')"
                                                :fieldPlaceholder="__('placeholders.date')" />
                                        </div>
                                        <div class="col-lg-3 col-md-3">
                                            <x-forms.text class="mr-0 mr-lg-2 mr-md-2" :fieldLabel="__('Bid Approved Amount')"
                                                        fieldName="bid_approved_amount"  fieldId="bid_approved_amount-{{ $item->id }}"
                                                        :fieldPlaceholder="__('Bid Approved Amount')" :fieldValue="$item->bid_approved_amount"/>
                                        </div>
                                        
                                    </div>
                                    <div class="row justify-content-end mr-2">
                                            <a class="btn btn-primary m-2 btn-xs edit-vpro" href="javascript:;"
                                                data-row-id="{{ $item->id }}">
                                                <i class="fa fa-edit mr-2"></i>
                                                @lang('Save')
                                            </a>
                                    </div>
                                    
                                </x-form>
                            </td>
                        </tr>            
                    @empty
                        <x-cards.no-record-found-list colspan="5"/>
                    @endforelse
                </x-table>

            </x-cards.data>
    </div>

</div>
<!-- ROW END -->

<script>

    $(document).ready(function() {
       
        var firstOpen = true;
        var time;
        
        const toggles = document.querySelectorAll('.toggle-contact-information');
        
        toggles.forEach(toggle => {
            toggle.addEventListener('click', function () {
                var id = $(this).data('date');
                $('#inspection_time-' + id + ', #re_inspection_time-' + id + ', #work_schedule_time-' + id + ', #work_schedule_re_time-' + id).datetimepicker({
                    @if (company()->time_format == 'H:i')
                        showMeridian: false,
                    @endif
                    useCurrent: false,
                    format: "hh:mm A"
                    }).on('dp.show', function() {
                    if(firstOpen) {
                        time = moment().startOf('day');
                        firstOpen = false;
                    } 
                    
                });
                $(this).find('svg').toggleClass('fa-chevron-down fa-chevron-up');
                const targetId = this.getAttribute('data-target');
                const targetElement = document.querySelector(targetId);
                
                if (targetElement) {
                    targetElement.classList.toggle('d-none');
                }
            });
        });
        $('.custom-date-picker').each(function(ind, el) {
            datepicker(el, {
                position: 'bl',
                ...datepickerConfig
            });
        });
        
        
    });
    
    $('#add-project-sow').click(function() {
        const url = "{{ route('projectvendors.create') }}" + "?id={{ $project->id }}";
        $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
        $.ajaxModal(MODAL_LG, url);

    });

    $('body').on('click', '.edit-vpro', function() {
        var id = $(this).data('row-id');
        var url = "{{ route('projectvendors.update', ':id') }}";
        url = url.replace(':id', id);
        var contain = '#updateProjectVendor-:id';
        contain = contain.replace(':id', id);
        $.easyAjax({
            url: url,
            container: contain,
            type: "POST",
            blockUI: true,
            disableButton: true,
            buttonSelector: '#save-sow-milestone',
            data: $(contain).serialize(),
            success: function(response) {
                if (response.status == 'success') {
                    window.location.reload();
                }
            }
        })

    });

    // $('body').on('click', '.sow-detail', function() {
    //     var id = $(this).data('sow-id');
    //     var url = "{{ route('sow.show', ':id') }}";
    //     url = url.replace(':id', id);
    //     $(MODAL_XL + ' ' + MODAL_HEADING).html('...');
    //     $.ajaxModal(MODAL_XL, url);
    // });

    $('.delete-row').click(function() {

        var id = $(this).data('row-id');
        var url = "{{ route('projectvendors.destroy', ':id') }}";
        url = url.replace(':id', id);

        var token = "{{ csrf_token() }}";

        Swal.fire({
            title: "@lang('messages.sweetAlertTitle')",
            text: "@lang('messages.recoverRecord')",
            icon: 'warning',
            showCancelButton: true,
            focusConfirm: false,
            confirmButtonText: "@lang('messages.confirmDelete')",
            cancelButtonText: "@lang('app.cancel')",
            customClass: {
                confirmButton: 'btn btn-primary mr-3',
                cancelButton: 'btn btn-secondary'
            },
            showClass: {
                popup: 'swal2-noanimation',
                backdrop: 'swal2-noanimation'
            },
            buttonsStyling: false
        }).then((result) => {
            if (result.isConfirmed) {
                $.easyAjax({
                    type: 'POST',
                    url: url,
                    data: {
                        '_token': token,
                        '_method': 'DELETE'
                    },
                    success: function(response) {
                        if (response.status == "success") {
                            $('#row-' + id).fadeOut();
                        }
                    }
                });
            }
        });

    });

</script>
