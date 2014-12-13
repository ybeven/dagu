
function MyChart(renderto,title,type,subtitle)
{
        this.renderto=renderto;
        this.title=title;
        this.type=type;
        this.subtitle=subtitle;
        var chart; 
        var option ;
        var categories=[];
        var clickfunc;
		var ytitle="";
		
        this.setsubtitle=function(sub){
          if(sub){
            subtitle=sub;
          }
        }
        this.settitle=function(t){
          if(t){
            title=t;
          }
        }
        this.setclick=function(cli){
          if(cli){
            clickfunc=cli;
          }
        }


        /*set event click, object option*/
        this.setOptions=function(op)
        {
             option=op; 
            //options={point:{events:{ click: function() {location.href ="http://www.baidu.com"}}};
        }
        
        this.setTitle=function(title,subtitle)
        {
            chart.setTitle(title,subtitle);
        } 
        this.getChart=function()
        {
            return chart;   
        }
        
        /*redraw chart*/
        this.redrawchart=function(data)
        {
           // initHighchartsWhiteTheme();
           // Highcharts.setOptions(theme);
			Highcharts.setOptions( {
			global : {
				useUTC : false
				},
			
				});
			
            if(chart != null){
                chart.destroy();
            }
            if(type==0){
                initHighcharts();}
            if(type==1){
                initHighchartsCloumn();}
            if(type==2){
                initHighchartsPie(); }
            if(type==3){
                initHighchartsLine(); }
             if(type==4){
                initHighchartsBar(); }
			if(type==5){
                initHighchartsCloumnWithout100(); }
			if(type==6){
                initHighchartsTimeNoYear(); }
			if(type==7){
                initHighchartsSpline(); }
			if(type==8){
                initHighchartsCloumnWithoutShadow(); }
			if(type==9){
                initHighchartsColumnStack(); }
           
			
            updatachart(data);
        }
        
        /*add data in the same char*/
        this.addCompared=function(data)
        {
            updatachart(data);
        }
        
         
        /*remove data from the char*/
        this.removeCompared=function(name)
        {
            var series = chart.series;
            var rm;
            var i;
            do {
                rm = false;           
                for(i in series) {    
                    if(series[i].name.match(name)) {   
                        series[i].remove();            
                        rm = true;    
                    break;        
                    }
                }
            } while(rm); 
        }
        
        this.set_categories=function(categorie){
            categories=categorie;
        }
        /*data must be jason string or json object*/
        function updatachart(data)
        {
            var ret = data
            if(typeof(data) == 'string')
                ret = eval("(" + data + ")");
            for(var li in ret) {
                var line = ret[li];
                if(option != null)
                {   
                    options=$.extend({name:line.name, data:line.data},option);    
                } 
                else
                {//alert(line.name); alert(line.data);
                    options={name:line.name, data:line.data};
                }

                chart.addSeries(options); 
            }
        }

        /*init Theme*/
        function initHighchartsTheme()
        {
            var colors = Highcharts.getOptions().colors;

            theme = {
           colors: ["#DDDF0D", "#7798BF", "#55BF3B", "#DF5353", "#aaeeee", "#ff0066", "#eeaaee",
              "#55BF3B", "#DF5353", "#7798BF", "#aaeeee"],
           chart: {
              backgroundColor: {
                 linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                 stops: [
                    [0, 'rgb(96, 96, 96)'],
                    [1, 'rgb(16, 16, 16)']
                 ]
              },
              borderWidth: 0,
              borderRadius: 15,
              plotBackgroundColor: null,
              plotShadow: false,
              plotBorderWidth: 0
           },
           title: {
              style: {
                 color: '#FFF',
                 font: '16px Lucida Grande, Lucida Sans Unicode, Verdana, Arial, Helvetica, sans-serif'
              }
           },
           subtitle: {
              style: {
                 color: '#DDD',
                 font: '12px Lucida Grande, Lucida Sans Unicode, Verdana, Arial, Helvetica, sans-serif'
              }
           },
           xAxis: {
              gridLineWidth: 0,
              lineColor: '#999',
              tickColor: '#999',
              labels: {
                 style: {
                    color: '#999',
                    fontWeight: 'bold'
                 }
              },
              title: {
                 style: {
                    color: '#AAA',
                    font: 'bold 12px Lucida Grande, Lucida Sans Unicode, Verdana, Arial, Helvetica, sans-serif'
                 }
              }
           },
           yAxis: {
              alternateGridColor: null,
              minorTickInterval: null,
              gridLineColor: 'rgba(255, 255, 255, .1)',
              minorGridLineColor: 'rgba(255,255,255,0.07)',
              lineWidth: 0,
              tickWidth: 0,
              labels: {
                 style: {
                    color: '#999',
                    fontWeight: 'bold'
                 }
              },
              title: {
                 style: {
                    color: '#AAA',
                    font: 'bold 12px Lucida Grande, Lucida Sans Unicode, Verdana, Arial, Helvetica, sans-serif'
                 }
              }
           },
           legend: {
              itemStyle: {
                 color: '#CCC'
              },
              itemHoverStyle: {
                 color: '#FFF'
              },
              itemHiddenStyle: {
                 color: '#333'
              }
           },
           labels: {
              style: {
                 color: '#CCC'
              }
           },
           tooltip: {
              backgroundColor: {
                 linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                 stops: [
                    [0, 'rgba(96, 96, 96, .8)'],
                    [1, 'rgba(16, 16, 16, .8)']
                 ]
              },
              borderWidth: 0,
              style: {
                 color: '#FFF'
              }
           },


           plotOptions: {
              series: {
                 shadow: true
              },
              line: {
                 dataLabels: {
                    color: '#CCC'
                 },
                 marker: {
                    lineColor: '#333'
                 }
              },
              spline: {
                 marker: {
                    lineColor: '#333'
                 }
              },
              scatter: {
                 marker: {
                    lineColor: '#333'
                 }
              },
              candlestick: {
                 lineColor: 'white'
              }
           },

           toolbar: {
              itemStyle: {
                 color: '#CCC'
              }
           },

           navigation: {
              buttonOptions: {
                 symbolStroke: '#DDDDDD',
                 hoverSymbolStroke: '#FFFFFF',
                 theme: {
                    fill: {
                       linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                       stops: [
                          [0.4, '#606060'],
                          [0.6, '#333333']
                       ]
                    },
                    stroke: '#000000'
                 }
              }
           },

           // scroll charts
           rangeSelector: {
              buttonTheme: {
                 fill: {
                    linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                    stops: [
                       [0.4, '#888'],
                       [0.6, '#555']
                    ]
                 },
                 stroke: '#000000',
                 style: {
                    color: '#CCC',
                    fontWeight: 'bold'
                 },
                 states: {
                    hover: {
                       fill: {
                          linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                          stops: [
                             [0.4, '#BBB'],
                             [0.6, '#888']
                          ]
                       },
                       stroke: '#000000',
                       style: {
                          color: 'white'
                       }
                    },
                    select: {
                       fill: {
                          linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                          stops: [
                             [0.1, '#000'],
                             [0.3, '#333']
                          ]
                       },
                       stroke: '#000000',
                       style: {
                          color: colors
                       }
                    }
                 }
              },
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
              maskFill: 'rgba(16, 16, 16, 0.5)',
              series: {
                 color: '#7798BF',
                 lineColor: '#A6C7ED'
              }
           },

           scrollbar: {
              barBackgroundColor: {
                    linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                    stops: [
                       [0.4, '#888'],
                       [0.6, '#555']
                    ]
                 },
              barBorderColor: '#CCC',
              buttonArrowColor: '#CCC',
              buttonBackgroundColor: {
                    linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                    stops: [
                       [0.4, '#888'],
                       [0.6, '#555']
                    ]
                 },
              buttonBorderColor: '#CCC',
              rifleColor: '#FFF',
              trackBackgroundColor: {
                 linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                 stops: [
                    [0, '#000'],
                    [1, '#333']
                 ]
              },
              trackBorderColor: '#666'
           },

           // special colors for some of the demo examples
           legendBackgroundColor: 'rgba(48, 48, 48, 0.8)',
           legendBackgroundColorSolid: 'rgb(70, 70, 70)',
           dataLabelsColor: '#444',
           textColor: '#E0E0E0',
           maskColor: 'rgba(255,255,255,0.3)'
        };

        }
		
		
		/*init Theme*/
        function initHighchartsWhiteTheme()
        {
			theme = {
		   colors: ['#058DC7', '#50B432', '#ED561B', '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4'],
		   chart: {
			  backgroundColor: {
				 linearGradient: { x1: 0, y1: 0, x2: 1, y2: 1 },
				 stops: [
					[0, 'rgb(255, 255, 255)'],
					[1, 'rgb(240, 240, 255)']
				 ]
			  },
			  borderWidth: 2,
			  plotBackgroundColor: 'rgba(255, 255, 255, .9)',
			  plotShadow: true,
			  plotBorderWidth: 1
		   },
		   title: {
			  style: {
				 color: '#000',
				 font: 'bold 16px "Trebuchet MS", Verdana, sans-serif'
			  }
		   },
		   subtitle: {
			  style: {
				 color: '#666666',
				 font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'
			  }
		   },
		   xAxis: {
			  gridLineWidth: 1,
			  lineColor: '#000',
			  tickColor: '#000',
			  labels: {
				 style: {
					color: '#000',
					font: '11px Trebuchet MS, Verdana, sans-serif'
				 }
			  },
			  title: {
				 style: {
					color: '#333',
					fontWeight: 'bold',
					fontSize: '12px',
					fontFamily: 'Trebuchet MS, Verdana, sans-serif'

				 }
			  }
		   },
		   yAxis: {
			  minorTickInterval: 'auto',
			  lineColor: '#000',
			  lineWidth: 1,
			  tickWidth: 1,
			  tickColor: '#000',
			  labels: {
				 style: {
					color: '#000',
					font: '11px Trebuchet MS, Verdana, sans-serif'
				 }
			  },
			  title: {
				 style: {
					color: '#333',
					fontWeight: 'bold',
					fontSize: '12px',
					fontFamily: 'Trebuchet MS, Verdana, sans-serif'
				 }
			  }
		   },
		   legend: {
			  itemStyle: {
				 font: '9pt Trebuchet MS, Verdana, sans-serif',
				 color: 'black'

			  },
			  itemHoverStyle: {
				 color: '#039'
			  },
			  itemHiddenStyle: {
				 color: 'gray'
			  }
		   },
		   labels: {
			  style: {
				 color: '#99b'
			  }
		   },

		   navigation: {
			  buttonOptions: {
				 theme: {
					stroke: '#CCCCCC'
				 }
			  }
		   }
		};

        }
		
        function initHighcharts()
        {
           
            chart = new Highcharts.Chart({
                chart: {
                    renderTo: renderto,
                    type: 'line',
                    zoomType: 'x',
                    shadow: true,
					borderWidth:0.5,
                },
                xAxis: {
                    type: 'datetime',
                    dateTimeLabelFormats: {
                       minute: '%H:%M',
                       hour: '%H:%M',
                        day: '%m-%d',
                    },
                },
                yAxis: {
                    maxPadding: 0,
                    minPadding: 0,
                    min: null,
                     title: {
                            text: ''
                        }
                },
				global: {
                    useUTC: false
                },
                credits: {
                    enabled: false
                },
                plotOptions: {
                    series: {
                        marker: {enabled: true},
                        lineWidth: 2,
                        point:{events:{ click: function() {clickfunc();}}}
                       // point:{events:{ click: function() {location.href ="http://www.baidu.com"}}}
                    },
                    area: {
                        stacking: 'normal',
                        shadow: false,
                    },
					global: {
						useUTC: false
					},
                },
                title: {
                    text: title,
					style: {
                    color: '#AAA',
                    font: 'bold 12px Lucida Grande, Lucida Sans Unicode, Verdana, Arial, Helvetica, sans-serif'
                 }
                },
				
                subtitle: {
                    text: subtitle,
                    style: { color: '#2f7ed8'}
                 },
                series: []
                });
				
                
        }
		
		function initHighchartsTimeNoYear()
        {
           
            chart = new Highcharts.Chart({
                chart: {
                    renderTo: renderto,
                    type: 'line',
                    zoomType: 'x',
                    shadow: true,
					borderWidth:0.5,
                },
                xAxis: {
                    type: 'datetime',
                    dateTimeLabelFormats: {
                       minute: '%H:%M',
                       hour: '%H:%M',
                        day: '%m-%d',
                    },
                },
                yAxis: {
                    maxPadding: 0,
                    minPadding: 0,
                    min: null,
                     title: {
                            text: ''
                        }
                },
				global: {
                    useUTC: false
                },
                credits: {
                    enabled: false
                },
                plotOptions: {
                    series: {
                        marker: {enabled: true},
                        lineWidth: 2,
                        point:{events:{ click: function() {clickfunc();}}}
                       // point:{events:{ click: function() {location.href ="http://www.baidu.com"}}}
                    },
                    area: {
                        stacking: 'normal',
                        shadow: false,
                    },
					global: {
						useUTC: false
					},
                },
                title: {
                    text: title,
					style: {
                    color: '#AAA',
                    font: 'bold 12px Lucida Grande, Lucida Sans Unicode, Verdana, Arial, Helvetica, sans-serif'
                 }
                },
				
                subtitle: {
                    text: subtitle,
                    style: { color: '#2f7ed8'}
                 },
                series: []
                });
				
                
        }
		
		function initHighchartsSpline()
        {
           
            chart = new Highcharts.Chart({
                chart: {
				renderTo:renderto,
                type: 'spline'
            },
            title: {
                text: title,
				style: {
                    color: '#AAA',
                    font: 'bold 12px Lucida Grande, Lucida Sans Unicode, Verdana, Arial, Helvetica, sans-serif'
                 },
            },
            subtitle: {
                text: subtitle,
				style: { color: '#2f7ed8'}
            },
            xAxis: {
                type: 'datetime',
                labels: {
                    overflow: 'justify'
                },
				dateTimeLabelFormats: {
                       minute: '%H:%M',
                       hour: '%H:%M',
                        day: '%m-%d',
                    },
            },
            yAxis: {
                title: {
                    text: ytitle
                },
                min: 0,
                minorGridLineWidth: 0,
                gridLineWidth: 0,
                alternateGridColor: null,
                
            },
            plotOptions: {
                spline: {
                    lineWidth: 2,
                    states: {
                        hover: {
                            lineWidth: 2
                        }
                    },
                    marker: {
                        enabled: false
                    },
                    //pointInterval: 3600000, // one hour
                    //pointStart: Date.UTC(2009, 9, 6, 0, 0, 0)
                }
            },
			
            series: [],
            navigation: {
                menuItemStyle: {
                    fontSize: '10px'
                }
            }
                });
				
                
        }
		
          function initHighchartsBar()
        {
            chart= new Highcharts.Chart({
                chart: {
                    renderTo: renderto,
                    type: 'bar',
                    zoomType: 'x',
                    shadow: true,
                },
                xAxis: {
                    categories:categories,
                                    },
                yAxis: {
                        title: {
                            text: 'range'
                        }
                },
                plotOptions: {
                    column: {
                        cursor: 'pointer',
                        dataLabels: {
                                enabled: false,
                                 color: 'black',
                                style: {
                                    fontWeight: 'bold'
                                },
                                formatter: function() {
                                   // return parseInt((this.y*100)*100)*1.0/100 +'%';//show two decimal places
                                    return parseInt(this.y) ;//show two decimal places
                                }
                        },
                        
                    },
                    series: {
                        marker: {enabled: true},
                        lineWidth: 2,
                       // point:{events:{ click: function() {lookupIPInfo(this.x);}}}
                        point:{events:{ click: function() {clickfunc();}}}
                    },
                    area: {
                        stacking: 'normal',
                        shadow: false,
                    },
               }, 
                title: {
                    text: title
                }, 
                subtitle: {
                    text: subtitle,
                    style: { color: '#2f7ed8'}
                 },
                series: []
                });
           // chart.setTitle({text:title}, {text:subtitle,style: { color: 'green'}});

        }

		function initHighchartsColumnStack()
        {
            chart= new Highcharts.Chart({
                chart: {
                    renderTo: renderto,
                    type: 'bar',
                    zoomType: 'x',
                    shadow: true,
                },
                xAxis: {
                    categories:categories,
                                    },
                yAxis: {
                        title: {
                            text: 'range'
                        }
                },
                plotOptions: {
                    column: {
                        cursor: 'pointer',
                        dataLabels: {
                                enabled: false,
                                 color: 'black',
                                style: {
                                    fontWeight: 'bold'
                                },
                                formatter: function() {
                                   // return parseInt((this.y*100)*100)*1.0/100 +'%';//show two decimal places
                                    return parseInt(this.y) ;//show two decimal places
                                }
                        },
					
                        
                    },
			
                    series: {
						stacking: 'normal',
                        marker: {enabled: true},
                        lineWidth: 2,
                       // point:{events:{ click: function() {lookupIPInfo(this.x);}}}
                        point:{events:{ click: function() {clickfunc();}}}
                    },
                    area: {
                        stacking: 'normal',
                        shadow: false,
                    },
               }, 
                title: {
                    text: title
                }, 
                subtitle: {
                    text: subtitle,
                    style: { color: '#2f7ed8'}
                 },
                series: []
                });
           // chart.setTitle({text:title}, {text:subtitle,style: { color: 'green'}});

        }
        function initHighchartsLine()
        {
            chart= new Highcharts.Chart({
                chart: {
                    renderTo: renderto,
                    type: 'line',
                    zoomType: 'x',
                    shadow: true,
                },
                xAxis: {
                    categories:categories,
                                    },
                yAxis: {
                        title: {
                            text: 'range'
                        },
                        min:0
                },
                plotOptions: {
                    column: {
                        cursor: 'pointer',
                        dataLabels: {
                                enabled: true,
                                 color: 'white',
                                style: {
                                    fontWeight: 'bold'
                                },
                                formatter: function() {
                                   // return parseInt((this.y*100)*100)*1.0/100 +'%';//show two decimal places
                                    return parseInt(this.y) ;//show two decimal places
                                }
                        }
                    },
                    series: {
                        marker: {enabled: true},
                        lineWidth: 2,
                        point:{events:{ click: function() {clickfunc();}}}
                    },
                    area: {
                        stacking: 'normal',
                        shadow: false,
                    },
               }, 
                title: {
                    text: title
                }, 
                subtitle: {
                    text: subtitle,
                    style: { color: '#2f7ed8'}
                 },
                series: []
                });
           // chart.setTitle({text:title}, {text:subtitle,style: { color: 'green'}});

        }
        function initHighchartsCloumn()
        {
            chart= new Highcharts.Chart({
                chart: {
                    renderTo: renderto,
                    type: 'column',
                    zoomType: 'x',
                    shadow: true,
                },
                xAxis: {
                    categories:categories,
                                    },
                yAxis: {
                        title: {
                            text: 'range'
                        }
                },
                plotOptions: {
                    column: {
                        cursor: 'pointer',
                        dataLabels: {
                                enabled: false,
                                 color: 'black',
                                style: {
                                    fontWeight: 'bold'
                                },
                                formatter: function() {
                                   return parseInt((this.y*100)*100)*1.0/100 +'%';//show two decimal places
                                    //return parseInt(this.y) ;//show two decimal places
                                }
                        }
                    },
                    series: {
                        marker: {enabled: true},
                        lineWidth: 2,
                        point:{events:{ click: function() {clickfunc();}}}
                    },
                    area: {
                        stacking: 'normal',
                        shadow: false,
                    },
               }, 
                title: {
                    text: title
                }, 
                subtitle: {
                    text: subtitle,
                    style: { color: '#2f7ed8'}
                 },
                series: []
                });
           // chart.setTitle({text:title}, {text:subtitle,style: { color: 'green'}});

        }
		
		function initHighchartsCloumnWithoutShadow()
        {
            chart= new Highcharts.Chart({
                chart: {
                    renderTo: renderto,
                    type: 'column',
                    zoomType: 'x',
                },
                xAxis: {
                    categories:categories,
                                    },
                yAxis: {
                        title: {
                            text: 'range'
                        },
						min: 0,
						minorGridLineWidth: 0,
						gridLineWidth: 0,
						alternateGridColor: null,
                },
				
                plotOptions: {
					marker: {
                        enabled: false
                    },
                    column: {
                        cursor: 'pointer',
                        dataLabels: {
                                enabled: false,
                                 color: 'black',
                                style: {
                                    fontWeight: 'bold'
                                },
                                formatter: function() {
                                   return parseInt((this.y*100)*100)*1.0/100 +'%';//show two decimal places
                                    //return parseInt(this.y) ;//show two decimal places
                                }
                        }
                    },
                    series: {
                        marker: {enabled: true},
                        lineWidth: 2,
                        point:{events:{ click: function() {clickfunc();}}}
                    },
                    area: {
                        stacking: 'normal',
                        shadow: false,
                    },
               }, 
                title: {
                    text: title
                }, 
                subtitle: {
                    text: subtitle,
                    style: { color: '#2f7ed8'}
                 },
                series: []
                });
           // chart.setTitle({text:title}, {text:subtitle,style: { color: 'green'}});

        }
		
		function initHighchartsCloumnWithout100()
        {
            chart= new Highcharts.Chart({
                chart: {
                    renderTo: renderto,
                    type: 'column',
                    zoomType: 'x',
                    shadow: true,
                },
                xAxis: {
                    categories:categories,
                                    },
                yAxis: {
                        title: {
                            text: 'range'
                        }
                },
                plotOptions: {
                    column: {
                        cursor: 'pointer',
                        dataLabels: {
                                enabled: true,
                                 color: 'black',
                                style: {
                                    fontWeight: 'bold'
                                },
                                formatter: function() {
                                   // return parseInt((this.y*100)*100)*1.0/100 +'%';//show two decimal places
                                    return parseFloat(this.y) ;//show two decimal places
                                }
                        }
                    },
                    series: {
                        marker: {enabled: true},
                        lineWidth: 2,
                        point:{events:{ click: function() {clickfunc();}}}
                    },
                    area: {
                        stacking: 'normal',
                        shadow: false,
                    },
               }, 
                title: {
                    text: title
                }, 
                subtitle: {
                    text: subtitle,
                    style: { color: '#2f7ed8'}
                 },
                series: []
                });
           // chart.setTitle({text:title}, {text:subtitle,style: { color: 'green'}});

        }
		
        function initHighchartsPie()
        {
            chart= new Highcharts.Chart({
                chart: {
                    renderTo: renderto,
                    type: 'pie',
                    shadow: true,
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage}%</b>',
                    percentageDecimals: 1
                },
                plotOptions: {
                     pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            //color: '#FF5809',
                            connectorColor: '#000000',
                            formatter: function() {
                                return '<b>'+ this.point.name +'</b>: '+ this.percentage.toFixed(2) +' %';
                            }
                        }
                    },
                    series: {
                        marker: {enabled: true},
                        lineWidth: 2,
                        point:{events:{ click: function() {clickfunc();}}}
                    },
                }, 
                title: {
                    text: title,
                },
                subtitle: {
                    text: subtitle,
                    style: { color: '#2f7ed8'}
                 },
                series: []
            }); 
        }
}
