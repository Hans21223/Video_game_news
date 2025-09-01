<x-layouts.app-layout>
    <x-slot:title>
        GAMENEWS - ข่าวสารวงการเกม อัปเดตล่าสุด
    </x-slot:title>

    {{-- แยกข้อมูลข่าวสำหรับแต่ละส่วน --}}
    @php
        $hero_news = $all_news->take(3);
        $main_news = $all_news->slice(3, 8);
        $sidebar_news = $all_news->slice(11, 4);
    @endphp

    {{-- Hero Section --}}
    <section class="hero-section container">
        @foreach($hero_news as $item)
        <a href="{{ route('news.detail', $item->id) }}" class="hero-card">
            
            <img src="{{ $item->image_url }}" alt="{{ $item->title }}">
            <div class="hero-content">
                <span class="hero-tag">GAME NEWS</span>
                <h2 class="hero-title">{{ $item->title }}</h2>
            </div>
        </a>
        @endforeach
    </section>

    {{-- Main Layout (Article List + Sidebar) --}}
    <div class="main-layout container">
        {{-- Main Content - Article List --}}
        <section class="article-list">
            @foreach($main_news as $item)
            <a href="{{ route('news.detail', $item->id) }}" class="article-list-item">
                <div class="article-list-img">
                    <img src="{{ $item->image_url }}" alt="{{ $item->title }}">
                </div>
                <div class="article-list-content">
                    <div class="article-list-tag">GAME GUIDES & MORE</div>
                    <h3 class="article-list-title">{{ $item->title }}</h3>
                    <div class="article-list-meta">
                        เผยแพร่เมื่อ {{ \Carbon\Carbon::parse($item->published_at)->diffForHumans() }}
                    </div>
                </div>
            </a>
            @endforeach
        </section>

        {{-- Sidebar --}}
        <aside class="sidebar">
            <div class="sidebar-widget">
                <h4 class="sidebar-title">TOP NEW RELEASES</h4>
                @foreach($sidebar_news as $item)
                <a href="{{ route('news.detail', $item->id) }}" class="sidebar-item">
                    <img src="{{ $item->image_url }}" alt="{{ $item->title }}">
                    <div class="sidebar-item-content">
                        <h5 class="sidebar-item-title">{{ $item->title }}</h5>
                    </div>
                </a>
                @endforeach
            </div>
        </aside>
    </div>

</x-layouts.app-layout>