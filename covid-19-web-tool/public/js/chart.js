const displayDonationsChart = () => {

    let dataValue = [];
    let totalEnrollment = 0;
    let dataSets = document.querySelectorAll('.donations-data #data-set');

    // --------- fetch data from data setss in html ------------------------------
    dataSets.forEach(dataSet => {
        const target = dataSet.getAttribute('data-target');
        totalEnrollment = totalEnrollment + parseInt(target);
        dataValue.push(parseInt(target));
    });
    //chart data here

    var ctx = document.getElementById('donChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: `${totalEnrollment} Total Donations`,
                data: dataValue,
                fill: false,
                backgroundColor: [
                    '#2486a4',
                    '#2997b9',
                    '#2486a4',
                    '#2997b9',
                    '#2486a4',
                    '#2997b9',
                    '#2486a4',
                    '#2997b9',
                    '#2486a4',
                    '#2997b9',
                    '#2486a4',
                    '#2997b9'
                ],
                borderColor: '#fff',
                borderWidth: 3
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
            elements: {
                line: {
                    tension: 0
                }
            }
        }

    });
}

const displayEnrollmentChart = () => {

    let dataValue = [];
    let totalEnrollment = 0;
    let dataSets = document.querySelectorAll('.enrollment-data #data-set');
    let finalDataValue=[];

    // --------- fetch data from data setss in html ------------------------------
    dataSets.forEach(dataSet => {
        const target = dataSet.getAttribute('data-target');
        totalEnrollment = totalEnrollment + parseInt(target);
        dataValue.push(parseInt(target));
    });
    for(let i=0;i<dataValue.length;i++){
        for(let y=0;y< dataValue.length;y++){
            finalDataValue[0]=dataValue[0];
            finalDataValue[1]=((dataValue[1]-dataValue[0])/ dataValue[1])*100;
            finalDataValue[2]=((dataValue[2]-dataValue[1])/dataValue[2])*100;
            finalDataValue[3]=((dataValue[3]-dataValue[2])/dataValue[3])*100;
            finalDataValue[4]=((dataValue[4]-dataValue[3])/dataValue[4])*100;
            finalDataValue[5]=((dataValue[5]-dataValue[4])/dataValue[5])*100;
            finalDataValue[6]=((dataValue[6]-dataValue[5])/dataValue[6])*100;
            finalDataValue[7]=((dataValue[7]-dataValue[6])/dataValue[7])*100;
            finalDataValue[8]=((dataValue[8]-dataValue[7])/dataValue[8])*100;
            finalDataValue[9]=((dataValue[9]-dataValue[8])/dataValue[9])*100;
            finalDataValue[10]=((dataValue[10]-dataValue[9])/dataValue[10])*100;
            finalDataValue[11]=((dataValue[11]-dataValue[10])/dataValue[11])*100;
            
        }
    }

    var ctx = document.getElementById('enrollmentChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: `${totalEnrollment} Total Health Officers`,
                data: finalDataValue,
                fill: false,
                backgroundColor: [
                    '#2486a4',
                    '#2997b9',
                    '#2486a4',
                    '#2997b9',
                    '#2486a4',
                    '#2997b9',
                    '#2486a4',
                    '#2997b9',
                    '#2486a4',
                    '#2997b9',
                    '#2486a4',
                    '#2997b9'
                ],
                borderColor: [
                    '#2486a4',
                    '#2997b9',
                    '#2486a4',
                    '#2997b9',
                    '#2486a4',
                    '#2997b9',
                    '#2486a4',
                    '#2997b9',
                    '#2486a4',
                    '#2997b9',
                    '#2486a4',
                    '#2997b9'
                ],
                borderWidth: 3
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
            elements: {
                line: {
                    tension: 0
                }
            }
        }

    });
}
//functions for the two graphs

displayDonationsChart();
displayEnrollmentChart();
