<nav id="navi" data-uk-sticky>
	<ul class="hidden-small" data-uk-nav>
		<li data-uk-dropdown="{remaintime:100, justify:'#navi', delay: 100}" aria-haspopup="true" aria-expanded="false">
			<span>Veranstaltungen</span>
			<div class="dropdown uk-dropdown">
				<ul class="subnav">
					<li class="width-1-5"><a href="../activities/timetable.php">(individueller) Stundenplan</a></li>
					<li class="width-1-5"><a href="../activities/wpf.php">WPF-Anmeldung</a></li>
					<li class="width-1-5"><a href="../activities/qq1.php">QQ1-Anmeldung</a></li>
					<li class="width-1-5"><a href="../activities/lecturelisting.php">Vorlesungsverzeichnis</a></li>
					<li class="width-1-5"><a href="../activities/modulelisting.php">Modulverzeichnis</a></li>
				</ul>
			</div>
		</li>
		<li data-uk-dropdown="{remaintime:100, justify:'#navi', delay: 100}" aria-haspopup="true" aria-expanded="false">
			<span>Räume</span>
			<div class="dropdown uk-dropdown">
				<ul class="subnav">
					<li class="width-1-5"><a href="../rooms/calendar.php">Veranstaltungskalender</a></li>
					<li class="width-1-5"><a href="../rooms/planning.php">Raumplanung</a></li>
					<li class="width-1-5"><a href="../rooms/free.php">Freie Lehrräume</a></li>
					<li class="width-1-5"><a href="../rooms/equipment.php">Ausstattung von Lehrräumen</a></li>
				</ul>
			</div>
		</li>
		<li><a href="../common/consultations.php">Sprechzeiten</a></li>
		<li><a href="../common/exams.php">Prüfungen</a></li>
		<!-- <li class="right"><a href="">Login</a></li> -->
	</ul>
	<ul class="visible-small" data-uk-nav>
		<li><a href="#mobilenav" class="navbar-toggler" data-uk-offcanvas></a></li>
	</ul>
</nav>
<div id="mobilenav" class="uk-offcanvas hidden-medium">
	<div class="uk-offcanvas-bar">
		<ul class="uk-nav uk-nav-offcanvas uk-nav-parent-icon" data-uk-nav>
			<li class="uk-parent">
				<span>Veranstaltungen</span>
				<ul class="uk-nav-sub uk-nav-parent-icon" data-uk-nav>
					<li><a href="../activities/timetable.php">(individueller) Stundenplan</a></li>
					<li><a href="../activities/wpf.php">WPF-Anmeldung</a></li>
					<li><a href="../activities/qq1.php">QQ1-Anmeldung</a></li>
					<li><a href="../activities/lecturelisting.php">Vorlesungsverzeichnis</a></li>
					<li><a href="../activities/modulelisting.php">Modulverzeichnis</a></li>
				</ul>
			</li>
			<li class="uk-parent">
				<span>Räume</span>
				<ul class="uk-nav-sub uk-nav-parent-icon" data-uk-nav>
					<li><a href="../rooms/calendar.php">Veranstaltungskalender</a></li>
					<li><a href="../rooms/planning.php">Raumplanung</a></li>
					<li><a href="../rooms/free.php">Freie Lehrräume</a></li>
					<li><a href="../rooms/equipment.php">Ausstattung von Lehrräumen</a></li>
				</ul>
			</li>
			<li><a href="../common/consultations.php">Sprechzeiten</a></li>
			<li><a href="../common/exams.php">Prüfungen</a></li>
		</ul>
	</div>
</div>