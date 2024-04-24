<main>
    <form action="?app=dashboard" method="POST">
        <label for="token">TOKEN:</label> <br>
        <?php 
            if(isset($_SESSION['erro']) &&  $_SESSION['erro'] !== ''){
                echo "$_SESSION[erro] <br>";
            }
            $_SESSION['erro'] = '';
        ?>
        <input type="text" name="token" value="" required> <br>
        <button type="submit">ACESSAR</button>
    </form>
</main>
