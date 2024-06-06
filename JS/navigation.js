        
        const moreListItem = document.querySelector('.more');
        const contentDiv = document.querySelector('.content');

        
      
        // Function to toggle the display of links 
        function toggleContent(ele) {
            if (ele.style.display === 'none' || ele.style.display === '') {
                ele.style.display = 'block';
            } else {
                ele.style.display = 'none';
            }
        }

       
        // Add a click event listener to the "more" list item
        moreListItem.addEventListener('click', function() {
            toggleContent(contentDiv);
        });
        




        // toggle for icon
      
       const iconItem = document.querySelector('.icon');
       const menuList = document.querySelector('.menu-list');

       iconItem.addEventListener('click', function() {
        toggleContent(menuList);
    });