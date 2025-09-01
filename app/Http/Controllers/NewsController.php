<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * แสดงหน้ารวมข่าวทั้งหมด
     */
    public function index()
    {
        // ดึงข่าวล่าสุดมาแสดง 15 ข่าว (ปรับแก้ตัวเลขได้ตามต้องการ)
        $all_news = News::latest()->take(15)->get();
        return view('news.index', ['all_news' => $all_news]);
    }

    /**
     * แสดงรายละเอียดข่าว 1 ชิ้น
     */
    public function show($id)
    {
        $news = News::findOrFail($id);
        // ดึงข่าวอื่นๆ มา 4 ข่าว เพื่อแสดงใน sidebar
        $other_news = News::where('id', '!=', $id)->latest()->take(4)->get();

        return view('news.show', [
            'news' => $news,
            'other_news' => $other_news
        ]);
    }
}