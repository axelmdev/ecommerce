<hr>
<footer class="footer">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="footer__description">
					<a href="index.php?c=article&a=cgv">Conditions générales de ventes</a>
				</div>
				<hr>
				<div class="footer__description">
					Copyright © MyShopCMS by <a class="footer__link" href="mailto:contact.axel.pro@gmail.com">Axel Mainguy</a> - Touts droits réservées - <a id="go-top" href="#top">^</a>
				</div>
			</div>
		</div>
	</div>
</footer>
<!-- Javascript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="assets/js/bootstrap.js"></script>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
<script src="assets/js/fr_FR.js"></script>
<script src="http://julian.com/research/velocity/build/velocity.min.js" id="library"></script>
<script src="assets/js/scroll.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script>
	new Morris.Line({
  // ID of the element in which to draw the chart.
  element: 'myfirstchart',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [
    { year: '2008', value: 20 },
    { year: '2009', value: 10 },
    { year: '2010', value: 5 },
    { year: '2011', value: 5 },
    { year: '2012', value: 20 }
  ],
  // The name of the data record attribute that contains x-values.
  xkey: 'year',
  // A list of names of data record attributes that contain y-values.
  ykeys: ['value'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['Value']
});
</script>
</body>
</html>