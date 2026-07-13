<?php
/**
 * Template Name: Certifications & Strategic Partners
 * Description: VBANX partners/certifications page — hero, strategic partners,
 *               certified memberships, solution partners.
 */

get_header();
?>

<style>
/* ===== VBANX Partners Page — scoped to .vbx-partners ===== */
.vbx-partners {
  --navy: #16213f;
  --navy-deep: #0e1730;
  --blue: #1e4fd8;
  --amber: #e0983c;
  --lavender: #eef1fa;
  --text-muted: #6b7280;
  font-family: 'Inter', sans-serif;
}
.vbx-partners h1, .vbx-partners h2, .vbx-partners h3 {
  font-family: 'Poppins', sans-serif;
}
.vbx-partners .wrap { max-width: 1200px; margin: 0 auto; padding: 0 24px; }

/* --- Hero --- */
.vbx-hero {
  position: relative;
  background: linear-gradient(120deg, var(--navy-deep) 0%, var(--navy) 60%, var(--blue) 130%);
  color: #fff;
  padding: 90px 0 70px;
  overflow: hidden;
}
.vbx-hero::before {
  content: "";
  position: absolute; inset: 0;
  background-image: url('<?php echo esc_url( get_template_directory_uri() . "/assets/img/network-lines.svg" ); ?>');
  background-size: cover;
  background-position: center;
  opacity: .25;
  pointer-events: none;
}
.vbx-hero .wrap { position: relative; z-index: 2; display: flex; flex-wrap: wrap; gap: 40px; }
.vbx-hero-top { display: flex; align-items: center; gap: 40px; flex-wrap: wrap; width: 100%; }
.vbx-hero-copy { flex: 1 1 460px; }
.vbx-hero h1 { font-size: 2.6rem; font-weight: 700; line-height: 1.15; margin: 0 0 16px; }
.vbx-hero h1 span { color: var(--amber); }
.vbx-hero p { color: #cdd4e6; max-width: 480px; margin: 0 0 32px; line-height: 1.6; }

.vbx-stats {
  display: flex;
  background: rgba(255,255,255,.04);
  border: 1px solid rgba(224,152,60,.35);
  border-radius: 16px;
  padding: 24px 10px;
  box-shadow: 0 0 24px rgba(224,152,60,.12), inset 0 0 40px rgba(30,79,216,.15);
  backdrop-filter: blur(6px);
}
.vbx-stat {
  flex: 1;
  text-align: center;
  padding: 0 16px;
  position: relative;
}
.vbx-stat + .vbx-stat::before {
  content: "";
  position: absolute; left: 0; top: 8px; bottom: 8px;
  width: 1px;
  background: rgba(255,255,255,.15);
}
.vbx-stat .icon {
  width: 46px; height: 46px; margin: 0 auto 12px;
  border-radius: 50%;
  border: 2px solid var(--amber);
  background: transparent;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.1rem; color: var(--amber);
}
.vbx-stat .num { font-size: 1.5rem; font-weight: 700; color: var(--amber); line-height: 1.2; }
.vbx-stat .label { font-size: .8rem; color: #e7ebf7; margin-top: 4px; line-height: 1.3; }
@media (max-width: 560px) {
  .vbx-stats { flex-wrap: wrap; }
  .vbx-stat { flex: 1 1 45%; margin-bottom: 16px; }
  .vbx-stat + .vbx-stat::before { display: none; }
}

.vbx-hero-media { flex: 1 1 420px; }
.vbx-hero-media img { width: 100%; border-radius: 12px; display: block; }
.vbx-placeholder {
  width: 100%; aspect-ratio: 4/3;
  border: 2px dashed rgba(255,255,255,.35);
  border-radius: 12px;
  display: flex; align-items: center; justify-content: center;
  color: rgba(255,255,255,.6);
  font-size: .85rem; text-align: center;
}

/* --- Section shell --- */
.vbx-section { padding: 70px 0; }
.vbx-section.alt { background: var(--lavender); }
.vbx-section-head { text-align: center; margin-bottom: 40px; }
.vbx-section-head h2 { font-size: 1.9rem; font-weight: 700; color: var(--navy); margin: 0 0 10px; }
.vbx-section-head p { color: var(--text-muted); max-width: 560px; margin: 0 auto; }

/* --- Card grid --- */
.vbx-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 24px;
}
.vbx-grid.cols-3 { grid-template-columns: repeat(3, 1fr); }
@media (max-width: 900px) { .vbx-grid { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 560px) { .vbx-grid, .vbx-grid.cols-3 { grid-template-columns: 1fr; } }

.vbx-card {
  background: #fff;
  border: 1px solid #e6e9f2;
  border-radius: 10px;
  overflow: hidden;
  box-shadow: 0 2px 10px rgba(22,33,63,.05);
}
.vbx-card-top { background: var(--navy); height: 8px; }
.vbx-card-body { padding: 22px 18px; text-align: center; }
.vbx-card-body .logo {
  width: 56px; height: 56px; margin: 0 auto 14px;
  display: flex; align-items: center; justify-content: center;
  border-radius: 50%; background: var(--lavender);
  font-weight: 700; color: var(--navy);
}
.vbx-card-body .logo img { max-width: 70%; max-height: 70%; }
.vbx-card-body .logo.placeholder {
  background: transparent;
  border: 2px dashed #c7cde0;
  color: #9aa3c0;
  font-size: .65rem;
  line-height: 1.2;
}
.vbx-card-body h3 { font-size: .95rem; font-weight: 600; color: var(--navy); margin: 0 0 4px; }
.vbx-card-body .role { font-size: .78rem; color: var(--text-muted); margin: 0 0 12px; }
.vbx-card-body .status {
  display: inline-flex; align-items: center; gap: 6px;
  font-size: .72rem; color: #2f9e5b; font-weight: 600;
}
.vbx-card-body .status::before {
  content: ""; width: 6px; height: 6px; border-radius: 50%; background: #2f9e5b;
}

/* --- Footer --- */
.vbx-footer { background: var(--navy-deep); color: #b7c0dc; padding: 60px 0 0; font-size: .88rem; }
.vbx-footer .wrap { display: grid; grid-template-columns: 1.6fr 1fr 1fr 1fr; gap: 32px; }
.vbx-footer h4 { color: #fff; font-size: .95rem; margin: 0 0 16px; }
.vbx-footer ul { list-style: none; margin: 0; padding: 0; }
.vbx-footer ul li { margin-bottom: 10px; }
.vbx-footer a { color: #b7c0dc; text-decoration: none; }
.vbx-footer a:hover { color: var(--amber); }
.vbx-footer-brand p { line-height: 1.6; max-width: 320px; }
.vbx-footer-social { display: flex; gap: 10px; margin-top: 16px; }
.vbx-footer-social a {
  width: 32px; height: 32px; border-radius: 50%; border: 1px solid #33406a;
  display: flex; align-items: center; justify-content: center;
}
.vbx-footer-bottom {
  border-top: 1px solid #24304f; margin-top: 40px; padding: 20px 0;
  display: flex; justify-content: space-between; flex-wrap: wrap; gap: 10px;
  font-size: .78rem;
}
.vbx-footer-bottom .links { display: flex; gap: 20px; }
@media (max-width: 800px) {
  .vbx-footer .wrap { grid-template-columns: 1fr 1fr; }
}
</style>

<main class="vbx-partners">

  <!-- HERO -->
  <section class="vbx-hero">
    <div class="wrap">
      <div class="vbx-hero-top">
        <div class="vbx-hero-copy">
          <h1>Certifications &amp;<br><span>Strategic Partners</span></h1>
          <p>VBANX is an authorized IT provider in the Securities Sector, backed by global south networks and national banking regulators.</p>
        </div>
        <div class="vbx-hero-media">
          <div class="vbx-placeholder">Hero image<br>(add your own)</div>
        </div>
      </div>
      <div class="vbx-stats">
          <div class="vbx-stat">
            <div class="icon">✓</div>
            <div class="num">4</div>
            <div class="label">Certified Partners</div>
          </div>
          <div class="vbx-stat">
            <div class="icon">👥</div>
            <div class="num">80+</div>
            <div class="label">BFI Customers</div>
          </div>
          <div class="vbx-stat">
            <div class="icon">🛡️</div>
            <div class="num">100%</div>
            <div class="label">Compliant &amp; Updated</div>
          </div>
          <div class="vbx-stat">
            <div class="icon">🎧</div>
            <div class="num">24/7</div>
            <div class="label">Support</div>
          </div>
      </div>
    </div>
  </section>

  <!-- STRATEGIC PARTNERS -->
  <section class="vbx-section">
    <div class="wrap">
      <div class="vbx-section-head">
        <h2>Strategic Partners</h2>
        <p>Our strategic alliances span banking infrastructure, cloud, and enterprise technology to deliver a resilient, scalable platform.</p>
      </div>
      <div class="vbx-grid">
        <?php
        $strategic_partners = array(
          array( 'name' => 'Cambodia Microfinance Association', 'role' => 'Strategic Partner', 'logo' => '' ),
          array( 'name' => 'CBC', 'role' => 'Credit Bureau Cambodia', 'logo' => '' ),
          array( 'name' => 'PCG', 'role' => 'Certified technical partner', 'logo' => '' ),
          array( 'name' => 'HLB Cambodia', 'role' => 'Audit &amp; assurance partner', 'logo' => '' ),
          array( 'name' => 'ACLEDA Bank', 'role' => 'Banking partner', 'logo' => '' ),
          array( 'name' => 'PMTK Technology', 'role' => 'Technology partner', 'logo' => '' ),
        );
        foreach ( $strategic_partners as $p ) : ?>
          <div class="vbx-card">
            <div class="vbx-card-top"></div>
            <div class="vbx-card-body">
              <?php if ( ! empty( $p['logo'] ) ) : ?>
                <div class="logo">
                  <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/partners/' . $p['logo'] ); ?>" alt="<?php echo esc_attr( $p['name'] ); ?>">
                </div>
              <?php else : ?>
                <div class="logo placeholder">logo</div>
              <?php endif; ?>
              <h3><?php echo esc_html( $p['name'] ); ?></h3>
              <p class="role"><?php echo esc_html( $p['role'] ); ?></p>
              <span class="status">Active</span>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- CERTIFIED PARTNER & MEMBERSHIP -->
  <section class="vbx-section alt">
    <div class="wrap">
      <div class="vbx-section-head">
        <h2>Certified Partner &amp; Membership</h2>
        <p>Industry memberships and certifications that underpin VBANX's commitment to global standards and regional expertise.</p>
      </div>
      <div class="vbx-grid">
        <?php
        $memberships = array(
          array( 'name' => 'Securities and Exchange Regulator of Cambodia', 'role' => 'Certified provider', 'logo' => '' ),
          array( 'name' => 'Cambodian Association of Finance &amp; Technology', 'role' => 'Member', 'logo' => '' ),
          array( 'name' => 'BNI', 'role' => 'Business network member', 'logo' => '' ),
          array( 'name' => 'Architect and Contractor Club', 'role' => 'Member', 'logo' => '' ),
        );
        foreach ( $memberships as $p ) : ?>
          <div class="vbx-card">
            <div class="vbx-card-top"></div>
            <div class="vbx-card-body">
              <?php if ( ! empty( $p['logo'] ) ) : ?>
                <div class="logo">
                  <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/partners/' . $p['logo'] ); ?>" alt="<?php echo esc_attr( $p['name'] ); ?>">
                </div>
              <?php else : ?>
                <div class="logo placeholder">logo</div>
              <?php endif; ?>
              <h3><?php echo esc_html( $p['name'] ); ?></h3>
              <p class="role"><?php echo esc_html( $p['role'] ); ?></p>
              <span class="status">Active</span>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- SOLUTION PARTNERS -->
  <section class="vbx-section">
    <div class="wrap">
      <div class="vbx-section-head">
        <h2>Our Solution Partner</h2>
      </div>
      <div class="vbx-grid cols-3">
        <?php
        $solution_partners = array(
          array( 'name' => 'TCG', 'role' => 'Solution partner', 'logo' => '' ),
          array( 'name' => 'NTT DATA', 'role' => 'Global technology partner', 'logo' => '' ),
          array( 'name' => 'KOSIGN', 'role' => 'Digital signature partner', 'logo' => '' ),
        );
        foreach ( $solution_partners as $p ) : ?>
          <div class="vbx-card">
            <div class="vbx-card-top"></div>
            <div class="vbx-card-body">
              <?php if ( ! empty( $p['logo'] ) ) : ?>
                <div class="logo">
                  <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/partners/' . $p['logo'] ); ?>" alt="<?php echo esc_attr( $p['name'] ); ?>">
                </div>
              <?php else : ?>
                <div class="logo placeholder">logo</div>
              <?php endif; ?>
              <h3><?php echo esc_html( $p['name'] ); ?></h3>
              <p class="role"><?php echo esc_html( $p['role'] ); ?></p>
              <span class="status">Active</span>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- FOOTER -->
  <footer class="vbx-footer">
    <div class="wrap">
      <div class="vbx-footer-brand">
        <h4>VBANX</h4>
        <p>Empowering financial institutions with innovative digital banking solutions across the region.</p>
        <div class="vbx-footer-social">
          <a href="#" aria-label="Facebook">f</a>
          <a href="#" aria-label="LinkedIn">in</a>
          <a href="#" aria-label="Telegram">t</a>
          <a href="#" aria-label="YouTube">y</a>
        </div>
      </div>
      <div>
        <h4>Quick Link</h4>
        <ul>
          <li><a href="#">Solution</a></li>
          <li><a href="#">About Us</a></li>
          <li><a href="#">EcoSystem</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
      </div>
      <div>
        <h4>What We Do</h4>
        <ul>
          <li><a href="#">VBANKanking</a></li>
          <li><a href="#">VBANConsumer</a></li>
          <li><a href="#">TSI</a></li>
          <li><a href="#">Cambodia</a></li>
        </ul>
      </div>
      <div>
        <h4>Get In Touch</h4>
        <ul>
          <li>Email: query@vbanx.com</li>
          <li>Phone: 0575075/067 123187</li>
        </ul>
        <h4>Head Office</h4>
        <ul>
          <li>Address: Building 83s, Road 60, Vear Village, Chrey Changvar commune, Chrey Changvar district, Phnom Penh, Cambodia</li>
        </ul>
      </div>
    </div>
    <div class="wrap vbx-footer-bottom">
      <span>&copy; <?php echo esc_html( date( 'Y' ) ); ?> Vbanx.Master. Powered by VBXNEXT Cambodia Co., Ltd.</span>
      <span class="links">
        <a href="#">Privacy Policy</a>
        <a href="#">Terms of Use</a>
        <a href="#">Cookie Policy</a>
      </span>
    </div>
  </footer>

</main>

<?php get_footer(); ?>