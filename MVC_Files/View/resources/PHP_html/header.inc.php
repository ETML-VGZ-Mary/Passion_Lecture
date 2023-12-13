 <!--
    ETML
    Auteur        :	Déglise Camille - Vougaz Maryline - Wu Guo Yu
    Date          :	06.12.2023
    Description   :	Fichier inc pour le header du site 
-->


<header>
    <div class="container-header">
        <div class="titre-header">
            <h1>Passion Lecture</h1>
        </div>
        
        <!-- connexion -->
        <div class="box-login">
            <label for="user"></label>
            <input type="text" name="user" id="user" placeholder="Username">
            <label for="password"></label>
            <input type="password" name="password" id="password" placeholder="Password">
            <button type="submit" class="btn btn-login">Login</button>
        </div>
        

    </div>
    <nav>
        <div class="nav-links">
            <a href="../views/index.php">Accueil</a>
            <a href="../views/liste.php">Liste</a>
            <a href="#">Ajout</a>
            <a href="#">Profil</a>
            <a href="#">Contacts</a>
        </div>
        
    </nav>
</header>
    