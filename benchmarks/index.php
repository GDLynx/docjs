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
			span.foo {
				width: 64px;
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
			  
		<script src="../main.js">
		</script>
		<script type="text/javascript">
			function bench(id, iterations, b) {
				var now = performance.now();
				for(var i = 0; i < iterations; i++) {
					b();
				}
				console.log((performance.now() - now).toFixed(2) + "ms : " + id);
			}
			var iterations = 1000000;
			function bench_queries(iterations) {
				bench("Doc class.class", iterations, function() { doc.class("container").class("span"); });
				bench("Doc query", iterations, function() { doc.query(".container .span"); });
				bench("jQ find", iterations, function() { $(".container").find(".span"); });
				bench("jQ query", iterations, function() { $(".container .span"); });
			}
			
			bench_queries(iterations);
		</script>
	</body>
</html>