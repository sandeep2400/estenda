<?php 
echo "<div class=\"write_title\">Directory (Last - First - Tel - Email)</div>";
?>
 
<div class = 'to-dos' ng-app ng-controller = 'ContactController'>
 		<div class = 'write'>
	 		<div class='directory' ng-repeat = 'user in users'>
	 		<div ng-if='user.you === true'>
		 			<div id='entry'>You</div>
			 		<input type='text' ng-model='user.lname' placeholder='{{user.lname}}'>
			 		<input type='text' ng-model='user.fname' placeholder='{{user.fname}}'>
			 		<input type='text' ng-model='user.tel' placeholder='{{user.tel}}'>
		 			<div id='entry'><a href="mailto:{{user.email}}">{{user.email}}</a></div>
			 		<span><input type='submit' ng-click='updContact($index)' value='update'></span>
					</div>
	 		<div ng-if='user.you === false'>
		 			<div id='entry'>   </div>
		 			<div id='entry'>{{user.lname}}, </div>
		 			<div id='entry'>{{user.fname}}</div>
		 			<div id='entry'>{{user.tel}}</div>
		 			<div id='entry'><a href="mailto:{{user.email}}">{{user.email}}</a></div>
			</div>
	 		</div>

 	</div> 
</div>
