<div class=" d-flex flex-col">
        <div class="col-sm border-right-grey">
            <div class="row border-bottom-grey">
                <div class="col">
                    <h5 class="f-15 f-w-500 text-darkest-grey mb-0 py-2">Project Details</h5>
                </div>
            </div>
            <div class="row border-bottom-grey">
                <div class="col">
                     Work Order # - {{$project->project_short_code ?? ''}}
                </div>
                <div class="col border-left-grey">
                     Project Status - {{$project->status ?? ''}} 
                </div>
            </div>
            <div class="row border-bottom-grey">
                <div class="col">
                     Project Type - {{$project->type ?? ''}}
                </div>
                <div class="col border-left-grey">
                     Client Name - {{$project->client?->name_salutation ?? ''}} 
                </div>
            </div>
            <div class="row border-bottom-grey">
                <div class="col">
                     Priority - {{$project->priority ?? ''}}
                </div>
                <div class="col border-left-grey">
                     Project Date - {{$project->start_date?->format(company()->date_format)}} 
                </div>
            </div>
            <div class="row border-bottom-grey">
                <div class="col">
                    Project Category - {{$project->category->category_name ?? ''}}
                </div>
                <div class="col border-left-grey">
                    Due Date - {{$project->deadline?->format(company()->date_format)}} 
                </div>
            </div>
            <div class="row border-bottom-grey">
                <div class="col">
                    Project SubCategory - {{$project->sub_category ?? ''}}
                </div>
                <div class="col border-left-grey">
                    Not To Exceed - {{$project->nte}} 
                </div>
            </div>
        </div>
        <div class="col-sm border-right-grey">
            <div class="row border-bottom-grey">
                <div class="col">
                    <h5 class="f-15 f-w-500 text-darkest-grey mb-0 py-2">Property Information</h5>
                </div>
            </div>
            <div class="row border-bottom-grey">
                <div class="col">
                        Property Address - {{$project->propertyDetails->property_address ?? ''}} - {{$project->propertyDetails->optional ?? ''}}
                </div>
                <div class="col border-left-grey">
                        Property Type - {{$project->property_type ?? ''}} 
                </div>
            </div>
            <div class="row border-bottom-grey">
                <div class="col">
                        City - {{$project->propertyDetails->city ?? ''}}
                </div>
                <div class="col border-left-grey">
                        Bed - {{$project->propertyDetails->bedrooms ?? ''}} 
                </div>
            </div>
            <div class="row border-bottom-grey">
                <div class="col">
                        State - {{$project->propertyDetails->state ?? ''}}
                </div>
                <div class="col border-left-grey">
                        Bath - {{$project->propertyDetails->bathrooms ?? ''}} 
                </div>
            </div>
            <div class="row border-bottom-grey">
                <div class="col">
                        County - {{$project->propertyDetails->county ?? ''}}
                </div>
                <div class="col border-left-grey">
                        House Size - {{$project->propertyDetails->house_size ?? ''}} 
                </div>
            </div>
            <div class="row border-bottom-grey">
                <div class="col">
                        Occupied - {{$project->propertyDetails->occupancy_status ?? ''}}
                </div>
                <div class="col border-left-grey">
                        Lock Box Code - {{$project->propertyDetails->lockboxcode ?? ''}} 
                </div>
            </div>
        </div>
        <div class="col-sm">
            <div class="row border-bottom-grey">
                <div class="col">
                    <h5 class="f-15 f-w-500 text-darkest-grey mb-0 py-2">Contact Information</h5>
                </div>
            </div>
        </div>
    </div>