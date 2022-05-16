<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

		</div>
	</main>
	<div class="container">
		<footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
			<p class="col-md-4 mb-0 text-muted">© 2022 Ковшик А.С.</p>

			<a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
			<img src="/local/templates/bootstrap_v5/images/logo.png" width="40" height="40" class="d-inline-block align-top" alt="">
			</a>

			<ul class="nav col-md-4 justify-content-end">
			<li class="nav-item"><a href="/" class="nav-link px-2 text-muted">Главная</a></li>
			<li class="nav-item"><a href="/about" class="nav-link px-2 text-muted">О проекте</a></li>
			<li class="nav-item"><a href="/contacts" class="nav-link px-2 text-muted">Контакты</a></li>
			</ul>
		</footer>
	</div>

	<script>
		BX.ready(function(){
			var upButton = document.querySelector('[data-role="eshopUpButton"]');
			BX.bind(upButton, "click", function(){
				var windowScroll = BX.GetWindowScrollPos();
				(new BX.easing({
					duration : 500,
					start : { scroll : windowScroll.scrollTop },
					finish : { scroll : 0 },
					transition : BX.easing.makeEaseOut(BX.easing.transitions.quart),
					step : function(state){
						window.scrollTo(0, state.scroll);
					},
					complete: function() {
					}
				})).animate();
			})
		});
	</script>
</body>
</html>