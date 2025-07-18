<a href="javascript:void(0)" onclick="basicAjaxRequest(this)"
   data-route="{{ url("$crud->route/$entry->id/publish") }}" class="btn btn-sm btn-link" data-button-type="publish">
    <span class="ladda-label"><i class="la {{$entry->is_published ? 'la-eye':'la-eye-slash'}}"></i></span>
</a>
