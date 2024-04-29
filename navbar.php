<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>navbar</title>
</head>
<style>
     * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    align-items: center;
   }
  
      body {
    font-family:Georgia, 'Times New Roman', Times, serif;
  }
  

  ul {
    list-style-type: none;
  }
  
  a {
    text-decoration: none;
    color: rgb(26, 26, 25);
  }
  
  a:hover {
    color: #3a37fd;
    text-decoration: underline;
  }
  .logo{
  font-family:Georgia, 'Times New Roman', Times, serif;
  font-style: italic;
  font-size:25px;
  color:black;
  
  
  }
  
  nav {
    display: flex;
    justify-content: space-between;
    padding: 10px 30px;
    box-shadow: 5px 5px 2px 1px #eeeeee;
    background-color: white;
  }
  
  .menu-list {
    display: flex;
    gap: 30px;
  }
 .button{
    padding: 9px 25px;
    background-color: #eeeeee;
    border: none;
    border-radius: 50px;
    cursor: pointer;
 }
button:hover{
    background-color: white;
}
  
</style>
<body>
    <nav>
        <span class="logo"><a href="#">Wenderwise</a></span>
        <ul class="menu-list">
         <li><a href="about.html">About Us</a></li>
          <li><a href="#">Hotels</a></li>
          <li><a href="#">Restaurant</a></li>
          <li><a href="#">Cars</a></li>
         
          <li><a href="Currency Exchange.html">Currency Exchange</a></li>
        </ul>
     
       <div >
    <a href="#"><button class="button">sing up</button></a>
    <a href="#"><button class="button">log in</button></a>
        </div>
    
       </nav>
     
</body>
</html>