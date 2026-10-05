<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>المحكمة الشرعية — غزة</title>
    <!-- FontAwesome للأيقونات -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- خطوط عربية مطابقة للتصميم -->
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400&family=Cairo:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-navy: #1B365D;      /* الأزرق الكحلي الداكن */
            --accent-gold: #C5A059;       /* اللون الذهبي */
            --bg-page: #FBF9F5;           /* خلفية الصفحة */
            --text-dark: #2B2B2B;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Cairo', sans-serif;
            scroll-behavior: smooth;
        }

        body {
            background-color: var(--bg-page);
            color: var(--text-dark);
            overflow-x: hidden;
        }

        /* 1. الشريط العلوي */
        .top-bar {
            background-color: #0F1C2E;
            color: #FFFFFF;
            padding: 6px 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 13px;
            font-weight: 600;
        }

        .top-bar-right {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .top-bar-left {
            font-size: 11px;
            letter-spacing: 0.5px;
            color: #A0B2C6;
            font-family: sans-serif;
        }

        /* 2. الهيدر الرئيسي */
        .main-header {
            background-color: #FFFFFF;
            padding: 12px 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1.5px solid var(--accent-gold);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .logo-box {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
        }

        .logo-img {
            height: 52px;
            width: auto;
            object-fit: contain;
        }

        .logo-text {
            display: flex;
            flex-direction: column;
        }

        .logo-text h2 {
            color: var(--primary-navy);
            font-size: 18px;
            font-weight: 800;
            line-height: 1.2;
        }

        .logo-text span {
            color: var(--accent-gold);
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 0.5px;
            font-family: sans-serif;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 30px;
            align-items: center;
        }

        .nav-menu a {
            text-decoration: none;
            color: #4A5568;
            font-weight: 700;
            font-size: 16px;
            transition: all 0.2s ease;
        }

        .nav-menu a:hover {
            color: var(--accent-gold);
        }

        .btn-inquiry-box {
            background-color: var(--primary-navy);
            color: #FFFFFF !important;
            padding: 10px 30px;
            font-weight: 800;
            font-size: 16px;
            border-radius: 0px;
            display: inline-block;
        }

        /* 3. القسم الرئيسي (Hero Section) */
        .hero-container {
            display: flex;
            padding: 60px 5% 80px 5%;
            gap: 50px;
            align-items: center;
            justify-content: space-between;
            max-width: 1400px;
            margin: 0 auto;
        }

        .hero-right {
            flex: 1.1;
        }

        .subtitle-line {
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--accent-gold);
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .subtitle-line::before, .subtitle-line::after {
            content: "";
            height: 1px;
            width: 30px;
            background-color: var(--accent-gold);
        }

        .main-title {
            color: var(--primary-navy);
            font-family: 'Amiri', serif;
            font-size: 64px;
            font-weight: 700;
            line-height: 1.1;
            margin-bottom: 5px;
        }

        .sub-main-title {
            color: var(--accent-gold);
            font-family: 'Amiri', serif;
            font-size: 42px;
            font-weight: 400;
            margin-bottom: 25px;
        }

        .hero-description {
            color: #555555;
            font-size: 17px;
            line-height: 1.8;
            margin-bottom: 35px;
            max-width: 580px;
        }

        .action-btns {
            display: flex;
            gap: 15px;
        }

        .btn-navy {
            background-color: var(--primary-navy);
            color: #FFFFFF;
            padding: 12px 35px;
            text-decoration: none;
            font-weight: 700;
            font-size: 16px;
            border: 1px solid var(--primary-navy);
        }

        .btn-outline-gray {
            background-color: transparent;
            color: var(--primary-navy);
            padding: 12px 35px;
            text-decoration: none;
            font-weight: 700;
            font-size: 16px;
            border: 1px solid #CCCCCC;
        }

        .hero-left {
            flex: 0.9;
        }

        .quote-box {
            background-color: var(--primary-navy);
            color: #FFFFFF;
            padding: 45px 40px;
            position: relative;
            box-shadow: 0 10px 25px rgba(0,0,0,0.08);
        }

        .quote-mark {
            position: absolute;
            top: 15px;
            left: 20px;
            font-size: 40px;
            color: rgba(255,255,255,0.15);
            font-family: serif;
        }

        .quote-text {
            font-family: 'Amiri', serif;
            font-size: 26px;
            line-height: 1.8;
            margin-bottom: 40px;
            font-weight: 400;
        }

        .quote-divider {
            width: 100%;
            height: 1px;
            background-color: rgba(255,255,255,0.15);
            margin-bottom: 20px;
        }

        .author-title {
            color: var(--accent-gold);
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 4px;
        }

        .author-sub {
            color: #A0B2C6;
            font-size: 13px;
        }

        /* 4. قسم نبذة عن المحكمة الشرعية */
        .about-section {
            border-top: 1px solid rgba(197, 160, 89, 0.25);
            padding: 80px 5%;
            max-width: 1400px;
            margin: 0 auto;
        }

        .about-container {
            display: flex;
            gap: 60px;
            align-items: flex-start;
        }

        .about-content {
            flex: 1.1;
        }

        .about-image-box {
            flex: 1;
        }

        .about-image-box img {
            width: 100%;
            height: 480px;
            object-fit: cover;
            filter: grayscale(100%);
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
        }

        .section-tag {
            color: var(--accent-gold);
            font-size: 11px;
            letter-spacing: 2px;
            text-transform: uppercase;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .about-title {
            color: var(--primary-navy);
            font-family: 'Amiri', serif;
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 25px;
        }

        .about-text {
            color: #555;
            font-size: 16px;
            line-height: 1.8;
            margin-bottom: 20px;
        }

        .about-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-top: 35px;
        }

        .info-card {
            background-color: #F4F0E8;
            padding: 20px 25px;
        }

        .info-card-title {
            color: var(--accent-gold);
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .info-card-desc {
            color: var(--primary-navy);
            font-size: 15px;
            font-weight: 600;
            line-height: 1.5;
        }

        /* 5. قسم الإنجازات بالأرقام */
        .stats-section {
            background-color: #172B4D;
            color: #FFFFFF;
            padding: 70px 5%;
            text-align: center;
        }

        .stats-header {
            margin-bottom: 50px;
        }

        .stats-tag {
            color: var(--accent-gold);
            font-size: 11px;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .stats-title {
            font-family: 'Amiri', serif;
            font-size: 44px;
            font-weight: 700;
            color: #FFFFFF;
        }

        .stats-container {
            display: flex;
            justify-content: center;
            align-items: center;
            max-width: 1000px;
            margin: 0 auto;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 40px;
            width: 100%;
        }

        .stat-item {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .stat-number-box {
            font-family: 'Amiri', serif;
            font-size: 46px;
            font-weight: 700;
            color: var(--accent-gold);
            line-height: 1.2;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .stat-label {
            font-size: 15px;
            font-weight: 700;
            color: #FFFFFF;
            margin-bottom: 4px;
        }

        .stat-sub {
            font-size: 12px;
            color: #8C9BAE;
        }

        /* 6. قسم مسيرة الإنجازات (Timeline) */
        .timeline-section {
            padding: 80px 5%;
            background-color: var(--bg-page);
            border-top: 1px solid rgba(197, 160, 89, 0.2);
        }

        .timeline-header {
            text-align: center;
            margin-bottom: 60px;
        }

        .timeline-title {
            color: var(--primary-navy);
            font-family: 'Amiri', serif;
            font-size: 46px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .timeline-subtitle {
            color: #777;
            font-size: 14px;
        }

        .timeline-container {
            position: relative;
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px 0;
        }

        .timeline-container::after {
            content: '';
            position: absolute;
            width: 2px;
            background-color: var(--accent-gold);
            top: 0;
            bottom: 0;
            left: 50%;
            margin-left: -1px;
            opacity: 0.6;
        }

        .timeline-item {
            padding: 10px 40px;
            position: relative;
            background-color: inherit;
            width: 50%;
        }

        .timeline-item::after {
            content: '';
            position: absolute;
            width: 28px;
            height: 28px;
            right: -14px;
            background-color: var(--primary-navy);
            border: 2px solid var(--accent-gold);
            top: 30px;
            border-radius: 50%;
            z-index: 1;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="%23C5A059"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>');
            background-size: 14px;
            background-position: center;
            background-repeat: no-repeat;
        }

        .timeline-item.right {
            right: 0;
            text-align: right;
        }

        .timeline-item.left {
            right: 50%;
            text-align: right;
        }

        .timeline-item.left::after {
            right: auto;
            left: -14px;
        }

        .timeline-card {
            background-color: #FFFFFF;
            padding: 25px 30px;
            border: 1px solid #EAE6DF;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.03);
            position: relative;
        }

        .timeline-year {
            color: var(--accent-gold);
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 6px;
        }

        .timeline-item-title {
            color: var(--primary-navy);
            font-family: 'Amiri', serif;
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .timeline-desc {
            color: #666;
            font-size: 14px;
            line-height: 1.7;
        }

        /* 7. قسم المعرض المصور (Photo Gallery) */
        .gallery-section {
            padding: 80px 5%;
            background-color: var(--bg-page);
            border-top: 1px solid rgba(197, 160, 89, 0.2);
        }

        .gallery-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .gallery-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-bottom: 35px;
        }

        .gallery-tag {
            color: var(--accent-gold);
            font-size: 11px;
            letter-spacing: 2px;
            font-weight: 700;
            display: block;
            margin-bottom: 5px;
        }

        .gallery-title {
            color: var(--primary-navy);
            font-family: 'Amiri', serif;
            font-size: 42px;
            font-weight: 700;
        }

        .gallery-filters {
            display: flex;
            gap: 10px;
        }

        .filter-btn {
            background-color: #FFFFFF;
            border: 1px solid #E2D9C8;
            color: var(--primary-navy);
            padding: 8px 22px;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .filter-btn:hover {
            border-color: var(--primary-navy);
        }

        .filter-btn.active {
            background-color: var(--primary-navy);
            color: #FFFFFF;
            border-color: var(--primary-navy);
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .gallery-item {
            position: relative;
            overflow: hidden;
            height: 280px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            transition: transform 0.4s ease, opacity 0.4s ease;
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.5s ease;
        }

        .gallery-item:hover img {
            transform: scale(1.05);
        }

        .gallery-item.hide {
            display: none;
        }

        .no-images {
            grid-column: 1 / -1;
            text-align: center;
            color: #888;
            padding: 40px;
        }

        /* 8. قسم الرؤية القضائية الرقمية نحو 2028 (الصورة على اليمين) */
        .vision-section {
            padding: 80px 5%;
            background-color: #FFFFFF;
            border-top: 1px solid rgba(197, 160, 89, 0.2);
        }

        .vision-container {
            display: flex;
            flex-direction: row;
            gap: 60px;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
        }

        .vision-image-box {
            flex: 1;
            position: relative;
            overflow: hidden;
            border-radius: 2px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }

        .vision-image-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .vision-badge {
            position: absolute;
            top: 25px;
            right: 25px;
            background-color: var(--accent-gold);
            color: #FFFFFF;
            padding: 18px 25px;
            text-align: center;
            z-index: 2;
            box-shadow: 0 4px 12px rgba(0,0,0,0.25);
        }

        .vision-badge .badge-year {
            font-family: 'Amiri', serif;
            font-size: 32px;
            font-weight: 700;
            line-height: 1;
            margin-bottom: 4px;
            display: block;
        }

        .vision-badge .badge-text {
            font-size: 10px;
            letter-spacing: 1.5px;
            font-weight: 800;
            text-transform: uppercase;
            font-family: sans-serif;
            display: block;
            opacity: 0.9;
        }

        .vision-content {
            flex: 1.1;
            text-align: right;
        }

        .vision-tag {
            color: #B0B0B0;
            font-size: 12px;
            letter-spacing: 2px;
            font-weight: 700;
            margin-bottom: 12px;
            font-family: sans-serif;
        }

        .vision-title {
            color: var(--primary-navy);
            font-family: 'Amiri', serif;
            font-size: 46px;
            font-weight: 700;
            margin-bottom: 25px;
        }

        .vision-text {
            color: #666;
            font-size: 16px;
            line-height: 1.9;
            margin-bottom: 30px;
        }

        .vision-list {
            list-style: none;
            padding: 0;
        }

        .vision-list li {
            position: relative;
            padding-right: 28px;
            margin-bottom: 16px;
            color: #555;
            font-weight: 600;
            font-size: 15px;
        }

        .vision-list li::before {
            content: "•";
            color: var(--accent-gold);
            font-size: 26px;
            position: absolute;
            right: 0;
            top: -7px;
        }

        /* 9. قسم تواصل مع المحكمة الشرعية */
        .contact-section {
            padding: 80px 5% 60px 5%;
            background-color: var(--bg-page);
            border-top: 1px solid rgba(197, 160, 89, 0.2);
            text-align: center;
        }

        .contact-header {
            margin-bottom: 40px;
        }

        .contact-tag {
            color: var(--accent-gold);
            font-size: 12px;
            letter-spacing: 2px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .contact-title {
            color: var(--primary-navy);
            font-family: 'Amiri', serif;
            font-size: 42px;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .contact-subtitle {
            color: #666;
            font-size: 15px;
            max-width: 650px;
            margin: 0 auto;
            line-height: 1.6;
        }

        .contact-main-card {
            max-width: 1000px;
            margin: 0 auto 50px auto;
            background-color: #FFFFFF;
            border: 2px solid var(--primary-navy);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            display: flex;
            overflow: hidden;
        }

        .contact-form-side {
            flex: 1;
            padding: 35px 30px;
            text-align: right;
            position: relative;
        }

        .form-step-num {
            position: absolute;
            top: 20px;
            left: 25px;
            font-size: 28px;
            font-weight: 800;
            color: #E2E8F0;
        }

        .form-title-badge {
            font-size: 11px;
            color: var(--accent-gold);
            font-weight: 700;
            display: block;
            margin-bottom: 4px;
        }

        .form-main-title {
            color: var(--primary-navy);
            font-size: 20px;
            font-weight: 800;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            color: #4A5568;
            font-weight: 700;
            margin-bottom: 6px;
        }

        .form-control {
            width: 100%;
            padding: 10px 14px;
            border: 1px solid #CBD5E0;
            font-size: 14px;
            color: #2D3748;
            outline: none;
        }

        .form-control:focus {
            border-color: var(--primary-navy);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 90px;
        }

        .btn-send-whatsapp {
            width: 100%;
            background-color: #0F766E;
            color: #FFFFFF;
            border: none;
            padding: 12px;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: background-color 0.3s;
            text-decoration: none;
        }

        .btn-send-whatsapp:hover {
            background-color: #0D655E;
        }

        .contact-info-side {
            flex: 1;
            background-color: #172B4D;
            color: #FFFFFF;
            padding: 40px 35px;
            text-align: right;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
        }

        .wa-icon-box {
            width: 60px;
            height: 60px;
            background-color: rgba(37, 211, 102, 0.15);
            border: 2px solid #25D366;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #25D366;
            font-size: 30px;
            margin-bottom: 20px;
        }

        .info-side-badge {
            color: #25D366;
            font-size: 11px;
            font-weight: 700;
            margin-bottom: 6px;
            display: block;
        }

        .info-side-title {
            font-family: 'Amiri', serif;
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .info-side-desc {
            color: #CBD5E0;
            font-size: 14px;
            line-height: 1.8;
            margin-bottom: 30px;
        }

        .info-footer-tags {
            display: flex;
            gap: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 15px;
            font-size: 12px;
            color: #A0AEC0;
        }

        .contact-details-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 0;
            max-width: 1000px;
            margin: 0 auto 40px auto;
            background-color: #F7F5F0;
            border: 1px solid #E2D9C8;
        }

        .contact-detail-card {
            padding: 30px 20px;
            text-align: center;
            border-left: 1px solid #E2D9C8;
        }

        .contact-detail-card:last-child {
            border-left: none;
        }

        .detail-icon {
            color: var(--accent-gold);
            font-size: 18px;
            margin-bottom: 12px;
        }

        .detail-title {
            font-family: 'Amiri', serif;
            color: var(--primary-navy);
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .detail-text {
            color: #4A5568;
            font-size: 14px;
            line-height: 1.6;
            direction: ltr;
            display: inline-block;
        }

        /* تنسيق الروابط التفاعلية للبريد والاتصال */
        .contact-link {
            color: #4A5568;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .contact-link:hover {
            color: var(--accent-gold);
            text-decoration: underline;
        }

        .contact-bottom-btns {
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .btn-portal-dark {
            background-color: var(--primary-navy);
            color: #FFFFFF;
            padding: 10px 25px;
            text-decoration: none;
            font-weight: 700;
            font-size: 14px;
        }

        .btn-portal-outline {
            background-color: transparent;
            color: var(--primary-navy);
            border: 1px solid var(--primary-navy);
            padding: 10px 25px;
            text-decoration: none;
            font-weight: 700;
            font-size: 14px;
        }

        /* 10. قسم الفوتر الجديد */
        .site-footer {
            background-color: #0F1C2E;
            color: #FFFFFF;
            padding: 60px 5% 30px 5%;
            border-top: 3px solid var(--accent-gold);
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 2fr 1fr 1.5fr;
            gap: 40px;
            margin-bottom: 40px;
        }

        .footer-col-about h3 {
            color: var(--accent-gold);
            font-family: 'Amiri', serif;
            font-size: 24px;
            margin-bottom: 15px;
        }

        .footer-col-about p {
            color: #A0B2C6;
            font-size: 14px;
            line-height: 1.8;
            margin-bottom: 20px;
        }

        .footer-col-links h4, .footer-col-contact h4 {
            color: var(--accent-gold);
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 8px;
        }

        .footer-col-links h4::after, .footer-col-contact h4::after {
            content: '';
            position: absolute;
            bottom: 0;
            right: 0;
            width: 30px;
            height: 2px;
            background-color: var(--accent-gold);
        }

        .footer-links-list {
            list-style: none;
        }

        .footer-links-list li {
            margin-bottom: 10px;
        }

        .footer-links-list a {
            color: #A0B2C6;
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s;
        }

        .footer-links-list a:hover {
            color: #FFFFFF;
        }

        .footer-contact-info {
            list-style: none;
        }

        .footer-contact-info li {
            color: #A0B2C6;
            font-size: 14px;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .footer-contact-info i {
            color: var(--accent-gold);
            font-size: 16px;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 20px;
            text-align: center;
            color: #718096;
            font-size: 13px;
        }

        /* 11. كبسولة الواتساب المتحركة */
        .whatsapp-widget {
            position: fixed;
            bottom: 25px;
            left: 25px;
            display: flex;
            align-items: center;
            background-color: var(--primary-navy);
            border-radius: 8px;
            padding: 6px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.2);
            z-index: 9999;
            text-decoration: none;
        }

        .whatsapp-circle {
            width: 48px;
            height: 48px;
            background-color: #25D366;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #FFFFFF;
            font-size: 26px;
            animation: pulse-green 2s infinite;
        }

        .whatsapp-info {
            padding: 0 12px 0 8px;
            color: #FFFFFF;
            display: flex;
            flex-direction: column;
        }

        .whatsapp-info .title {
            font-size: 13px;
            font-weight: 700;
        }

        .whatsapp-info .subtitle {
            font-size: 10px;
            color: #CBD5E0;
        }

        @keyframes pulse-green {
            0% { box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.7); }
            70% { box-shadow: 0 0 0 12px rgba(37, 211, 102, 0); }
            100% { box-shadow: 0 0 0 0 rgba(37, 211, 102, 0); }
        }

        @media screen and (max-width: 768px) {
            .vision-container {
                flex-direction: column;
            }
            .timeline-container::after {
                right: 31px;
                left: auto;
            }
            .timeline-item {
                width: 100%;
                padding-right: 70px;
                padding-left: 15px;
            }
            .timeline-item.left {
                right: 0%;
            }
            .timeline-item.right::after, .timeline-item.left::after {
                right: 17px;
                left: auto;
            }
            .gallery-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 20px;
            }
            .gallery-grid {
                grid-template-columns: repeat(1, 1fr);
            }
            .contact-main-card {
                flex-direction: column;
            }
            .contact-details-grid {
                grid-template-columns: 1fr;
            }
            .contact-detail-card {
                border-left: none;
                border-bottom: 1px solid #E2D9C8;
            }
            .footer-container {
                grid-template-columns: 1fr;
                gap: 30px;
            }
        }
    </style>
</head>
<body>

    <!-- 1. الشريط العلوي -->
    <div class="top-bar">
        <div class="top-bar-right">
            <span>ديوان القضاء الشرعي – دولة فلسطين 🇵🇸</span>
        </div>
        <div class="top-bar-left">
            HIGHER COUNCIL FOR SHARIA JUDICIARY · PALESTINE
        </div>
    </div>

    <!-- 2. الهيدر الرئيسي -->
    <header class="main-header">
        <a href="#" class="logo-box">
            <img src="{{ asset('images/palestine-logo.png') }}" alt="شعار المحكمة الشرعية" class="logo-img">
            <div class="logo-text">
                <h2>المحكمة الشرعية — غزة</h2>
                <span>SHARIA JUDICIARY · PALESTINE</span>
            </div>
        </a>

        <ul class="nav-menu">
            <li><a href="#about">عن المحكمة</a></li>
            <li><a href="#achievements">الإنجازات</a></li>
            <li><a href="#history">المسيرة</a></li>
            <li><a href="#exhibition">المعرض</a></li>
            <li><a href="#vision">الرؤية 2028</a></li>
            <li><a href="#contact">تواصل معنا</a></li>
            <li><a href="#inquiry" class="btn-inquiry-box">الاستفسار</a></li>
        </ul>
    </header>

    <!-- 3. القسم الرئيسي (Hero Section) -->
    <main class="hero-container">
        <div class="hero-right">
            <div class="subtitle-line">معرض الإنجازات والمسيرة</div>
            <h1 class="main-title">المحكمة الشرعية</h1>
            <h2 class="sub-main-title">المجلس الأعلى للقضاء الشرعي</h2>
            <p class="hero-description">
                منظومة قضائية متكاملة تجمع بين أصالة الشريعة الإسلامية وحداثة التقنية، لتحقيق العدالة الناجزة وضمان حق التقاضي للجميع في أسرع وقت ممكن.
            </p>
            <div class="action-btns">
                <a href="#history" class="btn-navy">استعرض المسيرة</a>
                <a href="#exhibition" class="btn-outline-gray">المعرض المصور</a>
            </div>
        </div>

        <div class="hero-left">
            <div class="quote-box">
                <div class="quote-mark">”</div>
                <p class="quote-text">
                    العدل أساس الحكم، والقضاء الناجز ركيزة الوطن، ونحن في المحكمة الشرعية نسعى دوماً لصون الحقوق وتحقيق العدالة بأعلى معايير النزاهة.
                </p>
                <div class="quote-divider"></div>
                <div class="author-title">سعادة رئيس المحكمة الشرعية</div>
                <div class="author-sub">المجلس الأعلى للقضاء الشرعي – فلسطين</div>
            </div>
        </div>
    </main>

    <!-- 4. قسم نبذة عن المحكمة الشرعية -->
    <section class="about-section" id="about">
        <div class="about-container">
            <div class="about-content">
                <div class="section-tag">ABOUT THE COURT</div>
                <h2 class="about-title">نبذة عن المحكمة الشرعية</h2>
                
                <p class="about-text">
                    تعمل المحكمة الشرعية في غزة ضمن منظومة المجلس الأعلى للقضاء الشرعي في دولة فلسطين، لصون الحقوق وتوفير خدمة قضائية راسخة تجمع بين أصالة الشريعة وكفاءة الإجراءات الحديثة.
                </p>

                <p class="about-text">
                    تضطلع المحكمة بالنظر في القضايا ذات الطابع العاجل والمستعجل، وتعمل وفق آليات قضائية مبتكرة تستند إلى أحكام الشريعة الإسلامية الغراء مع توظيف أحدث التقنيات لتحقيق التقاضي الإلكتروني المتكامل.
                </p>

                <div class="about-grid">
                    <div class="info-card">
                        <div class="info-card-title">الرؤية</div>
                        <div class="info-card-desc">قضاء ناجز يحقق العدل في أسرع وقت</div>
                    </div>

                    <div class="info-card">
                        <div class="info-card-title">الرسالة</div>
                        <div class="info-card-desc">الفصل في القضايا بدقة وسرعة ونزاهة</div>
                    </div>

                    <div class="info-card">
                        <div class="info-card-title">القيم</div>
                        <div class="info-card-desc">العدل – النزاهة – الشفافية – التميز</div>
                    </div>

                    <div class="info-card">
                        <div class="info-card-title">الهدف</div>
                        <div class="info-card-desc">تقليص مدد التقاضي إلى أقل من ٩٠ يوماً</div>
                    </div>
                </div>
            </div>

            <div class="about-image-box">
                <img src="https://images.unsplash.com/photo-1589829545856-d10d557cf95f?q=80&w=1200&auto=format&fit=crop" alt="مبنى المحكمة">
            </div>
        </div>
    </section>

    <!-- 5. قسم الإنجازات بالأرقام -->
    <section class="stats-section" id="achievements">
        <div class="stats-header">
            <div class="stats-tag">KEY ACHIEVEMENTS</div>
            <h2 class="stats-title">الإنجازات بالأرقام</h2>
        </div>

        <div class="stats-container">
            <div class="stats-grid">
                
                <div class="stat-item">
                    <div class="stat-number-box">
                        <span>+</span><span class="counter" data-target="250000">0</span>
                    </div>
                    <div class="stat-label">قضية مفصولة</div>
                    <div class="stat-sub">منذ التأسيس</div>
                </div>

                <div class="stat-item">
                    <div class="stat-number-box">
                        <span>٪</span><span class="counter" data-target="92">0</span>
                    </div>
                    <div class="stat-label">معدل الفصل</div>
                    <div class="stat-sub">خلال ٣ أشهر</div>
                </div>

                <div class="stat-item">
                    <div class="stat-number-box">
                        <span class="counter" data-target="12">0</span>
                    </div>
                    <div class="stat-label">مركز خدمة قضائية</div>
                    <div class="stat-sub">في المحافظات كافة</div>
                </div>

                <div class="stat-item">
                    <div class="stat-number-box">
                        <span>٪</span><span class="counter" data-target="85">0</span>
                    </div>
                    <div class="stat-label">تقاضٍ إلكتروني</div>
                    <div class="stat-sub">بدون حضور فعلي</div>
                </div>

            </div>
        </div>
    </section>

    <!-- 6. قسم مسيرة الإنجازات -->
    <section class="timeline-section" id="history">
        <div class="timeline-header">
            <div class="section-tag">OUR JOURNEY</div>
            <h2 class="timeline-title">مسيرة الإنجازات</h2>
            <p class="timeline-subtitle">محطات التطوير والارتقاء في مسيرة المحكمة الشرعية المتميزة</p>
        </div>

        <div class="timeline-container">
            <div class="timeline-item left">
                <div class="timeline-card">
                    <div class="timeline-year">١٩٩٥</div>
                    <h3 class="timeline-item-title">تأسيس المحاكم الشرعية</h3>
                    <p class="timeline-desc">
                        صدر القرار الرئاسي بتأسيس المحكمة الشرعية ضمن منظومة القضاء الشرعي، لتقديم الخدمات الشرعية للمواطنين في القطاع.
                    </p>
                </div>
            </div>

            <div class="timeline-item right">
                <div class="timeline-card">
                    <div class="timeline-year">٢٠١٦</div>
                    <h3 class="timeline-item-title">تفعيل المنظومة الرقمية</h3>
                    <p class="timeline-desc">
                        إطلاق برنامج الأرشيف الإلكتروني وتحويل المعاملات الورقية إلى أدوات إلكترونية ذكية لتسريع وتيرة العمل.
                    </p>
                </div>
            </div>

            <div class="timeline-item left">
                <div class="timeline-card">
                    <div class="timeline-year">٢٠١٩</div>
                    <h3 class="timeline-item-title">عدالة التآزر والتكافل</h3>
                    <p class="timeline-desc">
                        تطوير المكاتب الفنية وإعادة هيكلة العمل القضائي لضمان المساعدة والاستجابة السريعة للنزاعات العائلية.
                    </p>
                </div>
            </div>

            <div class="timeline-item right">
                <div class="timeline-card">
                    <div class="timeline-year">٢٠٢١</div>
                    <h3 class="timeline-item-title">التسريع القضائي</h3>
                    <p class="timeline-desc">
                        إطلاق قواعد عمل استثنائية لتقليص مدد القضايا والوصول إلى أمد تقاضٍ أقل.
                    </p>
                </div>
            </div>

            <div class="timeline-item left">
                <div class="timeline-card">
                    <div class="timeline-year">٢٠٢٣</div>
                    <h3 class="timeline-item-title">التقاضي عن بُعد</h3>
                    <p class="timeline-desc">
                        إطلاق خدمات المعاملات عن بُعد لخدمة المغتربين ولتسريع العمل القضائي بين المحافظات.
                    </p>
                </div>
            </div>

            <div class="timeline-item right">
                <div class="timeline-card">
                    <div class="timeline-year">٢٠٢٤</div>
                    <h3 class="timeline-item-title">إعادة الاستئناف والتطوير</h3>
                    <p class="timeline-desc">
                        إطلاق المنظومة المحدثة الاستثنائية لمواصلة القضاء في أعتى الظروف والمافظة على النزاهة والعدالة.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- 7. قسم المعرض المصور -->
    <section class="gallery-section" id="exhibition">
        <div class="gallery-container">
            <div class="gallery-header">
                <div class="gallery-titles">
                    <span class="gallery-tag">PHOTO GALLERY</span>
                    <h2 class="gallery-title">المعرض المصور</h2>
                </div>
                <div class="gallery-filters">
                    <button class="filter-btn active" data-filter="all">الكل</button>
                    <button class="filter-btn" data-filter="buildings">المباني</button>
                    <button class="filter-btn" data-filter="facilities">المرافق</button>
                    <button class="filter-btn" data-filter="tech">التقنية</button>
                    <button class="filter-btn" data-filter="judiciary">القضاء</button>
                </div>
            </div>

            <div class="gallery-grid">
                @forelse($galleryImages ?? [] as $image)
                    <div class="gallery-item" data-category="{{ $image->category }}">
                        <img src="{{ asset('/storage/' . $image->image_path) }}" alt="{{ $image->title ?? 'صورة المعرض' }}" style="width: 100%; height: 250px; object-fit: cover;">
                    </div>
                @empty
                    <p class="no-images">لا توجد صور معروضة حالياً.</p>
                @endforelse
            </div>
        </div>
    </section>

    <!-- 8. قسم الرؤية القضائية الرقمية نحو 2028 (الصورة على اليمين) -->
    <section class="vision-section" id="vision">
        <div class="vision-container">
            <div class="vision-image-box">
                <div class="vision-badge">
                    <span class="badge-year">٢٠٢٨</span>
                    <span class="badge-text">DIGITAL VISION</span>
                </div>
                <img src="{{ asset('images/image_9157c369.jpg') }}" alt="الرؤية القضائية الرقمية نحو 2028">
            </div>

            <div class="vision-content">
                <div class="vision-tag">FUTURE VISION</div>
                <h2 class="vision-title">الرؤية القضائية الرقمية نحو ٢٠٢٨</h2>
                
                <p class="vision-text">
                    تسعى المحكمة الشرعية إلى بناء منظومة قضائية فلسطينية رقمية وآمنة، تُيسر وصول المواطنين إلى العدالة وتوظف التقنية في تسريع الإجراءات وحفظ الحقوق.
                </p>

                <ul class="vision-list">
                    <li>الوصول إلى ١٠٠٪ تقاضٍ إلكتروني بحلول ١٤٤٧ هـ</li>
                    <li>تقليص متوسط مدة الفصل إلى أقل من ٦٠ يوماً</li>
                    <li>توسيع مراكز الخدمة لتغطي مختلف المحافظات</li>
                    <li>توظيف الذكاء الاصطناعي في ٧٠٪ من الإجراءات</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- 9. قسم تواصل مع المحكمة الشرعية -->
    <section class="contact-section" id="contact">
        <div class="contact-header">
            <div class="contact-tag">CONTACT</div>
            <h2 class="contact-title">تواصل مع المحكمة الشرعية</h2>
            <p class="contact-subtitle">
                للاستفسار عن أي قضية أو خدمة تابعة للمحكمة، يسعدنا تلقي مراسلاتكم عبر القنوات الرسمية التالية
            </p>
        </div>

        <div class="contact-main-card">
            <div class="contact-form-side">
                <span class="form-step-num">01</span>
                <span class="form-title-badge">صندوق المساعدة السريعة</span>
                <h3 class="form-main-title">أرسل تفاصيل طلبك</h3>

                <div class="form-group">
                    <label>نوع الطلب</label>
                    <select class="form-control" id="requestType">
                        <option>استفسار عن قضية</option>
                        <option>تقديم اقتراح</option>
                        <option>تقديم شكوى</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>اشرح لنا الاستفسار</label>
                    <textarea class="form-control" id="requestDetails" placeholder="اكتب تفاصيل المعاملة أو الاستفسار هنا..."></textarea>
                </div>

                <!-- زر الإرسال المباشر للواتساب -->
                <a href="https://wa.me/972599990075" id="whatsappSendBtn" target="_blank" class="btn-send-whatsapp">
                    <i class="fab fa-whatsapp"></i>
                    إرسال الطلب عبر الواتساب
                </a>
            </div>

            <div class="contact-info-side">
                <div class="wa-icon-box">
                    <i class="fab fa-whatsapp"></i>
                </div>
                <span class="info-side-badge">خدمة سريعة ومباشرة</span>
                <h3 class="info-side-title">كيف يمكننا مساعدتك؟</h3>
                <p class="info-side-desc">
                    اختر نوع الطلب واكتب تفاصيل استفسارك وسنقوم بإرسالها مباشرة إلى فريق الدعم عبر الواتساب.
                </p>
                <div class="info-footer-tags">
                    <span><i class="fas fa-check-circle"></i> تواصل مباشر</span>
                    <span><i class="fas fa-user-shield"></i> خصوصية وأمان</span>
                </div>
            </div>
        </div>

        <!-- تفاصيل التواصل والروابط المباشرة -->
        <div class="contact-details-grid">
            <div class="contact-detail-card">
                <div class="detail-icon"><i class="fas fa-map-marker-alt"></i></div>
                <h4 class="detail-title">العنوان</h4>
                <div class="detail-text" style="direction: rtl;">
                    خانيونس بالقرب من جامعة الأقصى
                </div>
            </div>

            <div class="contact-detail-card">
                <div class="detail-icon"><i class="fas fa-phone-alt"></i></div>
                <h4 class="detail-title">الهاتف والفاكس</h4>
                <div class="detail-text">
                    هاتف: <a href="tel:+9702820250" class="contact-link">(+970) 2820250</a><br>
                    فاكس: <a href="tel:+9702863927" class="contact-link">(+970) 2863927</a>
                </div>
            </div>

            <div class="contact-detail-card">
                <div class="detail-icon"><i class="fas fa-envelope"></i></div>
                <h4 class="detail-title">البريد الإلكتروني</h4>
                <div class="detail-text">
                    <a href="mailto:lic@gov.ps" class="contact-link">lic@gov.ps</a>
                </div>
            </div>
        </div>

        <div class="contact-bottom-btns">
            <a href="#" class="btn-portal-dark">البوابة القضائية الفلسطينية</a>
            <a href="#" class="btn-portal-outline">بوابة التقاضي الإلكتروني</a>
        </div>
    </section>

    <!-- 10. قسم الفوتر النهائي (القسم المضاف) -->
    <footer class="site-footer">
        <div class="footer-container">
            <div class="footer-col-about">
                <h3>المحكمة الشرعية — غزة</h3>
                <p>صرح قضائي شرعي يسعى لتطبيق أحكام الشريعة الإسلامية الغراء وتحقيق العدالة الناجزة، وتقديم أفضل الخدمات القضائية للمواطنين وفق أحدث المعايير التقنية.</p>
            </div>

            <div class="footer-col-links">
                <h4>روابط السريعة</h4>
                <ul class="footer-links-list">
                    <li><a href="#about">عن المحكمة</a></li>
                    <li><a href="#achievements">الإنجازات</a></li>
                    <li><a href="#history">مسيرة العمل</a></li>
                    <li><a href="#exhibition">المعرض المصور</a></li>
                    <li><a href="#vision">رؤية 2028</a></li>
                    <li><a href="#contact">تواصل معنا</a></li>
                </ul>
            </div>

            <div class="footer-col-contact">
                <h4>المجلس الأعلى للقضاء الشرعي</h4>
                <ul class="footer-contact-info">
                    <li><i class="fas fa-map-marker-alt"></i> خانيونس - بالقرب من جامعة الأقصى</li>
                    <li><i class="fas fa-phone"></i> (+970) 2820250</li>
                    <li><i class="fab fa-whatsapp"></i> +972599990075</li>
                    <li><i class="fas fa-envelope"></i> lic@gov.ps</li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <p>جميع الحقوق محفوظة &copy; {{ date('Y') }} المحكمة الشرعية — المجلس الأعلى للقضاء الشرعي - فلسطين</p>
        </div>
    </footer>

    <!-- 11. كبسولة الواتساب المتحركة -->
    <a href="https://wa.me/972599990075" class="whatsapp-widget" target="_blank">
        <div class="whatsapp-circle">
            <i class="fab fa-whatsapp"></i>
        </div>
        <div class="whatsapp-info">
            <span class="title">تحتاج مساعدة؟</span>
            <span class="subtitle">راسلنا عبر واتساب</span>
        </div>
    </a>

    <!-- البرمجيات التفاعلية (JS) -->
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const counters = document.querySelectorAll('.counter');
            const speed = 200;
            const arabicDigits = ['٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩'];

            function toArabicNumber(num) {
                return num.toLocaleString('en-US').split('').map(char => {
                    if (char === ',') return '،';
                    return arabicDigits[char] !== undefined ? arabicDigits[char] : char;
                }).join('');
            }

            const startCounter = (counter) => {
                const target = +counter.getAttribute('data-target');
                let count = 0;
                const inc = target / speed;

                const updateCount = () => {
                    count += inc;
                    if (count < target) {
                        counter.innerText = toArabicNumber(Math.ceil(count));
                        setTimeout(updateCount, 15);
                    } else {
                        counter.innerText = toArabicNumber(target);
                    }
                };

                updateCount();
            };

            let animated = false;
            const section = document.querySelector('.stats-section');
            const observer = new IntersectionObserver((entries) => {
                if (entries[0].isIntersecting && !animated) {
                    counters.forEach(counter => startCounter(counter));
                    animated = true;
                }
            }, { threshold: 0.4 });

            if (section) observer.observe(section);

            const filterBtns = document.querySelectorAll(".filter-btn");
            const galleryItems = document.querySelectorAll(".gallery-item");

            filterBtns.forEach(btn => {
                btn.addEventListener("click", () => {
                    filterBtns.forEach(b => b.classList.remove("active"));
                    btn.classList.add("active");

                    const filter = btn.getAttribute("data-filter");

                    galleryItems.forEach(item => {
                        if (filter === "all" || item.getAttribute("data-category") === filter) {
                            item.classList.remove("hide");
                        } else {
                            item.classList.add("hide");
                        }
                    });
                });
            });

            // ربط نموذج الرسائل بالواتساب ديناميكياً
            const waBtn = document.getElementById('whatsappSendBtn');
            const requestType = document.getElementById('requestType');
            const requestDetails = document.getElementById('requestDetails');

            if(waBtn && requestType && requestDetails) {
                waBtn.addEventListener('click', (e) => {
                    const type = requestType.value;
                    const details = requestDetails.value.trim();
                    const text = `السلام عليكم، أود التواصل بشأن:\n*نوع الطلب:* ${type}\n*التفاصيل:* ${details || 'لا يوجد تفاصيل إضافية'}`;
                    waBtn.href = `https://wa.me/972599990075?text=${encodeURIComponent(text)}`;
                });
            }
        });
    </script>

</body>
</html>