const restaurants = [
    {
        img: 'https://media-cdn.tripadvisor.com/media/photo-s/0f/19/6e/34/books-at-cafe.jpg',
        name: 'Books at Cafe',
        category: ['Cafe', 'Mediterranean', 'Middle Eastern','Jordanian'],
        location: 'https://www.google.com/maps/dir//WWXJ%2B6FP,+Omar+Bin+Al-Khattab+St+12,+Amman/@31.948065,35.8489047,12z/data=!4m8!4m7!1m0!1m5!1m1!1s0x151b5f9bfdb38f37:0x6207bc35e4083a71!2m2!1d35.931306!2d31.9480916?entry=ttu',
        menu: 'https://booksatcafe.com/en-jo/pages/menu'
    },
    {
        img: 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/1c/b7/95/a0/interior.jpg?w=1200&h=-1&s=1',
        name: 'Jubran',
        category: ['Middle Eastern', 'Vegetarian Friendly','Jordanian'],
        location: 'https://www.google.com/maps/dir//WWXJ%2B6FP,+Omar+Bin+Al-Khattab+St+12,+Amman/@31.948065,35.8489047,12z/data=!4m8!4m7!1m0!1m5!1m1!1s0x151b5f9bfdb38f37:0x6207bc35e4083a71!2m2!1d35.931306!2d31.9480916?entry=ttu', 
        menu: 'https://cdn.qr-code-generator.com/account9821055/44809625_4.pdf?Expires=1713172345&Signature=CTyXKkUbXCqXsSTZgb8c4pgte19b~VKaMQW1g1TBv21iERbXeKgYeP7LTVMi5M~F8J3pp6yt3Agi2ylywYLb1ZWzjPG-mQGycJG1iHp6cc5UlVPjtzxqyfsFbfduTcBy~DhpOc9ZBwL6QDE5V9oazJYmNvNNmRNx~eT7mxQIRAHonTxyE3T5mGYkiTCVAqzwfuBL4v9zoAXdnjBZ6tQkIt-wIeQ4ipknr1NM04RdnrsU23jkewjuMreOajvGgh7NYof-0WYAZCtX9SUULG2gtM3nHgyQzy58GEXEIvtiLTRBx0D1Kxfzu3xxdpDwCJKQ-D8AS9PG8QSCfJB2vUtLGw__&Key-Pair-Id=KKMPOJU8AYATR'

    },
    {
        img: 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/16/3e/95/ee/bourj-al-hamam-amman.jpg?w=1200&h=-1&s=1',
        name: 'Bourj Al Hamam',
        category: ['Lebanese', 'Mediterranean', 'Barbecue'],
        location: 'https://www.google.com/maps/dir//Islamic+College+Street+InterContinental+Jordan+Hotel,+Amman+11180/@31.9532741,35.8314128,12z/data=!4m8!4m7!1m0!1m5!1m1!1s0x151ca07f2fe2c76f:0x1a143bd4ad3dc400!2m2!1d35.9139791!2d31.9531842?entry=ttu', 
        menu: 'https://drive.google.com/file/d/1pt5_nKMSlIsUsJgVR7Bf7dnmYqMlPD3b/view'

    },
    {   
        img:'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/16/a1/f3/4b/caption.jpg?w=1200&h=-1&s=1',
        name:'Tammouz Restaurant & Cafe',
        category:['Cafe', 'Mediterranean', 'Barbecue'],
        location:'https://www.google.com/maps/dir//Amman/@31.9565048,35.8411823,12z/data=!4m8!4m7!1m0!1m5!1m1!1s0x151b5f8fa116650b:0xacc1db8e72f63cc9!2m2!1d35.9235836!2d31.9565314?entry=ttu',
        menu: 'https://www.facebook.com/TammouzAmman/menu/'

    },
    { 
        img:'https://pvt.jo/uploads/filemanager/Restaurants/e28c2eb2e503cacfa05fa26ffe47dd5c-al-quds.jpg',
        name:'Al-Quds Falafel',
        category:['Fast Food', 'Middle Eastern', 'Vegan','Jordanian'],
        location:'https://www.google.com/maps?rlz=1C1SQJL_enJO994JO994&vet=12ahUKEwjIoK6kqrSFAxWFhP0HHRrgCsEQ8UF6BAgWEAM..i&lei=xcgUZoiqLoWJ9u8PmsCriAw&cs=0&um=1&ie=UTF-8&fb=1&gl=jo&sa=X&geocode=KU9uuAt_XxsVMf0pbED8sagP&daddr=WWW8%2B8W9,+Ali+Ben+Abi+Taleb+St.,+Amman',
        menu: 'https://www.facebook.com/Falafelalquds/'

    }, 
    { 
        img:'https://media-cdn.tripadvisor.com/media/photo-o/1c/3c/97/81/welcome-to-fakhreldin.jpg',
        name:'Fakhreldin Restaurant',
        category:['Lebanese', 'Mediterranean', 'Middle Eastern'],
        location:'https://www.google.com/maps?rlz=1C1SQJL_enJO994JO994&gs_lcrp=EgZjaHJvbWUqDQgBEC4YrwEYxwEYgAQyBggAEEUYOTINCAEQLhivARjHARiABDIHCAIQABiABDIHCAMQABiABDINCAQQLhivARjHARiABDIHCAUQABiABDIHCAYQABiABDIGCAcQRRg80gEINTE3OWowajeoAgiwAgE&um=1&ie=UTF-8&fb=1&gl=jo&sa=X&geocode=KfM5j6SZXxsVMQB8F_KxjdY_&daddr=Taha+Hussein+St.,+Amman',
        menu: 'https://atico-jo.com/atico_menu/Fakhreldin_Menu.pdf'

    },
    {   img:'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/01/cf/11/c0/welcome.jpg?w=1200&h=-1&s=1',
        name:'Tawaheen Al-Hawa',
        category:['Middle East', 'Mediterranean', 'Barbecue'],
        location:'https://www.google.com/maps/dir//XVR8%2BVQ8+%D9%85%D8%B7%D8%B9%D9%85+%D8%B7%D9%88%D8%A7%D8%AD%D9%8A%D9%86+%D8%A7%D9%84%D9%87%D9%88%D8%A7,+Amman%E2%80%AD/@31.9921372,35.7845662,12z/data=!4m8!4m7!1m0!1m5!1m1!1s0x151ca1cddd409dd5:0x6e6337f7366264fd!2m2!1d35.8669675!2d31.9921638?entry=ttu',
        menu: 'https://www.facebook.com/TawaheenAlhawa/'

    },  
    {   img:'https://media-cdn.tripadvisor.com/media/photo-s/28/01/79/61/tasters-table-option.jpg',
        name:'Beit Sitti',
        category:['Middle East', 'Vegan Friendly', 'Arab'],
        location:'https://www.google.com/maps?rlz=1C1SQJL_enJO994JO994&gs_lcrp=EgZjaHJvbWUqCggAEAAY4wIYgAQyCggAEAAY4wIYgAQyDQgBEC4YrwEYxwEYgAQyBwgCEAAYgAQyBwgDEAAYgAQyBwgEEAAYgAQyBwgFEAAYgAQyBwgGEAAYgAQyBggHEEUYPKgCCLACAQ&um=1&ie=UTF-8&fb=1&gl=jo&sa=X&geocode=KWmexY2QXxsVMb8XzvlZjMCC&daddr=%2316+Mohammad+Ali+Al+Saadi+Str.,+Amman',
        menu: 'https://beitsitti.com/menu/'

    },  
    {   img:'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/08/e2/49/10/abu-jbara.jpg?w=1000&h=-1&s=1',
        name:'Abu Jbara Restaurant',
        category:['Fast Food', 'Mediterranean', 'Middle Eastern'],
        location:'https://www.google.com/maps?s=web&rlz=1C1SQJL_enJO994JO994&lqi=ChRhYnUgamJhcmEgcmVzdGF1cmFudEiK6tS95YCAgAhaLBAAEAEQAhgAGAEYAiIUYWJ1IGpiYXJhIHJlc3RhdXJhbnQqCAgCEAAQARACkgESZmFsYWZlbF9yZXN0YXVyYW50qgE9EAEyHxABIhua-e7fqcdH5GUtSmu7Josi5EjyHSXMKX8h3uYyGBACIhRhYnUgamJhcmEgcmVzdGF1cmFudA&phdesc=xs-oa-RQ88Y&vet=12ahUKEwiZza3Z57mFAxUBhf0HHSR_Bl8Q1YkKegQIGxAB..i&cs=0&um=1&ie=UTF-8&fb=1&gl=jo&sa=X&geocode=KUn-zOPLoRwVMWMxJTarujel&daddr=Al-Madina+Al-Monawara+St+189,+Amman',
        menu: 'http://abu-jbara.net/?portfolio=portfolio-big'

    },
    {   img:'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/1a/4b/a7/bd/img-20191211-wa0005-largejpg.jpg?w=1200&h=-1&s=1',
        name:'Hashem',
        category:['Fast Food', 'Mediterranean', 'Middle Eastern','Jordanian'],
        location:'https://www.google.com/maps?s=web&rlz=1C1SQJL_enJO994JO994&lqi=ChFoYXNoZW0gcmVzdGF1cmFudCIDiAEBSKy1xcDngICACFojEAAQARgAGAEiEWhhc2hlbSByZXN0YXVyYW50KgYIAhAAEAGSARJmYWxhZmVsX3Jlc3RhdXJhbnSqAToQATIfEAEiG5wadjnZkpmnwIfe4VRJ5PCWohRs8FEkXbKcbzIVEAIiEWhhc2hlbSByZXN0YXVyYW50&vet=12ahUKEwi6qaOx67uFAxUJ3gIHHdKQCXMQ1YkKegQIHxAB..i&cs=0&um=1&ie=UTF-8&fb=1&gl=jo&sa=X&geocode=KfM5j6SZXxsVMeJFuaiEuNrn&daddr=King+Faisal+Street+Amman,+%CA%BFAmman',
        menu: 'https://hashemrestaurants.com/?page_id=1874'

    },
    {   img:'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/0c/8c/2f/38/jafra-coffee-shop.jpg?w=1200&h=-1&s=1',
        name:'Jafra Restaurant & Cafe',
        category:['Cafe', 'Mediterranean', 'Middle Eastern','Jordanian'],
        location:'https://www.google.com/maps?rlz=1C1SQJL_enJO994JO994&gs_lcrp=EgZjaHJvbWUqDQgAEAAY4wIYyQMYgAQyDQgAEAAY4wIYyQMYgAQyEwgBEC4YrwEYxwEYkgMYyQMYgAQyBwgCEAAYgAQyBwgDEAAYgAQyCAgEEAAYFhgeMggIBRAAGBYYHjIICAYQABgWGB4yBggHEEUYPNIBBzczMGowajeoAgiwAgE&um=1&ie=UTF-8&fb=1&gl=jo&sa=X&geocode=KTPIzQ-aXxsVMZqjexShbjHi&daddr=Complex+No+15,+Prince+Mohammad+St+15,+Amman',
        menu: 'https://www.facebook.com/JafraRestaurantAndCafe/'

    },
    {   img:'https://dynamic-media-cdn.tripadvisor.com/media/daodao/photo-o/18/a7/e2/12/photo2jpg.jpg?w=1200&h=-1&s=1',
        name:'Shams El Balad',
        category:['Vegan Friendly', 'Mediterranean', 'Middle Eastern'],
        location:'https://www.google.com/maps?rlz=1C1SQJL_enJO994JO994&gs_lcrp=EgZjaHJvbWUqEAgAEAAYgwEY4wIYsQMYgAQyEAgAEAAYgwEY4wIYsQMYgAQyEwgBEC4YgwEYrwEYxwEYsQMYgAQyBwgCEAAYgAQyBwgDEAAYgAQyCAgEEAAYFhgeMggIBRAAGBYYHjILCAYQABgWGB4YyQMyBggHEEUYPKgCCLACAQ&um=1&ie=UTF-8&fb=1&gl=jo&sa=X&geocode=KZeNPSObXxsVMQv4-2vx7SaZ&daddr=Mu%27Ath+Bin+Jabal+Street+69,+Amman+11181',
        menu: 'https://order.ask-pepper.com/shams-el-balad/delivery/b1/store-section'

    },    
    {   img:'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/28/8f/34/67/the-restaurant-interior.jpg?w=1200&h=-1&s=1',
        name:'Willow Restaurant And Bar',
        category:['International', 'Mediterranean', 'Bar'],
        location:'https://www.google.com/maps/dir//K.+Naseef+St.,+Amman/@31.9545389,35.8148054,12z/data=!4m8!4m7!1m0!1m5!1m1!1s0x151b5f8d01d92227:0x6e01121d2cef3cde!2m2!1d35.8972067!2d31.9545655?entry=ttu',
        menu: 'https://www.thewillowstation.com/menu'

    },
    {   img:'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/19/bb/0d/79/enjoy-delicious-dishes.jpg?w=1200&h=-1&s=1',
        name:'Lucca Steakhouse',
        category:['Halal','Barbecue','Steakhouse'],
        location:'https://www.google.com/maps?rlz=1C1SQJL_enJO994JO994&gs_lcrp=EgZjaHJvbWUqEAgAEAAYgwEY4wIYsQMYgAQyEAgAEAAYgwEY4wIYsQMYgAQyEwgBEC4YgwEYrwEYxwEYsQMYgAQyCggCEAAYyQMYgAQyDQgDEAAYkgMYgAQYigUyBwgEEAAYgAQyBwgFEAAYgAQyBwgGEAAYgAQyBggHEEUYPKgCCLACAQ&um=1&ie=UTF-8&fb=1&gl=jo&sa=X&geocode=KQvf6Td9oBwVMfJwq1RfTL8R&daddr=Amman',
        menu: 'https://www.luccasteakhouse.com/jordan/#menus'

    },
    {
        img:'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR7T63ILRI087V-YsxxQktKIu89OQwpuYkxv0a_rLnoDA&s',
        name:'The Jordanian Kitchen',
        category:['Middle East', 'Vegan Friendly', 'Jordanian'],
        location:'https://www.google.com/maps/dir//the+jordanian+kitchen/data=!4m6!4m5!1m1!4e2!1m2!1m1!1s0x151b5ff809880bd9:0x7bc700d397e408f4?sa=X&ved=1t:3061&ictx=111',
        menu: 'https://www.facebook.com/profile.php?id=100087382098135'

    } ,  
    {
        img:'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/1a/29/f0/ff/mijana-s-garden.jpg?w=1100&h=-1&s=1',
        name:'Mijana',
        category:['Middle East', 'Vegan Friendly','Jordanian'],
        location:'https://www.google.com/maps?rlz=1C1SQJL_enJO994JO994&gs_lcrp=EgZjaHJvbWUqDQgAEAAYgwEYsQMYgAQyDQgAEAAYgwEYsQMYgAQyDQgBEC4YrwEYxwEYgAQyBwgCEAAYgAQyBwgDEAAYgAQyBwgEEAAYgAQyBwgFEAAYgAQyBwgGEAAYgAQyBggHEEUYPKgCCLACAQ&um=1&ie=UTF-8&fb=1&gl=jo&sa=X&geocode=KXP1trqEXxsVMVR5pUmeDNN7&daddr=left+off%D8%8C+Mijana+Ahmad+Bin+Toulon+St+8+First+circle,+the+first,+Rainbow+St.,+Amman', 
        menu: 'https://www.facebook.com/MijanaAmman/menu/?ref=page_internal&refid=12&paipv=0&eav=AfaMQZ3lk08wuq8SgmUcsBL6hRMMqGQMrhorHlTf-P1zhpWYPP5bL9Yk3aLLEti-DDY&_rdr'

    },
    {
        img:'https://romerogroup.jo/wp-content/uploads/2022/05/1-traditional-jordanian-restaurant-mediterranian-menu-1-scaled.jpg',
        name:'Sufra Restaurant',
        category:['Vegan Friendly', 'Mediterranean', 'Middle Eastern'],
        location:'https://www.google.com/maps?rlz=1C1SQJL_enJO994JO994&gs_lcrp=EgZjaHJvbWUqEAgAEAAYgwEY4wIYsQMYgAQyEAgAEAAYgwEY4wIYsQMYgAQyEwgBEC4YgwEYrwEYxwEYsQMYgAQyBwgCEAAYgAQyBwgDEAAYgAQyDQgEEC4YrwEYxwEYgAQyBwgFEAAYgAQyBwgGEAAYgAQyBggHEEUYPKgCCLACAQ&um=1&ie=UTF-8&fb=1&gl=jo&sa=X&geocode=KXN1QJybXxsVMZG5D-s24SA_&daddr=Sufra+Restaurant+Al,+Rainbow+St.+26,+Amman', 
        menu: 'https://romerogroup.jo/wp-content/uploads/2022/05/Sufra_menu.pdf'

    },
    {
        img:'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTPnOXEZWDMoi50q5fPsoTIkJaIlr1WtPJaGDwgzUZZEA&s',
        name:'habibah sweets',
        category:['Vegan Friendly', 'Dessert', 'Middle Eastern'],
        location:'https://www.google.com/maps/dir//K.+Hussein+St.,+Amman/@31.9525561,35.8499861,12z/data=!4m8!4m7!1m0!1m5!1m1!1s0x151b5f9759e8e483:0xc39b00a58fa1d206!2m2!1d35.9323874!2d31.9525827?entry=ttu', 
        menu: 'https://habibahsweets.com/products/'

    },
    
    {
        img:'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/0f/f4/11/68/food-entertainment-at.jpg?w=1200&h=-1&s=1',
        name:'Blue Fig',
        category:['Vegan Friendly', 'Bar', 'European'],
        location:'https://www.google.com/maps?sca_esv=421bbcb432c7b64f&rlz=1C1SQJL_enJO994JO994&sxsrf=ACQVn0-LDgPkQ3k_-5jn1VpAMt0pP3GlMA:1713085399674&gs_lp=Egxnd3Mtd2l6LXNlcnAiCGJsdWVmaWcgKgIIATIMEAAYgAQYigUYQxgKMg0QLhiABBjHARivARgKMgcQABiABBgKMgsQLhiABBjHARivATINEC4YgAQYxwEYrwEYCjIHEAAYgAQYCjIHEAAYgAQYCjIHEAAYgAQYCjIHEAAYgAQYCjIHEAAYgAQYCjIcEC4YgAQYxwEYrwEYChiXBRjcBBjeBBjgBNgBAUiZC1AAWABwAHgBkAEAmAGqAqAB8gOqAQMyLTK4AQHIAQD4AQGYAgOgAvsMmAMAugYGCAEQARgUkgcJMi0xLjEuNy0xoAe4Hg&um=1&ie=UTF-8&fb=1&gl=jo&sa=X&geocode=KX8kKHTsoBwVMbs_glEdmc7C&daddr=Irbid+St+30,+Amman', 
        menu: 'https://bluefig.com/assets/Dine-in-menu-NEW-2020.pdf'

    },
    {
        img:'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/1d/67/75/1c/caption.jpg?w=1200&h=-1&s=1',
        name:'Jordan Heritage Restaurant',
        category:['Jordanian', 'Healthy', 'Middleeastern'],
        location:'https://www.google.com/maps?rlz=1C1SQJL_enJO994JO994&gs_lcrp=EgZjaHJvbWUqDQgBEC4YrwEYxwEYgAQyBggAEEUYOTINCAEQLhivARjHARiABDIHCAIQLhiABDIHCAMQABiABDINCAQQLhivARjHARiABDIGCAUQRRg8MgYIBhBFGDwyBggHEEUYPNIBCDY0NDlqMGo0qAIAsAIA&um=1&ie=UTF-8&fb=1&gl=jo&sa=X&geocode=KcVoICltXxsVMdONmjpw334y&daddr=Al-Farazdaq+St.+11,+Amman',
        menu: 'https://www.facebook.com/JHRestaurants/menu/'

    },
    {
        img:'https://lh3.googleusercontent.com/p/AF1QipMn3yk7GfoHXTru-S2Ck6fn8fDNkXhNuEO3kC67=s1360-w1360-h1020',
        name:'High Garden Rooftop',
        category:['Seafood', 'Healthy', 'American'],
        location:'https://www.google.com/maps?rlz=1C1SQJL_enJO994JO994&gs_lcrp=EgZjaHJvbWUqFggBEC4YgwEYrwEYxwEYsQMYgAQYigUyBggAEEUYOTIWCAEQLhiDARivARjHARixAxiABBiKBTIHCAIQABiABDIHCAMQABiABDIHCAQQABiABDIHCAUQABiABDIHCAYQABiABDIGCAcQRRg80gEJMTI5MDBqMGo0qAIAsAIA&um=1&ie=UTF-8&fb=1&gl=jo&sa=X&geocode=KdX9tIw1oRwVMb54DmsqoE4s&daddr=Riad+Al-Mufleh+St.,+Amman+11181',
        menu: 'https://qrco.de/HGmenu'

    },
];

function displayRestaurants(category = '') {
    const container = document.querySelector('.restaurant-container');
    container.innerHTML = ''; 

    restaurants.forEach(function (restaurant) {
        
        if (!category || restaurant.category.includes(category)) {
            const restaurantDiv = document.createElement('div');
            restaurantDiv.classList.add('restaurant-card');

            const img = document.createElement('img');
            img.src = restaurant.img;

            const name = document.createElement('h2');
            name.textContent = restaurant.name;

            const category = document.createElement('p');
            category.textContent = '' + restaurant.category.join(', ');
        
            const location = document.createElement('a');
            location.href = restaurant.location;
            location.textContent = 'Location';
            location.target = '_blank';

            const menu = document.createElement('button');
            menu.textContent = "Menu";
            menu.addEventListener('click', function() {
                window.open(restaurant.menu, '_blank');
            });
            

            restaurantDiv.appendChild(img);
            restaurantDiv.appendChild(name);
            restaurantDiv.appendChild(category);
            restaurantDiv.appendChild(location);
            restaurantDiv.appendChild(menu);

            container.appendChild(restaurantDiv);
        }
    });
}

displayRestaurants(); 
const categoryFilter = document.getElementById('categoryFilter');

categoryFilter.addEventListener('change', function () {
    const selectedCategory = categoryFilter.value;
    displayRestaurants(selectedCategory);
});
