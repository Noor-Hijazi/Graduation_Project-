

// this code for filtering by li  (Top filtring)
let lis = document.querySelectorAll(".filterBox li");
let cards = document.querySelectorAll(".items .box");


// action on li
lis.forEach((li) => {

    li.addEventListener("click", function() {
        //this fun to remove and add the active class for filtring box
        lis.forEach((li) => {
            li.classList.remove("active");
        });
        this.classList.add("active");
    });

    li.addEventListener("click",function() {
        //this fun for showing or hide the boxs
        cards.forEach((card) => {
            card.style.display = "none";
          }); console.log(document.querySelectorAll(this.dataset.car));
          document.querySelectorAll(this.dataset.car).forEach((el) => {
            el.style.display = "flex";
          });
    });
}  );


 


        //filtring design small screen 
        // Function to toggle the display of filters
        function toggleContent(ele) {
            if (ele.style.display === 'none' || ele.style.display === '') {
                ele.style.display = 'block';
            } else {
                ele.style.display = 'none';
            }
        }

        const filterIcon = document.querySelector(".card .continer i.display");
        console.log(filterIcon);
        const filteringBoxes = document.querySelector(".card  .items_and_filter .filterCheckBox");
        

        filterIcon.addEventListener('click', function() {
            toggleContent(filteringBoxes);
        });
        

// to clear the checkboxes after the submition

        function clearForm() {

            document.getElementById('brandFilterForm').reset();
            window.location.href = window.location.pathname; // Reload the page
        }



