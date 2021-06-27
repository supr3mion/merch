<div class="form-box">
    <?php include('error.php');?>
    <form action="index.php?<?php echo http_build_query($register); ?>" method="POST">
        <div class="text-box">
            <p></p>
            <input type="text" placeholder="voornaam" name="first_name">
        </div>
        <div class="text-box">
            <p></p>
            <input type="text" placeholder="achternaam" name="last_name">
        </div>
        <div class="text-box">
            <p></p>
            <input type="username" placeholder="gebruikersnaam" name="username">
        </div>
        <div class="text-box">
            <p></p>
            <input type="email" autocomplete="email" placeholder="E-mailadres" name="email">
        </div>
        <div class="text-box">
            <p></p>
            <input type="tel" placeholder="xxxx-xxx-xxx" name="phone">
        </div>
        <div class="text-box">
            <p></p>
            <input type="password" placeholder="wachtwoord" autocomplete="password" name="password_1">
        </div>
        <div class="text-box">
            <p></p>
            <input type="password" placeholder="wachtwoord herhalen" autocomplete="password" name="password_2">
        </div>
        <div class="text-box">
            <p></p>
            <select name="account_type">
                <option value="">selecteer account type</option>
                <option value="buyer">koper</option>
                <option value="seller">verkopen</option>
            </select>
        </div>
        <button type="submit" name="register" class="button"><i class="fas fa-plus-circle"></i> REGISTREREN</button>
    </form>
    <p>al een account?<br>log <a href="index.php?<?php echo http_build_query($login); //deze array is vindbaar in [header.php] ?>">hier</a> in</p>
</div>