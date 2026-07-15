

<section class="t24-hero">
  <div class="t24-hero__inner">

    <!-- BACKGROUND: full-bleed photo -->
  
    <svg class="t24-hero__icon t24-hero__icon--wifi" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2">
      <path d="M5 12.5a11 11 0 0 1 14 0"/>
      <path d="M8.5 16a6 6 0 0 1 7 0"/>
      <circle cx="12" cy="19.5" r="1.2" fill="#fff" stroke="none"/>
    </svg>

    <svg class="t24-hero__icon t24-hero__icon--pin" viewBox="0 0 24 24" fill="#fff">
      <path d="M12 2C7.6 2 4 5.6 4 10c0 6 8 12 8 12s8-6 8-12c0-4.4-3.6-8-8-8zm0 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
    </svg>

    <!-- FOREGROUND: text panel, absolutely positioned over the photo -->
    <div class="t24-hero__panel">
      <p class="t24-hero__eyebrow">S.M.A.R.T Digital Banking Transformation</p>

      <h1 class="t24-hero__title">
        <span class="t24-hero__title-accent">OAMBanking
</span>
        <span class="t24-hero__title-main">Operational and Analytical <br>Mobile Banking</span>
      </h1>

      <p class="t24-hero__desc">
            OAMBanking is an intelligent mobile banking solution that gives 
            financial institutions real-time operational control and analytical i
            nsights — enabling executives to monitor performance, approve transactions, 
            and make informed decisions securely from anywhere, at any time.
      </p>

      <a href="#demo" class="t24-hero__cta">Booking a Free Demo</a>

      <div class="t24-hero__logos">
        <img class="t24-logo1 t24-logo--vconnect" src="http://localhost/wordpress/wp-content/uploads/2026/07/logovconnect.jpeg" alt="VConnect logo">
        <img class="t24-logo2 t24-logo--vbanx" src="http://localhost/wordpress/wp-content/uploads/2026/07/logoblue.jpeg" alt="VBANX logo">
      </div>
    </div>

  </div>
</section>
<style>
  .t24-hero, .t24-hero *, .t24-hero *::before, .t24-hero *::after {
    box-sizing: border-box;
  }

  .t24-hero {
    --t24-orange: #f2932e;
    --t24-navy: #1b2f6b;
    --t24-gray: #5a5f6a;
    font-family: 'Montserrat', Arial, sans-serif;
    background: #f4f5f7;
    padding: 0;
  }

  /* BACKGROUND CONTAINER — the photo layer. Everything else is positioned relative to this. */
  .t24-hero__inner {
    position: relative !important;
    max-width: full;
    height: 600px;
    margin: 0 auto !important;
    overflow: hidden;
    box-shadow: 0 20px 50px rgba(20, 30, 60, 0.12);
    background-color: #0a1830;
    background-size: cover;
    background-position: left center;  
    background-image: url('http://localhost/wordpress/wp-content/uploads/2026/07/oamzin-1.png');
  }

  /* TEXT PANEL*/
  .t24-hero__panel {
    position: absolute !important;
    top: 0 !important;
    left: 0 !important;
    width: 800px !important;
    max-width: 100%;
    height: 600px !important;
    background: #ffffff !important;
    padding: 60px 50px 0 80px !important;
    display: flex !important;
    flex-direction: column !important;
    gap: 30px;
    justify-content: flex-start;
    border-radius: 0 0 300px 0 !important; /* top-left top-right bottom-right bottom-left */
    overflow: hidden; /* clip content */
    z-index: 2;
    margin: 0;
    
  }

  .t24-hero__eyebrow {
    color: var(--t24-navy);
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 1.2px;
    text-transform: uppercase;
    margin: 0;
  }

  .t24-hero__title {
    margin: 0;
    line-height: 1.05;
  }

  .t24-hero__title-accent {
    display: block;
    color: var(--t24-orange);
    font-size: 50px;
    font-weight: 800;
  }

  .t24-hero__title-main {
    display: block;
    color: var(--t24-navy);
    font-size: 39px;
    font-weight: 800;
    margin-top: 2px;
  }

  .t24-hero__desc {
    color: var(--t24-gray);
    font-size: 18px;
    line-height: 1.6;
    max-width: 520px;
    margin: 0;
  }

    .t24-logo1 {
    height: 60px;
    width: auto;
    }
    .t24-logo2 {
    height: 60px;
    width: auto
    }
    .t24-hero__cta {
    display: inline-block;
    align-self: flex-start;
    background: var(--t24-orange);
    color: #fff;
    font-weight: 700;
    font-size: 14px;
    text-decoration: none;
    padding: 14px 30px;
    border-radius: 30px;
    box-shadow: 0 10px 20px rgba(242, 147, 46, 0.35);
    transition: transform 0.15s ease, box-shadow 0.15s ease;
  }
  .t24-hero__cta:hover {
    transform: translateY(-2px);
    box-shadow: 0 14px 26px rgba(242, 147, 46, 0.45);
  }
  .t24-hero__cta:focus-visible {
    outline: 3px solid var(--t24-navy);
    outline-offset: 2px;
  }

  .t24-hero__logos {
   
    display: flex;
    align-items: center;
    gap: 26px;
    flex-wrap: wrap;

  }
  .t24-logo { height: 34px; width: auto; }

  /* ICONS + BADGE — positioned relative to .t24-hero__inner (the photo layer) */
  .t24-hero__badge {
    position: absolute;
    top: 50%;
    left: 72%;
    transform: translate(-50%, -50%);
    color: #fff;
    font-size: 30px;
    font-weight: 800;
    letter-spacing: 3px;
    padding: 14px 26px;
    border: 2px solid rgba(255,255,255,0.6);
    background: rgba(10, 24, 48, 0.35);
    backdrop-filter: blur(2px);
    z-index: 1;
    white-space: nowrap;
  }

  .t24-hero__icon { position: absolute; z-index: 1; }
  .t24-hero__icon--wifi { top: 34px; right: 60px; width: 34px; height: 34px; opacity: 0.9; }
  .t24-hero__icon--pin { bottom: 28px; right: 50px; width: 26px; height: 26px; opacity: 0.9; }

  /* RESPONSIVE */
  @media (max-width: 1000px) {
    .t24-hero__panel {
      width: 55% !important;
      padding: 50px 40px 0 60px !important;
    }
    .t24-hero__badge { left: 78%; font-size: 24px; }
  }

  @media (max-width: 860px) {
    .t24-hero__inner {
      height: auto !important;
      min-height: 520px;
      box-shadow: none;
    }
    .t24-hero__panel {
      position: relative !important;
      width: 100% !important;
      height: auto !important;
      padding: 40px 24px !important;
      border-radius: 0 !important;
    }
    .t24-hero__badge,
    .t24-hero__icon { display: none; }
    .t24-hero__title-accent { font-size: 36px; }
    .t24-hero__title-main { font-size: 28px; }
  }

  @media (prefers-reduced-motion: reduce) {
    .t24-hero__cta { transition: none; }
  }
</style>