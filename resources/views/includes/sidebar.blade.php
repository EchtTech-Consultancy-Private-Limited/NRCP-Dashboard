
<link rel="stylesheet" src="https://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css"></link>
<style>

h1 {
  color: #FFF;
  font-size: 24px;
  font-weight: 400;
  text-align: center;
  margin-top: 80px;
}

h1 a {
  color: #c12c42;
  font-size: 16px;
}
ul {
    list-style: none;
    padding: 0;
}
.accordion {
  width: 100%;
  max-width: 360px;
  margin: 30px auto 20px;
  /* background: #FFF; */
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  border-radius: 4px;
  position: relative;
}

.accordion .link {
  cursor: pointer;
  display: block;
  padding: 15px 15px 15px 42px;
  color: #4D4D4D;
  font-size: 14px;
  font-weight: 700;
  border-bottom: 1px solid #CCC;
  position: relative;
  -webkit-transition: all 0.4s ease;
  -o-transition: all 0.4s ease;
  transition: all 0.4s ease;
  background:#fff;
  border-radius:5px;
  margin:3px;
}

.accordion li:last-child .link { border-bottom: 0; }

.accordion li i {
  position: absolute;
  top: 16px;
  left: 12px;
  font-size: 18px;
  color: #595959;
  -webkit-transition: all 0.4s ease;
  -o-transition: all 0.4s ease;
  transition: all 0.4s ease;
}

.accordion li i.fa-chevron-down {
  right: 12px;
  left: auto;
  font-size: 16px;
}

.accordion li.open .link { color: #b63b4d; }

.accordion li.open i { color: #b63b4d; }

.accordion li.open i.fa-chevron-down {
  -webkit-transform: rotate(180deg);
  -ms-transform: rotate(180deg);
  -o-transform: rotate(180deg);
  transform: rotate(180deg);
}

/**
 * Submenu
 -----------------------------*/
.accordion .nav-link{
    padding:20px;
}

.submenu {
  display: none;
  background: #444359;
  font-size: 14px;
}

.submenu li { border-bottom: 1px solid #4b4a5e; }

.submenu a {
  display: block;
  text-decoration: none;
  color: #d9d9d9;
  padding: 12px;
  padding-left: 42px;
  -webkit-transition: all 0.25s ease;
  -o-transition: all 0.25s ease;
  transition: all 0.25s ease;
}

.submenu a:hover {
  background: #b63b4d;
  color: #FFF;
}
</style>

<!-- <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column"  role="menu" data-accordion="false">

        <li class="nav-item ">
            <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i> Dashboard
            </a>

        </li>

        <li class="nav-item">

        </li>

        <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link {{ Request::routeIs('sform') ? 'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>lform</p>
            </a>
        </li>


        <li class="nav-item">
            <a href="{{ url('sform') }}" class="nav-link {{ Request::routeIs('sform') ? 'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>sform</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ url('Human-rabies-map') }}" class="nav-link {{ Request::routeIs('pform2') ? 'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>pform map</p>
            </a>
        </li>
    </ul>
</nav> -->



<ul id="accordion" class="accordion">
  <li>
    <div class="link bg-primary text-white"> <i class="nav-icon fas fa-tachometer-alt text-light"></i> <a href="#">Dashboard</a> </i></div>

  </li>
  <li>
    <div class="link"> <i class="far fa-circle nav-icon"></i>pForm<i class="fa fa-chevron-down"></i></div>
    <ul class="submenu">
        <li><a href="{{ url('pformDashboard') }}" class="{{ Request::routeIs('pform2') ? 'active':'' }}">Dashboard</a></li>
        <li><a href="{{ url('pform') }}" class=" {{ Request::routeIs('pform') ? 'active':'' }}">pForm</a></li>


    </ul>
  </li>
  <li>
    <div class="link"> <i class="far fa-circle nav-icon"></i>sform<i class="fa fa-chevron-down"></i></div>
    <ul class="submenu">
      <li><a href="#">Dashboard</a></li>
      <li><a  href="{{ url('sform') }}"  class="{{ Request::routeIs('sform') ? 'active':'' }}">sform</a></li>

    </ul>
  </li>


</ul>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script>
    $(function() {
	var Accordion = function(el, multiple) {
		this.el = el || {};
		this.multiple = multiple || false;

		// Variables privadas
		var links = this.el.find('.link');
		// Evento
		links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
	}

	Accordion.prototype.dropdown = function(e) {
		var $el = e.data.el;
			$this = $(this),
			$next = $this.next();

		$next.slideToggle();
		$this.parent().toggleClass('open');

		if (!e.data.multiple) {
			$el.find('.submenu').not($next).slideUp().parent().removeClass('open');
		};
	}

	var accordion = new Accordion($('#accordion'), false);
});

</script>
