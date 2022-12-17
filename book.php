<?php
include 'header.php';
?>
    <div class="hero-4">
        <div class="hero-text-4">
            <h1 class="hero-welcome-4">BOOK NOW IN A FEW STEPS</h1>
<!-- closing tag for hero-text-3 -->
        </div>

    </div>

    <form class="signup-form">

        <div class="form-style">

       <div>
            <p class="title"> Firstname</p>
            <input type="text" name="first-name" class="field" >
       </div>

       <div>
            <p class="title"> Lastname</p>
            <input type="text" name="first-name" class="field" >
       </div>

       
       <div>
        <p class="title"> Email</p>
        <input type="email" name="email" class="field" placeholder="example@email.com" >
   </div>


   <div>
        <p class="title"> Mobile phone</p>
        <input type="tel" name="phone" class="field" placeholder="+12 345 6789">
   </div>

   <div>
    <p class="title"> Date</p>
    <input type="date" name="date" class="field" min="<?php echo date("Y-m-d") ?>" value="">
</div>

<div>
    <p class="title">Excursion</p>
    <select name="excursion" class="field-2">
        <option value="Senso-Ji-Temple" selected class="excursion-options"> Senso-Ji Temple</option>
        <option value="imperial-palace" class="excursion-options"> Imperial Palace</option>
        <option value="Disney-land-tokyo" class="excursion-options"> Disney land</option>
        <option value="Shinjuku-Gyoen-National-Garden" class="excursion-options"> Shinjuku Gyoen National Garden</option>

    </select>
</div>
<div class="tickets">
    <p class="title">Number of tickets</p>
    <select name="number" class="field-2">
        <option value="1" selected class="excursion-options">1</option>
        <option value="2" class="excursion-options">2</option>
    </select>
    <!-- closing tag for tickets div -->
</div>
<!-- closing tag for form-style -->
    </div>
    
    <div class="submit">
        <input type="submit" value="BOOK" class="btn">
        <!-- closing tag for submit -->
   </div>
    </form>
    <?php
include 'footer.php';
?>