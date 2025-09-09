<x-layouts.app-layout>
    <x-slot:title>{{ $news->title }}</x-slot:title>

    <div class="container" style="max-width: 900px; margin: 40px auto;">
        <article class="article-container" style="background-color: #1a1a1a; padding: 30px; border-radius: 8px; box-shadow: 0 0 20px rgba(0,0,0,0.5);">
            
            <header class="article-header" style="margin-bottom: 30px;">
                <a href="{{ route('news.index') }}" 
                   style="display:inline-block; margin-bottom: 15px; color:#007bff; font-weight: 500; text-decoration:none;"
                   onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">
                   &larr; กลับไปหน้ารวมข่าว
                </a>
                <h1 style="font-size: 2rem; margin-bottom: 10px; color:#fff;">{{ $news->title }}</h1>
                <p class="meta" style="color: #aaa; font-size: 0.9rem;">
                    เผยแพร่เมื่อ: {{ \Carbon\Carbon::parse($news->published_at)->format('d F Y H:i') }}
                </p>
            </header>

            <div class="article-image" style="margin-bottom: 30px; overflow: hidden; border-radius: 8px;">
                <img src="{{ $news->image_url }}" alt="ภาพประกอบข่าว {{ $news->title }}" style="width: 100%; object-fit: cover;">
            </div>

            <div class="article-content" style="font-size: 1.1rem; line-height: 1.8; color: #e0e0e0; margin-bottom: 30px;">
                {!! nl2br(e($news->content)) !!}
            </div>

            @if($news->source_url)
                <a href="{{ $news->source_url }}" target="_blank" 
                   style="display:inline-block; padding: 10px 20px; background-color: #007bff; color: #fff; border-radius: 6px; font-weight: 700; text-decoration:none;"
                   onmouseover="this.style.backgroundColor='#0056b3'" onmouseout="this.style.backgroundColor='#007bff'">
                   อ่านข่าวต้นฉบับ &rarr;
                </a>
            @endif
        </article>
    </div>
</x-layouts.app-layout>
