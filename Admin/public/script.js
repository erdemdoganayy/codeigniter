	function messageBox(title, subTitle, color,icon){
		$("#open-alert").iziModal({
			title: title,
			subtitle: subTitle,
			headerColor: color,
			background: color,
		theme: "White",  // light
		icon: icon,
		iconColor: "white",
		rtl: false,
		width: 600,
		borderBottom: true,
		radius: 3,
		zindex: 999,
		bodyOverflow: false,
		openFullscreen: false,
		closeOnEscape: true,
		closeButton: true,
		timeoutProgressbarColor: "rgba(255,255,255,0.5)",
		transitionIn: "comingIn",
		transitionOut: "comingOut",
		transitionInOverlay: "fadeIn",
		transitionOutOverlay: "fadeOut",
		onClosed: function(){
			window.location.reload();
		},
	});
		$("#open-alert").iziModal("open");
	}

