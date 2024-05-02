<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>footer</title>
</head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>

footer{
    background-color: white;
    box-shadow: 5px -3px 13px #eeeeee;
}

.footerContainer{
    width: 100%;
    padding: 70px 30px 20px ;
}
.socials{
    display: flex;
    justify-content: center;
}
.socials a{
    text-decoration: none;
    padding:  10px;
    background-color: #eeeeee;
    margin: 10px;
    border-radius: 50%;
}
.socialsa i{
    font-size: 2em;
    color: rgb(22, 21, 26);
    opacity: 0,9;
}


.socials a:hover i{
    color: rgb(14, 14, 17);
    transition: 0.5s;
}
.footerNav{
    margin: 30px 0;
}
.footerNav ul{
    display: flex;
    justify-content: center;
    list-style-type: none;
}
.footerNav ul li a{
    color:black;
    margin: 20px;
    text-decoration: none;
    font-size: 1.3em;
    opacity: 0.7;
    transition: 0.5s;

}
.footerNav ul li a:hover{
    opacity: 1;
}


@media (max-width: 700px){
    .footerNav ul{
        flex-direction: column;
    } 
    .footerNav ul li{
        width:100%;
        text-align: center;
        margin: 10px;
    }
    .socials a{
        padding: 8px;
        margin: 4px;
    }
} 
.footer-text
 {
    text-align: center;  
    font-size: 20px;   
    color: #160505;      
    margin-top: 10px;  
    margin-bottom: 10px; 
    font-family: "Arial", sans-seri;
 } 
</style>
<body>
    <footer>
        <div class="footerContainer">
         <h1><center>wanderwise</h1>
             <p class="footer-text">"Explore the enchanting beauty of our tourist destinations. One visit will create unforgettable memories.<br> Travel with us and tell endless stories."
             </center>   </p>
          <div class="footerNav">
                 <ul>
               
                     <li><a href="index.php">Home</a></li>
                     <li><a href="about.php">About Us</a></li>
                     <li><a href="hotel.php">Hotels</a></li>
                     <li><a href="restaurant.php">Restaurant</a></li>
                     <li><a href="cars.php">Cars</a></li>
                     <li><a href="contact.php">Contact Us</a></li>
                 </ul>
             </div>
             <div class="socials">
                 <a href="#"><i class="fa-brands fa-facebook"></i></a>
                 <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                 <a href ="#"><i class="fa-brands fa-instagram"></i></a>
                 <a href ="#"><i class="fa-brands fa-x-twitter"></i></a>
             </div></div>
     </footer>
</body>
</html>