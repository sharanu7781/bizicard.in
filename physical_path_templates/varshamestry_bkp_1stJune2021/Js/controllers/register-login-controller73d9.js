var app = angular.module('header', []);
app.controller('register-login-controller', function ($scope, $http) {

	var lvm = this;

	$("#user-dropdown-id").click(function () {
		$("#user-dropdown").slideToggle();

	});

	lvm.showRegisterModal = function () {
		$("#registerCustomerModal").modal('show');
	}
	lvm.loginModal = function () {
		$("#loginModal").modal('show');
	}
	lvm.loggedin=false;
	lvm.checkifLoggedInOrLoggedOut=function(){
		var loggedinportalCustomerId=localStorage.getItem("portalCustomerId");
		var loggedinportalPortalId=localStorage.getItem("portalPortalId");
		var loggedincustomerSessionToken=localStorage.getItem("customerSessionToken");

		if(loggedinportalPortalId!=='' && loggedinportalPortalId!=null && loggedinportalPortalId===globalPortalId){
			if(loggedinportalCustomerId !=='' && loggedinportalCustomerId!=null && loggedincustomerSessionToken !=='' && loggedincustomerSessionToken !=null){
				lvm.loggedin=true;
			}else{
				lvm.loggedin=false;
			}
		}else{
			lvm.loggedin=false;
		}
	}
	lvm.checkifLoggedInOrLoggedOut();

	lvm.logout=function(){
		localStorage.setItem("portalCustomerId", null);
		localStorage.setItem("portalPortalId", null);
		localStorage.setItem("customerSessionToken", null);
		lvm.loggedin=false;
	}

	lvm.register = function () {

		var postData = {};
		postData.name = lvm.name;
		postData.emailId = lvm.emailId;
		postData.mobileNumber = lvm.mobileNumber;
		postData.password = lvm.password;
		postData.portalId = globalPortalId;
		/* postData.enquiryType = lvm.type; */

		$http({
			method: 'POST',
			url: globalWsUrl+"registerCustomer",
			data: postData,
			headers: { 'Content-Type': 'application/json' }
		}).then(
			function (res) {

				if(res.data.operationStatus==0 ){
					alert("Registration Succesfull")
					$("#registerCustomerModal").modal('hide');
				}else{
					alert("Registration Failed")
				}

			},
			function (err) {

				console.log('error...', err);

			}
		);
	}

	lvm.login = function () {

		var postData = {};
	
		postData.emailId = lvm.emailId;
		postData.password = lvm.password;
		/* postData.enquiryType = lvm.type; */

		$http({
			method: 'POST',
			url: globalWsUrl+"loginCustomer",
			data: postData,
			headers: { 'Content-Type': 'application/json' }
		}).then(
			function (res) {

				if(res.data.operationStatus==0 ){
					lvm.loggedInCustomer=res.data.resultSet;
					if(lvm.loggedInCustomer.portalId===globalPortalId){
						localStorage.setItem("portalCustomerId", lvm.loggedInCustomer.customerId);
						localStorage.setItem("portalPortalId", lvm.loggedInCustomer.portalId);
						localStorage.setItem("customerSessionToken", lvm.loggedInCustomer.sessionToken);
						lvm.loggedin=true;
						alert("Login Succesfull");
						$("#loginModal").modal('hide');
						$("#user-dropdown").slideToggle();
					}else{
						alert("You are logging in under wrong portal");	
					}
					
				}else{
					alert("Login Failed")
				}

			},
			function (err) {

				console.log('error...', err);

			}
		);
	}

	lvm.isProductAdded=false;
	lvm.addToCart = function () {
		if(lvm.loggedin){
			var postData = {};
	
		postData.portalId=portalId;
		postData.customerId=localStorage.getItem("portalCustomerId");
		postData.deliveryCharges=50;
		postData.discountAmmount=discountAmmount;
		postData.finalAmmount=finalAmmount;
		postData.price=price;
		postData.productId=productId;
		postData.quantity=1;
		postData.taxes=500;
		/* postData.enquiryType = lvm.type; */

		$http({
			method: 'POST',
			url: globalWsUrl+"addProductToCart",
			data: postData,
			headers: { 'Content-Type': 'application/json','authToken':localStorage.getItem("customerSessionToken") }
		}).then(
			function (res) {

				if(res.data.operationStatus==0 ){
					alert("Product added to cart succesfully");
					$("#addToCartButton").hide();
					lvm.isProductAdded=true;
					lvm.getCart();
					
				}else{
					alert("Failed to add product to cart");
				}

			},
			function (err) {

				console.log('error...', err);

			}
		);
		}else{
			alert("Please login to Continue");
		}
		
	}
	
	lvm.products=null;
	lvm.getCart = function () {

		var postData = {};

		postData.portalId = localStorage.getItem("portalPortalId");
		postData.customerId = localStorage.getItem("portalCustomerId");



		$http({
			method: 'POST',
			url: globalWsUrl + "getProductInCartByUserId",
			data: postData,
			headers: { 'Content-Type': 'application/json', 'authToken': localStorage.getItem("customerSessionToken") }
		}).then(
			function (res) {
				lvm.products = res.data.resultSet;
				
				
			},
			function (err) {

				console.log('error...', err);

			}
		);
	}
	lvm.getCart();

});