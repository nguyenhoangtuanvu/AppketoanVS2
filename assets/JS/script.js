// setup 
const stackedData = {
    labels: ['Th1', 'Th2', 'Th3', 'Th4', 'Th5', 'Th6', 'Th7', 'Th8', 'Th9', 'Th10', 'Th11', 'Th12'],
    datasets: [{
    label: 'Tổng thu',
    data: [18, 12, 6, 9, 12, 3, 9, 12, 6, 9, 12, 3, 9],
    backgroundColor: [
        'rgba(0, 117, 192, 0.7)'
    ],
    borderColor: [
        'rgba(0, 117, 192, 1)'
    ],
    borderWidth: 1
    }, {
    label: 'Tổng chi',
    data: [-18, -12,- 6, -9, -12, -3, -9, -12, -6, -9, -12, -3, -9],
    backgroundColor: [
        'rgba(212, 215, 220, 0.8)'
    ],
    borderColor: [
        'rgba(212, 215, 220, 1)'
    ],
    borderWidth: 1
    }, {
    label: 'Tồn',
    data: [18, 12, 6, 9, 12, 3, 9, 12, 6, 9, 12, 3, 9],
    backgroundColor: 'rgba(248, 135, 42, 0.2)',
    borderColor: 'rgba(248, 135, 42, 1)',
    tension: .4,
    type: 'line'
    }]
};

// config 
const config = {
    type: 'bar',
    data: stackedData,
    options: {
    scales: {
        x: {
            stacked: true
        },
        y: {
        beginAtZero: true,
        stacked: true
        }
    }
    }
};

// render init block
const stacked = new Chart(
    document.getElementById('stackedChart'),
    config
);


const lineData = {
    labels: ['Th1', 'Th2', 'Th3', 'Th4', 'Th5', 'Th6', 'Th7', 'Th8', 'Th9', 'Th10', 'Th11', 'Th12'],
    datasets: [{
    label: 'Doanh thu',
    data: [18, 12, 6, 9, 12, 3, 9, 12, 6, 9, 12, 3, 9],
    backgroundColor: 'rgba(248, 135, 42, 0.2)',
    borderColor: 'rgba(248, 135, 42, 1)',
    tension: .4,
    type: 'line'
    }]
};

// config 
const config2 = {
    type: 'line',
    data: lineData,
    options: {
    scales: {
        x: {
            stacked: true
        },
        y: {
        beginAtZero: true,
        stacked: true
        }
    }
    }
};

// render init block
const line = new Chart(
    document.getElementById('lineChart'),
    config2
);

// open content from sidebar
var sidebarWorkItems = document.getElementsByClassName("sidebar-work-items");
var sidebarOpen = document.getElementsByClassName("sidebar--open");
var homeFunction = document.getElementsByClassName("home-function")

for(let i = 0; i < sidebarWorkItems.length; i++) {
    sidebarWorkItems[i].addEventListener('click', function() {
        for(let j = 0; j < sidebarOpen.length; j++) {
            sidebarOpen[j].style.display = "none";
            if(i == j) {
                sidebarOpen[j].style.display = "block";
                homeFunction[j].style.display = "block";
            }
        }
    })
}

// open nav from sidebar
var navOpenSidebar = document.getElementsByClassName("nav--open-sidebar");

for(let i = 0; i < sidebarWorkItems.length; i++) {
    sidebarWorkItems[i].addEventListener('click', function() {
        for(let j = 0; j < navOpenSidebar.length; j++) {
            navOpenSidebar[j].style.display = "none";
            if(i == j) {
                navOpenSidebar[j].style.display = "block";
            }
        }
    })
}

// open content from nav 
var cashNav = document.getElementsByClassName("cash-nav")
var cashFunction = document.getElementsByClassName("cash--function")
var bankingNav = document.getElementsByClassName("banking-nav")
var bankingFunction = document.getElementsByClassName("banking-function")
var purchaseNav = document.getElementsByClassName("purchase-nav")
var purchaseFunction = document.getElementsByClassName("purchase-function")
var salesNav = document.getElementsByClassName("sales-nav")
var salesFunction = document.getElementsByClassName("sales-function")
var inventoryNav = document.getElementsByClassName("inventory-nav")
var inventoryFunction = document.getElementsByClassName("inventory-function")
var generalNav = document.getElementsByClassName("general-nav")
var generalFunction = document.getElementsByClassName("general-function")


for(let i = 0; i < cashNav.length; i++) {
    cashNav[i].addEventListener('click', function() {
        for(let j = 0; j < cashFunction.length; j++) {
            cashFunction[j].style.display = "none";
            if(i == j) {
                cashFunction[j].style.display = "block";
            }
        }
    })
}
for(let i = 0; i < bankingNav.length; i++) {
    bankingNav[i].addEventListener('click', function() {
        for(let j = 0; j < bankingFunction.length; j++) {
            bankingFunction[j].style.display = "none";
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
            if(i == j) {
                inventoryFunction[j].style.display = "block";
            }
        }
    })
}
for(let i = 0; i < generalNav.length; i++) {
    generalNav[i].addEventListener('click', function() {
        for(let j = 0; j < generalFunction.length; j++) {
            generalFunction[j].style.display = "none";
            if(i == j) {
                generalFunction[j].style.display = "block";
            }
        }
    })
}

// 


















var aaa = document.getElementsByClassName("aaa")