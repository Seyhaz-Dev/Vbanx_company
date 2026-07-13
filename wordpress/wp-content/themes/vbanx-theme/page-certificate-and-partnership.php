<?php

/**
 * Template Name: Certifications & Strategic Partners
 * Description: VBANX certifications, strategic partners, membership & solution partner page.
 */

if (! function_exists('vbx_partner_card')) {
	/**
	 * Reusable partner/certification card.
	 *
	 * @param string $logo   Path or URL to the partner logo image.
	 * @param string $name   Partner display name.
	 * @param string $desc   Short description line under the name.
	 * @param string $badge  Optional small top-right badge text (e.g. "Since 2019").
	 */
	function vbx_partner_card($logo, $name, $desc = '', $badge = '')
	{
		ob_start();
?>
		<div class="vbx-partner-card">
			<div class="vbx-partner-card__header">
				<?php if ($badge) : ?>
					<span class="vbx-partner-card__badge"><?php echo esc_html($badge); ?></span>
				<?php endif; ?>
			</div>
			<div class="vbx-partner-card__body">
				<div class="vbx-partner-card__logo">
					<img src="<?php echo esc_url($logo); ?>" alt="<?php echo esc_attr($name); ?> logo" loading="lazy">
				</div>
				<h3 class="vbx-partner-card__name"><?php echo esc_html($name); ?></h3>
				<?php if ($desc) : ?>
					<p class="vbx-partner-card__desc"><?php echo esc_html($desc); ?></p>
				<?php endif; ?>
			</div>
		</div>
<?php
		return ob_get_clean();
	}
}

if (! function_exists('vbx_logo_url')) {
	/**
	 * Resolve a logo URL by Media Library filename slug (no ID needed).
	 * Looks up the attachment by its slug (filename without extension, as
	 * shown in Media Library) directly against the DB, caches the result,
	 * and falls back to a placeholder if nothing is found so a missing
	 * upload never breaks layout.
	 *
	 * Uses wp_get_attachment_url() (the original uploaded file) rather than
	 * a sized image URL, so it doesn't depend on WP having successfully
	 * generated thumbnail sizes for the attachment.
	 *
	 * To swap a logo from wp-admin: delete the old attachment and upload a
	 * new file with the SAME base filename (e.g. always "cbc.png"), or use
	 * the "Enable Media Replace" plugin to replace the file in place —
	 * no template edit required either way.
	 *
	 * @param string $slug Filename without extension, e.g. 'cbc' for cbc.png.
	 */
	function vbx_logo_url($slug)
	{
		global $wpdb;

		$cache_key = 'vbx_logo_' . $slug;
		$cached    = wp_cache_get($cache_key, 'vbx_logos');
		if (false !== $cached) {
			return $cached;
		}

		// Exact slug match first.
		$post_id = $wpdb->get_var($wpdb->prepare(
			"SELECT ID FROM {$wpdb->posts} WHERE post_type = 'attachment' AND post_name = %s ORDER BY post_date DESC LIMIT 1",
			$slug
		));

		// Fallback for re-uploaded files WP suffixed (cbc-1, cbc-2...).
		if (! $post_id) {
			$post_id = $wpdb->get_var($wpdb->prepare(
				"SELECT ID FROM {$wpdb->posts} WHERE post_type = 'attachment' AND post_name LIKE %s ORDER BY post_date DESC LIMIT 1",
				$wpdb->esc_like($slug) . '%'
			));
		}

		$url = $post_id ? wp_get_attachment_url($post_id) : '';

		if (! $url) {
			$url = get_template_directory_uri() . '/assets/img/partners/placeholder-logo.png';
		}

		wp_cache_set($cache_key, $url, 'vbx_logos', HOUR_IN_SECONDS);

		return $url;
	}
}

get_header();

// ---- Data ------------------------------------------------------------
// 'logo' is the Media Library filename WITHOUT extension (its slug).
// Re-upload a file with the same name to swap the image — no code edit needed.

$strategic_partners = array(
	array('logo' => 'cma',    'name' => 'Cambodia Microfinance Association', 'desc' => 'Industry association'),
	array('logo' => 'cbc',    'name' => 'CBC',                                'desc' => 'Credit Bureau of Cambodia'),
	array('logo' => 'pcg',    'name' => 'PCG',                                'desc' => 'Credit Guarantee Corp.'),
	array('logo' => 'hlb',    'name' => 'HLB Cambodia',                       'desc' => 'Audit & advisory'),
	array('logo' => 'acleda', 'name' => 'ACLEDA Bank',                        'desc' => 'Banking partner'),
	array('logo' => 'pmtk',   'name' => 'PMTK Technology',                    'desc' => 'Technology partner'),
);

$certified_partners = array(
	array('logo' => 'serc', 'name' => 'Securities and Exchange Regulator of Cambodia', 'desc' => 'Regulatory compliance'),
	array('logo' => 'caft', 'name' => 'Cambodian Association of Finance & Technology',  'desc' => 'Membership'),
	array('logo' => 'bni',  'name' => 'BNI',                                             'desc' => 'Business Network International'),
	array('logo' => 'acc',  'name' => 'Architect and Contractor Club',                   'desc' => 'Membership'),
);

$solution_partners = array(
	array('logo' => 'tcg',     'name' => 'TCG',      'desc' => 'Solution partner'),
	array('logo' => 'nttdata', 'name' => 'NTT DATA', 'desc' => 'Solution partner'),
	array('logo' => 'kosign',  'name' => 'KOSIGN',   'desc' => 'Solution partner'),
);

$stats = array(
	array('value' => '4',    'label' => 'Certified Partners'),
	array('value' => '80+',  'label' => 'IFI Customers'),
	array('value' => '100%', 'label' => 'Compliant & Updated'),
	array('value' => '24/7', 'label' => 'Support'),
);
?>

<main class="vbx-certifications-page">

	<!-- HERO -->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<style>
  body{margin:0;font-family:'Poppins','Inter',sans-serif;}

  .hero{
    position:relative;
    min-height:420px;
    padding:60px 60px;
    background:
      linear-gradient(100deg, rgba(10,15,35,0.92) 30%, rgba(10,15,35,0.55) 65%, rgba(10,15,35,0.25) 100%),
      url('http://localhost:8080/wordpress/wp-content/uploads/2026/07/partner-vbanx.png') center/cover no-repeat,
      #0a0f23;
    color:#fff;
    display:flex;
    flex-direction:column;
    
  }

  .hero h1{
    font-size:42px;
    font-weight:700;
    
    line-height:1.2;
  }
  .hero h1 span{color:#e0983c;}

  .hero p{
    max-width:480px;
    color:#c9cdd8;
    font-size:15px;
    line-height:1.6;
    margin:0 0 30px;
  }

  .stats{display:flex;gap:14px;flex-wrap:wrap;max-width:600px;}

  .badge{
    display:flex;
    align-items:center;
    gap:10px;
    background:rgba(255,255,255,0.06);
    border:1px solid rgba(255,255,255,0.12);
    border-radius:10px;
    padding:10px 16px;
  }

  .icon-circle{
    flex:0 0 auto;
    width:34px;height:34px;border-radius:50%;
    background:#e0983c;
    display:flex;align-items:center;justify-content:center;
  }
  .icon-circle svg{width:18px;height:18px;stroke:#16213f;fill:none;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;}

  .badge-text .num{color:#e0983c;font-size:18px;font-weight:700;line-height:1.1;margin:0;}
  .badge-text .label{color:#c9cdd8;font-size:11px;margin:2px 0 0;white-space:nowrap;}
</style>
</head>
<body>

<div class="hero">
  <h1>Certifications &amp;<br><span>Strategic Partners</span></h1>
  <p>VBANX is an authorized IT Provider in the Securities Sector, backed by global audit networks and national banking regulators.</p>

  <div class="stats">

    <div class="badge">
      <div class="icon-circle">
        <svg viewBox="0 0 24 24"><circle cx="12" cy="8" r="6"/><path d="M9 13.5 7 22l5-3 5 3-2-8.5"/></svg>
      </div>
      <div class="badge-text">
        <p class="num">4</p>
        <p class="label">Certified Partners</p>
      </div>
    </div>

    <div class="badge">
      <div class="icon-circle">
        <svg viewBox="0 0 24 24"><circle cx="9" cy="8" r="3.5"/><path d="M2.5 20c0-3.6 2.9-6.5 6.5-6.5s6.5 2.9 6.5 6.5"/><circle cx="17" cy="9" r="3"/><path d="M15.5 13.2c2.9.5 5 2.9 5 6.8"/></svg>
      </div>
      <div class="badge-text">
        <p class="num">80+</p>
        <p class="label">IFI Customers</p>
      </div>
    </div>

    <div class="badge">
      <div class="icon-circle">
        <svg viewBox="0 0 24 24"><path d="M12 2 4 5v6c0 5 3.4 8.7 8 11 4.6-2.3 8-6 8-11V5l-8-3Z"/><path d="M8.5 12l2.5 2.5 4.5-4.5"/></svg>
      </div>
      <div class="badge-text">
        <p class="num">100%</p>
        <p class="label">Compliant &amp; Updated</p>
      </div>
    </div>

    <div class="badge">
      <div class="icon-circle">
        <svg viewBox="0 0 24 24"><path d="M4 13v-1a8 8 0 0 1 16 0v1"/><rect x="3" y="13" width="4" height="6" rx="1.5"/><rect x="17" y="13" width="4" height="6" rx="1.5"/><path d="M19 19v1a3 3 0 0 1-3 3h-3"/></svg>
      </div>
      <div class="badge-text">
        <p class="num">24/7</p>
        <p class="label">Support</p>
      </div>
    </div>

  </div>
</div>

</body>
</html>
	<!-- STRATEGIC PARTNERS -->
	<section class="vbx-section">
		<div class="vbx-container">
			<h2 class="vbx-section__title">Strategic Partners</h2>
			<p class="vbx-section__subtitle">Our strategic alliances span banking infrastructure, cloud, and enterprise technology to deliver a resilient, scalable platform.</p>

			<div class="vbx-grid vbx-grid--4">
				<?php foreach ($strategic_partners as $p) : echo vbx_partner_card(vbx_logo_url($p['logo']), $p['name'], $p['desc']);
				endforeach; ?>
			</div>
		</div>
	</section>

	<!-- CERTIFIED PARTNER & MEMBERSHIP -->
	<section class="vbx-section vbx-section--tint">
		<div class="vbx-container">
			<h2 class="vbx-section__title">Certified Partner &amp; Membership</h2>
			<p class="vbx-section__subtitle">Industry memberships and certifications that underpin VBANX's commitment to global standards and regional expertise.</p>

			<div class="vbx-grid vbx-grid--4">
				<?php foreach ($certified_partners as $p) : echo vbx_partner_card(vbx_logo_url($p['logo']), $p['name'], $p['desc']);
				endforeach; ?>
			</div>
		</div>
	</section>

	<!-- OUR SOLUTION PARTNER -->
	<section class="vbx-section">
		<div class="vbx-container">
			<h2 class="vbx-section__title">Our Solution Partner</h2>

			<div class="vbx-grid vbx-grid--3">
				<?php foreach ($solution_partners as $p) : echo vbx_partner_card(vbx_logo_url($p['logo']), $p['name'], $p['desc']);
				endforeach; ?>
			</div>
		</div>
	</section>

</main>

<style>
	:root {
		--vbx-navy: #16213f;
		--vbx-navy-dark: #0d1428;
		--vbx-gold: #e0983c;
		--vbx-gold-light: #f0b767;
		--vbx-ink: #1c2333;
		--vbx-muted: #6b7280;
		--vbx-bg-tint: #f5f7fb;
		--vbx-border: #e6e9f0;
		--vbx-font-display: 'Poppins', sans-serif;
		--vbx-font-body: 'Inter', sans-serif;
	}

	.vbx-certifications-page {
		font-family: var(--vbx-font-body);
		color: var(--vbx-ink);
	}

	.vbx-container {
		max-width: 1200px;
		margin: 0 auto;
		padding: 0 24px;
	}

	/* HERO */
	.vbx-hero {
		position: relative;
		overflow: hidden;
		padding: 110px 0 90px;
		color: #fff;
	}

	.vbx-hero__bg {
		position: absolute;
		inset: 0;
		background-size: cover;
		background-position: center;
	}

	.vbx-hero__overlay {
		position: absolute;
		inset: 0;
		background: linear-gradient(135deg, rgba(13, 20, 40, .92) 0%, rgba(22, 33, 63, .85) 55%, rgba(22, 33, 63, .55) 100%);
	}

	.vbx-hero__inner {
		position: relative;
		z-index: 1;
	}

	.vbx-hero__title {
		font-family: var(--vbx-font-display);
		font-weight: 600;
		font-size: 44px;
		line-height: 1.15;
		margin: 0 0 18px;
	}

	.vbx-hero__title span {
		color: var(--vbx-gold);
	}

	.vbx-hero__subtitle {
		max-width: 560px;
		font-size: 16px;
		line-height: 1.6;
		color: rgba(255, 255, 255, .8);
		margin: 0 0 48px;
	}

	.vbx-hero__stats {
		display: grid;
		grid-template-columns: repeat(4, 1fr);
		gap: 16px;
		max-width: 760px;
	}

	.vbx-hero__stat {
		background: rgba(255, 255, 255, .06);
		border: 1px solid rgba(255, 255, 255, .15);
		border-radius: 12px;
		padding: 20px 16px;
		backdrop-filter: blur(6px);
	}

	.vbx-hero__stat-icon {
		width: 32px;
		height: 32px;
		border-radius: 50%;
		background: var(--vbx-gold);
		margin-bottom: 10px;
	}

	.vbx-hero__stat-value {
		font-family: var(--vbx-font-display);
		font-weight: 700;
		font-size: 22px;
		color: var(--vbx-gold-light);
	}

	.vbx-hero__stat-label {
		font-size: 12px;
		color: rgba(255, 255, 255, .75);
		margin-top: 4px;
	}

	/* SECTIONS */
	.vbx-section {
		padding: 80px 0;
	}

	.vbx-section--tint {
		background: var(--vbx-bg-tint);
	}

	.vbx-section__title {
		font-family: var(--vbx-font-display);
		font-weight: 600;
		font-size: 30px;
		color: var(--vbx-navy);
		text-align: center;
		margin: 0 0 12px;
	}

	.vbx-section__subtitle {
		text-align: center;
		max-width: 620px;
		margin: 0 auto 48px;
		color: var(--vbx-muted);
		font-size: 15px;
		line-height: 1.6;
	}

	/* GRID */
	.vbx-grid {
		display: grid;
		gap: 24px;
	}

	.vbx-grid--4 {
		grid-template-columns: repeat(4, 1fr);
	}

	.vbx-grid--3 {
		grid-template-columns: repeat(3, 1fr);
	}

	/* CARD */
	.vbx-partner-card {
		background: #fff;
		border: 1px solid var(--vbx-border);
		border-radius: 10px;
		overflow: hidden;
		box-shadow: 0 2px 10px rgba(22, 33, 63, .05);
		transition: transform .2s ease, box-shadow .2s ease;
	}

	.vbx-partner-card:hover {
		transform: translateY(-4px);
		box-shadow: 0 10px 24px rgba(22, 33, 63, .1);
	}

	.vbx-partner-card__header {
		height: 8px;
		background: linear-gradient(90deg, var(--vbx-navy), var(--vbx-gold));
	}

	.vbx-partner-card__body {
		padding: 24px 20px;
		text-align: left;
	}

	.vbx-partner-card__logo {
		width: 44px;
		height: 44px;
		border-radius: 8px;
		background: var(--vbx-bg-tint);
		display: flex;
		align-items: center;
		justify-content: center;
		margin-bottom: 16px;
		overflow: hidden;
	}

	.vbx-partner-card__logo img {
		max-width: 100%;
		max-height: 100%;
		object-fit: contain;
	}

	.vbx-partner-card__name {
		font-family: var(--vbx-font-display);
		font-weight: 600;
		font-size: 15px;
		color: var(--vbx-navy);
		margin: 0 0 4px;
	}

	.vbx-partner-card__desc {
		font-size: 13px;
		color: var(--vbx-muted);
		margin: 0;
	}

	.vbx-partner-card__badge {
		position: absolute;
		font-size: 11px;
	}

	/* RESPONSIVE */
	@media (max-width:960px) {
		.vbx-grid--4 {
			grid-template-columns: repeat(2, 1fr);
		}

		.vbx-grid--3 {
			grid-template-columns: repeat(2, 1fr);
		}

		.vbx-hero__stats {
			grid-template-columns: repeat(2, 1fr);
		}
	}

	@media (max-width:600px) {

		.vbx-grid--4,
		.vbx-grid--3 {
			grid-template-columns: 1fr;
		}

		.vbx-hero__title {
			font-size: 32px;
		}
	}
</style>

<?php get_footer(); ?>
