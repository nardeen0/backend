<a href="javascript:void(0)" onclick="basicAjaxRequest(this)"
   data-route="{{ url("$crud->route/$entry->id/move?type=$moveType") }}" class="btn btn-sm btn-link" data-button-type="move">
    <span class="ladda-label"><i class="la la-arrow-{{$moveType}}"></i></span>
</a>
