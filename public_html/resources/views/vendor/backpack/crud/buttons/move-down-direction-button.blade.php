@php
    $lastOrderNumber = \App\Models\Direction::getLastOrderNumber();
@endphp
@if(isset($lastOrderNumber) && $entry->order < $lastOrderNumber)
    @include('vendor.backpack.crud.buttons.base-move-order-direction-button', ['moveType' => 'down'])
@endif
