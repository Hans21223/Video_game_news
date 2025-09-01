<x-layouts.app-layout>
    <x-slot:title>
        {{ $news->title }}
    </x-slot:title>

    <article class="article-container">
        <header class="article-header">
            <a href="{{ route('news.index') }}" class="back-link">&larr; กลับไปหน้ารวมข่าว</a>
            <h1>{{ $news->title }}</h1>
            <p class="meta">เผยแพร่เมื่อ: {{ \Carbon\Carbon::parse($news->published_at)->format('d F Y') }}</p>
        </header>

        <div class="article-image">

            <img src="{{ $news->image_url }}" alt="ภาพประกอบข่าว {{ $news->title }}">
        </div>

        <div class="article-content">
            {!! nl2br(e($news->content)) !!}
        </div>
        
        <a href="{{ $news->source_url }}" target="_blank" class="back-link">
            &larr; อ่านข่าวต้นฉบับ
        </a>

    </article>

</x-layouts.app-layout>