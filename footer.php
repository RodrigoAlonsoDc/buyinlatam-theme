    <footer class="site-footer">
        <div class="footer-widgets">
            <div class="footer-widget about-widget">
                <div class="footer-logo-wrap">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="BuyInLatam Logo" class="footer-logo" onerror="this.style.display='none'; document.getElementById('footer-text-logo').style.display='block';">
                    <div id="footer-text-logo" style="display:none; color:white; font-family:var(--font-title); font-size:24px; font-weight:800; margin-bottom:15px;">
                        BUY IN <span style="color:var(--accent-yellow);">LATAM</span>
                    </div>
                </div>
                <p>BuyInLatam is the premier B2B export boutique dedicated to delivering the finest Latin American products worldwide. Direct export, certified quality.</p>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            
            <div class="footer-widget links-widget">
                <h4 class="widget-title">Quick Links</h4>
                <ul>
                    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/?post_type=product' ) ); ?>">Product Catalog</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/nosotros' ) ); ?>">About Us</a></li>
                    <li><a href="<?php echo esc_url( function_exists('buyinlatam_get_contact_url') ? buyinlatam_get_contact_url() : home_url( '/?page_id=29' ) ); ?>">Contact</a></li>
                </ul>
            </div>
            
            <div class="footer-widget contact-widget">
                <h4 class="widget-title">Contact</h4>
                <ul>
                    <li><i class="fas fa-map-marker-alt"></i> Lima, Peru</li>
                    <li><i class="fas fa-envelope"></i> <a href="mailto:Info@buyinlatam.com" style="color: inherit; text-decoration: none;">Info@buyinlatam.com</a></li>
                    <li><i class="fab fa-whatsapp"></i> +51 997 309 032</li>
                </ul>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> BuyInLatam. All rights reserved. Built with excellence for global trade.</p>
        </div>
    </footer>
    
    <!-- WhatsApp Floating Button -->
    <a href="https://wa.me/51997309032?text=Hello,%20I%20would%20like%20more%20information%20about%20export%20orders" class="floating-whatsapp" target="_blank" title="Contact via WhatsApp">
        <i class="fab fa-whatsapp"></i>
    </a>

    <!-- Palette Customizer Button -->
    <button id="btn-open-palette-modal" class="floating-palette-btn" title="Customize Color Palette">
        <i class="fas fa-cog"></i>
        <span class="palette-tooltip">Color Palettes</span>
    </button>

    <!-- Modal / Drawer Selector de Paletas -->
    <div id="palette-modal-backdrop" class="palette-modal-backdrop">
        <div class="palette-modal-card">
            <div class="palette-modal-header">
                <div>
                    <h3 class="palette-modal-title"><i class="fas fa-palette"></i> Selector de Paletas</h3>
                    <p class="palette-modal-subtitle">Prueba combinaciones de color en tiempo real para BuyInLatam</p>
                </div>
                <button id="btn-close-palette-modal" class="palette-close-btn">&times;</button>
            </div>

            <div class="palette-options-grid">
                <!-- Paleta 1: Azul Real & Oro (Oficial) -->
                <div class="palette-card active" onclick="applyThemePalette('palette-official', this)">
                    <div class="palette-badge-check"><i class="fas fa-check"></i></div>
                    <div class="palette-colors-preview">
                        <span style="background:#0066FF;"></span>
                        <span style="background:#FFC700;"></span>
                        <span style="background:#F8FAFC;"></span>
                        <span style="background:#0F172A;"></span>
                    </div>
                    <div class="palette-info">
                        <strong>1. Azul Real & Oro (Oficial)</strong>
                        <span>Línea institucional limpia y vibrante</span>
                    </div>
                </div>

                <!-- Paleta 2: Dark Mode Premium -->
                <div class="palette-card" onclick="applyThemePalette('palette-dark', this)">
                    <div class="palette-badge-check"><i class="fas fa-check"></i></div>
                    <div class="palette-colors-preview">
                        <span style="background:#0066FF;"></span>
                        <span style="background:#FFC700;"></span>
                        <span style="background:#0B132B;"></span>
                        <span style="background:#FFFFFF;"></span>
                    </div>
                    <div class="palette-info">
                        <strong>2. Dark Mode B2B</strong>
                        <span>Estética oscura de alto impacto visual</span>
                    </div>
                </div>

                <!-- Paleta 3: Verde Andino & Oro -->
                <div class="palette-card" onclick="applyThemePalette('palette-green', this)">
                    <div class="palette-badge-check"><i class="fas fa-check"></i></div>
                    <div class="palette-colors-preview">
                        <span style="background:#059669;"></span>
                        <span style="background:#F59E0B;"></span>
                        <span style="background:#F9FAFB;"></span>
                        <span style="background:#111827;"></span>
                    </div>
                    <div class="palette-info">
                        <strong>3. Verde Andino & Oro</strong>
                        <span>Ideal para agroexportación y café</span>
                    </div>
                </div>

                <!-- Paleta 4: Terracota & Cacao -->
                <div class="palette-card" onclick="applyThemePalette('palette-terracotta', this)">
                    <div class="palette-badge-check"><i class="fas fa-check"></i></div>
                    <div class="palette-colors-preview">
                        <span style="background:#C2410C;"></span>
                        <span style="background:#FBBF24;"></span>
                        <span style="background:#FFFBEB;"></span>
                        <span style="background:#1C1917;"></span>
                    </div>
                    <div class="palette-info">
                        <strong>4. Terracota & Cacao</strong>
                        <span>Identidad cálida, artesanal y textil</span>
                    </div>
                </div>

                <!-- Paleta 5: Azul Marino Prestige -->
                <div class="palette-card" onclick="applyThemePalette('palette-navy', this)">
                    <div class="palette-badge-check"><i class="fas fa-check"></i></div>
                    <div class="palette-colors-preview">
                        <span style="background:#0A1931;"></span>
                        <span style="background:#FFC700;"></span>
                        <span style="background:#F1F5F9;"></span>
                        <span style="background:#0F172A;"></span>
                    </div>
                    <div class="palette-info">
                        <strong>5. Azul Marino Prestige</strong>
                        <span>Elegancia ejecutiva y sobria</span>
                    </div>
                </div>

                <!-- Paleta 6: Black & Gold Luxury -->
                <div class="palette-card" onclick="applyThemePalette('palette-black-gold', this)">
                    <div class="palette-badge-check"><i class="fas fa-check"></i></div>
                    <div class="palette-colors-preview">
                        <span style="background:#18181B;"></span>
                        <span style="background:#EAB308;"></span>
                        <span style="background:#09090B;"></span>
                        <span style="background:#FAFAFA;"></span>
                    </div>
                    <div class="palette-info">
                        <strong>6. Black & Gold Luxury</strong>
                        <span>Boutique de lujo para alpaca selecta</span>
                    </div>
                </div>
            </div>

            <div class="palette-modal-footer">
                <button class="btn-reset-palette" onclick="resetThemePalette()">
                    <i class="fas fa-undo"></i> Restablecer Colores por Defecto
                </button>
            </div>
        </div>
    </div>

    <!-- Script del Selector de Paletas -->
    <script>
    const themePalettes = {
        'palette-official': {
            '--primary-blue': '#0066FF',
            '--primary-blue-dark': '#004FCA',
            '--primary-blue-hover': '#0056E0',
            '--primary-blue-light': '#EBF3FF',
            '--accent-yellow': '#FFC700',
            '--accent-yellow-hover': '#E6B400',
            '--bg-main': '#F8FAFC',
            '--bg-surface': '#FFFFFF',
            '--bg-card': '#FFFFFF',
            '--bg-dark-header': '#0066FF',
            '--bg-footer': '#0A1931',
            '--text-primary': '#0F172A',
            '--text-secondary': '#475569',
            '--border-color': '#E2E8F0'
        },
        'palette-dark': {
            '--primary-blue': '#0066FF',
            '--primary-blue-dark': '#004FCA',
            '--primary-blue-hover': '#0056E0',
            '--primary-blue-light': 'rgba(0, 102, 255, 0.15)',
            '--accent-yellow': '#FFC700',
            '--accent-yellow-hover': '#E6B400',
            '--bg-main': '#0B132B',
            '--bg-surface': '#1C2541',
            '--bg-card': '#1C2541',
            '--bg-dark-header': '#0B132B',
            '--bg-footer': '#060A17',
            '--text-primary': '#F8FAFC',
            '--text-secondary': '#CBD5E1',
            '--border-color': '#2E3856'
        },
        'palette-green': {
            '--primary-blue': '#059669',
            '--primary-blue-dark': '#047857',
            '--primary-blue-hover': '#10B981',
            '--primary-blue-light': '#ECFDF5',
            '--accent-yellow': '#F59E0B',
            '--accent-yellow-hover': '#D97706',
            '--bg-main': '#F9FAFB',
            '--bg-surface': '#FFFFFF',
            '--bg-card': '#FFFFFF',
            '--bg-dark-header': '#059669',
            '--bg-footer': '#064E3B',
            '--text-primary': '#111827',
            '--text-secondary': '#4B5563',
            '--border-color': '#E5E7EB'
        },
        'palette-terracotta': {
            '--primary-blue': '#C2410C',
            '--primary-blue-dark': '#9A3412',
            '--primary-blue-hover': '#EA580C',
            '--primary-blue-light': '#FFF7ED',
            '--accent-yellow': '#FBBF24',
            '--accent-yellow-hover': '#F59E0B',
            '--bg-main': '#FFFBEB',
            '--bg-surface': '#FFFFFF',
            '--bg-card': '#FFFFFF',
            '--bg-dark-header': '#C2410C',
            '--bg-footer': '#431407',
            '--text-primary': '#1C1917',
            '--text-secondary': '#57534E',
            '--border-color': '#E7E5E4'
        },
        'palette-navy': {
            '--primary-blue': '#0A1931',
            '--primary-blue-dark': '#060F1E',
            '--primary-blue-hover': '#152C53',
            '--primary-blue-light': '#E2E8F0',
            '--accent-yellow': '#FFC700',
            '--accent-yellow-hover': '#E6B400',
            '--bg-main': '#F8FAFC',
            '--bg-surface': '#FFFFFF',
            '--bg-card': '#FFFFFF',
            '--bg-dark-header': '#0A1931',
            '--bg-footer': '#060F1E',
            '--text-primary': '#0F172A',
            '--text-secondary': '#334155',
            '--border-color': '#CBD5E1'
        },
        'palette-black-gold': {
            '--primary-blue': '#EAB308',
            '--primary-blue-dark': '#CA8A04',
            '--primary-blue-hover': '#FACC15',
            '--primary-blue-light': 'rgba(234, 179, 8, 0.15)',
            '--accent-yellow': '#FDE047',
            '--accent-yellow-hover': '#EAB308',
            '--bg-main': '#09090B',
            '--bg-surface': '#18181B',
            '--bg-card': '#18181B',
            '--bg-dark-header': '#18181B',
            '--bg-footer': '#000000',
            '--text-primary': '#FAFAFA',
            '--text-secondary': '#A1A1AA',
            '--border-color': '#27272A'
        }
    };

    function applyThemePalette(paletteKey, cardEl) {
        const palette = themePalettes[paletteKey];
        if (!palette) return;

        const root = document.documentElement;
        for (const [prop, val] of Object.entries(palette)) {
            root.style.setProperty(prop, val);
        }

        localStorage.setItem('buyinlatam_theme_palette', JSON.stringify(palette));
        localStorage.setItem('buyinlatam_active_palette_id', paletteKey);

        document.querySelectorAll('.palette-card').forEach(c => c.classList.remove('active'));
        if (cardEl) {
            cardEl.classList.add('active');
        }
    }

    function resetThemePalette() {
        localStorage.removeItem('buyinlatam_theme_palette');
        localStorage.removeItem('buyinlatam_active_palette_id');
        applyThemePalette('palette-official', document.querySelector('.palette-card'));
    }

    // Modal Events
    document.addEventListener('DOMContentLoaded', function() {
        const openBtn = document.getElementById('btn-open-palette-modal');
        const closeBtn = document.getElementById('btn-close-palette-modal');
        const modalBackdrop = document.getElementById('palette-modal-backdrop');

        if (openBtn && modalBackdrop) {
            openBtn.addEventListener('click', () => {
                modalBackdrop.classList.add('active');
            });
        }

        if (closeBtn && modalBackdrop) {
            closeBtn.addEventListener('click', () => {
                modalBackdrop.classList.remove('active');
            });
        }

        if (modalBackdrop) {
            modalBackdrop.addEventListener('click', (e) => {
                if (e.target === modalBackdrop) {
                    modalBackdrop.classList.remove('active');
                }
            });
        }

        // Active State Check
        const savedPaletteId = localStorage.getItem('buyinlatam_active_palette_id');
        if (savedPaletteId) {
            document.querySelectorAll('.palette-card').forEach(card => {
                card.classList.remove('active');
                if (card.getAttribute('onclick').includes(savedPaletteId)) {
                    card.classList.add('active');
                }
            });
        }
    });
    </script>

    <?php wp_footer(); ?>
</body>
</html>
