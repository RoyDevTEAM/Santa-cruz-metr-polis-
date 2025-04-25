<?php  
include("templates/header.php");
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="<?php echo $url_base; ?>Css/index.css">
<link
  rel="stylesheet"
  href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
/>
<style>
  /* Reset & Box-Sizing */
  *, *::before, *::after {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
  body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    line-height: 1.5;
    color: #2A2A2A;
    background: #FFF;
  }
  .container1 {
    width: 100%;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 1rem;
  }

  /* Hero Section Default */
  .hero_section1 {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 40px;
    padding: 3rem 5%;
  }
  .hero_section_details1 {
    align-self: center;
  }
  .hero_title1 {
    font-size: 2.8rem;
    color: #2A2A2A;
    line-height: 1.2;
    margin-bottom: 1.5rem;
  }
  .hero_subtitle1 {
    font-size: 1.1rem;
    color: #555;
    line-height: 1.6;
  }

  /* Hero Section Santa Cruz */
  .hero_sc_section1 {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 40px;
    padding: 3rem 5%;
    background: #FCFCFC;
  }
  .hero_sc_details1 {
    align-self: center;
  }
  .hero_sc_title1 {
    font-size: 2.8rem;
    color: #2A2A2A;
    line-height: 1.2;
    margin-bottom: 1.5rem;
  }
  .hero_sc_subtitle1 {
    font-size: 1.1rem;
    color: #555;
    line-height: 1.6;
  }

  /* Card Slider Classes */
  .hero_section_card_slider1,
  .hero_sc_card_slider1 {
    position: relative;
    overflow: visible;
  }
  .card_container1 {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    padding: 1rem 0;
  }
  .hero_card1 {
    flex: 1 1 300px;
    min-height: 250px;
    position: relative;
    background-size: cover;
    background-position: center;
    display: flex;
    align-items: flex-end;
    border-radius: 15px;
    overflow: hidden;
    transition: transform .3s ease;
  }
  .hero_card1:hover {
    transform: translateY(-5px);
  }
  .hero_card1::after {
    content: '';
    position: absolute;
    inset: 0;
    background: rgba(255,255,255,0.1);
    z-index: 1;
  }
  .card_content1 {
    position: relative;
    z-index: 2;
    padding: 1.5rem;
    background: linear-gradient(to top, rgba(0,0,0,0.7) 30%, transparent);
  }
  .hero_card1 h3,
  .hero_card1 p {
    margin: 0;
    color: #7B4B16;
    text-shadow: 1px 1px 2px rgba(255,255,255,0.5);
  }
  .hero_card1 h3 {
    font-size: 1.8rem;
    margin-bottom: .5rem;
    font-weight: 700;
  }
  .hero_card1 p {
    font-size: 1rem;
    font-weight: 500;
  }

  /* Features Section */
  .features_section1 {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 25px;
    padding: 3rem 5%;
    background: #F9FAFB;
  }
  /* Features Grid Section */
.features_grid_section1 {
  background: #f8f9fa;
  padding: 4rem 0;
}

.features_grid_title1 {
  font-size: 2.5rem;
  color: #2A2A2A;
  line-height: 1.2;
}

.decorative_line1 span {
  transition: all 0.3s ease;
}

.features_grid_cards1 {
  margin-top: 2rem;
}

.feature_grid_card1 {
  padding: 1.5rem;
  background: white;
  border-radius: 10px;
  box-shadow: 0 2px 15px rgba(0,0,0,0.05);
  transition: transform 0.3s ease;
}

.feature_grid_card1:hover {
  transform: translateY(-5px);
}

.icon_container1 {
  transition: all 0.3s ease;
}

.feature_grid_card1:hover .icon_container1 {
  background: #7B4B16;
  color: white;
}

.feature_grid_card_title1 {
  color: #2A2A2A;
  margin-bottom: 0.75rem;
}

.feature_grid_card_text1 {
  color: #666;
  line-height: 1.6;
}

.feature_grid_image1 img {
  border: 4px solid white;
  box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

@media (max-width: 1024px) {
  .features_grid_title1 {
    font-size: 2rem;
  }
  
  .feature_grid_image1 img {
    width: 280px;
    height: 280px;
  }
}
  .feature_card1 {
    text-align: center;
    padding: 2rem 1rem;
    background: #FFF;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0,0,0,0.05);
  }
  .feature_icon1 {
    font-size: 2.5rem;
    margin-bottom: 1rem;
  }
  .feature_card1 h4 {
    font-size: 1.25rem;
    margin-bottom: .5rem;
    color: #2A2A2A;
    font-weight: 600;
  }
  .feature_card1 p {
    font-size: 1rem;
    color: #555;
  }

  /* Map Section */
  .map_section1 {
    padding: 3rem 0;
  }
  .map_section1 h2 {
    font-size: 2rem;
    color: #2A2A2A;
    margin-bottom: 1.5rem;
    text-align: center;
  }
  #map1 {
    width: 100%;
    height: 400px;
    border-radius: 15px;
  }

  /* Utility Classes */
  .text_center1 { text-align: center; }
  .my_51      { margin: 3rem 0; }
  .mb_41      { margin-bottom: 1.5rem; }
</style>

<section class="hero_section">
  <div class="hero_section_details">
    <!-- content added by js -->
  </div>
  <div class="hero_section_card_slider">
    <div class="card_container">
       <!-- content added by js -->
    </div>
  </div>
</section>

<!-- Map Section -->
<section class="map_section1 my_51">
  <div class="container1">
    <h2 class="text_center1 mb_41">Ubicación de Nuestros Destinos</h2>
    <div id="map1"></div>
  </div>
</section>

<!-- Hero Section #2 (Santa Cruz renombrado) -->
<section class="hero_sc_section1">
  <div class="hero_sc_details1">
    <h1 class="hero_sc_title1">Tu Guía Completa para Santa Cruz</h1>
    <p class="hero_sc_subtitle1">
      Explora destinos turísticos, encuentra instituciones educativas<br>
      y descubre todo lo que Santa Cruz de la Sierra tiene para ofrecer.
    </p>
  </div>
  <div class="hero_sc_card_slider1">
    <div class="card_container1">
      <div
        class="hero_card1"
        style="background-image: url('https://distritomunicipal11.gmsantacruz.gob.bo/wp-content/uploads/2023/12/Plaza24092023.png')"
      >
        <div class="card_content1">
          <h3>Destinos Turísticos</h3>
          <p>Lugares emblemáticos e históricos</p>
        </div>
      </div>
      <div
        class="hero_card1"
        style="background-image: url('https://www.upds.edu.bo/wp-content/uploads/2020/06/upds-sede-santa-cruz-medium-1.jpg')"
      >
        <div class="card_content1">
          <h3>Educación Superior</h3>
          <p>Universidades y centros técnicos</p>
        </div>
      </div>
      <div
        class="hero_card1"
        style="background-image: url('https://www.soldepando.com/wp-content/uploads/2015/02/Ciudad-de-Santa-Cruz.jpg')"
      >
        <div class="card_content1">
          <h3>Mapas Interactivos</h3>
          <p>Ubicaciones estratégicas</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Features Section -->
<section class="features_section1">
  <div class="feature_card1">
    <div class="feature_icon1">📌</div>
    <h4>Destinos Turísticos</h4>
    <p>Descubre los lugares más emblemáticos</p>
  </div>
  <div class="feature_card1">
    <div class="feature_icon1">🎓</div>
    <h4>Ofertas Académicas</h4>
    <p>Instituciones educativas destacadas</p>
  </div>
  <div class="feature_card1">
    <div class="feature_icon1">🗺️</div>
    <h4>Mapas Interactivos</h4>
    <p>Encuentra rutas y ubicaciones</p>
  </div>
  <div class="feature_card1">
    <div class="feature_icon1">💡</div>
    <h4>Recomendaciones</h4>
    <p>Sugerencias personalizadas</p>
  </div>
</section>

<?php  
include("templates/footer.php");
?>

<!-- Scripts -->
<script src="<?php echo $url_base; ?>Javascript/index.js"></script>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    var map1 = L.map('map1').setView([40.416775, -3.703790], 6);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '© OpenStreetMap contributors'
    }).addTo(map1);

    // Marcadores
    L.marker([40.416775, -3.703790]).addTo(map1).bindPopup('Madrid').openPopup();
    L.marker([41.385063, 2.173404]).addTo(map1).bindPopup('Barcelona');
    L.marker([37.389092, -5.984459]).addTo(map1).bindPopup('Sevilla');
    L.marker([43.263013, -2.934985]).addTo(map1).bindPopup('Bilbao');

    // Hacer el mapa responsive en resize
    var mapDiv1 = document.getElementById('map1');
    if ('ResizeObserver' in window) {
      var ro1 = new ResizeObserver(function() { map1.invalidateSize(); });
      ro1.observe(mapDiv1);
    } else {
      window.addEventListener('resize', function() { map1.invalidateSize(); });
    }
  });
</script>