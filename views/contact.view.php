<?php 

require "partials/head.php";
require "partials/contact-head.php";
require "partials/nav.php";

?>

    <section class="form">
        <div class="titles">
            <h1>Contact Form</h1>
            <h2>Get in touch</h2>
        </div>
        <div class="pflicht">
            <p>*Mandatory field</p>
        </div>

        <div class="outer">
            <div class="inner">
                <section id="contact">
                <form>
                    <label for="anrede">Salutation*</label>
                    <br>
                    <br>
                    <select id="anrede" name="anrede" required>
                        <option value=""></option>
                        <option value="herr">Mr.</option>
                        <option value="frau">Ms.</option>
                        <option value="frauvon">Mrs.</option>
                    </select>
                    
                    <br>
                 <br>
                <label for="first-name">First Name*</label>
                <input type="text" id="first-name" placeholder="First Name">
                <br>
                <label for="last-name">Last Name*</label>
                <input type="text" id="last-name" placeholder="Last Name">
                <br>
                <label for="adress">Address*</label>
                <input type="text" id="address" placeholder="Address">
                <br>
                <label for="Place">City*</label>
                <input type="text" id="city" placeholder="City">
                <br>
                <label for="ZIP_code">ZIP Code*</label>
                <input type="text" id="zip-code" placeholder="ZIP Code">
                <br>
                <label for="email-adress">Email Address*</label>
                <input type="email" id="email-address" placeholder="E-mail">
                <br>
                <label for="your-message">Your Message*</label>
                <textarea name="message" id="message" cols="50" rows="10" placeholder="Message"></textarea>
                <br>
                <br>
                <div class="button">
                    <button id="submit">Send</button>
                </div>
              
                </form>
            </div>
            </div>
    </section>

<?php 
    require "partials/footer.php"
?>