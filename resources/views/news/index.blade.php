<x-layouts.app-layout>
    <x-slot:title>จัดการข่าว</x-slot:title>

    <div class="container">
        <a href="{{ route('news.create') }}" class="btn btn-primary">+ เพิ่มข่าวใหม่</a>

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>หัวข้อข่าว</th>
                    <th>เผยแพร่เมื่อ</th>
                    <th>การจัดการ</th>
                </tr>
            </thead>
            <tbody>
                @foreach($all_news as $item)
                <tr>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->published_at }}</td>
                    <td>
                        <a href="{{ route('news.edit', $item->id) }}" class="btn btn-warning btn-sm">แก้ไข</a>
                        <form action="{{ route('news.destroy', $item->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('ลบข่าวนี้หรือไม่?')">ลบ</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layouts.app-layout>
