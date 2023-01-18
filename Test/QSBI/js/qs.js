	
	


	function getTable(SQLTable, tableName) {
			
		var url1 = "http://www.svbook.com/Test/QSBI/api.php?q=" + SQLTable;
			
		Plotly.d3.json(url1, function(err, data) {
				
			var tableContent = "<tr><td><b></b></td><td colspan=9><b>" + tableName + " Rank</b></td><td colspan=9><b>" + tableName + " Score</b></td></tr>";
			tableContent += "<tr><td><b>Institution Name</b></td><td><b>2009</b></td><td><b>2010</b></td><td><b>2011</b></td><td><b>2012</b></td><td><b>2013</b></td><td><b>2014</b></td><td><b>2015</b></td><td><b>2016</b></td><td><b>2017</b></td><td><b>2009</b></td><td><b>2010</b></td><td><b>2011</b></td><td><b>2012</b></td><td><b>2013</b></td><td><b>2014</b></td><td><b>2015</b></td><td><b>2016</b></td><td><b>2017</b></td></tr>";
					
			for(var i in data) {	
				tableContent += "<tr><td>" + data[i].Institution + "</td><td>" + data[i].rank2009 + "</td><td>" + data[i].rank2010 + "</td><td>" + data[i].rank2011 + "</td><td>" + data[i].rank2012 + "</td><td>" + data[i].rank2013 + "</td><td>" + data[i].rank2014 + "</td><td>" + data[i].rank2015 + "</td><td>" + data[i].rank2016 + "</td><td>" + data[i].rank2017 + "</td><td>" + data[i].score2009 + "</td><td>" + data[i].score2010 + "</td><td>" + data[i].score2011 + "</td><td>" + data[i].score2012 + "</td><td>" + data[i].score2013 + "</td><td>" + data[i].score2014 + "</td><td>" + data[i].score2015 + "</td><td>" + data[i].score2016 + "</td><td>" + data[i].score2017 + "</td></tr>";					
					
			}
				
			$("#" + SQLTable).html( tableContent );
				
		});
			
			
	}
	
	
	
	function getRankingTable(table, tableName, year) {
			
		var url1 = "http://www.svbook.com/Test/QSBI/api2.php?y=" + year;
			
		Plotly.d3.json(url1, function(err, data) {
				
			var tableContent = "<tr><td><b></b></td><td colspan=4><b>" + tableName + " Rank</b></td><td colspan=4><b>" + tableName + " Score</b></td><td><b></b></td></tr>";
			tableContent += "<tr><td><b>Institution Name</b></td><td><b>QS</b></td><td><b>THE</b></td><td><b>ARWU</b></td><td><b>USNews</b></td><td><b>QS</b></td><td><b>THE</b></td><td><b>ARWU</b></td><td><b>USNews</b></td><td><b>Year</b></td></tr>";
					
			for(var i in data) {	
				tableContent += "<tr><td>" + data[i].Institution + "</td><td>" + data[i].QSRank + "</td><td>" + data[i].THERank + "</td><td>" + data[i].ARWURank + "</td><td>" + data[i].USNewsRank + "</td><td>" + data[i].QSScore + "</td><td>" + data[i].THEScore + "</td><td>" + data[i].ARWUScore + "</td><td>" + data[i].USNewsScore + "</td><td>" + data[i].Year1 + "</td></tr>";					
					
			}
				
			$("#" + table).html( tableContent );
				
		});
			
			
	}
	
	
	function getRankingChart(table1, table2, year) {
			
		//Ref: https://www.dyclassroom.com/chartjs/chartjs-how-to-draw-line-graph-using-data-from-mysql-table-and-php
		//Ref: http://microbuilder.io/blog/2016/01/10/plotting-json-data-with-chart-js.html
		//Ref: https://www.electrictoolbox.com/jquery-load-json-data/
		
		var url1 = "http://www.svbook.com/Test/QSBI/api2.php?y=" + year;
		table1 = table1;
		table2 = table2;
		
		Plotly.d3.json(url1, function(err, data) {
			
			var trace1 = {
				y: ["QS", "THE", "ARWU","USNews"],
				x: [data[0].QSRank, data[0].THERank, data[0].ARWURank, data[0].USNewsRank],
				//y: [1, 2, 3, 4, 5, 6, 7, 8, 9],
				mode: 'markers', 
				name: "(" + data[0].Year1 + ")" + data[0].Institution,
				marker: {
					color: getRandomColor(), 
					size: 20
					
				}
			};
				
				
			//var ctx = $("#mycanvas");
			//var ctx = $("#mycanvas");

			var data1 = [trace1];

			var layout = {
				title: "Rank (" + year + ")", 
				showlegend: true, 
				height: 600, 
				width: 1000, 
				xaxis: {
					showgrid: false,
					showline: true
				}, 
				yaxis: {
					showgrid: false,
					showline: true
				}
			};

			Plotly.plot(table1, data1, layout);
			
			for(var i in data) {
					
					
				if(i != 0) {
						
					var otherData = [data[i].QSRank, data[i].THERank, data[i].ARWURank, data[i].USNewsRank];
					
					var trace2 = {
						y: ["QS", "THE", "ARWU","USNews"],
						x: otherData,
						//y: [1, 2, 3, 4, 5, 6, 7, 8, 9],
						mode: 'markers', 
						name: "(" + data[i].Year1 + ")" + data[i].Institution,
						marker: {
							color: getRandomColor(), 
							size: 20
							
						}
					};
			
					Plotly.addTraces(table1, trace2);
						
						
				}
					
			}
			
		});
		
		
				
		
		Plotly.d3.json(url1, function(err, data) {
			
			var trace1 = {
				x: ["QS", "THE", "ARWU","USNews"],
				y: [data[0].QSScore, data[0].THEScore, data[0].ARWUScore, data[0].USNewsScore],
				//y: [1, 2, 3, 4, 5, 6, 7, 8, 9],
				type: 'bar', 
				name: "(" + data[0].Year1 + ")" + data[0].Institution,
				marker: {
					color: getRandomColor()
				}
			};
				
				
			//var ctx = $("#mycanvas");
			//var ctx = $("#mycanvas");

			var data1 = [trace1];

			var layout = {
				title: "Score (" + year + ")", 
				showlegend: true, 
				height: 600, 
				width: 1000, 
				barmode: 'group',
				xaxis: {
					showgrid: false,
					showline: true
				}, 
				yaxis: {
					showgrid: false,
					showline: true
				}
			};

			Plotly.plot(table2, data1, layout);
			
			for(var i in data) {
					
					
				if(i != 0) {
						
					var otherData = [data[i].QSScore, data[i].THEScore, data[i].ARWUScore, data[i].USNewsScore];
					
					var trace2 = {
						x: ["QS", "THE", "ARWU","USNews"],
						y: otherData,
						//y: [1, 2, 3, 4, 5, 6, 7, 8, 9],
						type: 'bar', 
						name: "(" + data[i].Year1 + ")" + data[i].Institution,
						marker: {
							color: getRandomColor()
						}
					};
			
					Plotly.addTraces(table2, trace2);
						
						
				}
					
			}
			
		});
		
		
		
		}
	
	
	
	
	function getLineChart(SQLTable, table1, table2) {
			
		//Ref: https://www.dyclassroom.com/chartjs/chartjs-how-to-draw-line-graph-using-data-from-mysql-table-and-php
		//Ref: http://microbuilder.io/blog/2016/01/10/plotting-json-data-with-chart-js.html
		//Ref: https://www.electrictoolbox.com/jquery-load-json-data/
		
		var url1 = "http://www.svbook.com/Test/QSBI/api.php?q=" + SQLTable;
		table1 = table1;
		table2 = table2;
		
		Plotly.d3.json(url1, function(err, data) {
			
			var trace1 = {
				x: ["2009", "2010", "2011","2012", "2013", "2014", "2015", "2016", "2017"],
				y: [data[0].rank2009 * (-1), data[0].rank2010 * (-1), data[0].rank2011 * (-1), data[0].rank2012 * (-1), data[0].rank2013 * (-1), data[0].rank2014 * (-1), data[0].rank2015 * (-1), data[0].rank2016 * (-1), data[0].rank2017 * (-1)],
				//y: [1, 2, 3, 4, 5, 6, 7, 8, 9],
				mode: 'lines+markers', 
				name: data[0].Institution,
				line: {
					color: getRandomColor(),
					width: 3
				}
			};
				
				
			//var ctx = $("#mycanvas");
			//var ctx = $("#mycanvas");

			var data1 = [trace1];

			var layout = {
				title: SQLTable, 
				showlegend: true, 
				height: 600, 
				width: 1000, 
				xaxis: {
					showgrid: false,
					showline: true
				}, 
				yaxis: {
					showgrid: false,
					showline: true
				}
			};

			Plotly.plot(table1, data1, layout);
			
			for(var i in data) {
					
					
				if(i != 0) {
						
					var otherData = [data[i].rank2009 * (-1), data[i].rank2010 * (-1), data[i].rank2011 * (-1), data[i].rank2012 * (-1), data[i].rank2013 * (-1), data[i].rank2014 * (-1), data[i].rank2015 * (-1), data[i].rank2016 * (-1), data[i].rank2017 * (-1)];
					
					var trace2 = {
						x: ["2009", "2010", "2011","2012", "2013", "2014", "2015", "2016", "2017"],
						y: otherData,
						//y: [1, 2, 3, 4, 5, 6, 7, 8, 9],
						mode: 'lines+markers', 
						name: data[i].Institution,
						line: {
							color: getRandomColor(),
							width: 3
						}
					};
			
					Plotly.addTraces(table1, trace2);
						
						
				}
					
			}
			
		});
		
		
				
		

		Plotly.d3.json(url1, function(err, data) {
			
			var trace1 = {
				x: ["2009", "2010", "2011","2012", "2013", "2014", "2015", "2016", "2017"],
				y: [data[0].score2009, data[0].score2010, data[0].score2011, data[0].score2012, data[0].score2013, data[0].score2014, data[0].score2015, data[0].score2016, data[0].score2017],
				//y: [1, 2, 3, 4, 5, 6, 7, 8, 9],
				mode: 'lines+markers', 
				name: data[0].Institution,
				line: {
					color: getRandomColor(),
					width: 3
				}
			};
				
				
			//var ctx = $("#mycanvas");
			//var ctx = $("#mycanvas");

			var data1 = [trace1];

			var layout = {
				title: SQLTable, 
				showlegend: true, 
				height: 600, 
				width: 1000, 
				xaxis: {
					showgrid: false,
					showline: true
				}, 
				yaxis: {
					showgrid: false,
					showline: true
				}
			};

			Plotly.plot(table2, data1, layout);
			
			for(var i in data) {
					
					
				if(i != 0) {
						
					var otherData = [data[i].score2009, data[i].score2010, data[i].score2011, data[i].score2012, data[i].score2013, data[i].score2014, data[i].score2015, data[i].score2016, data[i].score2017];
					
					var trace2 = {
						x: ["2009", "2010", "2011","2012", "2013", "2014", "2015", "2016", "2017"],
						y: otherData,
						//y: [1, 2, 3, 4, 5, 6, 7, 8, 9],
						mode: 'lines+markers', 
						name: data[i].Institution,
						line: {
							color: getRandomColor(),
							width: 3
						}
					};
			
					Plotly.addTraces(table2, trace2);
						
						
				}
					
			}
			
		});
		
		
		}

        //Ref: https://stackoverflow.com/questions/31243892/random-fill-colors-in-chart-js
		function getRandomColor() {
			var letters = '0123456789ABCDEF'.split('');
			var color = '#';
			for (var i = 0; i < 6; i++ ) {
				color += letters[Math.floor(Math.random() * 16)];
			}
			return color;
		}
		
		
