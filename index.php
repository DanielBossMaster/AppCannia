<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Veterinario</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <style>
    body {
      font-family: Verdana, Geneva, Tahoma, sans-serif;
      background-color: #f0e6ee;
      margin: 0;
      padding: 0;
    }

    header {
      background: linear-gradient(to right, #d600b9, #2c0045);
      padding: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    header img {
      width: 80px;
      height: auto;
    }

    nav {
      display: flex;
      gap: 30px;
    }

    .links a {
      text-decoration: none;
      color: #e6d8d8;
      font-weight: bold;
    }

    .container {
      max-width: 1000px;
      margin: 40px auto;
      padding: 0 20px;
    }

    .fila {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      justify-content: center;
      margin-bottom: 30px;
    }
.horizontal{
     
      box-sizing: border-box;
      background: rgb(248, 244, 250);
      box-shadow: 2px 2px 10px rgba(150, 146, 149, 0.856);
      border-radius: 10px;
      padding: 30px;
      margin: 30px;
      gap: 30px;
}
    .fila section {
      flex: 1 1 calc(50% - 20px);
      box-sizing: border-box;
      background: rgb(248, 244, 250);
      box-shadow: 2px 2px 10px rgba(150, 146, 149, 0.856);
      border-radius: 10px;
      padding: 30px;
    }

    h1, h2, h3 {
      color: #5e2286;
    }

    form input, form textarea, form select, form button{
      display: block;
      width: 100%;
      padding: 10px;
      margin: 8px 0;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    form button {
      background-color: #5e2286;
      color: white;
      border: none;
      font-weight: bold;
      cursor: pointer;
    }
    .button {
      background-color: #5e2286;
      color: white;
      border: none;
      font-weight: bold;
      cursor: pointer;
      
    }
    a {
      background-color: #5e2286;
      color: white;
      text-decoration: none;
      display: block;
      width: 100%;
      padding: 10px;
      margin: 8px 0;
      border-radius: 5px;
      border: 1px solid #ccc;
      text-align: center;
    }
    ul {
      list-style: none;
      padding: 0;
    }

    li {
      background-color: #fff;
      padding: 10px;
      margin: 8px 0;
      border-left: 5px solid #5e2286;
      border-radius: 5px;
    }

    footer {
      text-align: center;
      padding: 10px;
      color: #111010;
    }
  </style>
</head>

<body>

<header>
  <nav class="logo">
    <img src="logo.png" alt="logo">
  </nav>
  <nav class="links">
    <a href="login.html">Cerrar sesión</a>
  </nav>
</header>

<div class="container">
    <section class="horizontal">
      <h2> Notificaciones Importantes</h2>
      <ul>
        <li> Max tiene cita hoy a las 4:00 p.m.</li>
        <li> Vacunación pendiente para "Luna" en 3 días.</li>
        <li> Stock bajo: Enrofloxacina (solo 3 unidades)</li>
      </ul>
    </section>
<div class="fila">
    <section>
      <h2> Pacientes</h2>
      <h3>Registrar nuevo dueño y mascota</h3>
      <form method="post" action="<?php echo base_url('/veterinario/guardar');?>">
        <input type="text" placeholder="Documento del propietario" name="num_doc" required>
        <input type="text" placeholder="Nombre del dueño" name="nombre_pro" >
        <input type="text" placeholder="Apellido del propietario" name="apellido_pro">
        <input type="text" placeholder="Teléfono" name="telefono_pro">
        <input type="text" placeholder="Direccion" name="direccion_pro">
        <input type="email" placeholder="Correo electrónico" name="correo_pro">
        <button>Registrar Propietario</button>
        </form>
     <form method="post" action="<?= base_url('/veterinario/guardar_mascota') ?>">
        <select name="num_propietario" required>
        <option value="">-- Selecciona un propietario --</option>
        <?php foreach ($propietario as $prop): ?>
         <option value="<?= esc($prop['num_doc']) ?>">
        <?= esc($prop['nombre_pro']) . ' ' . esc($prop['apellido_pro']) ?>
         </option>
         <?php endforeach; ?>
         </select><br>  
        <input type="text" placeholder="Nombre de la mascota" name ="nom_mascota">
        <input type="text" placeholder="Especie" name = "especie">
        <input type="text" placeholder="Raza" name ="raza">
        <input type="date" placeholder="Fecha de nacimiento" name = "fecha_nacimiento">
        <input type="text" placeholder="Color" name = "color">
        <input type="text" placeholder="Genero" name = "genero">
        <button>Registrar Mascota</button>
        
      </form>
     
     </section>
    <section>
      <h3>Pacientes actuales</h3>
       <ul> 
        <?php  foreach($propietario as $prop): ?>
        <li><strong><?php  echo $prop['nombre_pro'];?></strong><br>
        <?php echo $prop['apellido_pro'];?><br>
        <?php echo $prop['direccion_pro'];?><br>
        <?php echo $prop['correo_pro'];?><br><?php  endforeach; ?> <?php foreach($mascota as $masc): ?>
        <strong><?php echo $masc['nom_mascota'];?>
        <?php echo $masc['especie'];?></strong>
        <?php echo $masc['color'];?></strong><br>
        <?php endforeach; ?><a href="<?php echo base_url('/veterinario/editar/'.$prop['num_doc']); ?>" 
        class=button>Actualizar Datos</a>
        <a href="<?php echo base_url('/veterinario/eliminar/'.$prop['num_doc']); ?>" 
        class=button>Borrar Datos</a>
        </ul>
    </section>
    </div>
<div class="fila">
    <section>
      <h2> Servicios Ofrecidos</h2>
      <form>
        <input type="text" placeholder="Nombre del servicio">
        <input type="number" placeholder="Duración (min)">
        <input type="number" placeholder="Precio ($)">
        <textarea placeholder="Descripción del servicio"></textarea>
        <button>Agregar servicio</button>
      </form>

      <h3>Servicios actuales</h3>
      <ul>
        <li>Baño especializado - $25.000 - 45 min</li>
        <li>Peluquería completa - $40.000 - 1 h</li>
        <li>Corte de uñas - $10.000 - 15 min</li>
      </ul>
    </section>
    <section>
      <h2> Inventario de Productos</h2>
      <form>
        <input type="text" placeholder="Nombre del producto">
        <input type="number" placeholder="Cantidad">
        <input type="text" placeholder="Presentación">
        <input type="text" placeholder="Uso">
        <button>Agregar</button>
      </form>

      <h3>Inventario actual</h3>
      <ul>
        <li>Enrofloxacina 50mg - 3 tabletas</li>
        <li>Shampoo antipulgas - 6 botellas</li>
      </ul>
      </section>
    </div>
      <section class="horizontal">
      <h2> Mensajes con Dueños</h2>
      <form>
        <input type="text" placeholder="Buscar dueño">
        <textarea placeholder="Mensaje para el cliente..."></textarea>
        <button>Enviar</button>
      </form>

      <h3>Mensajes enviados</h3>
      <ul>
        <li><strong>A Laura Pérez:</strong> Max tiene cita hoy a las 4:00 p.m.</li>
        <li><strong>A Andrés Gómez:</strong> Recuerda control de oído de Luna.</li>
      </ul>
      </section>
  

</div>

<footer>
  <p>&copy; 2025 app cannia. Todos los derechos reservados.</p>
</footer>

</body>
</html>