<?php
/**
 * Template Name: VBANX Landing (No Header/Footer)
 *
 * A standalone WordPress page template.
 * On purpose this file does NOT call get_header() or get_footer() —
 * it only outputs the page content itself, so you can drop it into
 * your theme and select it from the "Template" dropdown on a Page.
 *
 * Save this file inside your active theme folder, e.g.:
 *   /wp-content/themes/your-theme/page-vbanx.php
 *
 * Put the partner logo SVGs inside your theme at:
 *   /wp-content/themes/your-theme/assets/logo-1.svg (etc.)
 */

  if ( $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['vbanx_contact_nonce']) && wp_verify_nonce($_POST['vbanx_contact_nonce'], 'vbanx_contact_form') ) {
      $first_name = sanitize_text_field($_POST['first_name']);
      $last_name  = sanitize_text_field($_POST['last_name']);
      $email      = sanitize_email($_POST['email']);
      $service    = sanitize_text_field($_POST['service']);
      $message    = sanitize_textarea_field($_POST['message']);

      $to      = 'info@vbanx.com';
      $subject = "New Demo Request from $first_name $last_name";
      $body    = "From: $first_name $last_name\nEmail: $email\nService: $service\n\nMessage:\n$message";
      $headers = array('Content-Type: text/plain; charset=UTF-8', "Reply-To: $email");

      wp_mail( $to, $subject, $body, $headers );

      echo '<p style="color:green;">Thanks! We\'ll be in touch soon.</p>';
  }



$theme_uri = esc_url( get_template_directory_uri() );


$vbanx_partner_logos = array(
	array( 'src' => 'http://localhost/vbanx-project/wp-content/uploads/2026/07/partners1.png', 'alt' => 'CMA' ),
	array( 'src' => 'http://localhost/vbanx-project/wp-content/uploads/2026/07/partners2.png', 'alt' => 'AC' ),
	array( 'src' => 'http://localhost/vbanx-project/wp-content/uploads/2026/07/partners3.png', 'alt' => 'CBC' ),
	array( 'src' => 'http://localhost/vbanx-project/wp-content/uploads/2026/07/partners4.png', 'alt' => 'PMTK' ),
	array( 'src' => 'http://localhost/vbanx-project/wp-content/uploads/2026/07/partners5.png', 'alt' => 'PCG' ),
	array( 'src' => 'http://localhost/vbanx-project/wp-content/uploads/2026/07/partners6.jpeg', 'alt' => 'SEC' ),
  array( 'src' => 'http://localhost/vbanx-project/wp-content/uploads/2026/07/partners7.jpg', 'alt' => 'CAFT' ),
	array( 'src' => 'http://localhost/vbanx-project/wp-content/uploads/2026/07/partners8.png', 'alt' => 'BNI' ),
	array( 'src' => 'http://localhost/vbanx-project/wp-content/uploads/2026/07/partners9.png', 'alt' => 'ACC' ),
	array( 'src' => 'http://localhost/vbanx-project/wp-content/uploads/2026/07/partners10.png', 'alt' => 'TCG' ),
	array( 'src' => 'http://localhost/vbanx-project/wp-content/uploads/2026/07/partners11.png', 'alt' => 'NTT DATA' ),
	array( 'src' => 'http://localhost/vbanx-project/wp-content/uploads/2026/07/partners12.png', 'alt' => 'KOSIGN' ),
);


?>

<style>
  :root{
    /* ---- Clean light palette ---- */
    --bg:#ffffff;
    --bg-soft:#f6f8fc;
    --surface:#ffffff;
    --border-soft:#e4e8f2;
    --ink:#101828;
    --ink-soft:#5b6472;
    --text-dim:#5b6472;

    --blue-accent:#01319B;
    --blue-bright:#2f7cf6;
    --blue-soft:#eaf1ff;
    --navy-700:#0a1330;
    --navy-800:#ffffff;
    --navy-900:#f6f8fc;
    --navy-950:#ffffff;

    --dark-navy-1:#0a1330;
    --dark-navy-2:#132a63;
    --dark-navy-ink:#ffffff;
    --dark-navy-ink-soft:rgba(255,255,255,0.72);
    --dark-navy-border:rgba(255,255,255,0.18);

    --cyan:#22d3ee;
    --orange:#f2932e;
    --white:#ffffff;
  }
  *{box-sizing:border-box;margin:0;padding:0;}
  body{
    font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Helvetica,Arial,sans-serif;
    background:var(--bg);
    color:var(--ink);
    overflow-x:hidden;
  }
  a{text-decoration:none;color:inherit;}

  .cta-btn{
    background:var(--orange);
    color:#241300;
    font-weight:700;
    font-size:14px;
    padding:12px 22px;
    border-radius:999px;
    display:inline-flex;
    align-items:center;
    gap:6px;
    box-shadow:0 4px 14px rgba(247,165,30,0.20);
    transition:transform .2s ease, box-shadow .2s ease;
  }
  .cta-btn:hover{transform:translateY(-2px);box-shadow:0 8px 20px rgba(247,165,30,0.30);}

  /* ---------- hero ---------- */
  .hero{
    position:relative;
    background:linear-gradient(135deg, var(--dark-navy-1) 0%, var(--dark-navy-2) 100%);
    overflow:hidden;
  }
  .hero-inner{
    position:relative;
    display:grid;
    grid-template-columns:1.05fr 1fr;
    align-items:center;
    padding:80px 60px 70px;
    max-width:1400px;
    margin:0 auto;
    gap:20px;
  }
  .hero-copy{position:relative;z-index:2;}
  .badge{
    display:inline-block;
    font-size:12px;
    font-weight:600;
    color:var(--cyan);
    background:rgba(34,211,238,0.10);
    border:1px solid rgba(34,211,238,0.30);
    padding:6px 14px;
    border-radius:999px;
    margin-bottom:22px;
  }
  h1{
    font-size:44px;
    line-height:1.15;
    font-weight:700;
    letter-spacing:-0.5px;
    margin-bottom:22px;
    color:var(--dark-navy-ink);
  }
  h1 .accent{color:var(--orange);}
  .hero-desc{
    color:var(--dark-navy-ink-soft);
    font-size:15.5px;
    line-height:1.7;
    max-width:480px;
    margin-bottom:34px;
  }
  .hero-actions{
    display:flex;
    align-items:center;
    gap:16px;
    margin-bottom:48px;
  }
  .btn-outline{
    border:1px solid var(--dark-navy-border);
    color:var(--dark-navy-ink);
    font-weight:600;
    font-size:14px;
    padding:13px 24px;
    border-radius:999px;
    transition:background .2s ease, border-color .2s ease;
  }
  .btn-outline:hover{background:rgba(255,255,255,0.08);border-color:rgba(255,255,255,0.35);}

  .stats{
    display:flex;
    gap:44px;
  }
  .stat-num{font-size:22px;font-weight:700;color:var(--dark-navy-ink);}
  .stat-label{font-size:12.5px;color:var(--dark-navy-ink-soft);max-width:120px;margin-top:4px;line-height:1.4;}

  /* ---------- globe ---------- */
  .globe-wrap{
    position:relative;
    z-index:1;
    display:flex;
    align-items:center;
    justify-content:center;
    height:520px;
  }
  .globe-glow{
    position:absolute;
    width:480px;height:480px;
    border-radius:50%;
    background:radial-gradient(circle at 45% 40%, rgba(34,211,238,0.20), rgba(255,255,255,0) 70%);
    filter:blur(10px);
  }
  canvas#globeCanvas{
    position:relative;
    z-index:2;
  }

  /* ---------- partners ---------- */
  .partners-section{
    background:var(--white);
    padding:30px 0 34px;
    border-top:1px solid var(--border-soft);
    border-bottom:1px solid var(--border-soft);
  }
  .partners-inner{
    max-width:1400px;
    margin:0 auto;
    display:flex;
    align-items:center;
    gap:36px;
    padding:0 60px;
  }
  .partners-label{
    color:var(--blue-accent);
    font-weight:700;
    font-size:14px;
    white-space:nowrap;
    position:relative;
    padding-right:24px;
    border-right:2px solid var(--orange);
  }
  .partners-label span{display:block;font-weight:400;color:#9aa5b8;font-size:12px;margin-top:2px;}

  .marquee-mask{
    flex:1;
    overflow:hidden;
    -webkit-mask-image:linear-gradient(90deg, transparent 0, #000 60px, #000 calc(100% - 60px), transparent 100%);
    mask-image:linear-gradient(90deg, transparent 0, #000 60px, #000 calc(100% - 60px), transparent 100%);
  }
  .marquee-track{
    display:flex;
    align-items:center;
    gap:64px;
    width:max-content;
    animation:scrollLogos 22s linear infinite;
  }
  .marquee-mask:hover .marquee-track{animation-play-state:paused;}
  .partner-logo{
    height:48px;
    display:flex;
    align-items:center;
    flex-shrink:0;
  }
  .partner-logo img{
    height:100%;
    width:auto;
    display:block;
    object-fit:contain;
    opacity:0.85;
    filter:grayscale(10%);
    transition:opacity .2s ease, filter .2s ease;
  }
  .partner-logo img:hover{opacity:1;filter:grayscale(0%);}

  @keyframes scrollLogos{
    from{transform:translateX(0);}
    to{transform:translateX(-50%);}
  }

  /* ---------- shared section layout ---------- */
  .section{padding:90px 60px;}
  .section-tint{background:var(--bg-soft);}
  .section-inner{max-width:1320px;margin:0 auto;}
  .eyebrow{
    display:inline-block;font-size:12px;font-weight:700;color:var(--orange);
    background:rgba(247,165,30,0.12);padding:5px 14px;border-radius:999px;margin-bottom:18px;
  }
  .section-title{font-size:34px;font-weight:700;color:var(--blue-accent);line-height:1.2;margin-bottom:16px;}
  .section-title.light{color:var(--blue-accent);}
  .section-desc{font-size:15px;color:var(--ink-soft);max-width:640px;line-height:1.7;}
  .section-desc.light{color:var(--ink-soft);}

  /* ---------- module carousel ---------- */
  .carousel-row{display:flex;align-items:center;gap:16px;margin-top:44px;}
  .carousel-arrow{
    flex-shrink:0;width:44px;height:44px;border-radius:50%;
    border:1px solid #d8dceb;background:var(--white);color:#28304a;
    display:flex;align-items:center;justify-content:center;cursor:pointer;
    transition:background .2s ease, border-color .2s ease;
  }
  .carousel-arrow:hover{background:var(--bg-soft);border-color:#b9c1de;}
  .carousel-mask{flex:1;overflow:hidden;}
  .carousel-track{display:flex;gap:20px;transition:transform .4s ease;}
  .module-card{
    flex:0 0 280px;background:var(--white);border:1px solid var(--border-soft);border-radius:14px;
    padding:26px 22px; cursor:pointer;transition:transform .2s ease, box-shadow .2s ease;
  }
  .module-icon{
    width:74px;height:74px;border-radius:50%;background:var(--blue-soft);color:var(--blue-accent);
    display:flex;align-items:center;justify-content:center;font-weight:700;font-size:13px;margin-bottom:18px;
  }
  .module-icon img{width:100%;height:100%;object-fit:contain;border-radius:50%;}
  .module-card h3{font-size:16px;color:var(--ink);margin-bottom:4px;}
  .module-card h3 span{display:block;font-weight:400;font-size:13px;color:var(--ink-soft);margin-top:2px;}
  .module-card p{font-size:13px;color:var(--ink-soft);line-height:1.6;margin:14px 0 18px;min-height:80px;}
  .module-tag{font-size:12px;font-weight:600;color:var(--blue-accent);background:var(--blue-soft);padding:5px 12px;border-radius:999px;}

  /* ---------- real screens ---------- */
  .screens-head{display:flex;align-items:flex-end;justify-content:space-between;gap:20px;}
  .see-all{display:inline-flex;align-items:center;gap:6px;font-weight:600;font-size:14px;color:var(--blue-accent);white-space:nowrap;}
  .showcase-row{
    max-width:1320px;margin:70px auto;padding:0 60px;display:grid;
    grid-template-columns:1fr 1fr;gap:60px;align-items:center;
  }
  .showcase-row.reverse .phone-cluster{order:2;}
  .showcase-row.reverse .showcase-copy{order:1;}
  .badge-tag{display:inline-block;font-size:12px;font-weight:700;color:var(--orange);background:rgba(247,165,30,0.12);padding:5px 14px;border-radius:999px;margin-bottom:16px;}
  .showcase-copy h3{font-size:26px;color:var(--ink);line-height:1.3;margin-bottom:14px;}
  .showcase-copy p{font-size:14.5px;color:var(--ink-soft);line-height:1.7;margin-bottom:20px;max-width:440px;}
  .check-list{list-style:none;margin-bottom:22px;}
  .check-list li{
    position:relative;padding-left:26px;font-size:14px;color:#3a4256;margin-bottom:10px;
  }
  .check-list li::before{
    content:'';position:absolute;left:0;top:2px;width:16px;height:16px;border-radius:4px;
    background:var(--blue-accent);
  }
  .check-list li::after{
    content:'';position:absolute;left:4.5px;top:5.5px;width:7px;height:4px;
    border-left:2px solid #fff;border-bottom:2px solid #fff;transform:rotate(-45deg);
  }
  .learn-more{display:inline-flex;align-items:center;gap:6px;font-weight:600;font-size:14px;color:var(--blue-accent);}

  .phone-cluster{display:flex;align-items:center;justify-content:center;gap:0;position:relative;height:340px;}
  .phone-cluster.single{height:380px;}
  .phone-frame{
    width:150px;height:300px;background:var(--ink);border-radius:24px;border:6px solid var(--ink);
    box-shadow:0 20px 40px rgba(16,26,53,0.14);position:relative;
  }
  .phone-frame.small{width:120px;height:240px;border-radius:20px;}
  .phone-frame.offset-1{transform:translateX(30px) rotate(-6deg);z-index:1;}
  .phone-frame.offset-2{transform:translateY(-16px);z-index:2;}
  .phone-frame.offset-3{transform:translateX(-30px) rotate(6deg);z-index:1;}
  .phone-frame:not(.small){width:190px;height:390px;border-radius:28px;border-width:7px;}
  .phone-screen{
    width:100%;height:100%;border-radius:16px;overflow:hidden;position:relative;
    background:linear-gradient(180deg,var(--blue-soft),#ffffff);
  }
  .phone-frame:not(.small) .phone-screen{border-radius:21px;}
  .ops-screen::before{
    content:'';position:absolute;inset:0;
    background:
      linear-gradient(180deg, var(--blue-accent) 0 34%, transparent 34%),
      repeating-linear-gradient(180deg, transparent 0 44px, #e7ebf6 44px 46px);
  }
  .ops-screen.alt::before{
    background:
      linear-gradient(180deg, var(--cyan) 0 30%, transparent 30%),
      repeating-linear-gradient(180deg, transparent 0 38px, #e7ebf6 38px 40px);
  }
  .consumer-screen::before{
    content:'';position:absolute;inset:0;
    background:
      linear-gradient(180deg, var(--ink) 0 26%, transparent 26%),
      radial-gradient(circle at 50% 46%, #ffffff 0 30%, transparent 31%),
      repeating-linear-gradient(180deg, transparent 0 34px, #eef1fb 34px 36px);
  }

  .device-strip{max-width:1320px;margin:20px auto 0;padding:50px 60px 0;text-align:center;}
  .device-strip-inner{
    display:flex;align-items:flex-end;justify-content:center;gap:24px;
    background:var(--bg-soft);border:1px solid var(--border-soft);border-radius:20px;padding:44px 40px 0;overflow:hidden;height:180px;
  }
  .device{background:linear-gradient(180deg,#ffffff,var(--blue-soft));border:1px solid var(--border-soft);border-radius:10px 10px 0 0;}
  .device.laptop{width:280px;height:150px;}
  .device.phone-sm{width:60px;height:130px;border-radius:14px 14px 0 0;}
  .device.tablet{width:130px;height:150px;}
  .device.card{width:150px;height:95px;align-self:center;border-radius:10px;}
  .device-caption{display:inline-block;margin-top:18px;font-size:12.5px;font-weight:600;letter-spacing:1px;color:var(--ink-soft);text-transform:uppercase;}

  /* ---------- performance ---------- */
  .perf-section{background:var(--bg-soft);padding:90px 60px;border-top:1px solid var(--border-soft);}
  .perf-grid-wrap{display:grid;grid-template-columns:0.8fr 1.4fr;gap:50px;align-items:start;}
  .perf-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:16px;}
  .perf-card{background:var(--white);border-radius:12px;padding:20px 18px;border:1px solid var(--border-soft);border-top:3px solid var(--orange);}
  .perf-tag{font-size:11px;font-weight:700;color:var(--orange);text-transform:uppercase;letter-spacing:0.4px;}
  .perf-card h4{font-size:14.5px;color:var(--blue-accent);margin:8px 0 8px;}
  .perf-card p{font-size:12.5px;color:var(--ink-soft);line-height:1.6;}

  /* ---------- contact ---------- */
  .contact-card{
    display:grid;grid-template-columns:0.85fr 1.15fr;background:var(--white);border-radius:20px;
    overflow:hidden;box-shadow:0 20px 50px rgba(16,26,53,0.08);border:1px solid var(--border-soft);
  }
  .contact-left{
    background:linear-gradient(160deg,var(--dark-navy-1),var(--dark-navy-2) 140%);
    padding:48px 40px;position:relative;overflow:hidden;
  }
  .contact-left::after{
    content:'';position:absolute;right:-40px;bottom:-60px;width:220px;height:220px;
    border-radius:50%;background:radial-gradient(circle, rgba(34,211,238,0.18), transparent 70%);
  }
  .contact-left h3{font-size:24px;line-height:1.3;margin-bottom:14px;position:relative;color:var(--dark-navy-ink);}
  .contact-left p{font-size:14px;color:var(--dark-navy-ink-soft);line-height:1.7;margin-bottom:26px;max-width:360px;position:relative;}
  .contact-info{list-style:none;margin-bottom:30px;position:relative;}
  .contact-info li{display:flex;gap:12px;align-items:flex-start;font-size:13.5px;color:var(--dark-navy-ink);margin-bottom:16px;line-height:1.6;}
  .contact-info li svg{flex-shrink:0;margin-top:2px;color:var(--cyan);}
  .contact-social{display:flex;gap:10px;position:relative;}
  .contact-social a{
    width:32px;height:32px;border-radius:50%;border:1px solid var(--dark-navy-border);
    display:flex;align-items:center;justify-content:center;color:var(--dark-navy-ink);
  }
  .contact-right{padding:48px 40px;}
  .form-row{display:grid;grid-template-columns:1fr 1fr;gap:16px;}
  .form-field{margin-bottom:18px;}
  .form-field label{display:block;font-size:12.5px;color:var(--ink-soft);margin-bottom:6px;font-weight:600;}
  .form-field input, .form-field select, .form-field textarea{
    width:100%;border:1px solid #e0e3ee;border-radius:8px;padding:10px 12px;font-size:13.5px;
    font-family:inherit;color:var(--ink);background:#fbfbfe;resize:none;
  }
  .form-field input:focus, .form-field select:focus, .form-field textarea:focus{outline:2px solid var(--blue-accent);outline-offset:1px;}
  .submit-btn{
    width:100%;background:var(--blue-accent);color:#fff;font-weight:700;font-size:14px;
    padding:14px;border-radius:8px;margin-top:6px;transition:background .2s ease;border:none;cursor:pointer;
  }
  .submit-btn:hover{background:#1d4ed8;}

  /* ---------- scroll reveal ---------- */
  .module-card, .showcase-row, .perf-card, .contact-card{
    opacity:0;transform:translateY(28px);
    transition:opacity .7s cubic-bezier(.22,.61,.36,1), transform .7s cubic-bezier(.22,.61,.36,1);
  }
  .module-card.in-view, .showcase-row.in-view, .perf-card.in-view, .contact-card.in-view{
    opacity:1;transform:translateY(0);
  }
  @media (prefers-reduced-motion: reduce){
    .module-card, .showcase-row, .perf-card, .contact-card{opacity:1;transform:none;transition:none;}
  }

  @media (max-width:960px){
    .hero-inner{grid-template-columns:1fr;padding:50px 24px;}
    .globe-wrap{order:-1;height:320px;}
    h1{font-size:32px;}
    .stats{flex-wrap:wrap;row-gap:16px;}
    .partners-inner{flex-direction:column;align-items:flex-start;padding:0 24px;gap:16px;}
    .partners-label{border-right:none;border-bottom:2px solid var(--orange);padding-right:0;padding-bottom:10px;}

    .section{padding:60px 24px;}
    .section-title{font-size:26px;}
    .showcase-row{grid-template-columns:1fr;padding:0 24px;gap:32px;margin:50px auto;}
    .showcase-row.reverse .phone-cluster, .showcase-row.reverse .showcase-copy{order:initial;}
    .phone-cluster{height:260px;}
    .device-strip{padding:40px 24px 0;}
    .device-strip-inner{flex-wrap:wrap;height:auto;padding:24px;gap:16px;}
    .device.laptop{width:100%;height:110px;}
    .perf-section{padding:60px 24px;}
    .perf-grid-wrap{grid-template-columns:1fr;}
    .perf-grid{grid-template-columns:1fr 1fr;}
    .contact-card{grid-template-columns:1fr;}
    .contact-left, .contact-right{padding:32px 24px;}
    .form-row{grid-template-columns:1fr;}
  }
</style>

<section class="hero">
  <div class="hero-inner">
    <div class="hero-copy">
      <span class="badge">Full CBFS &amp; CPBS for SME Compliant</span>
      <h1>The Core Banking Platform Built for<br><span class="accent">Global Financial Sector</span></h1>
      <p class="hero-desc">VBANX unifies commercial banking, microfinance, leasing, rural credit, pawn shop and fund &amp; trust operations on one compliant, API-first platform with more than 20 years of banking and technology experience behind it.</p>
      <div class="hero-actions">
        <a class="cta-btn" href="#">Booking a Free Demo</a>
        <a class="btn-outline" href="#">Explore the Ecosystem</a>
      </div>
      <div class="stats">
        <div>
          <div class="stat-num">20+ yrs</div>
          <div class="stat-label">Banking &amp; technology experience</div>
        </div>
        <div>
          <div class="stat-num">8</div>
          <div class="stat-label">Core institution types supported</div>
        </div>
        <div>
          <div class="stat-num">24/7</div>
          <div class="stat-label">Structured support &amp; escalation</div>
        </div>
      </div>
    </div>

    <div class="globe-wrap">
      <div class="globe-glow"></div>
      <canvas id="globeCanvas" width="480" height="480"></canvas>
    </div>
  </div>
</section>

<section class="partners-section">
  <div class="partners-inner">
    <div class="partners-label">Ours Strategic<span>Partners</span></div>
    <div class="marquee-mask">
      <div class="marquee-track" id="marqueeTrack">
        <!-- logos injected twice via JS for seamless loop -->
      </div>
    </div>
  </div>
</section>

<!-- ============ MODULES // FEATURE PRODUCTS ============ -->
<section class="section section-tint">
  <div class="section-inner">
    <span class="eyebrow">Feature Products</span>
    <h2 class="section-title">One platform, every line<br>of business.</h2>
    <p class="section-desc">Each VBANX module is built on the same compliant core, so institutions can start with one business line and scale into others without re-platforming.</p>

    <div class="carousel-row">
      <button class="carousel-arrow" id="prevArrow" aria-label="Previous modules"><svg viewBox="0 0 24 24" width="18" height="18"><path d="M15 6l-6 6 6 6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></button>

      <div class="carousel-mask">
        <div class="carousel-track" id="moduleTrack">
            <artic class="module-card">
            <div class="module-icon">
                <img src="http://localhost/vbanx-project/wp-content/uploads/2026/07/VBANXEFT.png" alt="Module Icon">
            </div>
            <h3 style="color: var(--blue-accent);">VBANXEFT<span>Fund & Trust</span></h3>
            <p>SERC and TR-compliant fund distribution, trust origination, eKYC 360° and investor mobile banking for CIS and derivatives. &amp; </p>
            <span class="module-tag">Fund & Trust</span>
          </artic>
          <article class="module-card">
            <div class="module-icon">
                <img src="http://localhost/vbanx-project/wp-content/uploads/2026/07/mobile-banking.png" alt="Module Icon">
            </div>
            <h3 style="color: var(--blue-accent);">Mobile Banking <span>Suite</span></h3>
            <p>OAMBanking for operational & analytical oversight, plus VBANXConsumer for customer-facing digital banking. &amp; </p>
            <span class="module-tag">Mobile Banking</span>
          </article>
            <article class="module-card">
            <div class="module-icon">
                <img src="http://localhost/vbanx-project/wp-content/uploads/2026/07/VBANXLEASE.png" alt="Module Icon">
            </div>
            <h3 style="color: var(--blue-accent);">VBANXLEASE<span>Leasing</span></h3>
            <p>End-to-end lease origination, scheduling, fixed asset tracking and CIFRS 16 lease accounting in one workflow. &amp; </p>
            <span class="module-tag">Leasing</span>
          </article>
          <article class="module-card">
            <div class="module-icon">
                <img src="http://localhost/vbanx-project/wp-content/uploads/2026/07/VBANXPAWN-.png" alt="Module Icon">
            </div>
            <h3 style="color: var(--blue-accent);">VBANXPAWN<span>Pawn Shop</span></h3>
            <p>Ticketing, collateral valuation, redemption and default handling built for the pace of pawn shop operations. &amp; </p>
            <span class="module-tag">Pawn Shop</span>
          </article>
          <article class="module-card">
            <div class="module-icon">
                <img src="http://localhost/vbanx-project/wp-content/uploads/2026/07/vbanxcb.png" alt="Module Icon">
            </div>
            <h3 style="color: var(--blue-accent);">VBANXCB<span>Commercial Bank</span></h3>
            <p>Full core banking for settlement, savings, term deposit, loans and cheque management with multi-branch and multi-currency support.</p>
            <span class="module-tag">Core Banking</span>
          </article>
          <article class="module-card">
            <div class="module-icon">
                <img src="http://localhost/vbanx-project/wp-content/uploads/2026/07/VBANXMFI-.png" alt="Module Icon">
            </div>
            <h3 style="color: var(--blue-accent);">VBANXMFI<span>Microfinance</span></h3>
            <p>Loan origination, collateral management, AML screening and collections purpose-built for microfinance institutions.</p>
            <span class="module-tag">Microfinance</span>
          </article>
          <article class="module-card">
            <div class="module-icon">
                <img src="http://localhost/vbanx-project/wp-content/uploads/2026/07/VBANXCIE-.png" alt="Module Icon">
            </div>
            <h3 style="color: var(--blue-accent);">VBANXCIE<span>CIFRS Integration Engine</span></h3>
            <p>Connects to any core banking system to automate CIFRS 9, 16, 19 and CAR ratio calculations and regulatory reports in real time.</p>
            <span class="module-tag">Compliance Engine</span>
          </article>
          <article class="module-card">
            <div class="module-icon">
                <img src="http://localhost/vbanx-project/wp-content/uploads/2026/07/VBANXRCI-.png" alt="Module Icon">
            </div>
            <h3 style="color: var(--blue-accent);">VBANXRCI<span>Rural Credit</span></h3>
            <p>A lightweight, scalable ledger for rural credit operators and cooperatives, with the same audit trail and reporting backbone.</p>
            <span class="module-tag">Rural Credit</span>
          </article>
        </div>
      </div>

      <button class="carousel-arrow" id="nextArrow" aria-label="Next modules"><svg viewBox="0 0 24 24" width="18" height="18"><path d="M9 6l6 6-6 6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></button>
    </div>
  </div>
</section>

<!-- ============ REAL SCREENS ============ -->
<section class="section">
  <div class="section-inner">
    <div class="screens-head">
      <div>
        <span class="eyebrow">Products in Action</span>
        <h2 class="section-title">Real screens.<br>Real operations.</h2>
        <p class="section-desc">A look at the mobile experiences your staff and customers use every day.</p>
      </div>
      <a href="#" class="see-all">See All <svg viewBox="0 0 24 24" width="16" height="16"><path d="M9 6l6 6-6 6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
    </div>
  </div>

  <div class="showcase-row">
    <div class="phone-cluster">
      <div class="phone-frame small offset-1"><div class="phone-screen ops-screen"></div></div>
      <div class="phone-frame small offset-2"><div class="phone-screen ops-screen alt"></div></div>
      <div class="phone-frame small offset-3"><div class="phone-screen ops-screen"></div></div>
    </div>
    <div class="showcase-copy">
      <span class="badge-tag">OAMBanking</span>
      <h3>Operational and analytical mobile banking, for your team.</h3>
      <p>Monitor institutional health, approve transactions and read analytical dashboards from a phone built for rural credit operators, MFIs, MDIs and commercial banks alike.</p>
      <ul class="check-list">
        <li>Approve transactions at your fingertips</li>
        <li>Transactional, visual and customer data in one view</li>
        <li>Secure, fast and suitable for institutions of any size</li>
      </ul>
      <a href="#" class="learn-more">Learn More <svg viewBox="0 0 24 24" width="14" height="14"><path d="M9 6l6 6-6 6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
    </div>
  </div>

  <div class="showcase-row reverse">
    <div class="showcase-copy">
      <span class="badge-tag">VBANXConsumer</span>
      <h3>A banking app your customers will actually enjoy.</h3>
      <p>Onboarding, eKYC, KHQR payments and full transaction history on a single, secure and unified API customizable to any institution's brand.</p>
      <ul class="check-list">
        <li>End-to-end customer lifecycle, from onboarding to history</li>
        <li>Single, secure API integration with VBANX or other cores</li>
        <li>Built by the VBANX Mobile Banking R&amp;D team</li>
      </ul>
      <a href="#" class="learn-more">Learn More <svg viewBox="0 0 24 24" width="14" height="14"><path d="M9 6l6 6-6 6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
    </div>
    <div class="phone-cluster single">
      <div class="phone-frame"><div class="phone-screen consumer-screen"></div></div>
    </div>
  </div>

  <div class="device-strip">
    <div class="device-strip-inner">
      <div class="device laptop"></div>
      <div class="device phone-sm"></div>
      <div class="device tablet"></div>
      <div class="device card"></div>
    </div>
    <span class="device-caption">Any device &middot; anywhere &middot; anytime</span>
  </div>
</section>

<!-- ============ PERFORMANCE / COMPLIANCE ============ -->
<section class="perf-section">
  <div class="section-inner perf-grid-wrap">
    <div class="perf-copy">
      <span class="eyebrow">Why Choose Us</span>
      <h2 class="section-title light">Performance you can measure, compliance you can trust.</h2>
      <p class="section-desc light">Eight commitments that shape every VBANX deployment, from first workshop to years of live operation.</p>
    </div>
    <div class="perf-grid">
      <div class="perf-card"><span class="perf-tag">Co-implement</span><h4>Guided implementation</h4><p>CIFRS co-implementation, validation, training and guideline documentation delivered with partner PCG.</p></div>
      <div class="perf-card"><span class="perf-tag">Customization</span><h4>No extra-cost changes</h4><p>Full system and module-level customization, plus free report development after go-live.</p></div>
      <div class="perf-card"><span class="perf-tag">Compliance</span><h4>Always current</h4><p>NBC, CBC, SERC, FIU, CMA and QDT support, with free updates as regulation changes.</p></div>
      <div class="perf-card"><span class="perf-tag">Digital</span><h4>API-first banking</h4><p>Secure digital banking with seamless integration and mobile-first experiences.</p></div>
      <div class="perf-card"><span class="perf-tag">Robustness</span><h4>Built to scale</h4><p>Secure architecture and scalable modules proven across compliance-heavy customers.</p></div>
      <div class="perf-card"><span class="perf-tag">Resources</span><h4>A dedicated bench</h4><p>R&amp;D, engineers, data migration analysts and report developers behind every rollout.</p></div>
      <div class="perf-card"><span class="perf-tag">24/7 Support</span><h4>Rapid resolution</h4><p>Structured ticketing with clear escalation paths, staffed around the clock.</p></div>
      <div class="perf-card"><span class="perf-tag">Data Migration</span><h4>Audit-ready, always</h4><p>Unlimited data migration and CIFRS conversion, with extra hours for audit readiness.</p></div>
    </div>
  </div>
</section>

<!-- ============ CONTACT ============ -->
<section class="section">
  <div class="section-inner">
    <div class="contact-card">
      <div class="contact-left">
        <h3>Let's plan your digital transformation.</h3>
        <p>Tell us about your institution and we'll walk you through the right VBANX modules — from core banking to CIFRS compliance and mobile banking.</p>
        <ul class="contact-info">
          <li><svg viewBox="0 0 24 24" width="16" height="16"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.362 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.338 1.85.573 2.81.7A2 2 0 0 1 22 16.92z" fill="none" stroke="currentColor" stroke-width="1.6"/></svg>012 751 275 / 087 333 187 / 085 816 000</li>
          <li><svg viewBox="0 0 24 24" width="16" height="16"><path d="M4 4h16v16H4z" fill="none" stroke="currentColor" stroke-width="1.6"/><path d="M4 6l8 7 8-7" fill="none" stroke="currentColor" stroke-width="1.6"/></svg>info@vbanx.com</li>
          <li><svg viewBox="0 0 24 24" width="16" height="16"><path d="M12 21s-7-6.2-7-11a7 7 0 0 1 14 0c0 4.8-7 11-7 11z" fill="none" stroke="currentColor" stroke-width="1.6"/><circle cx="12" cy="10" r="2.4" fill="none" stroke="currentColor" stroke-width="1.6"/></svg>Building #314, Road 6A, Kean Khlaing Village, Chroy Changvar, Phnom Penh 12101, Cambodia</li>
          <li><svg viewBox="0 0 24 24" width="16" height="16"><circle cx="12" cy="12" r="9" fill="none" stroke="currentColor" stroke-width="1.6"/><path d="M3 12h18M12 3a15 15 0 0 1 0 18M12 3a15 15 0 0 0 0 18" fill="none" stroke="currentColor" stroke-width="1.6"/></svg>www.vbanx.com</li>
        </ul>
        <div class="contact-social">
          <a href="#" aria-label="Facebook"><svg viewBox="0 0 24 24" width="16" height="16"><path d="M22 12a10 10 0 1 0-11.6 9.9v-7H7.9V12h2.5V9.8c0-2.5 1.5-3.9 3.8-3.9 1.1 0 2.2.2 2.2.2v2.5h-1.3c-1.2 0-1.6.8-1.6 1.6V12h2.8l-.4 2.9h-2.4v7A10 10 0 0 0 22 12z" fill="currentColor"/></svg></a>
          <a href="#" aria-label="Gmail"><svg viewBox="0 0 24 24" width="16" height="16"><rect x="2" y="4" width="20" height="16" rx="2" fill="none" stroke="currentColor" stroke-width="1.6"/><path d="M2.5 5.5l9.5 7 9.5-7" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
        </div>
      </div>
     <form class="contact-right" method="post" action="">
        <?php wp_nonce_field( 'vbanx_contact_form', 'vbanx_contact_nonce' ); ?>
        <div class="form-row">
          <div class="form-field"><label>First Name</label><input type="text" name="first_name" placeholder="John"></div>
          <div class="form-field"><label>Last Name</label><input type="text" name="last_name" placeholder="Doe"></div>
        </div>
        <div class="form-field">
          <label>Email</label>
          <input type="email" name="email" placeholder="you@company.com">
        </div>
        <div class="form-field">
          <label>What service are you interested in</label>
          <select name="service">
            <option value="">Select project type</option>
            <option>Core Banking</option>
            <option>Microfinance</option>
            <option>CIFRS Compliance</option>
            <option>Mobile Banking</option>
          </select>
        </div>
        <div class="form-field">
          <label>Message</label>
          <textarea rows="3" name="message" placeholder="Write your message..."></textarea>
        </div>
        <button type="submit" class="submit-btn">Request a Free Demo</button>
      </form>
    </div>
  </div>
</section>

<script>
/* ---------------- Modern network globe ---------------- */
(function(){
  const canvas = document.getElementById('globeCanvas');
  const ctx = canvas.getContext('2d');
  const DPR = Math.min(window.devicePixelRatio || 1, 2);
  const SIZE = 480;
  canvas.width = SIZE * DPR;
  canvas.height = SIZE * DPR;
  canvas.style.width = SIZE + 'px';
  canvas.style.height = SIZE + 'px';
  ctx.scale(DPR, DPR);

  const R = 190;
  const cx = SIZE/2, cy = SIZE/2;

  function landDensity(lat, lon){
    return Math.sin(lat*2.1 + lon*1.3) + Math.sin(lat*3.7 - lon*2.6) * 0.6
         + Math.sin(lat*1.2 + lon*4.1) * 0.5 + Math.sin(lon*0.7) * 0.4;
  }

  // base dot field
  const points = [];
  const latSteps = 30;
  for(let i=0;i<=latSteps;i++){
    const lat = (Math.PI * i/latSteps) - Math.PI/2;
    const circleR = Math.cos(lat);
    const steps = Math.max(6, Math.round(latSteps*2*circleR));
    for(let j=0;j<steps;j++){
      const lon = (Math.PI*2*j/steps);
      points.push({lat, lon, land: landDensity(lat, lon) > 0.15});
    }
  }

  // pick a handful of "hub" land points to connect with arcs, like flight routes
  const landPoints = points.filter(p => p.land);
  const hubs = [];
  for(let i=0;i<9;i++){
    hubs.push(landPoints[Math.floor(Math.random()*landPoints.length)]);
  }
  const routes = [];
  for(let i=0;i<hubs.length;i++){
    const a = hubs[i];
    const b = hubs[(i + 3) % hubs.length];
    routes.push({a, b, offset: Math.random(), speed: 0.0028 + Math.random()*0.002});
  }

  // gentle mouse parallax
  let tiltX = 0, tiltY = 0, targetTiltX = 0, targetTiltY = 0;
  const wrap = canvas.parentElement.parentElement;
  wrap.addEventListener('mousemove', (e)=>{
    const rect = wrap.getBoundingClientRect();
    targetTiltX = ((e.clientX - rect.left) / rect.width - 0.5) * 0.35;
    targetTiltY = ((e.clientY - rect.top) / rect.height - 0.5) * 0.35;
  });
  wrap.addEventListener('mouseleave', ()=>{ targetTiltX = 0; targetTiltY = 0; });

  function project(lat, lon, angle){
    const lo = lon + angle;
    const x3 = Math.cos(lat) * Math.cos(lo);
    const y3 = Math.sin(lat) + tiltY;
    const z3 = Math.cos(lat) * Math.sin(lo);
    const rx = x3 * Math.cos(tiltX) - z3 * Math.sin(tiltX);
    const rz = x3 * Math.sin(tiltX) + z3 * Math.cos(tiltX);
    return { x: cx + rx * R, y: cy - y3 * R * 0.94, z: rz };
  }

  let angle = 0;
  let pulse = 0;

  function draw(){
    ctx.clearRect(0,0,SIZE,SIZE);
    tiltX += (targetTiltX - tiltX) * 0.06;
    tiltY += (targetTiltY - tiltY) * 0.06;
    pulse += 0.02;

    // outer breathing ring
    const ringPulse = 1 + Math.sin(pulse) * 0.01;
    ctx.beginPath();
    ctx.arc(cx,cy,(R+2)*ringPulse,0,Math.PI*2);
    ctx.strokeStyle = 'rgba(37,99,235,0.20)';
    ctx.lineWidth = 1;
    ctx.stroke();

    // faint latitude rings for structure
    for(let k=-2;k<=2;k++){
      const lat = k * 0.5;
      ctx.beginPath();
      let started = false;
      for(let j=0;j<=64;j++){
        const lon = (Math.PI*2*j/64);
        const p = project(lat, lon, angle);
        if(p.z < -0.15) { started=false; continue; }
        if(!started){ ctx.moveTo(p.x,p.y); started=true; } else ctx.lineTo(p.x,p.y);
      }
      ctx.strokeStyle = 'rgba(37,99,235,0.10)';
      ctx.lineWidth = 1;
      ctx.stroke();
    }

    // route arcs (great-circle-ish curved connectors)
    for(const r of routes){
      const pa = project(r.a.lat, r.a.lon, angle);
      const pb = project(r.b.lat, r.b.lon, angle);
      if(pa.z < -0.25 || pb.z < -0.25) continue;
      const mx = (pa.x + pb.x)/2, my = (pa.y + pb.y)/2;
      const dx = pb.x - pa.x, dy = pb.y - pa.y;
      const dist = Math.hypot(dx,dy);
      const bow = Math.min(dist*0.35, 46);
      const nx = -dy/ (dist||1), ny = dx/(dist||1);
      const cxp = mx + nx*bow, cyp = my + ny*bow;

      ctx.beginPath();
      ctx.moveTo(pa.x, pa.y);
      ctx.quadraticCurveTo(cxp, cyp, pb.x, pb.y);
      ctx.strokeStyle = 'rgba(37,99,235,0.30)';
      ctx.lineWidth = 1;
      ctx.stroke();

      // traveling pulse dot along the curve
      r.offset += r.speed;
      if(r.offset > 1) r.offset -= 1;
      const t = r.offset;
      const px = (1-t)*(1-t)*pa.x + 2*(1-t)*t*cxp + t*t*pb.x;
      const py = (1-t)*(1-t)*pa.y + 2*(1-t)*t*cyp + t*t*pb.y;
      ctx.beginPath();
      ctx.arc(px,py,2.4,0,Math.PI*2);
      ctx.fillStyle = '#2563eb';
      ctx.shadowColor = 'rgba(37,99,235,0.6)';
      ctx.shadowBlur = 8;
      ctx.fill();
      ctx.shadowBlur = 0;
    }

    // dot field, back-to-front
    const sorted = points.map(p=>{
      const proj = project(p.lat, p.lon, angle);
      return {x:proj.x, y:proj.y, z:proj.z, land:p.land};
    }).sort((a,b)=>a.z-b.z);

    for(const p of sorted){
      const depth = (p.z + 1) / 2;
      const size = p.land ? (1.5 + depth*1.7) : (0.8 + depth*1.0);
      const alpha = p.land ? (0.25 + depth*0.75) : (0.08 + depth*0.25);
      ctx.beginPath();
      ctx.arc(p.x,p.y,size,0,Math.PI*2);
      if(p.land && depth > 0.72){
        ctx.shadowColor = 'rgba(37,99,235,0.5)';
        ctx.shadowBlur = 4;
      }
      ctx.fillStyle = p.land
        ? `rgba(37,99,235,${alpha})`
        : `rgba(148,163,184,${alpha*0.6})`;
      ctx.fill();
      ctx.shadowBlur = 0;
    }

    angle += 0.0045;
    requestAnimationFrame(draw);
  }
  draw();
})();

/* ---------------- Auto-scrolling partner logos ---------------- */
(function(){
  // Populated from the WordPress Media Library — see the
  // $vbanx_partner_logos array near the top of this template.
  const logos = <?php echo wp_json_encode( $vbanx_partner_logos ); ?>;

  function renderSet(){
    return logos.map(l => `
      <div class="partner-logo">
        <img src="${l.src}" alt="${l.alt}" loading="lazy">
      </div>
    `).join('');
  }

  const track = document.getElementById('marqueeTrack');
  track.innerHTML = renderSet() + renderSet();
})();

/* ---------------- Module carousel arrows ---------------- */
(function(){
  const track = document.getElementById('moduleTrack');
  const prev = document.getElementById('prevArrow');
  const next = document.getElementById('nextArrow');
  if(!track) return;
  const cardWidth = 300;
  let offset = 0;

  function update(){
    const mask = track.parentElement;
    const maxOffset = Math.max(0, track.scrollWidth - mask.clientWidth);
    offset = Math.min(Math.max(offset,0), maxOffset);
    track.style.transform = `translateX(-${offset}px)`;
  }
  next.addEventListener('click', ()=>{ offset += cardWidth; update(); });
  prev.addEventListener('click', ()=>{ offset -= cardWidth; update(); });
  window.addEventListener('resize', update);
})();

/* ---------------- Scroll reveal ---------------- */
(function(){
  const groups = [
    document.querySelectorAll('.module-card'),
    document.querySelectorAll('.showcase-row'),
    document.querySelectorAll('.perf-card'),
    document.querySelectorAll('.contact-card')
  ];
  groups.forEach(list => list.forEach((el,i)=>{
    el.style.transitionDelay = (i * 70) + 'ms';
  }));

  const io = new IntersectionObserver((entries)=>{
    entries.forEach(entry=>{
      if(entry.isIntersecting){
        entry.target.classList.add('in-view');
        io.unobserve(entry.target);
      }
    });
  }, { threshold: 0.15 });

  groups.forEach(list => list.forEach(el => io.observe(el)));
})();
</script>

