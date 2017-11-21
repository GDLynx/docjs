<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		
		<style media="screen">
			span {
				display: block;
				width: 32px;
				height: 32px;
				background: red;
				transition: all 400ms ease;
				margin-bottom: 2px;
				
			}
			
			.container span {
				background: blue;
			}
		</style>
	</head>
	<body>
		<div class="container query-perf-test">
				<span class="span"></span>
				<span class="span"></span>
				<span class="span"></span>
				<span class="span"></span>
				<span class="span"></span>
				<div class="container">
					<span class="span"></span>
					<span class="span"></span>
					<span class="span"></span>
					<span class="span"></span>
					<span class="span"></span>
					<span class="span"></span>
					<span class="span"></span>
					<span class="span"></span>
					<span class="span"></span>
					<span class="span"></span>
				</div>
		</div>
		<div class="box">
			<span class="span"></span>
			<span class="span"></span>
			<span class="span"></span>
			<span class="span"></span>
			<span class="span"></span>
			<span class="span"></span>
			<span class="span"></span>
			<span class="span"></span>
			<span class="span"></span>
			<span class="span"></span>
		</div>
		
		<script
			  src="https://code.jquery.com/jquery-3.2.1.min.js"
			  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
			  crossorigin="anonymous"></script>
			  
		<script src="../main-dist.js">
		</script>
		<script type="text/javascript">
			function bench(id, iterations, b) {
				var now = performance.now();
				for(var i = 0; i < iterations; i++) {
					b();
				}
				console.log((performance.now() - now).toFixed(2) + "ms : " + id);
			}
			var iterations = 30000;
			function bench_queries(iterations) {
				bench("Doc class.class", iterations, function() { doc.class("container").findClass("span"); });
				bench("Doc class.query", iterations, function() { doc.class("container").find(".span"); });
				bench("Doc query.query", iterations, function() { doc.query(".container").find(".span"); });
				bench("Doc query", iterations, function() { doc.query(".container .span"); });
				bench("jQ query", iterations, function() { $(".container .span"); });
				
				bench("Doc class", iterations, function() { doc.class("span"); });
				bench("Doc query", iterations, function() { doc.query(".span"); });
				bench("jq simple query", iterations, function() { $(".span"); });
			}
			
			bench_queries(iterations);
		</script>
	</body>
</html>