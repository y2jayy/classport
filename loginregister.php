<!--Block elements are placed on top of each other whereas inline elements are placed next to each other -->
<!--Input text field elements are inline-->
<!--in general, a div's HEIGHT is determined by the maximum height of the elements contained within it. but its WIDTH is not - it is determined by the width of its PARENT. so the height is determined by its children and its width is determined by its parent-->
<!--but if a block element is floated left or right OR if it is displaeyed inline-block, its width is no longer determined by the parent, instead it is determined by its children just like its height...basically floated block elements "wrap around" their children elements-->
<!--When child elements are floated, its parent will collapse around it unless overflow:auto; is sset on the parent-->
<!--It seems like inline-block is much more similar to inline than it is to block: elements displayed inline-block, like inline elelements proper, collapse to fit their content, just like elements that are floated-->
<!--One of the differences between inline-block and inline is that inlineblock elements do not "wrap", if one is placed after another, and it would overflow if on the same line, it all gets pushed down instead of certain parts being on one line and others on the next. the different inline-block elements get treated as a unit if overflow issues happen-->
<!--behavior of floated block elements and floated inline elements is distinct, learn about the difference-->
<!--floated block elements do not push down block elements located further down, and if the width of the floated block element is not the fullwidth of the parent element, the further down block element takes up the leftover space, and only the portion that doesn't fit in this space gets pushed down below-->
<!--an inline-displayed element that contains children that are displayed block will be converted to block UNLESS the parent element's display is set to inline-block-->
<!--Why does position:absolute set the link in the password span in the proper place? First, it removes it from the flow of the document.-->
<!--If you try to echo out an array, it won't do anything and it will seem like nothing is happening. you have to either print_r it or var_dump it.-->
<?php
// $sql = "SELECT Institution_State, COUNT(Institution_State) FROM institutions GROUP BY Institution_State ORDER BY Institution_State";
$sql = "SELECT DISTINCT Institution_State FROM institutions ORDER BY Institution_State";
// $sql = "SELECT * FROM institutions";
$result = $db->query($sql);

$states = array();
while($row = $result->fetchArray()) {
	// echo $row["count(Agency_Name)"];
	$states[] = $row["Institution_State"];
}
?>
<div style="background-color:green;overflow:auto;height:100px">
	<div style="float:right;position:relative;top:30px;">
		<span>
			<label for="email">Email</label>
			<input type="text" name="email" value="Hello" style="" />
		</span>
		<span>
			<label for="password">Password</label>
			<input type="text" name="password" value="World" style="" />
			<a href="#" style="position:absolute;">Forgot password or email?</a>
		</span>
		<span>
			<input type="submit" value="Log In" style="" />
		</span>
	</div>
</div>
<form>
	<h1>Create a New Account</h1>
	<div>
		<input type="text" name="first_name" placeholder="First name" />
		<input type="text" name="last_name" placeholder="Last name" />
	</div>
	<div>
		<input type="text" name="email" placeholder="Email" />
	</div>
	<div>
		<span style="display:inline-block;">
			<label for="state" style="display:block;">State (of Institution)</label>
			<select id="state" name="state" style="display:block;">
				<?php
				foreach($states as $state) {
					?>
					<option value="<?php echo $state; ?>"><?php echo $state; ?></option>
					<?php
				}
				?>
			</select>
		</span>
		<span style="display:inline-block;">
			<label for="institution" style="display:block;">Institution</label>
			<select id="institution" name="institution" style="display:block;">
				<option>Choose a State</option>
			</select>
		</span>
	</div>
	<div>
		<input type="radio" name="gender" value="female" />
		<label for="female">Female</label>
		<input type="radio" name="gender" value="male" />
		<label for="male">Male</label>
	</div>
	<div>
		<input type="submit" value="Create Account" />
	</div>
</form>
<style>
div {
	padding: 5px;
}
span {
	display: inline-block;
}
span label, span input {
	display: block;
}
</style>
<div>
<div style="width:80%;float:right;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
<div style="clear:right;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
</div>
<script>
// document.getElementById("institution").setAttribute("disabled", true);
// console.log(document.getElementById("state"));
document.getElementById("state").onchange = function(e) {
	var state = this.options[this.selectedIndex].value;
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200) {
			var institutions = JSON.parse(xhr.responseText);
			var htmlString = "";
			for (var i=0; i<institutions.length; i++) {
				htmlString += "<option value=\""+institutions[i]+"\">" + institutions[i] + "</option>\n";
			}
			document.getElementById("institution").innerHTML = htmlString;
		}
	}
	var queryString = "ajaxRequests.php?state="+state;
	queryString += "&file=loginregister&method=getInstitutions";
	xhr.open("get", queryString, true);
	xhr.send(null);
}
</script>

<!-- <div style="clear:left;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div> -->