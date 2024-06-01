@extends('layouts.app')

@section('content')
<div class="content-wrapper">
<div class="d-flex flex-column w-tables rounded mt-4 bg-white">
    <div id="chartContainer"></div>
</div>
</div>
@endsection

@section('filter-section')

    <div class="d-flex filter-box project-header bg-white border-bottom">

        <div class="mobile-close-overlay w-100 h-100" id="close-client-overlay"></div>
        <div class="project-menu d-lg-flex" id="mob-client-detail">
            <a class="d-none close-it" href="javascript:;" id="close-client-detail">
                <i class="fa fa-times"></i>
            </a>
            <x-tab :href="route('lead-report.index'). '?tab=profile'" :text="__('modules.deal.profile')" class="profile" />
            <x-tab :href="route('lead-report.chart'). '?tab=chart'" :text="__('modules.leadContact.leadReport')" class="chart"  />


        </div>
    </div>

<x-filters.filter-box>
    <!-- DATE START -->
    <div class="select-box d-flex py-2 px-lg-2 px-md-2 px-0 border-right-grey border-right-grey-sm-0">
        <p class="mb-0 pr-2 f-14 text-dark-grey d-flex align-items-center">@lang('modules.deal.pipeline')</p>
        <div class="select-year">
            <select class="form-control select-picker" name="pipeline" id="pipeline" data-live-search="true" data-size="8">
                @foreach($pipelines as $pipeline)
                    <option value="{{ $pipeline->id }}" @if($pipeline->default == 1) selected @endif>{{ $pipeline->name }}</option>
                @endforeach
                </select>

        </div>


    </div>

    <div class="select-box d-flex py-2 px-lg-2 px-md-2 px-0 border-right-grey border-right-grey-sm-0">
        <p class="mb-0 pr-2 f-14 text-dark-grey d-flex align-items-center">@lang('app.year')</p>
        <div class="select-status">
            <select class="form-control select-picker" name="year" id="year" data-live-search="true" data-size="8">
    @foreach($years as $year)
        <option value="{{ $year }}">{{ $year }}</option>
    @endforeach
            </select>
        </div>
    </div>



</x-filters.filter-box>



@endsection


@push('scripts')
<script>
    $(document).ready(function() {

        $('.project-menu a').on('click', function() {

            $(this).addClass('active-tab');
        });
    });
</script>
<script src="{{ asset('vendor/graph/frappechart.js') }}"></script>
<script>

     var currencyCode = "{{ company()->currency->currency_code }}"

     const activeTab = "{{ $activeTab }}";
        $('.project-menu .' + activeTab).addClass('active');

    $(document).ready(function() {

    var datasetsData = @json($datasets);
    chart(datasetsData);

    function chart(datasetsData)
    {

        var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];


        var datasets = [];

        const chart = new frappe.Chart("#chartContainer", {
            data: {
                labels: monthNames,
                datasets: datasetsData.map(function(dataset) {
                    return {
                        name: dataset.name.substr(0, 12),
                        values: dataset.values,
                        chartType: dataset.chartType,
                        color: dataset.color || '#d4f542'
                    };
                })
            },
            title: "Monthly Values by Stage",
            type: "axis-mixed",
            height: 300,

                    axisOptions: {
                        yAxisMode: 'tick',
                        xAxisMode: 'tick',
                        xIsSeries: 0
                    },
            barOptions: {
                stacked: true,
                spaceRatio: 0.5
            },
            tooltipOptions: {
                formatTooltipX: (d) => (d + "").toUpperCase(),
                formatTooltipY: (d) => d+' '+currencyCode
            }
        });

    }


            $('#pipeline, #year').on('change', function() {
                var year = $('#year').val();
                var pipeline = $('#pipeline').val();

                $.easyAjax({
                    url: "{{ route('lead-report.chart') }}",
                    type: "GET",
                    data: {
                        year: year,
                        pipeline: pipeline
                    },
                    success: function(response) {
                        chart(response.datasets);
                    },
                });
            });
        });



</script>
@endpush

