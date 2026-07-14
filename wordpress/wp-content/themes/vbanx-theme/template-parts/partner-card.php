<?php
/** @var array $args */
$args = wp_parse_args( $args, [
    'logo'        => '',
    'name'        => '',
    'tag'         => '',
    'description' => '',

    
] );
?>
<div class="card">

    <div class="card-top">
        <svg viewBox="0 0 300 30" preserveAspectRatio="none">
            <path d="M0 15 Q25 5 50 15 T100 15 T150 15 T200 15 T250 15 T300 15 V30 H0 Z"
                fill="rgba(255,255,255,.15)" />
        </svg>
    </div>

    <div class="card-body">

        <div class="logo">
            <img src="<?php echo esc_url($args['logo']); ?>" alt="<?php echo esc_attr($args['name']); ?>">
        </div>

        <span class="tag">
            <?php echo esc_html($args['tag']); ?>
        </span>

        <p class="name">
            <?php echo esc_html($args['name']); ?>
        </p>

        <p class="desc">
            <?php echo esc_html($args['description']); ?>
        </p>

        <div class="divider"></div>

        <div class="verified">
            <svg viewBox="0 0 24 24">
                <path d="M12 2 4 5v6c0 5 3.4 8.7 8 11 4.6-2.3 8-6 8-11V5l-8-3Z"/>
                <path d="M8.5 12l2.5 2.5 4.5-4.5"/>
            </svg>
            VERIFIED
        </div>

    </div>

</div>

