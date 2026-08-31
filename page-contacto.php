<?php
/**
 * Plantilla de Página: Contacto
 * Tema BuyInLatam B2B
 */

get_header(); ?>

<div class="site-wrapper">
    <!-- Hero Banner Contacto -->
    <section class="page-hero">
        <div class="container">
            <h4 style="color:var(--accent-yellow); font-weight:700; text-transform:uppercase; letter-spacing:2px; margin-bottom:10px;"><i class="fas fa-headset"></i> ATENCIÓN Y COTIZACIONES 24/7</h4>
            <h1>Contáctanos</h1>
            <p>Estamos listos para atender tus requerimientos de importación y cotizaciones al por mayor.</p>
        </div>
    </section>

    <main class="page-content-wrapper">
        <div class="container">
            
            <div style="display:grid; grid-template-columns:1fr 1fr; gap:50px; margin-bottom:60px;">
                
                <!-- Canales de Contacto Directo -->
                <div>
                    <h2 style="font-family:var(--font-title); font-size:28px; margin-bottom:20px; color:var(--text-primary);">Canales Oficiales de Exportación</h2>
                    <p style="color:var(--text-secondary); line-height:1.7; margin-bottom:30px;">
                        ¿Deseas incluir tu marca en prendas de alpaca o importar lotes de cacao, café y granos peruanos? Comunícate directamente con nuestro equipo comercial.
                    </p>

                    <div style="display:flex; flex-direction:column; gap:20px;">
                        <div style="display:flex; align-items:center; gap:20px; padding:20px; background:white; border-radius:12px; border:1px solid var(--border-color); box-shadow:var(--shadow-sm);">
                            <div style="width:50px; height:50px; background:var(--accent-green); color:white; border-radius:50%; display:flex; align-items:center; justify-content:center; font-size:24px; flex-shrink:0;">
                                <i class="fab fa-whatsapp"></i>
                            </div>
                            <div>
                                <h4 style="margin:0 0 4px 0; font-family:var(--font-title); font-size:16px;">WhatsApp Comercial</h4>
                                <a href="https://wa.me/51997309032" target="_blank" style="color:var(--primary-blue); font-weight:700; font-size:16px;">+51 997 309 032</a>
                            </div>
                        </div>

                        <div style="display:flex; align-items:center; gap:20px; padding:20px; background:white; border-radius:12px; border:1px solid var(--border-color); box-shadow:var(--shadow-sm);">
                            <div style="width:50px; height:50px; background:var(--primary-blue); color:white; border-radius:50%; display:flex; align-items:center; justify-content:center; font-size:24px; flex-shrink:0;">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div>
                                <h4 style="margin:0 0 4px 0; font-family:var(--font-title); font-size:16px;">Correo de Exportaciones</h4>
                                <a href="mailto:exportaciones@buyinlatam.com" style="color:var(--primary-blue); font-weight:700; font-size:16px;">exportaciones@buyinlatam.com</a>
                            </div>
                        </div>

                        <div style="display:flex; align-items:center; gap:20px; padding:20px; background:white; border-radius:12px; border:1px solid var(--border-color); box-shadow:var(--shadow-sm);">
                            <div style="width:50px; height:50px; background:var(--primary-blue-light); color:var(--primary-blue); border-radius:50%; display:flex; align-items:center; justify-content:center; font-size:24px; flex-shrink:0;">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div>
                                <h4 style="margin:0 0 4px 0; font-family:var(--font-title); font-size:16px;">Oficina Central</h4>
                                <span style="color:var(--text-secondary); font-size:15px;">Lima, Perú — Envíos a todo el mundo</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Formulario o Caja de Cotización -->
                <div style="background:white; padding:40px; border-radius:16px; border:1px solid var(--border-color); box-shadow:var(--shadow-md);">
                    <h3 style="font-family:var(--font-title); font-size:24px; margin:0 0 20px 0; color:var(--text-primary);">Enviar Solicitud de Cotización</h3>
                    
                    <form action="https://wa.me/51997309032" method="get" target="_blank" style="display:flex; flex-direction:column; gap:16px;">
                        <div>
                            <label style="display:block; font-weight:600; margin-bottom:6px; font-size:14px;">Nombre / Empresa:</label>
                            <input type="text" name="nombre" placeholder="Ej. Juan Pérez - Importaciones S.A." style="width:100%; padding:12px; border:1px solid var(--border-color); border-radius:8px; font-family:var(--font-primary); box-sizing:border-box;" required>
                        </div>

                        <div>
                            <label style="display:block; font-weight:600; margin-bottom:6px; font-size:14px;">Producto de Interés:</label>
                            <select style="width:100%; padding:12px; border:1px solid var(--border-color); border-radius:8px; font-family:var(--font-primary); box-sizing:border-box;">
                                <option value="Prendas de Alpaca (Con tu Marca)">Prendas de Alpaca (Con tu Marca)</option>
                                <option value="Cacao Fino de Aroma">Cacao Fino de Aroma</option>
                                <option value="Café de Origen Peruano">Café de Origen Peruano</option>
                                <option value="Snacks & Granos Selectos">Snacks & Granos Selectos</option>
                                <option value="Otros Productos de Exportación">Otros Productos de Exportación</option>
                            </select>
                        </div>

                        <div>
                            <label style="display:block; font-weight:600; margin-bottom:6px; font-size:14px;">País de Destino:</label>
                            <input type="text" placeholder="Ej. España, Estados Unidos, México" style="width:100%; padding:12px; border:1px solid var(--border-color); border-radius:8px; font-family:var(--font-primary); box-sizing:border-box;">
                        </div>

                        <button type="submit" class="btn-primary" style="width:100%; justify-content:center; padding:14px; font-size:16px; margin-top:10px;">
                            <i class="fab fa-whatsapp" style="font-size:20px;"></i> Enviar Cotización por WhatsApp
                        </button>
                    </form>
                </div>

            </div>

        </div>
    </main>
</div>

<?php get_footer(); ?>
