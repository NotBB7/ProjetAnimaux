<?php include "components/head.php" ?>
<?php include "components/navbar.php" ?>

<div class="container">
    <h1>Liste des animaux de la SPA</h1>

    <?php
    // Connexion à la base de données
    $host = 'localhost'; // Adresse du serveur de base de données
    $username = 'nom_utilisateur'; // Nom d'utilisateur de la base de données
    $password = 'mot_de_passe'; // Mot de passe de la base de données
    $database = 'nom_base_de_donnees'; // Nom de la base de données

    $conn = new mysqli($host, $username, $password, $database);
    if ($conn->connect_error) {
        die("Erreur de connexion à la base de données : " . $conn->connect_error);
    }

    // Récupération des données des animaux
    $query = "SELECT * FROM animaux";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Affichage des cartes pour chaque animal
        while ($row = $result->fetch_assoc()) {
    ?>
            <div class="card">
                <img src="<?php echo $row['image']; ?>" class="card-img-top" alt="<?php echo $row['nom']; ?>">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['nom']; ?></h5>
                    <p class="card-text"><?php echo $row['description']; ?></p>
                    <p class="card-text"><strong>Âge :</strong> <?php echo $row['age']; ?> ans</p>
                    <p class="card-text"><strong>Sexe :</strong> <?php echo $row['sexe']; ?></p>
                </div>
            </div>
            <br>
    <?php
        }
    } else {
        echo "Aucun animal trouvé dans la base de données.";
    }

    // Fermeture de la connexion à la base de données
    $conn->close();
    ?>

</div>

<?php include "components/footer.php" ?>