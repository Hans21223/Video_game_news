<x-layouts.app-layout>
    <x-slot:title>เพิ่มข่าวใหม่</x-slot:title>

    <div class="container">
        <form action="{{ route('news.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>หัวข้อข่าว</label>
                <input type="text" name="title" class="form-control" required>
                @error('title') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label>รายละเอียด</label>
                <textarea name="content" class="form-control" required></textarea>
                @error('content') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label>URL รูปภาพ</label>
                <input type="url" name="image_url" class="form-control" required>
                @error('image_url') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label>วันที่เผยแพร่</label>
                <input type="datetime-local" name="published_at" class="form-control" required>
                @error('published_at') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <button type="submit" class="btn btn-success">บันทึก</button>
        </form>
    </div>
</x-layouts.app-layout>
