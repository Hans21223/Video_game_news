<x-layouts.app-layout>
    <x-slot:title>จัดการข่าว</x-slot:title>

    <div class="container" style="margin: 40px auto; max-width: 1000px;">

        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h1 style="color: #fff;">จัดการข่าว</h1>
            <a href="{{ route('news.create') }}" 
               style="padding: 10px 20px; background-color: #007bff; color: #fff; border-radius: 6px; text-decoration: none; font-weight: 700; transition: background 0.3s;"
               onmouseover="this.style.backgroundColor='#0056b3'" onmouseout="this.style.backgroundColor='#007bff'">
               + เพิ่มข่าวใหม่
            </a>
        </div>

        <div style="overflow-x:auto; background-color: #1a1a1a; padding: 20px; border-radius: 8px; box-shadow: 0 0 20px rgba(0,0,0,0.5);">
            <table style="width: 100%; border-collapse: collapse; color: #e0e0e0;">
                <thead>
                    <tr style="border-bottom: 2px solid #333;">
                        <th style="padding: 12px; text-align: left;">หัวข้อข่าว</th>
                        <th style="padding: 12px; text-align: left;">เผยแพร่เมื่อ</th>
                        <th style="padding: 12px; text-align: left;">การจัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($all_news as $item)
                        <tr style="border-bottom: 1px solid #333;">
                            <td style="padding: 12px;">{{ $item->title }}</td>
                            <td style="padding: 12px;">{{ \Carbon\Carbon::parse($item->published_at)->format('d M Y H:i') }}</td>
                            <td style="padding: 12px;">
                                <a href="{{ route('news.edit', $item->id) }}" 
                                   style="padding: 6px 12px; background-color: #ffc107; color: #000; border-radius: 4px; font-size: 0.9rem; text-decoration: none; margin-right: 5px;">
                                   แก้ไข
                                </a>
                                <form action="{{ route('news.destroy', $item->id) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button style="padding: 6px 12px; background-color: #dc3545; color: #fff; border-radius: 4px; border: none; font-size: 0.9rem; cursor: pointer;"
                                            onclick="return confirm('ลบข่าวนี้หรือไม่?')">
                                        ลบ
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    @if($all_news->isEmpty())
                        <tr>
                            <td colspan="3" style="padding: 12px; text-align: center; color: #aaa;">
                                ยังไม่มีข่าว
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.app-layout>
