$(document).ready(function ()
{
	var isPlatformsSelected = false;
	// disable enter on other places than textarea
	$(document).on("keydown", ":input:not(textarea)", function (event)
	{
		return event.key != "Enter";
	});

	// enable send button when one's ready with their announcement
	$('#verify').change(function ()
	{
		run_send_check();
	});

	$("input").change(function () {
		run_send_check();
	});

	// enable datetime modules
	$("#dt_start").DateTimePicker();
	$("#dt_end").DateTimePicker();

	function run_send_check() {
		var btn = $("#submit_btn");
		if ($("#verify").is(":checked") && is_platforms_selected()) {
			btn.removeClass("disabled")
		}
		else {
			btn.addClass("disabled");
		}
		
	}

	function is_platforms_selected() {
		if ($("#platform_discord").is(":checked") ||
			$("#platform_telegram").is(":checked") ||
			$("#platform_email").is(":checked")) {
			return true;
		}
		else {
			return false;
		}
	}

	function email_header_preview()
	{
		var reply_to = '';
		var reply_to_field = $("#reply-to").val();
		reply_to_field.length != 0 ? reply_to = reply_to_field : reply_to = "hallitus@blanko.fi";

		return "".concat(
			"From: Blankon tiedotus <tiedotus-noreply@blanko.fi>\n",
			"To: blanko-fuksit@blanko.fi, blanko-wanhat@blanko.fi\n",
			"Reply-To: ", reply_to)
	}

	// Helper function to update preview and character count
	function update_preview()
	{

		var title = $("#title").val();
		var description = $("#description").val();
		var signature = $("#signature").val();
		var messagelen = description.length + signature.length;

		$('#nav-discord .wrapper h3').text(title);
		$('#nav-telegram .wrapper h3').text(title);
		$('#nav-email .wrapper h3').text(title);

		// Discord preview
		$('#nav-discord .wrapper .description').text(description);
		// Telegram preview
		$('#nav-telegram .wrapper .description').text(description);

		// Email preview. Header, description, signature
		$('#nav-email .wrapper .header').text(email_header_preview());
		$('#nav-email .wrapper .description').text(description);
		$('#nav-email .wrapper .signature').text(signature);

		// Char count.
		$(".char_count").text(messagelen + "/2000");
		if (messagelen > 2000)
		{
			$(".char_count").addClass("alert alert-danger");
		}
		if (messagelen < 2000)
		{
			$(".char_count").removeClass("alert alert-danger");
		}
	}

	$("input").keyup(function ()
	{
		update_preview();
	});


	// Update character count on every keypress in description field.
	// Let's show a warning if description exceeds 2000 chars (Discord limitation).
	$("textarea").keyup(function ()
	{
		update_preview();
	});
});
