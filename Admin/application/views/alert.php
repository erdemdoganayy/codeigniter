<?php 
$alert 	= $this->session->userdata("alert");

if ($alert) {
	if ($alert["type"] === "warning") { ?>
		
		<script>
			$("#open-alert").iziModal({
				title: '<?=$alert["title"] ?>',
				subtitle: '<?=$alert["subtitle"] ?>',
				headerColor: 'orange',
				background: 'orange',
			    theme: 'White',  // light
			    icon: "fa fa-exclamation-triangle",
			    iconText: null,
			    iconColor: 'white',
			    rtl: false,
			    width: 600,
			    top: null,
			    bottom: null,
			    borderBottom: true,
			    padding: 0,
			    radius: 3,
			    zindex: 999,
			    iframe: false,
			    iframeHeight: 400,
			    iframeURL: null,
			    focusInput: true,
			    group: '',
			    loop: false,
			    arrowKeys: true,
			    navigateCaption: true,
			    navigateArrows: true, // Boolean, 'closeToModal', 'closeScreenEdge'
			    history: false,
			    restoreDefaultContent: false,
			    autoOpen: 0, // Boolean, Number
			    bodyOverflow: false,
			    fullscreen: false,
			    openFullscreen: false,
			    closeOnEscape: true,
			    closeButton: true,
			    appendTo: 'body', // or false
			    appendToOverlay: 'body', // or false
			    overlay: true,
			    overlayClose: true,
			    overlayColor: 'rgba(0, 0, 0, 0.4)',
			    timeout: false,
			    timeoutProgressbar: false,
			    pauseOnHover: false,
			    timeoutProgressbarColor: 'rgba(255,255,255,0.5)',
			    transitionIn: 'comingIn',
			    transitionOut: 'comingOut',
			    transitionInOverlay: 'fadeIn',
			    transitionOutOverlay: 'fadeOut',
			    onFullscreen: function(){},
			    onResize: function(){},
			    onOpening: function(){},
			    onOpened: function(){},
			    onClosing: function(){},
			    onClosed: function(){},
			    afterRender: function(){}

			});

			$("#open-alert").iziModal("open");
		</script>

	<?php } elseif ($alert["type"] === "success") { ?>
		<script>
			$("#open-alert").iziModal({
				title: '<?=$alert["title"] ?>',
				subtitle: '<?=$alert["subtitle"] ?>',
				headerColor: 'green',
				background: 'green',
			    theme: 'white',  // light
			    icon: "fa fa-check-circle",
			    iconText: null,
			    iconColor: 'white',
			    rtl: false,
			    width: 600,
			    top: null,
			    bottom: null,
			    borderBottom: true,
			    padding: 0,
			    radius: 3,
			    zindex: 999,
			    iframe: false,
			    iframeHeight: 400,
			    iframeURL: null,
			    focusInput: true,
			    group: '',
			    loop: false,
			    arrowKeys: true,
			    navigateCaption: true,
			    navigateArrows: true, // Boolean, 'closeToModal', 'closeScreenEdge'
			    history: false,
			    restoreDefaultContent: false,
			    autoOpen: 0, // Boolean, Number
			    bodyOverflow: false,
			    fullscreen: false,
			    openFullscreen: false,
			    closeOnEscape: true,
			    closeButton: true,
			    appendTo: 'body', // or false
			    appendToOverlay: 'body', // or false
			    overlay: true,
			    overlayClose: true,
			    overlayColor: 'rgba(0, 0, 0, 0.4)',
			    timeout: false,
			    timeoutProgressbar: false,
			    pauseOnHover: false,
			    timeoutProgressbarColor: 'rgba(255,255,255,0.5)',
			    transitionIn: 'comingIn',
			    transitionOut: 'comingOut',
			    transitionInOverlay: 'fadeIn',
			    transitionOutOverlay: 'fadeOut',
			    onFullscreen: function(){},
			    onResize: function(){},
			    onOpening: function(){},
			    onOpened: function(){},
			    onClosing: function(){},
			    onClosed: function(){},
			    afterRender: function(){}

			});

			$("#open-alert").iziModal("open");
		</script>



	<?php } elseif ($alert["type"] === "error") { ?>

		<script>
			$("#open-alert").iziModal({
				title: '<?=$alert["title"] ?>',
				subtitle: '<?=$alert["subtitle"] ?>',
				headerColor: 'red',
				background: 'red',
			    theme: 'white',  // light
			    icon: "fa fa-times-circle",
			    iconText: null,
			    iconColor: 'white',
			    rtl: false,
			    width: 600,
			    top: null,
			    bottom: null,
			    borderBottom: true,
			    padding: 0,
			    radius: 3,
			    zindex: 999,
			    iframe: false,
			    iframeHeight: 400,
			    iframeURL: null,
			    focusInput: true,
			    group: '',
			    loop: false,
			    arrowKeys: true,
			    navigateCaption: true,
			    navigateArrows: true, // Boolean, 'closeToModal', 'closeScreenEdge'
			    history: false,
			    restoreDefaultContent: false,
			    autoOpen: 0, // Boolean, Number
			    bodyOverflow: false,
			    fullscreen: false,
			    openFullscreen: false,
			    closeOnEscape: true,
			    closeButton: true,
			    appendTo: 'body', // or false
			    appendToOverlay: 'body', // or false
			    overlay: true,
			    overlayClose: true,
			    overlayColor: 'rgba(0, 0, 0, 0.4)',
			    timeout: false,
			    timeoutProgressbar: false,
			    pauseOnHover: false,
			    timeoutProgressbarColor: 'rgba(255,255,255,0.5)',
			    transitionIn: 'comingIn',
			    transitionOut: 'comingOut',
			    transitionInOverlay: 'fadeIn',
			    transitionOutOverlay: 'fadeOut',
			    onFullscreen: function(){},
			    onResize: function(){},
			    onOpening: function(){},
			    onOpened: function(){},
			    onClosing: function(){},
			    onClosed: function(){},
			    afterRender: function(){}

			});

			$("#open-alert").iziModal("open");
		</script>



	<?php }
}


















