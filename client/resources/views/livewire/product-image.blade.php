<div>
    {{-- Success is as dangerous as failure. --}}
    <form wire:submit.prevent="upload_image" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image" required wire:model="request">
        <button type="submit">Upload</button>
    </form>
</div>
