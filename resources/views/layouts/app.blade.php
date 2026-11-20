<!DOCTYPE html>
<html lang="en-US" prefix="og: https://ogp.me/ns#" class="no-js">
<head>
@yield('head')
</head>
<body class="@yield('bodyclass')">


<div id="wrapper" style="">
	<div class="tombuild-cursor" data-config='{&quot;efx&quot;:[{&quot;target&quot;:&quot;.demo&quot;,&quot;text&quot;:&quot;View Page&quot;,&quot;classes&quot;:&quot;circle-with-text&quot;}]}'>
    <div class="inner">
      	<span class="text"></span>
      	<svg class="arrow arrow-left" width="10" height="14" viewBox="0 0 10 14" xmlns="http://www.w3.org/2000/svg">
			<path d="M10 9.53674e-07L10 14L-3.41715e-07 7L10 9.53674e-07Z" />
		</svg>
      	<svg class="arrow arrow-right" width="10" height="14" viewBox="0 0 10 14"  xmlns="http://www.w3.org/2000/svg">
			<path d="M0 14V0L10 7L0 14Z" />
		</svg>
    </div>
</div>
	<div class="search-style-fullscreen">
    	<div class="search_form_wrap">
    		<span class="search-close"></span>
        	<form role="search" method="get" action="/" class="search-form">
	<input type="search" class="search-field" placeholder="Search..." value="" name="s" title="Search for:" />
	<button type="submit" class="search-submit" title="Search">SEARCH<i class="ci-magnifying-glass"></i></button>
</form>
        </div>
    </div><!-- /.search-style-fullscreen -->
	
    <div id="page" class="clearfix  default" 
    	 data-preloader="{{ $A }}assets/uploads/vidivelli/logo-mark.png" data-preclass="shining">
    		    	@include('partials.header')
<!-- /#site-header-wrap -->
		
		
        <!-- Main Content -->
        @yield('content')
<!-- /.main-content -->
						@include('partials.footer')

			
		
<div id="scroll-top"></div>	</div><!-- /#page -->
</div><!-- /#wrapper -->


@yield('scripts')
</body>
</html>
