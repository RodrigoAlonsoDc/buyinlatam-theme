<?php
/**
 * Plantilla de Página: Sobre Nosotros
 * Tema BuyInLatam B2B
 */

get_header(); ?>

<div class="site-wrapper">
    <!-- Hero Banner Nosotros -->
    <section class="page-hero">
        <div class="container">
            <h4 style="color:var(--accent-yellow); font-weight:700; text-transform:uppercase; letter-spacing:2px; margin-bottom:10px;"><i class="fas fa-globe-americas"></i> NUESTRA HISTORIA Y MISIÓN</h4>
            <h1>Sobre BuyInLatam</h1>
            <p>Conectamos los mejores productos de Perú y Latinoamérica directamente con compradores e importadores en todo el mundo.</p>
        </div>
    </section>

    <main class="page-content-wrapper">
        <div class="container">
            
            <!-- Bloque Introducción -->
            <div style="display:grid; grid-template-columns:1fr 1fr; gap:50px; align-items:center; margin-bottom:70px;">
                <div>
                    <span style="color:var(--primary-blue); font-weight:700; text-transform:uppercase; font-size:14px; letter-spacing:1px;">Excelencia en Exportación</span>
                    <h2 style="font-family:var(--font-title); font-size:36px; margin:10px 0 20px 0; color:var(--text-primary);">Llevamos lo mejor de nuestra tierra a cualquier rincón del planeta</h2>
                    <p style="color:var(--text-secondary); line-height:1.8; font-size:16px;">
                        <strong>BuyInLatam</strong> nació con el firme propósito de ser el puente comercial B2B entre los productores de la más alta calidad en Latinoamérica y las marcas, distribuidores y tiendas más exigentes en Europa, Norteamérica y Asia.
                    </p>
                    <p style="color:var(--text-secondary); line-height:1.8; font-size:16px;">
                        Nos especializamos en la exportación al por mayor de <strong>prendas de alpaca peruana, cacao fino de aroma, café de origen y granos selectos</strong>, ofreciendo además el servicio de inclusión de marca propia (OEM / Marca Blanca) para tus líneas de producto.
                    </p>
                </div>
                <div>
                    <img src="https://images.unsplash.com/photo-1549488344-c5a452efeb33?auto=format&fit=crop&w=800&q=80" alt="Textiles de Alpaca Peruana" style="width:100%; border-radius:16px; box-shadow:var(--shadow-lg);">
                </div>
            </div>

            <!-- Valores / Pilares -->
            <div style="background:white; padding:50px; border-radius:16px; border:1px solid var(--border-color); box-shadow:var(--shadow-sm); margin-bottom:70px;">
                <div class="section-header" style="margin-top:0;">
                    <h2 class="section-title">Nuestros Pilares Comerciales</h2>
                    <div class="title-divider"></div>
                </div>

                <div style="display:grid; grid-template-columns:repeat(3, 1fr); gap:30px; margin-top:40px;">
                    <div style="text-align:center; padding:20px;">
                        <div style="width:70px; height:70px; background:var(--primary-blue-light); color:var(--primary-blue); border-radius:50%; display:flex; align-items:center; justify-content:center; font-size:30px; margin:0 auto 20px;">
                            <i class="fas fa-tags"></i>
                        </div>
                        <h3 style="font-family:var(--font-title); font-size:20px; margin-bottom:10px;">Tu Marca Incluida</h3>
                        <p style="color:var(--text-secondary); font-size:15px;">Empacamos y etiquetamos con el logo de tu empresa o marca comercial para que vendas directamente a tus clientes.</p>
                    </div>

                    <div style="text-align:center; padding:20px;">
                        <div style="width:70px; height:70px; background:var(--primary-blue-light); color:var(--primary-blue); border-radius:50%; display:flex; align-items:center; justify-content:center; font-size:30px; margin:0 auto 20px;">
                            <i class="fas fa-award"></i>
                        </div>
                        <h3 style="font-family:var(--font-title); font-size:20px; margin-bottom:10px;">Calidad Certificada</h3>
                        <p style="color:var(--text-secondary); font-size:15px;">Seleccionamos minuciosamente los insumos y mantenemos los más altos estándares fitosanitarios y textiles de Perú.</p>
                    </div>

                    <div style="text-align:center; padding:20px;">
                        <div style="width:70px; height:70px; background:var(--primary-blue-light); color:var(--primary-blue); border-radius:50%; display:flex; align-items:center; justify-content:center; font-size:30px; margin:0 auto 20px;">
                            <i class="fas fa-shipping-fast"></i>
                        </div>
                        <h3 style="font-family:var(--font-title); font-size:20px; margin-bottom:10px;">Logística Global</h3>
                        <p style="color:var(--text-secondary); font-size:15px;">Gestionamos la documentación aduanera y el transporte marítimo o aéreo hasta el puerto de tu elección.</p>
                    </div>
                </div>
            </div>

            <!-- Call to Action -->
            <div style="background:linear-gradient(135deg, #0052CC 0%, #0066FF 100%); color:white; padding:50px; border-radius:16px; text-align:center;">
                <h2 style="font-family:var(--font-title); font-size:32px; margin:0 0 15px 0; text-transform:uppercase;">¿Listo para importar lo mejor de Latinoamérica?</h2>
                <p style="font-size:18px; color:#E2E8F0; max-width:600px; margin:0 auto 30px;">Conversa directamente con nuestros especialistas en exportaciones y recibe una cotización adaptada a tu volumen.</p>
                <a href="https://wa.me/51997309032?text=Hola,%20quisiera%20cotizar%20productos%20para%20importar" target="_blank" class="btn-yellow" style="font-size:16px; padding:16px 36px;">
                    <i class="fab fa-whatsapp" style="font-size:20px;"></i> Contactar Asesor de Exportación
                </a>
            </div>

        </div>
    </main>
</div>

<?php get_footer(); ?>
