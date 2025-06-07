<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Panadería y Cafetería Sultipan - Inicio</title>
  <meta name="description" content="Panadería y Cafetería Sultipan: Panes artesanales y recetas tradicionales colombianas. Productos frescos y deliciosos para ti." />
  <link rel="stylesheet" href="iniciopagina.css" />
</head>
<body>
  <header>
    <nav aria-label="Menú principal" class="navbar">
      <a href="iniciopagina.php" class="logo" aria-label="Panadería y Cafetería Sultipan - Inicio">Sultipan</a>
      <div class="container-menu">
        <a href="#productos">Productos</a>
        <a href="#mision">Misión</a>
        <a href="#vision">Visión</a>
      </div>
      <div>
        <a href="login.php" class="btn-login">Iniciar Sesión</a>
        <a href="REGISTRO.php" class="btn-register">Registrarse</a>
      </div>
    </nav>
  </header>
  <main>
    <section class="hero" role="banner" aria-labelledby="hero-title hero-desc">
      <h1 id="hero-title">Panadería y Cafetería Sultipan</h1>
      <p id="hero-desc">Deléitate con nuestros panes artesanales y sabores tradicionales de la panadería colombiana.</p>
      <a href="#productos" class="btn" role="button" aria-label="Ver nuestros productos">Ver nuestros productos</a>
    </section>

    <section id="productos" class="productos" aria-label="Nuestros productos de panadería colombiana">
      <h2>Productos Destacados</h2>
      <div class="productos-grid" role="list">
        <article class="producto destacado" role="listitem" tabindex="0">
          <img src="https://premier.com.co/wp-content/uploads/2024/04/bollo-de-yuca.webp" alt="Bollo de yuca" />
          <h3>Bollo de Yuca</h3>
          <p>Delicioso y suave bollo hecho con yuca fresca, tradicional en nuestra región.</p>
        </article>
        <article class="producto destacado" role="listitem" tabindex="0">
          <img src="https://mercadobecampo.com/cdn/shop/products/almojabanas.jpg?v=1626360574" alt="Almojábanas" />
          <h3>Almojábanas</h3>
          <p>Esponjosas y sabrosas almojábanas hechas con queso costeño y maíz.</p>
        </article>
        <article class="producto" role="listitem" tabindex="0">
          <img src="https://www.mycolombianrecipes.com/wp-content/uploads/2023/03/Arepa-de-Huevo-Recipe.jpg" alt="Arepa de huevo" />
          <h3>Arepa de Huevo</h3>
          <p>Arepa frita rellena con huevo, un sabor único de la costa colombiana.</p>
        </article>
        <article class="producto" role="listitem" tabindex="0">
          <img src="https://imag.bonviveur.com/pan-de-queso.jpg" alt="Pan de queso" />
          <h3>Pan de Queso</h3>
          <p>Panecillos suaves y deliciosos con un toque de queso fresco.</p>
        </article>
        <article class="producto" role="listitem" tabindex="0">
          <img src="https://cdn.colombia.com/gastronomia/2011/08/05/pandebono-1638.gif" alt="Pandebono" />
          <h3>Pandebono</h3>
          <p>Delicioso pan de queso colombiano hecho a base de almidón de yuca y queso fresco.</p>
        </article>
        <article class="producto" role="listitem" tabindex="0">
          <img src="https://junaenlacocina.com/wp-content/uploads/2018/01/caracolas-de-hojaldre-saladas-pate-y-cebolla-1024x768.jpg" alt="Caracola de hojaldre" />
          <h3>Caracola de Hojaldre</h3>
          <p>Deliciosa caracola dulce hecha de masa de hojaldre, ideal para el desayuno o merienda.</p>
        </article>
      </div>
    </section>

    <section id="mision" class="mision" aria-labelledby="mision-title">
      <h2 id="mision-title">Nuestra Misión</h2>
      <p>Brindar productos de panadería y cafetería de alta calidad que reflejen las tradiciones colombianas, con un sabor auténtico y un servicio cálido que haga sentir a nuestros clientes como en casa.</p>
    </section>

    <section id="vision" class="vision" aria-labelledby="vision-title">
      <h2 id="vision-title">Nuestra Visión</h2>
      <p>Ser la panadería y cafetería referente en la región, reconocida por su compromiso con la calidad, innovación y la promoción de la cultura gastronómica colombiana, conquistando paladares y corazones.</p>
    </section>
  </main>

  <footer>
    <small>&copy; 2024 Panadería y Cafetería Sultipan. Todos los derechos reservados.</small>
    <form action="#" method="post">
      <input type="email" placeholder="Tu correo electrónico" required aria-label="Correo electrónico" />
      <input type="submit" value="Suscribirse" />
    </form>
  </footer>
</body>
</html>
