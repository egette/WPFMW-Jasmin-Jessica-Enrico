<?php 
include('header.php');
include('navi.php');
?>
    <form  method="get" class="suche">
      <label>Suche: <input type="text" name="suche" id="suche" /></label>
      <button type="button" id="enter" value="Abschicken">Suche</button>
    </form>
	
<div id="result"></div>

<script src="/js/api.js"></script>
<?php
include('footer.php');
?>	