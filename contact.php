<!DOCTYPE html>
<html>

<head>
    <title>Contact Us</title>

        <!--Aswome  Font  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />       
        <!-- Main CSS -->
        <link rel="stylesheet" type="text/css" href="css/contentus.css">


</head>

<body>
    <?php
    include ("nav.html");
    ?>

    <div class="contect">
        <div class="continer">
            <!-- Start content -->
            <div class="contactUs ">
                <h1>Contact Us </h1>
                <P>We're here to help you craft unforgettable moments. Reach out to us and let your journey into a world
                    of excitement and beauty begin.</p>
            </div> <!-- Start content -->


            <!-- Start Information -->

            <div class="formInfo">
              
                
                <form>
                    <h2>Send Message</h2>
                    <label for="name">Name</label>
                    <input type="text" name="name" placeholder="Name">
                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="Email">
                    <label for="message"  >Your Message</label>
                    <textarea name="message"row="5"placeholder="Your Message"></textarea>
                    <input type="submit" value="Send">

                </form>

                <div class="Info">
   

                   
                    <div class="box">
                        <div class="flexing">
                        <i class="fa-solid fa-envelope"></i>
                            <h3>Email</h3>
                        </div>
                            <p>info@wonderwise.com</p>
                    </div>
                    <div class="box">
                        <div class="flexing">
                       <i class="fa-solid fa-phone"></i>
                        
                            <h3>phone</h3></div>
                            <p>009626567855</p>
                        </div> 
                        <div class="box">
                        <div class="flexing">
                        <div class="socials">
                 <a href="#"><i class="fa-brands fa-facebook"></i></a>
                 <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                 <a href ="#"><i class="fa-brands fa-instagram"></i></a>
                 <a href ="#"><i class="fa-brands fa-x-twitter"></i></a>
             </div>
                           
                        </div>
                            
                    </div></div>

                    </div>
                </div>
            </div>
            <!-- end Information -->
        </div>
    </div>
    </div>
    <!-- End Information -->



    <footer></footer>
    <script src="JS/nav.js"></script>


</body>

</html>