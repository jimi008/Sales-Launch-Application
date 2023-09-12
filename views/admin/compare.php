<?php include("includes/header.php"); ?>
      <input type="hidden" value="<?php echo $params?>" name="params" id="params">
		<div class="row">
			<div class="col-md-1">
 				<div class="plot-graph"><input type="radio" class="form-control checkbox" name="plot-types" value="SALES"></div>
				<div class="plot-graph"><input type="radio" class="form-control checkbox" name="plot-types" value="FEE"></div>
				<div class="plot-graph"><input type="radio" class="form-control checkbox" name="plot-types" value="OFFERS"></div>
				<div class="plot-graph"><input type="radio" class="form-control checkbox" name="plot-types" value="CONTACT_MOMENTS"></div>
			</div>
			<div class="col-md-10">
				
			      <div id="top-graph-container" style="min-width: 1000px; height: 130px; margin: 0 auto"></div>
			</div>
			<div class="col-md-1">

 				<div class="plot-graph"><input type="radio" class="form-control checkbox" name="plot-times" value="YEAR"></div>
				<div class="plot-graph"><input type="radio" class="form-control checkbox" name="plot-times" value="QUARTER"></div>
				<div class="plot-graph"><input type="radio" class="form-control checkbox" name="plot-times" value="MONTH"></div>
				<div class="plot-graph"><input type="radio" class="form-control checkbox" name="plot-times" value="WEEK"></div>
			</div>
		</div>
		<div class="row">
		<?php foreach($buttons_for_marketeers as $button): ?>
			<div class="col-md-1">
				<a href="<?php echo $button['url'] ?>" class="btn <?php echo $button['class'] ?>" >
					<?php echo $button['title'] ?>
				</a>
			</div>
		<?php endforeach; ?>
		</div>
		<div class="row">
		<?php if(isset($marketeers_to_compare) && isset($marketeers_to_compare)):"" ?>
		<?php foreach($marketeers_to_compare as $marketeer): ?>
			<div class="col-md-3">
				<?php echo $marketeer['col1_sales_performance'] ?>
				<?php echo $marketeer['col1_weekly_contact_moments'] ?>
				<?php echo $marketeer['col1_weekly_sales'] ?>
				<?php echo $marketeer['col1_monthly_sales'] ?>
			</div>
		<?php endforeach ?>
	<?php endif ?>
		</div>
		<script type="text/javascript">
$(document).ready(function() {
	var options = {
            chart: {
                    renderTo: 'top-graph-container',
                    type: 'spline',
                    marginRight: 10,
                    marginBottom: 30
            },
            title:false,
            subtitle: false,
            xAxis: {
                type: 'categories',
                title: { enabled: true,text: 'Weeks'}
            },
            yAxis: {
                title: { text: 'Contecten' },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }],
                min: 0
            },
            tooltip: {
            	valueSuffix: ''
            },
            legend: false,

            series: []
        }

Highcharts.createElement('link', {
   href: 'http://fonts.googleapis.com/css?family=Unica+One',
   rel: 'stylesheet',
   type: 'text/css'
}, null, document.getElementsByTagName('head')[0]);

Highcharts.theme = {
   colors: ["#2b908f", "#90ee7e", "#f45b5b", "#7798BF", "#aaeeee", "#ff0066", "#eeaaee",
      "#55BF3B", "#DF5353", "#7798BF", "#aaeeee"],
   chart: {
      backgroundColor: {
         linearGradient: { x1: 0, y1: 0, x2: 1, y2: 1 },
         stops: [
            [0, '#2a2a2b'],
            [1, '#3e3e40']
         ]
      },
      style: {
         fontFamily: "'Unica One', sans-serif"
      },
      plotBorderColor: '#606063'
   },
   title: {
      style: {
         color: '#E0E0E3',
         textTransform: 'uppercase',
         fontSize: '20px'
      }
   },
   subtitle: {
      style: {
         color: '#E0E0E3',
         textTransform: 'uppercase'
      }
   },
   xAxis: {
      gridLineColor: '#707073',
      labels: {
         style: {
            color: '#E0E0E3'
         }
      },
      lineColor: '#707073',
      minorGridLineColor: '#505053',
      tickColor: '#707073',
      title: {
         style: {
            color: '#A0A0A3'

         }
      }
   },
   yAxis: {
      gridLineColor: '#707073',
      labels: {
         style: {
            color: '#E0E0E3'
         }
      },
      lineColor: '#707073',
      minorGridLineColor: '#505053',
      tickColor: '#707073',
      tickWidth: 1,
      title: {
         style: {
            color: '#A0A0A3'
         }
      }
   },
   tooltip: {
      backgroundColor: 'rgba(0, 0, 0, 0.85)',
      style: {
         color: '#F0F0F0'
      }
   },
   plotOptions: {
      series: {
         dataLabels: {
            color: '#B0B0B3'
         },
         marker: {
            lineColor: '#333'
         }
      },
      boxplot: {
         fillColor: '#505053'
      },
      candlestick: {
         lineColor: 'white'
      },
      errorbar: {
         color: 'white'
      }
   },
   legend: {
      itemStyle: {
         color: '#E0E0E3'
      },
      itemHoverStyle: {
         color: '#FFF'
      },
      itemHiddenStyle: {
         color: '#606063'
      }
   },
   credits: {
      style: {
         color: '#666'
      }
   },
   labels: {
      style: {
         color: '#707073'
      }
   },

   drilldown: {
      activeAxisLabelStyle: {
         color: '#F0F0F3'
      },
      activeDataLabelStyle: {
         color: '#F0F0F3'
      }
   },

   navigation: {
      buttonOptions: {
         symbolStroke: '#DDDDDD',
         theme: {
            fill: '#505053'
         }
      }
   },

   // scroll charts
   rangeSelector: {
      buttonTheme: {
         fill: '#505053',
         stroke: '#000000',
         style: {
            color: '#CCC'
         },
         states: {
            hover: {
               fill: '#707073',
               stroke: '#000000',
               style: {
                  color: 'white'
               }
            },
            select: {
               fill: '#000003',
               stroke: '#000000',
               style: {
                  color: 'white'
               }
            }
         }
      },
      inputBoxBorderColor: '#505053',
      inputStyle: {
         backgroundColor: '#333',
         color: 'silver'
      },
      labelStyle: {
         color: 'silver'
      }
   },

   navigator: {
      handles: {
         backgroundColor: '#666',
         borderColor: '#AAA'
      },
      outlineColor: '#CCC',
      maskFill: 'rgba(255,255,255,0.1)',
      series: {
         color: '#7798BF',
         lineColor: '#A6C7ED'
      },
      xAxis: {
         gridLineColor: '#505053'
      }
   },

   scrollbar: {
      barBackgroundColor: '#808083',
      barBorderColor: '#808083',
      buttonArrowColor: '#CCC',
      buttonBackgroundColor: '#606063',
      buttonBorderColor: '#606063',
      rifleColor: '#FFF',
      trackBackgroundColor: '#404043',
      trackBorderColor: '#404043'
   },

   // special colors for some of the
   legendBackgroundColor: 'rgba(0, 0, 0, 0.5)',
   background2: '#505053',
   dataLabelsColor: '#B0B0B3',
   textColor: '#C0C0C0',
   contrastTextColor: '#F0F0F3',
   maskColor: 'rgba(255,255,255,0.3)'
};

// Apply the theme
   var params = $('#params').val();
    $('div .plot-graph input').on('switchChange.bootstrapSwitch', function(event, state){
    	if(state){
         load_graph();
      }
    });

      function load_graph(){
         var graph_type = '';
         $.each($('input[name="plot-types"]'), function(k, data){
            var temp = data;

            if(temp.checked == true){
               graph_type = temp.value
            }
         });

         var graph_time = '';
         $.each($('input[name="plot-times"]'), function(k, data){
            var temp = data;

            if(temp.checked == true){
               graph_time = temp.value
            }
         });
         var arr_graph_options = {};
         arr_graph_options['time'] = graph_time;
         arr_graph_options['type'] = graph_type;
         var graph_options = JSON.stringify(arr_graph_options);

         var yaxis_title = 'Contacten';
         if(arr_graph_options['type'] == 'SALES'){
            var yaxis_title = 'Sales';
         }
         if(arr_graph_options['type'] == 'FEE'){
            var yaxis_title = 'Omzet';
         }
         if(arr_graph_options['type'] == 'OFFERS'){
            var yaxis_title = 'Offertes';
         }
         if(arr_graph_options['type'] == 'CONTACT_MOMENTS'){
            var yaxis_title = 'Contecten';
         }

         var xaxis_title = 'WEEK';
         if(arr_graph_options['time'] == 'WEEK'){
            var xaxis_title = 'WEEK';
         }
         if(arr_graph_options['time'] == 'MONTH'){
            var xaxis_title = 'MND';
         }
         if(arr_graph_options['time'] == 'QUARTER'){
            var xaxis_title = 'KWA';
         }
         if(arr_graph_options['time'] == 'YEAR'){
            var xaxis_title = 'JAAR';
         }

           $.getJSON("/admin/compare/get_graph_for_contact_moments/"+params+"/"+encodeURIComponent(graph_options), function(jsonData) {
            if(jsonData){
               options.yAxis.title.text = yaxis_title;
               options.xAxis.title.text = xaxis_title;
               console.log(options.yAxis);
               options.xAxis.categories = jsonData['categories'];
               options.series = jsonData['series'];
                   chart = new Highcharts.Chart(options);

                   Highcharts.setOptions(Highcharts.theme);
              }
            
           });
      }
});
//    $('#top-graph-container').highcharts();
    

		</script>
<?php include("includes/footer.php"); ?>