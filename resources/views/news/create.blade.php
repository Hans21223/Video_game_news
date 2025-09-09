<x-layouts.app-layout>
    <x-slot:title>เพิ่มข่าวใหม่</x-slot:title>

    <div class="container" style="max-width: 700px; margin: 40px auto; background-color: #1a1a1a; padding: 30px; border-radius: 8px; box-shadow: 0 0 20px rgba(0,0,0,0.5);">
        <h1 style="margin-bottom: 30px; text-align: center; font-size: 2rem; color: #fff;">เพิ่มข่าวใหม่</h1>

        @if ($errors->any())
            <div style="background-color: #b71c1c; color: #fff; padding: 15px; margin-bottom: 20px; border-radius: 6px;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('news.store') }}" method="POST">
            @csrf
            <div style="margin-bottom: 20px;">
                <label>หัวข้อข่าว</label>
                <input type="text" name="title" class="form-control" style="width: 100%; padding: 10px; border-radius: 6px; border: 1px solid #333; background: #121212; color: #e0e0e0;" value="{{ old('title') }}" required>
            </div>

            <div style="margin-bottom: 20px;">
                <label>รายละเอียด</label>
                <textarea name="content" class="form-control" style="width: 100%; padding: 10px; border-radius: 6px; border: 1px solid #333; background: #121212; color: #e0e0e0; min-height: 150px;" required>{{ old('content') }}</textarea>
            </div>

            <div style="margin-bottom: 20px;">
                <label>URL รูปภาพ</label>
                <input type="url" name="image_url" class="form-control" style="width: 100%; padding: 10px; border-radius: 6px; border: 1px solid #333; background: #121212; color: #e0e0e0;" value="{{ old('image_url') }}" required>
            </div>

            <div style="margin-bottom: 30px;">
                <label>วันที่เผยแพร่</label>
                <input type="datetime-local" name="published_at" class="form-control" style="width: 100%; padding: 10px; border-radius: 6px; border: 1px solid #333; background: #121212; color: #e0e0e0;" value="{{ old('published_at') }}" required>
            </div>

            <button type="submit" style="width: 100%; padding: 12px; background: #007bff; color: #fff; font-size: 1rem; font-weight: 700; border-radius: 6px; border: none; cursor: pointer; transition: background 0.3s;">
                บันทึกข่าว
            </button>
        </form>
    </div>
</x-layouts.app-layout>
