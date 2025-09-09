<x-layouts.app-layout>
    <x-slot:title>แก้ไขข่าว</x-slot:title>

    <div class="container">
        <form action="{{ route('news.update', $news->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>หัวข้อข่าว</label>
                <input type="text" name="title" class="form-control" value="{{ $news->title }}" required>
            </div>

            <div class="form-group">
                <label>รายละเอียด</label>
                <textarea name="content" class="form-control" required>{{ $news->content }}</textarea>
            </div>

            <div class="form-group">
                <label>URL รูปภาพ</label>
                <input type="url" name="image_url" class="form-control" value="{{ $news->image_url }}" required>
            </div>

            <div class="form-group">
                <label>วันที่เผยแพร่</label>
                <input type="datetime-local" name="published_at" class="form-control" value="{{ $news->published_at->format('Y-m-d\TH:i') }}" required>
            </div>

            <button type="submit" class="btn btn-primary">อัปเดต</button>
        </form>
    </div>
</x-layouts.app-layout>