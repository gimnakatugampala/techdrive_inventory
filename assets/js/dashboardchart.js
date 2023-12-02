window.onload = function () {
 
    var dataPoints = [];
     
    var chart = new CanvasJS.Chart("chartContainer",
    { 
        title:{
              text:	"Sales & Purchases"
          },
        data: [
        {
            type: "pie",
            indexLabel: "{label} : #percent%",
            // toolTipContent : "{label}: {y} sq. km",
            dataPoints: dataPoints
        }					
        ]
    });

    $.getJSON("../pages/chartdata.php", function (data) {
        data.forEach(element => {

            console.log({ label: element.label, y: parseFloat(element.amount) })
            
            dataPoints.push({ label: element.label, y: parseFloat(element.amount) })
        });
        chart.render();
      });
    
     
    }