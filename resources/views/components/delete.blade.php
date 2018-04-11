<form action="{{ $action }}" method="post">
    @csrf
    @method('delete')

    <button class="btn btn-link" type="submit">
        <i class="text-danger fa fa-trash fa-lg"></i>
    </button>
</form>