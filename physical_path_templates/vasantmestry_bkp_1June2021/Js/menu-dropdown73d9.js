$(document).ready(function () {
	$(".emptyClassForElementSelector").mouseover(function () {
		var titleName = $(this).attr('id').replace(/\s/g, '');
		$("#dropdown" + titleName).show(200);
	});
	$(".emptyClassForElementSelector").mouseleave(function () {
		var titleName = $(this).attr('id').replace(/\s/g, '');

		$("#dropdown" + titleName).hide(200);
	});

	/*$(".mobile-menu-dropdown-icon").click(function() {
		 $(".mobile-menu-dropdown-items-list-container").slideToggle("slow");
		// $('.mobile-menu-dropdown-items-list-container').next().animate({
		// 	width: 'toggle'
		// }, "slow")
	});*/

	$(".mobile-menu-dropdown-icon").click(function () {
		$(".nv-portal-categories-container").slideToggle("slow");
	});
	// $(".emptyClassForElementSelector").click(function() {
	// 	var titleName = $(this).attr('id').replace(/\s/g,'');
	// 	$("#dropdown" + titleName).slideToggle("slow");
	// });


	var currentOpenMenu = "";
	var count = 1;
	$(".mobile-menu-dropdown-items-container").click(function () {
		$(".mobile-dropdowns-items").slideUp("fast");
		var mobTagName = "#mob" + $(this).attr('id').replace(/\s/g, '');
		if (mobTagName === currentOpenMenu) {
			count++;

			if (count == 3) {
				$(mobTagName).slideToggle("fast");
				count = 1;
			}
		} else {
			$(mobTagName).slideToggle("fast");
		}

		currentOpenMenu = mobTagName;

	});

	$("#nv-navigation-drawer-humbergur-icon").click(function () {
		$(".nv-navigation-drawer-container").animate({
			width: "toggle"
		});

	});

	$(".empty").mouseover(function () {
		var icon = $(this).attr('id').replace(/\s/g, '');
		$("#" + icon + "-image").css("transition", " transform .7s");
		$("#" + icon + "-name").delay("slow").fadeIn(500);
	});
	$(".empty").mouseleave(function () {
		var icon = $(this).attr('id').replace(/\s/g, '');
		$("#" + icon + "-name").fadeOut(500);
	});

	$("#m-catalog").click(function () {
		$(".catalog-menu-container").slideToggle("slow");

	});

	/*var currentSHowId = null;
	$(".second-selector").click(function () {
		console.log("start", currentSHowId);
		if (currentSHowId === $(this).attr('id').replace(/\s/g, '')) {
			$("#" + currentSHowId + "-menu").hide('slow');
			currentSHowId = null;
		} else {
			currentSHowId = $(this).attr('id').replace(/\s/g, '');
			$("#" + currentSHowId + "-menu").show('slow');
		}
		console.log("end", currentSHowId);

	});
	var currentSHowId1 = null;
	$(".third-selector").click(function () {
		console.log("start", currentSHowId1);
		if (currentSHowId1 === $(this).attr('id').replace(/\s/g, '')) {
			$("#" + currentSHowId1 + "-menu").hide('slow');
			currentSHowId1 = null;
		} else {
			currentSHowId1 = $(this).attr('id').replace(/\s/g, '');
			$("#" + currentSHowId1 + "-menu").show('slow');
		}
		console.log("end", currentSHowId1);

	});

	$(document).mouseup(function (e) {
		var container = $(".second-level");

		// if the target of the click isn't the container nor a descendant of the container
		if (!container.is(e.target) && container.has(e.target).length === 0) {
			container.hide('slow');
			$("#" + currentSHowId1 + "-menu").hide('slow');
			$("#" + currentSHowId + "-menu").hide('slow');
		}
	});

	$(".new-catalog").mouseover(function(){
		$(".second-level").toggle('slow');
		
	})*/

	$(".menu-tab").mouseover(function () {
		var titleName = $(this).attr('id').replace(/\s/g, '');
		$("#dropdown" + titleName).show(200);
	});
	$(".menu-tab").mouseleave(function () {
		var titleName = $(this).attr('id').replace(/\s/g, '');
		$("#dropdown" + titleName).hide(200);
	});

	$(".new-catalog-first-level").mouseover(function () {
		$(".second-level").show(200);
	});
	$(".new-catalog-first-level").mouseleave(function () {
		
		$(".second-level").hide(200);
	});

	
});