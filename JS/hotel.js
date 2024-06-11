const hotels = [
    {
        img:'https://photos.travelmyth.com/hotels/480/20/m-203527.jpg',
        name: "Royal Hotel",
        stars: 4,
        city: "Amman",
        address:'https://www.google.com/maps/place/Le+Royal+Hotel+%26+Resorts+Amman/@31.9533997,35.9090248,15z/data=!4m2!3m1!1s0x0:0xe38918f500c1842?sa=X&ved=1t:2428&ictx=111',
        btn:'Book Now'
    },
    {
        img:'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/17/aa/f7/ee/exterior-morning.jpg?w=1200&h=-1&s=1',
        name: "Ayass Hotel",
        stars: 4,
        city: "Amman",
        address:'https://www.google.com/maps/place/Ayass+Hotel/@31.982064,35.8648578,15z/data=!4m9!3m8!1s0x151ca1b65b18f3b7:0x8d5b6f08623573b4!5m2!4m1!1i2!8m2!3d31.982064!4d35.8648578!16s%2Fg%2F1q6j5srs0?entry=ttu',
        btn:'Book Now'
    },
    {
        img:'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/29/9d/ee/63/hotel-exterior.jpg?w=1200&h=-1&s=1',
        name: "Four Seasons Hotel",
        stars: 4,
        city: "Amman",
        address:'https://www.google.com/maps/place/Four+Seasons+Hotel+Amman/@31.9616282,35.8810368,15z/data=!4m2!3m1!1s0x0:0x80a84e21ae4f7d59?sa=X&ved=1t:2428&ictx=111',
        btn:'Book Now'
    },
    {
        img:'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/29/09/04/eb/club-lounge-amman-rotana.jpg?w=1200&h=-1&s=1',
        name: "Amman Rotana",
        stars: 4,
        city: "Amman",
        address:'https://www.google.com/maps/place/Amman+Rotana/@31.9650131,35.9031731,15z/data=!4m2!3m1!1s0x0:0x660a49cefe54732e?sa=X&ved=1t:2428&ictx=111',
        btn:'Book Now'
    },
    {
        img:'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/29/ea/d4/3c/exterior.jpg?w=1200&h=-1&s=1',
        name: "W Amman",
        stars: 4,
        city: "Amman",
        address:'https://www.google.com/maps/place/W+Amman/@31.9642141,35.9028805,15z/data=!4m2!3m1!1s0x0:0xa4a5b50125e1474d?sa=X&ved=1t:2428&ictx=111',
        btn:'Book Now'
    },
    {
        img:'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/07/05/aa/7b/art-hotel-downtown.jpg?w=1200&h=-1&s=1',
        name: "The Art Hotel",
        stars: 4,
        city: "Amman",
        address:'https://www.google.com/maps/place/The+art+hotel/@31.9522771,35.9326421,15z/data=!4m2!3m1!1s0x0:0x2a6ef37950404e5e?sa=X&ved=1t:2428&ictx=111',
        btn:'Book Now'
    },
    {
        img:'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/03/a8/bb/db/jordan-tower-hotel.jpg?w=1200&h=-1&s=1',
        name: "Jordan Tower Hotel",
        stars: 4,
        city: "Amman",
        address:'https://www.google.com/maps/place/Jordan+Tower+Hotel/@31.951787,35.937461,15z/data=!4m2!3m1!1s0x0:0x4892f954be4630b4?sa=X&ved=1t:2428&ictx=111',
        btn:'Book Now'
    },
    {
        img:'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/05/d5/5a/b9/qalet-al-jabal-hotel.jpg?w=1200&h=-1&s=1',
        name: "Qalet Al Jabal",
        stars: 4,
        city: "Ajloun",
        address:'https://www.google.com/maps/place/Al-jabal+castle+Hotel+-+Ajloun/@32.3313788,35.7455343,15z/data=!4m2!3m1!1s0x0:0xb93d0a0ab54c1e4b?sa=X&ved=1t:2428&ictx=111',
        btn:'Book Now'
    },
    {
        img:'https://eqbaljordan.com/sites/default/files/styles/xlarge/public/page/ritz-project-overview-20180318.jpg?itok=4bpfNmrl',
        name: "The Ritz-carlton",
        stars: 4,
        city: "Amman",
        address:'https://www.google.com/maps/place/The+Ritz-Carlton,+Amman/@31.9610095,35.8820578,15z/data=!4m9!3m8!1s0x151ca051615155a1:0x4c2b19aef5c97126!5m2!4m1!1i2!8m2!3d31.9610095!4d35.8820578!16s%2Fg%2F11h9gv0tby?entry=ttu',
        btn:'Book Now'
    },
    {
        img:'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/16/6d/d0/ac/amman-pasha-hotel.jpg?w=1000&h=-1&s=1',
        name: "Amman Pasha Hotel",
        stars: 4,
        city: "Amman",
        address:'https://www.google.com/maps/place/The+Amman+Pasha+Hotel/@31.952519,35.937753,15z/data=!4m2!3m1!1s0x0:0x9cc503138270f05a?sa=X&ved=1t:2428&ictx=111',
        btn:'Book Now'
    },
    {
        img:'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/1f/53/9e/57/opal-hotel.jpg?w=1200&h=-1&s=1',
        name: "Opal Hotel",
        stars: 4,
        city: "Amman",
        address:'https://www.google.com/maps/place/Opal+Hotel+Amman/@31.8610034,35.8952406,15z/data=!4m2!3m1!1s0x0:0x7c22d70f315fe6?sa=X&ved=1t:2428&ictx=111',
        btn:'Book Now'
    },
    {
        img:'https://cf.bstatic.com/xdata/images/hotel/max1024x768/24065238.jpg?k=b8dbdf1cf5b6dd7be6a6c2073adbc6f09cbc248ce850d09c58e6faaede00e5e1&o=&hp=1',
        name: "Saint John Hotel",
        stars: 4,
        city: "Amman",
        address:'hhttps://www.google.com/maps/place/Saint+John+Hotel/@31.7152438,35.7936795,15z/data=!4m2!3m1!1s0x0:0x21f6c61e1867d137?sa=X&ved=1t:2428&ictx=111',
        btn:'Book Now'
    },
    {
        img:'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/04/7b/40/80/salome-hotel.jpg?w=1200&h=-1&s=1',
        name: "Salome Hotel",
        stars: 4,
        city: "Madaba",
        address:'https://www.google.com/maps/place/Salome+Hotel+%D9%81%D9%86%D8%AF%D9%82+%D8%B3%D8%A7%D9%84%D9%88%D9%85%D9%8A%E2%80%AD/@31.723805,35.794841,15z/data=!4m2!3m1!1s0x0:0xe94cc4f3c2e24d98?sa=X&ved=1t:2428&ictx=111',
        btn:'Book Now'
    },
    {
        img:'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/2b/03/44/12/tea-lounge.jpg?w=1200&h=-1&s=1',
        name: "The St. Regis",
        stars: 4,
        city: "Amman",
        address:'https://www.google.com/maps/place/The+St.+Regis+Amman/@31.958024,35.8780314,15z/data=!4m2!3m1!1s0x0:0xff9e3f7214b7f3a5?sa=X&ved=1t:2428&ictx=111',
        btn:'Book Now'
    },
    {
        img:'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/2b/02/b9/35/entrance.jpg?w=1200&h=-1&s=1',
        name: "Sheraton",
        stars: 4,
        city: "Amman",
        address:'https://www.google.com/maps/place/Sheraton+Amman+Al+Nabil+Hotel/@31.9606234,35.8801702,15z/data=!4m2!3m1!1s0x0:0x185af7c4d5a2737b?sa=X&ved=1t:2428&ictx=111',
        btn:'Book Now'
    },
    {
        img:'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/1c/a4/72/cf/intercontinental-jordan.jpg?w=1200&h=-1&s=1',
        name: "InterContinental (Jordan)",
        stars: 4,
        city: "Amman",
        address:'https://www.google.com/maps/place/Intercontinental+Amman+(Jordan)/@31.953314,35.913148,15z/data=!4m2!3m1!1s0x0:0xf8a517c99e5113ea?sa=X&ved=1t:2428&ictx=111',
        btn:'Book Now'
    },
    {
        img:'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/27/37/3d/a5/hotel-facade.jpg?w=1200&h=-1&s=1',
        name: "Fairmont",
        stars: 4,
        city: "Amman",
        address:'https://www.google.com/maps/place/Fairmont+Amman/@31.9596275,35.8814804,15z/data=!4m2!3m1!1s0x0:0x385b54e5b700e10?sa=X&ved=1t:2428&ictx=111',
        btn:'Book Now'
    },
    {
        img:'https://cf.bstatic.com/xdata/images/hotel/max1024x768/284124236.jpg?k=66d7538fed548dcf5f3bd62f85ae00c1ba4d10b91c666b5ba208bbb442e4b810&o=&hp=1',
        name: "Kempinski Hotel",
        stars: 4,
        city: "Amman",
        address:'https://www.google.com/maps/place/Kempinski+Hotel+Amman+Jordan/@31.9681566,35.8968866,15z/data=!4m2!3m1!1s0x0:0xaaf5fbe6585b4afb?sa=X&ved=1t:2428&ictx=111',
        btn:'Book Now'
    },
    {
        img:'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/10/e0/7c/55/the-house-boutique-suites.jpg?w=900&h=-1&s=1',
        name: "The House Boutique",
        stars: 4,
        city: "Amman",
        address:'https://www.google.com/maps/place/The+House+Boutique+Suites/@31.9512036,35.9176494,15z/data=!4m2!3m1!1s0x0:0x5c3d6592cb38eee3?sa=X&ved=1t:2428&ictx=111',
        btn:'Book Now'
    },
    {
        img:'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/26/ec/b1/5a/crowne-plaza-jordan-dead.jpg?w=1200&h=-1&s=1',
        name: "Crowne Plaza",
        stars: 4,
        city: "Dead Sea",
        address:'https://www.google.com/maps/place/Crowne+Plaza+Jordan+-+Dead+Sea+Resort+%26+Spa/@31.7075686,35.5844531,15z/data=!4m2!3m1!1s0x0:0x33ffce7beae677e5?sa=X&ved=1t:2428&ictx=111',
        btn:'Book Now'
    },
    {
        img:'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/29/08/03/8c/exterior.jpg?w=1200&h=-1&s=1',
        name: "Land Mark",
        stars: 4,
        city: "Amman",
        address:'https://www.google.com/maps/place/Landmark+Amman+Hotel+%26+Conference+Center/@31.9602743,35.9039544,15z/data=!4m2!3m1!1s0x0:0xb5fc920daa48b808?sa=X&ved=1t:2428&ictx=111',
        btn:'Book Now'
    },
    {
        img:'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/29/ea/d4/3c/exterior.jpg?w=1200&h=-1&s=1',
        name: "Alasef House",
        stars: 4,
        city: "Ajloun",
        address:'https://www.google.com/maps/place/Asv+House+Resort/@32.4002831,35.7322155,15z/data=!4m2!3m1!1s0x0:0xc8bc4d1d0b2370e8?sa=X&ved=1t:2428&ictx=111',
        btn:'Book Now'
    },
    {
        img:'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/14/b4/c1/d8/the-olive-branch-hotel.jpg?w=1200&h=-1&s=1',
        name: "The Olive Branch",
        stars: 4,
        city: "Jerash",
        address:'https://www.google.com/maps/place/The+Olive+Branch+Hotel/@32.2961111,35.855,15z/data=!4m2!3m1!1s0x0:0xefd9b68656904aef?sa=X&ved=1t:2428&ictx=111',
        btn:'Book Now'
    },
    {
        img:'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/1d/78/bf/d7/ajloun-hotel.jpg?w=1100&h=-1&s=1',
        name: "Ajloun hotel",
        stars: 4,
        city: "Ajloun",
        address:'https://www.google.com/travel/search?q=ajloun%20hotel&g2lb=2503771%2C2503781%2C4284970%2C4291517%2C4814050%2C4874190%2C4893075%2C4965990%2C72277293%2C72302247%2C72317059%2C72406588%2C72414906%2C72420597%2C72421566%2C72458066%2C72462234%2C72470440%2C72470899%2C72471280%2C72472051%2C72473841%2C72481459%2C72485656%2C72485658%2C72486593%2C72494250%2C72513422%2C72513513%2C72520080%2C72523972%2C72530238%2C72534000%2C72536387%2C72538597%2C72543515%2C72549171%2C72549174%2C72556202%2C72561423&hl=en-JO&gl=jo&ssta=1&ts=CAESCAoCCAMKAggDGhwSGhIUCgcI6A8QBRgHEgcI6A8QBRgIGAEyAhAAKgcKBToDSk9E&qs=CAE4BlpFMkOqAUAQASoJIgVob3RlbCgAMh8QASIbtMxY3DvvkJcBq0M9zw45TChswNIlr5A2icw6MhAQAiIMYWpsb3VuIGhvdGVs&ap=SABoAQ&ictx=111&ved=0CAAQ5JsGahcKEwigy57718SFAxUAAAAAHQAAAAAQCw',
        btn:'Book Now'
    },
    {
        img:'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/25/39/05/b1/ajloun-cabins.jpg?w=1000&h=-1&s=1',
        name: "Ajloun Cabins",
        stars: 4,
        city: "Ajloun",
        address:'https://www.google.com/maps/place/Ajloun+cabins/@32.3802022,35.763702,15z/data=!4m2!3m1!1s0x0:0xbf1a4668eafefeeb?sa=X&ved=1t:2428&ictx=111',
        btn:'Book Now'
    },

    {
        img:'https://www.experiencejordan.com/wp-content/uploads/2016/09/Blog-Headers.jpg',
        name: "Ajloun Forest Reserve",
        stars: 4,
        city: "Ajloun",
        address:'https://www.google.com/maps/place/%D9%85%D8%AD%D9%85%D9%8A%D8%A9+%D8%BA%D8%A7%D8%A8%D8%A7%D8%AA+%D8%B9%D8%AC%D9%84%D9%88%D9%86%E2%80%AD/@32.3801562,35.7637972,15z/data=!4m2!3m1!1s0x0:0x53bba70d2502bf6e?sa=X&ved=1t:2428&ictx=111',
        btn:'Book Now'
    },{
        img:'https://lh5.googleusercontent.com/p/AF1QipOIzvRUoqGNyS5RelGGHi1d1xgtabrimFMMYLFn=w243-h174-n-k-no-nu',
        name: "Sharhabil Bin Hassneh",
        stars: 4,
        city: "Irbid",
        address:'https://www.google.com/maps/place/Jordan+EcoPark/@32.5259606,35.6181371,15z/data=!4m2!3m1!1s0x0:0x3df4c4e766f061d6?sa=X&ved=1t:2428&ictx=111',
        btn:'Book Now'
    },
    {
        img:'https://q-xx.bstatic.com/xdata/images/hotel/max500/194998734.jpg?k=345b82ce686c83dc43d4cb4ecba543b26d4cde33fdfe3dbf445db9384e7a021e&o=',
        name: "The North jewel",
        stars: 4,
        city: "Irbid",
        address:'https://www.google.com/maps/place/The+North+jewel/@32.4160639,35.8065042,15z/data=!4m2!3m1!1s0x0:0xb23df6ba4d439e2?sa=X&ved=1t:2428&ictx=111',
        btn:'Book Now'
    },
    {
        img:'https://pix10.agoda.net/hotelImages/31050329/0/ec107355bd6ae346d7fdfd34ab3e4490.jpg?ca=28&ce=0&s=414x232&ar=16x9',
        name: "Al Joude Hotel",
        stars: 4,
        city: "Irbid",
        address:'https://www.google.com/maps/place/Al+Joude+Hotel/@32.540123,35.8495306,15z/data=!4m9!3m8!1s0x151c76c029320b53:0xb5af41daf40aa26e!5m2!4m1!1i2!8m2!3d32.540123!4d35.8495306!16s%2Fg%2F1td0__qg?entry=ttu',
        btn:'Book Now'
    },
    {
        img:'https://cf.bstatic.com/xdata/images/hotel/max1024x768/248214528.jpg?k=4c7ea2ff2a66b3644a86c1450d1bfe269873977de8fa3c52deb62de35c52c7bb&o=&hp=1',
        name: "murshed motel",
        stars: 4,
        city: "Irbid",
        address:'https://www.google.com/maps/place/Murshed+Motel+-+%D8%B4%D9%82%D9%82+%D9%85%D8%B1%D8%B4%D8%AF+%D8%A7%D9%84%D9%81%D9%86%D8%AF%D9%82%D9%8A%D8%A9%E2%80%AD/@32.6129215,35.6386789,15z/data=!4m9!3m8!1s0x151c69471d074d61:0x872816c313c3ff71!5m2!4m1!1i2!8m2!3d32.6129215!4d35.6386789!16s%2Fg%2F1q629xgvf?entry=ttu',
        btn:'Book Now'
    },
    {
        img:'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/1c/0b/e3/ff/grand-tala-bay-resort.jpg?w=1200&h=-1&s=1',
        name: "Grand Tala",
        stars: 4,
        city: "Aqaba",
        address:'https://www.google.com/maps/place/Grand+Tala+Bay+Resort/@29.4130465,34.9787075,15z/data=!4m2!3m1!1s0x0:0x5f1d742b8678d7b3?sa=X&ved=1t:2428&ictx=111',
        btn:'Book Now'
    },
    {
        img:'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/2a/b7/f1/b5/restaurant.jpg?w=1100&h=-1&s=1',
        name: "Movenpick Resort",
        stars: 4,
        city: "Aqaba",
        address:'https://www.google.com/maps/place/M%C3%B6venpick+Aqaba/@29.5321524,34.999779,15z/data=!4m2!3m1!1s0x0:0x5f9312383e30d42f?sa=X&ved=1t:2428&ictx=111',
        btn:'Book Now'
    },
    {
        img:'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ6oJ3mJEMM6SaBIOvBfrZfljVP11Jr-oyWMKF0OZ-iww&s',
        name: "Al Manara",
        stars: 4,
        city: "Aqaba",
        address:'https://www.google.com/maps/place/Al+Manara,+a+Luxury+Collection+Hotel,+Saraya+Aqaba/@29.5357818,34.9932756,15z/data=!4m2!3m1!1s0x0:0xee46e07291f4d590?sa=X&ved=1t:2428&ictx=111',
        btn:'Book Now'
    },
    {
        img:'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/2a/80/c8/9c/exterior-view.jpg?w=1100&h=-1&s=1',
        name: "Movenpick",
        stars: 4,
        city: "Aqaba",
        address:'https://www.google.com/maps/place/M%C3%B6venpick+Tala+Bay/@29.405539,34.9787719,15z/data=!4m9!3m8!1s0x15007638a861207f:0x92bf06d171569492!5m2!4m1!1i2!8m2!3d29.405539!4d34.9787719!16s%2Fg%2F12cpj_5yq?entry=ttu',
        btn:'Book Now'
    },
    {
        img:'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/2b/01/dd/38/exterior.jpg?w=1200&h=-1&s=1',
        name: "Marriott",
        stars: 4,
        city: "Petra",
        address:'https://www.google.com/maps/place/Petra+Marriott+Hotel/@30.3044565,35.4636223,15z/data=!4m2!3m1!1s0x0:0x12d6dd06b48d4330?sa=X&ved=1t:2428&ictx=111',
        btn:'Book Now'
    },
    {
        img:'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/23/07/f9/03/petra-moon-hotel.jpg?w=1200&h=-1&s=1',
        name: "Petra Moon",
        stars: 4,
        city: "Petra",
        address:'https://www.google.com/maps?s=web&rlz=1C1SQJL_enJO994JO994&lqi=CgpwZXRyYSBtb29uSPmd_e7qgICACFocEAAQARgAGAEiCnBldHJhIG1vb24qBggCEAAQAZIBBWhvdGVsqgEzEAEyHxABIhsMO8pMX4yXu_xCD0XlCSS2dowjTtB-YpshGYwyDhACIgpwZXRyYSBtb29u&vet=12ahUKEwipzeqA3sSFAxV-VvEDHS7oDecQ1YkKegQIIhAB..i&cs=0&um=1&ie=UTF-8&fb=1&gl=jo&sa=X&geocode=KYmQVkXQbgEVMRFIMVIlsapl&daddr=Visitors+center+street,+Tourism+St,+Wadi+Musa+43345',
        btn:'Book Now'
    },
    {
        img:'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/26/d1/7c/6d/little-petra-bedouin.jpg?w=1100&h=-1&s=1',
        name: "Little Petra Bedouin",
        stars: 4,
        city: "Petra",
        address:'https://www.google.com/maps/place/Little+Petra+Bedouin+Camp/@30.3706233,35.4590379,15z/data=!4m2!3m1!1s0x0:0x40db390302a723b7?sa=X&ved=1t:2428&ictx=111',
        btn:'Book Now'
    },
    {
        img:'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/23/21/f7/4b/bedouin-lifestyle-camp.jpg?w=1200&h=-1&s=1',
        name: "Bedouin Lifestyle",
        stars: 4,
        city: "Wadi Rum",
        address:'https://www.google.com/maps?s=web&rlz=1C1SQJL_enJO994JO994&lqi=ChZCZWRvdWluIExpZmVzdHlsZSBDYW1wSNX4kLOjroCACFokEAAQARACGAAYARgCIhZiZWRvdWluIGxpZmVzdHlsZSBjYW1wkgEFaG90ZWyqAT8QATIfEAEiG1Wcq0m9A8Wn2I4Cr4x8Q8Qv9TOsCdy4KvhDKzIaEAIiFmJlZG91aW4gbGlmZXN0eWxlIGNhbXA&vet=12ahUKEwiKyK7G3sSFAxW__rsIHTVUChsQ1YkKegQIVRAB..i&cs=0&um=1&ie=UTF-8&fb=1&gl=jo&sa=X&geocode=KVPo62ofkgAVMVx0m_T8I92P&daddr=GC56%2BPFV,+Wadi+Rum+Village',
        btn:'Book Now'
    },
    {
        img:'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/12/b5/99/0e/hydropool-in-zara-spa.jpg?w=1200&h=-1&s=1',
        name: "Movenpick",
        stars: 4,
        city: "Dead Sea",
        address:'https://www.google.com/maps/place/M%C3%B6venpick+Dead+Sea+Jordan/@31.717054,35.587433,15z/data=!4m2!3m1!1s0x0:0xb14ea1af11f307ba?sa=X&ved=1t:2428&ictx=111',
        btn:'Book Now'
    },
    {
        img:'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/11/1a/78/8f/hilton-dead-sea-resort.jpg?w=1200&h=-1&s=1',
        name: "Hilton",
        stars: 4,
        city: "Dead Sea",
        address:'https://www.google.com/maps/place/Hilton+Dead+Sea+Resort+%26+Spa/@31.7219065,35.5874354,15z/data=!4m2!3m1!1s0x0:0x7938918631564c43?sa=X&ved=1t:2428&ictx=111',
        btn:'Book Now'
    },
    {
        img:'https://cf.bstatic.com/xdata/images/hotel/max1024x768/238865507.jpg?k=f38eb39071a0855bd5ba3227c8f922f790a37aedfc629c369bbd9b2465b9ce46&o=&hp=1',
        name: "Sun City Camp",
        stars: 4,
        city: "Wadi Rum",
        address:'https://www.google.com/maps/place/Sun+City+Camp/@29.6564064,35.4799682,15z/data=!4m2!3m1!1s0x0:0x8da3f3ea3e357eda?sa=X&ved=1t:2428&ictx=111',
        btn:'Book Now'
    },  
];

function displayHotels(city = '') {
    const container = document.querySelector('.hotel-container');
    container.innerHTML = ''; 

    hotels.forEach(function (hotel) {
        
        if (!city || hotel.city === city) {
            const hotelDiv = document.createElement('div');
            hotelDiv.classList.add('hotel-card');

            const img = document.createElement('img');
            img.src = hotel.img;

            const name = document.createElement('h2');
            name.textContent = hotel.name;

            const stars = document.createElement('p');
            stars.textContent ='Stars : ' + hotel.stars;

            const cityPara = document.createElement('p');
            cityPara.textContent = 'City: ' + hotel.city;
        
            const address = document.createElement('a');
            address.href = hotel.address;
            address.textContent = 'Location';
            address.target = '_blank';

            const bookNow = document.createElement('button');
            bookNow.textContent = "Book Now";
            bookNow.addEventListener('click', function() {
                window.open(hotel.btn, '_blank');
            });

            hotelDiv.appendChild(img);
            hotelDiv.appendChild(name);
            hotelDiv.appendChild(stars);
            hotelDiv.appendChild(cityPara);
            hotelDiv.appendChild(address);
            hotelDiv.appendChild(bookNow);

            container.appendChild(hotelDiv);
        }
    });
}

displayHotels(); 
const cityFilter = document.getElementById('cityFilter');

cityFilter.addEventListener('change', function () {
    const selectedCity = cityFilter.value;
    displayHotels(selectedCity);
});