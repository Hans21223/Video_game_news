<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'GAMENEWS' }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@400;500;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --bg-dark: #121212; --bg-primary: #1a1a1a; --border-color: #333;
            --text-primary: #e0e0e0; --text-secondary: #a0a0a0; --accent-color: #007bff;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { 
            font-family: 'Sarabun', sans-serif; 
            background-color: var(--bg-dark); 
            color: var(--text-primary);
            /* --- UPDATE: เพิ่ม Padding เพื่อไม่ให้เนื้อหาถูก Header และ Footer บัง --- */
            padding-top: 73px; /* ความสูงของ Header */
            padding-bottom: 73px; /* ความสูงของ Footer */
        }
        .container { max-width: 1280px; margin: 0 auto; padding: 0 24px; }
        a { text-decoration: none; color: inherit; }
        img { max-width: 100%; height: auto; display: block; }
        h1, h2, h3, h4 { font-weight: 700; }

        /* --- UPDATE: Header ให้ลอยตามหน้าจอ --- */
        .site-header { 
            padding: 20px 0; 
            border-bottom: 1px solid var(--border-color);
            background-color: var(--bg-primary);
            /* --- Code ที่เพิ่มเข้ามา --- */
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
        }
        .header-content { display: flex; justify-content: space-between; align-items: center; }
        .logo { font-size: 2rem; font-weight: 700; letter-spacing: 1px; }
        .menu-icon svg { width: 32px; height: 32px; cursor: pointer; }

        /* --- Hero Section --- */
        .hero-section { display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 20px; padding: 40px 0; }
        .hero-card { position: relative; height: 350px; border-radius: 8px; overflow: hidden; }
        .hero-card img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.4s ease; }
        .hero-card:hover img { transform: scale(1.05); }
        .hero-content { position: absolute; bottom: 0; left: 0; right: 0; padding: 24px; background: linear-gradient(to top, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0) 100%); }
        .hero-tag { background: var(--accent-color); color: #fff; padding: 4px 10px; font-size: 0.75rem; font-weight: 700; border-radius: 4px; display: inline-block; margin-bottom: 10px; }
        .hero-title { font-size: 1.5rem; line-height: 1.3; color: #fff; text-shadow: 1px 1px 3px rgba(0,0,0,0.7); }

        /* --- Main Layout --- */
        .main-layout { display: grid; grid-template-columns: 1fr; gap: 40px; }
        @media (min-width: 992px) { .main-layout { grid-template-columns: 2fr 1fr; } }
        
        /* --- Article List & Sidebar (ไม่มีการเปลี่ยนแปลง) --- */
        .article-list-item { display: grid; grid-template-columns: 1fr 2fr; gap: 20px; align-items: center; border-bottom: 1px solid var(--border-color); padding-bottom: 20px; margin-bottom: 20px; }
        .article-list-item:last-child { border-bottom: 0; }
        .article-list-img img { border-radius: 6px; }
        .article-list-tag { color: var(--accent-color); font-size: 0.8rem; font-weight: 700; margin-bottom: 5px; }
        .article-list-title { font-size: 1.25rem; margin-bottom: 5px; }
        .article-list-meta { font-size: 0.85rem; color: var(--text-secondary); }
        .sidebar-widget { background: var(--bg-primary); padding: 24px; border-radius: 8px; }
        .sidebar-title { font-size: 1.2rem; margin-bottom: 20px; border-left: 3px solid var(--accent-color); padding-left: 10px; }
        .sidebar-item { display: flex; align-items: center; gap: 15px; margin-bottom: 15px; }
        .sidebar-item img { width: 80px; height: 60px; object-fit: cover; border-radius: 4px; }
        .sidebar-item-title { font-size: 0.95rem; line-height: 1.4; }
        
        /* --- Detail Page (ไม่มีการเปลี่ยนแปลง) --- */
        .article-container { max-width: 800px; margin: 40px auto; background-color: var(--bg-primary); padding: 40px; border-radius: 8px; }
        .article-header h1 { font-size: 2.5rem; }
        .article-header .meta { color: var(--text-secondary); margin: 15px 0 30px; }
        .article-image { border-radius: 8px; overflow: hidden; margin-bottom: 30px; }
        .article-content { font-size: 1.1rem; line-height: 1.8; }

        /* --- NEW: Footer --- */
        .site-footer {
            padding: 20px 0;
            background-color: var(--bg-primary);
            border-top: 1px solid var(--border-color);
            text-align: center;
            color: var(--text-secondary);
            /* --- Code ที่เพิ่มเข้ามา --- */
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
        }

    </style>
</head>
<body>
    <header class="site-header">
        <div class="container header-content">
            <div class="logo">GAMENEWS</div>
            <div class="menu-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
            </div>
        </div>
    </header>

    <main>
        {{ $slot }}
    </main>
    
    <footer class="site-footer">
        <div class="container">
            <p>&copy; 2025 GAMENEWS - All Rights Reserved</p>
        </div>
    </footer>

</body>
</html>