    function changeValue(val) {
        if (val==="vi") {
        window.location.href = "?lang=vi"; 
        }
        else {
        window.location.href = "?lang=en"; 
        }
    }

// open header box
var headerFunction = document.getElementsByClassName("header--function");
var headerFunctionBox = document.querySelectorAll(".header--function-box");
var overlay = document.querySelector(".overlay");
// open language
var language = document.querySelector(".setting-function__language");
var languageBox = document.querySelector(".box-language");

for(let i = 0; i < headerFunction.length; i++) {
    headerFunction[i].addEventListener('click', function() {
        overlay.classList.remove('overlay--active');
        for(let j = 0; j < headerFunctionBox.length; j++) {
            headerFunctionBox[j].classList.remove('open')
            if(i == j) {
                overlay.classList.add('overlay--active');
                headerFunctionBox[j].classList.add('open')

            }
        }
        language.addEventListener('click', function() {
            for(let j = 0; j < headerFunctionBox.length; j++) {
                console.log(headerFunctionBox[j]);
                headerFunctionBox[j].classList.remove('open');
            }
            languageBox.classList.add('open');
        }) 
        // close header box
        overlay.addEventListener('click', function() {
            overlay.classList.remove('overlay--active');
            headerFunctionBox[i].classList.remove('open');
            languageBox.classList.remove('open');
        })
    })
}

// // open content from sidebar
var sidebarWorkItems = document.getElementsByClassName("sidebar-work-items");
// var sidebarOpen = document.getElementsByClassName("sidebar--open");
// var homeFunction = document.getElementsByClassName("home-function");

// for(let i = 0; i < sidebarWorkItems.length; i++) {
//     sidebarWorkItems[i].addEventListener('click', function() {
//         for(let j = 0; j < sidebarOpen.length; j++) {
//             sidebarOpen[j].style.display = "none";
//             if(i == j) {
//                 sidebarOpen[j].style.display = "block";
//                 homeFunction[j].style.display = "block";
//             }
//         }
//     })
// }

// // open content from nav 
var cashNav = document.getElementsByClassName("cash-nav");
var cashFunction = document.getElementsByClassName("cash--function");
var bankingNav = document.getElementsByClassName("banking-nav");
var bankingFunction = document.getElementsByClassName("banking-function");
var purchaseNav = document.getElementsByClassName("purchase-nav");
var purchaseFunction = document.getElementsByClassName("purchase-function");
var salesNav = document.getElementsByClassName("sales-nav");
var salesFunction = document.getElementsByClassName("sales-function");
var inventoryNav = document.getElementsByClassName("inventory-nav");
var inventoryFunction = document.getElementsByClassName("inventory-function");
var generalNav = document.getElementsByClassName("general-nav");
var generalFunction = document.getElementsByClassName("general-function");


for(let i = 0; i < cashNav.length; i++) {
    cashNav[i].addEventListener('click', function() {
        console.log('aa');
        for(let j = 0; j < cashFunction.length; j++) {
            cashFunction[j].classList.remove('open');
            cashFunction[j].classList.remove('home-function');
            if(i == j) {
                cashFunction[j].classList.add('open');
            }
        }
    })
}
for(let i = 0; i < bankingNav.length; i++) {
    bankingNav[i].addEventListener('click', function() {
        for(let j = 0; j < bankingFunction.length; j++) {
            bankingFunction[j].style.display = "none";
            bankingFunction[j].classList.remove('home-function');
            if(i == j) {
                bankingFunction[j].style.display = "block";
            }
        }
    })
}
for(let i = 0; i < purchaseNav.length; i++) {
    purchaseNav[i].addEventListener('click', function() {
        for(let j = 0; j < purchaseFunction.length; j++) {
            purchaseFunction[j].style.display = "none";
            purchaseFunction[j].classList.remove('home-function');
            if(i == j) {
                purchaseFunction[j].style.display = "block";
            }
        }
    })
}
for(let i = 0; i < salesNav.length; i++) {
    salesNav[i].addEventListener('click', function() {
        for(let j = 0; j < salesFunction.length; j++) {
            salesFunction[j].style.display = "none";
            salesFunction[j].classList.remove('home-function');
            if(i == j) {
                salesFunction[j].style.display = "block";
            }
        }
    })
}
for(let i = 0; i < inventoryNav.length; i++) {
    inventoryNav[i].addEventListener('click', function() {
        for(let j = 0; j < inventoryFunction.length; j++) {
            inventoryFunction[j].style.display = "none";
            inventoryFunction[j].classList.remove('home-function');
            if(i == j) {
                inventoryFunction[j].style.display = "block";
            }
        }
    })
}
for(let i = 0; i < generalNav.length; i++) {
    generalNav[i].addEventListener('click', function() {
        // for(let a = 0; a < generalNav.length; a++) {
        //     generalNav[a].classList.remove("nav-items--active");
        // }
        // generalNav[i].classList.add("nav-items--active");
        for(let j = 0; j < generalFunction.length; j++) {
            generalFunction[j].style.display = "none";
            generalFunction[j].classList.remove('home-function');
            if(i == j) {
                generalFunction[j].style.display = "block";
            }
        }
    })
}

// // navigation active pseudo element
var navItems = document.getElementsByClassName("nav-items");

for(let i = 0; i < navItems.length; i++) {
    navItems[i].addEventListener('click', function() {
        for(let j = 0; j < navItems.length; j++) {
            navItems[j].classList.remove("nav-items--active");
            if(i == j) {
                navItems[j].classList.add("nav-items--active");
            }
        }
    })
}

// // open nav from sidebar
// var navOpenSidebar = document.getElementsByClassName("nav--open-sidebar");

// for(let i = 0; i < sidebarWorkItems.length; i++) {
//     sidebarWorkItems[i].addEventListener('click', function() {
//         for(let j = 0; j < navOpenSidebar.length; j++) {
//             navOpenSidebar[j].style.display = "none";
//             if(i == j) {
//                 navOpenSidebar[j].style.display = "block";
//             }
//         }
//     })
// }


// // sidebar active pseudo element
var sidebarWorkListActive = document.getElementsByClassName("sidebar-work-list--active");

for(let i = 0; i < sidebarWorkItems.length; i++) {
    sidebarWorkItems[i].addEventListener('click', function() {
        for(let j = 0; j < sidebarWorkItems.length; j++) {
            sidebarWorkItems[j].classList.remove("sidebar-work-list--active");
            if(i == j) {
                sidebarWorkItems[j].classList.add("sidebar-work-list--active");
            }
        }
    })
}



// // open and close box time line

var boxTimeLine = document.getElementsByClassName("box-time-line");
// var boxTimeLineDropdownList = document.getElementsByClassName("box-time-line__dropdown-list");

var overlay2 = document.querySelector('.overlay-not-color');
var boxTimeLineDropdownList = document.querySelectorAll(".box-time-line__dropdown-list");

for(let i = 0; i < boxTimeLine.length; i++) {
    boxTimeLine[i].addEventListener('click', function() {
        overlay2.classList.remove('overlay--active');
        for(let j = 0; j < boxTimeLineDropdownList.length; j++) {
            boxTimeLineDropdownList[j].classList.remove("dropdown-list--active");
            if(i == j) {
                boxTimeLineDropdownList[j].classList.add("dropdown-list--active");
                overlay2.classList.add('overlay--active');
            }
        }
    })
    overlay2.addEventListener('click', function() {
        for(let a = 0; a < boxTimeLineDropdownList.length; a++) {
            console.log('over2')
            boxTimeLineDropdownList[i].classList.remove("dropdown-list--active");
            overlay2.classList.remove('overlay--active');
        }
    });
}

// open box function

// var boxFunction = document.getElementsByClassName("open--box-function");
// var overlay2 = document.querySelector('.overlay-not-color');
// var boxFunctionDropdownList = document.querySelectorAll(".third-table-function-list");

// for(let i = 0; i < boxFunction.length; i++) {
//     boxFunction[i].addEventListener('click', function() {
//         overlay2.classList.remove('overlay--active');
//         for(let j = 0; j < boxFunctionDropdownList.length; j++) {
//             boxFunctionDropdownList[j].classList.remove("dropdown-list--active");
//             if(i == j) {
//                 boxFunctionDropdownList[j].classList.add("dropdown-list--active");
//                 overlay2.classList.add('overlay--active');
//             }
//         }
//     })
//     overlay2.addEventListener('click', function() {
//         for(let a = 0; a < boxFunctionDropdownList.length; a++) {
//             console.log('over2')
//             boxFunctionDropdownList[i].classList.remove("dropdown-list--active");
//             overlay2.classList.remove('overlay--active');
//         }
//     });
// }


// open modifier in time line box
var dropdownItems = document.getElementsByClassName("dropdown-items");

for(let i = 0; i < dropdownItems.length; i++) {
    dropdownItems[i].addEventListener('click', function() {
        for(let j = 0; j < dropdownItems.length; j++) {
            dropdownItems[j].classList.remove("dropdown-items--active");
            if(i == j) {
                dropdownItems[j].classList.add("dropdown-items--active");
            }
        }
    })
}

// filter

var filterBtn = document.getElementsByClassName('second-content__filter');
var filterBox = document.querySelectorAll('.second-content-time-line__dropdown-list');

for(let i = 0; i < filterBtn.length; i++) {
    filterBtn[i].addEventListener('click', function() {
        overlay2.classList.remove('overlay--active');
        for(let j = 0; j < filterBox.length; j++) {
            filterBox[j].classList.remove("dropdown-list--active");
            if(i == j) {
                filterBox[j].classList.add("dropdown-list--active");
                overlay2.classList.add('overlay--active');
            }
        }
    })
    overlay2.addEventListener('click', function() {
        for(let a = 0; a < filterBox.length; a++) {
            console.log('over2')
            filterBox[i].classList.remove("dropdown-list--active");
            overlay2.classList.remove('overlay--active');
        }
    });
}






