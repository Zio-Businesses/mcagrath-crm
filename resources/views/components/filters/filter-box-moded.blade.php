<div class="filter-box">
    <!-- FILTER START -->
    <form action="" id="filter-form">
        <div
            {{ $attributes->merge(['class' => 'd-lg-flex d-md-flex d-block flex-wrap filter-box bg-white client-list-filter justify-content-center']) }}>
            {{ $slot }}
        </div>
    </form>

</div>
