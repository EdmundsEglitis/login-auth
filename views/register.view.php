<h1>register </h1>


<form method="POST">
    <label> Email:
        <input type="email" name="email" value=""/>
    </label>


    <?php if(isset($errors["email"])) { ?>
    <p><?= $errors["email"] ?></p>
    <?php } ?>


    <br>
    <label> Password: <span class="explanation">(jabut 8 rakstzimem 1 lielam burtam 1 mazam burtam 1 ipasam simbolam)</span> <br>
        <input type="password" name="password" value=""/>
    </label>


    <?php if(isset($errors["password"])) { ?>
    <p><?= $errors["password"] ?></p>
    <?php } ?>



  <button>Register</button>


</form>