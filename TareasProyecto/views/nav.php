<hr/>
<nav>
    Menú de navegación:
    <?php if (isset($_SESSION["usuario"])){
        echo "<a href='index.php?action=mostrarListaTareas'>Tareas</a>";
        echo "<a href='index.php?action=registroView'>Registro</a>";
        echo "<a href='index.php?action=loginView'>Login</a>";
        echo "<a href='index.php?action=logout'>Cerrar Sesion</a>";
    }else {
        echo ("Introduce usuario antes de poder ver las tareas.");
    }
    ?>
    
</nav>
<hr/>