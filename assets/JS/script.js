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

