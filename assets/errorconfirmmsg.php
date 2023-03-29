<?php
if (isset($message)) {
	foreach ($message as $message) {
		echo '
      <div class="message">
         <span>' . $message . '</span>
         <i class="fa-solid fa-xmark" style="font-size:20px> 
          onclick="this.parentElement.remove();"></i>
      </div>
      ';
	}
}
?>