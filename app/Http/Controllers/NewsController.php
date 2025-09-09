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
        $all_news = News::latest()->take(15)->get();
        return view('news.index', compact('all_news'));
    }

    /**
     * แสดงรายละเอียดข่าว 1 ชิ้น
     */
    public function show($id)
    {
        $news = News::findOrFail($id);
        $other_news = News::where('id', '!=', $id)->latest()->take(4)->get();

        return view('news.show', compact('news', 'other_news'));
    }

    /**
     * แสดงฟอร์มเพิ่มข่าวใหม่
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * บันทึกข่าวใหม่
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'        => 'required|string|max:255',
            'content'      => 'required|string',
            'image_url'    => 'required|url',
            'published_at' => 'required|date',
        ]);

        News::create($request->all());

        return redirect()->route('news.index')->with('success', 'เพิ่มข่าวสำเร็จ');
    }

    /**
     * แสดงฟอร์มแก้ไขข่าว
     */
    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('news.edit', compact('news'));
    }

    /**
     * อัปเดตข่าว
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'        => 'required|string|max:255',
            'content'      => 'required|string',
            'image_url'    => 'required|url',
            'published_at' => 'required|date',
        ]);

        $news = News::findOrFail($id);
        $news->update($request->all());

        return redirect()->route('news.index')->with('success', 'แก้ไขข่าวสำเร็จ');
    }

    /**
     * ลบข่าว
     */
    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();

        return redirect()->route('news.index')->with('success', 'ลบข่าวสำเร็จ');
    }
}
