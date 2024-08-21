<a href="{{ route('exportFileMau') }}">
    Tải file mẫu
</a>



<form action="{{ route('importExcelFile') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file">
    @error('file')
        <p>{{ $message }}</p>
    @enderror
    <button>Import</button>
</form>


<a href="{{ route('exportFileUser') }}">
    Export User
</a>
