<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pokedex</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <div>
    <img src="images/logo.png" alt="">
    <h1 class="title">POKEMON DATABASE</h1>
    <p class="quest">Informe o nome ou ID do Pokémon</p>

    <section id="busca">
      <form action="<?= $_SERVER['PHP_SELF'] ?>" method="get">
        <input id="box" type="text" name="pokemon">
        <br>
        <input id="search" type="submit" value="PESQUISAR">
      </form>
      <br>
      <br>
      <br>

      <section id="resultado">
        <?php
        $pokemon = $_GET['pokemon'] ?? 25;
        $url = 'https://pokeapi.co/api/v2/pokemon/' . $pokemon . '';
        $decode = json_decode(file_get_contents($url), true);
        $image = $decode['sprites']['other']['dream_world']['front_default'];
        $name = $decode['name'];
        $id = $decode['id'];
        $type = $decode['types'][0]['type']['name'];
        $exp = $decode['base_experience'];
        $weight1 = $decode['weight'];
        $weight = $weight1 / 10;

        echo '<img src="' . $image . '" alt="Minha Imagem">';
        echo "<br><br><strong>Nome:</strong> $name
                <br> <strong>ID</strong>: $id
                <br> <strong>Tipo</strong>: $type
                <br> <strong>Exp. base</strong>: $exp
                <br> <strong>Peso</strong>: $weight kg";
        ?>
      </section>
    </section>
  </div>
</body>

</html>