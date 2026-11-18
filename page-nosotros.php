<?php
/**
 * Page Template: About Us
 * Tema BuyInLatam B2B
 */

get_header(); ?>

<div class="site-wrapper">
    <!-- About Us Hero Banner -->
    <section class="page-hero">
        <div class="container">
            <h4 style="color:var(--accent-yellow); font-weight:700; text-transform:uppercase; letter-spacing:2px; margin-bottom:10px;"><i class="fas fa-globe-americas"></i> OUR STORY AND MISSION</h4>
            <h1>About BuyInLatam</h1>
            <p>We connect the finest products from Peru and Latin America directly with buyers and importers around the world.</p>
        </div>
    </section>

    <main class="page-content-wrapper">
        <div class="container">
            
            <!-- Introduction Block -->
            <div style="display:grid; grid-template-columns:1fr 1fr; gap:50px; align-items:center; margin-bottom:70px;">
                <div>
                    <span style="color:var(--primary-blue); font-weight:700; text-transform:uppercase; font-size:14px; letter-spacing:1px;">Export Excellence</span>
                    <h2 style="font-family:var(--font-title); font-size:36px; margin:10px 0 20px 0; color:var(--text-primary);">We bring the best of our land to every corner of the planet</h2>
                    <p style="color:var(--text-secondary); line-height:1.8; font-size:16px;">
                        <strong>BuyInLatam</strong> was founded with a clear purpose: to be the B2B trade bridge between Latin America's highest-quality producers and the most demanding brands, distributors and retailers in Europe, North America and Asia.
                    </p>
                    <p style="color:var(--text-secondary); line-height:1.8; font-size:16px;">
                        We specialize in the wholesale export of <strong>Peruvian alpaca garments, fine-flavor cacao, single-origin coffee and select grains</strong>, and we also offer private-label services (OEM / White Label) for your product lines.
                    </p>
                </div>
                <div>
                    <img src="https://images.unsplash.com/photo-1549488344-c5a452efeb33?auto=format&fit=crop&w=800&q=80" alt="Peruvian Alpaca Textiles" style="width:100%; border-radius:16px; box-shadow:var(--shadow-lg);">
                </div>
            </div>

            <!-- Values / Pillars -->
            <div style="background:white; padding:50px; border-radius:16px; border:1px solid var(--border-color); box-shadow:var(--shadow-sm); margin-bottom:70px;">
                <div class="section-header" style="margin-top:0;">
                    <h2 class="section-title">Our Business Pillars</h2>
                    <div class="title-divider"></div>
                </div>

                <div style="display:grid; grid-template-columns:repeat(3, 1fr); gap:30px; margin-top:40px;">
                    <div style="text-align:center; padding:20px;">
                        <div style="width:70px; height:70px; background:var(--primary-blue-light); color:var(--primary-blue); border-radius:50%; display:flex; align-items:center; justify-content:center; font-size:30px; margin:0 auto 20px;">
                            <i class="fas fa-tags"></i>
                        </div>
                        <h3 style="font-family:var(--font-title); font-size:20px; margin-bottom:10px;">Your Brand Included</h3>
                        <p style="color:var(--text-secondary); font-size:15px;">We pack and label products with your company logo or trademark so you can sell directly to your customers.</p>
                    </div>

                    <div style="text-align:center; padding:20px;">
                        <div style="width:70px; height:70px; background:var(--primary-blue-light); color:var(--primary-blue); border-radius:50%; display:flex; align-items:center; justify-content:center; font-size:30px; margin:0 auto 20px;">
                            <i class="fas fa-award"></i>
                        </div>
                        <h3 style="font-family:var(--font-title); font-size:20px; margin-bottom:10px;">Certified Quality</h3>
                        <p style="color:var(--text-secondary); font-size:15px;">We carefully select our raw materials and uphold Peru's highest phytosanitary and textile standards.</p>
                    </div>

                    <div style="text-align:center; padding:20px;">
                        <div style="width:70px; height:70px; background:var(--primary-blue-light); color:var(--primary-blue); border-radius:50%; display:flex; align-items:center; justify-content:center; font-size:30px; margin:0 auto 20px;">
                            <i class="fas fa-shipping-fast"></i>
                        </div>
                        <h3 style="font-family:var(--font-title); font-size:20px; margin-bottom:10px;">Global Logistics</h3>
                        <p style="color:var(--text-secondary); font-size:15px;">We handle customs documentation and sea or air freight to the port of your choice.</p>
                    </div>
                </div>
            </div>

            <!-- Call to Action -->
            <div style="background:linear-gradient(135deg, #0052CC 0%, #0066FF 100%); color:white; padding:50px; border-radius:16px; text-align:center;">
                <h2 style="font-family:var(--font-title); font-size:32px; margin:0 0 15px 0; text-transform:uppercase;">Ready to import the best of Latin America?</h2>
                <p style="font-size:18px; color:#E2E8F0; max-width:600px; margin:0 auto 30px;">Talk directly with our export specialists and get a quote tailored to your volume.</p>
                <a href="https://wa.me/51969765560?text=Hello,%20I%20would%20like%20a%20quote%20for%20import%20products" target="_blank" class="btn-yellow" style="font-size:16px; padding:16px 36px;">
                    <i class="fab fa-whatsapp" style="font-size:20px;"></i> Contact an Export Advisor
                </a>
            </div>

        </div>
    </main>
</div>

<?php get_footer(); ?>
