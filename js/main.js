//main.js
function ContactController ($scope, $http){
	$scope.users=[];

	var base_url = 'http://localhost/estenda/';
//Read all users
	$http.get(base_url + 'contactlist/getall')
   		.then(function(res) {   
	   		for (var i=0; i<res.data.rows.length; i+=1){
		   			$scope.users.push(res.data.rows[i]);
	   			}
    	}, function() {
    	    	alert('Could not connect to the server!');
    		}
    	);

//Update a contact on the contact page
	$scope.updContact = function(index)
	{	$http({
			url: base_url + 'contactlist/update',
		    method: "PUT",
		    data: {message:$scope.users[index]},
		    headers: {'Content-Type': 'application/json'}		    
		})
		.then(function(response) {
				load();
			}, 
			function(response) { // optional
			   console.log(response);
			}
		);
	}
//reload page
function load () 
{
	$scope.users=[]; 
	var base_url = 'http://localhost/estenda/';
	$http.get(base_url + 'contactlist/getall')
   		.then(function(res) {   
	   		for (var i=0; i<res.data.rows.length; i+=1) {
		   			$scope.users.push(res.data.rows[i]);
	   		}
    	},
	    	function() {
    	    	alert('Could not connect to the server!');
    		}
    	);

}

}