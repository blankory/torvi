document.addEventListener("DOMContentLoaded", () => {

    /**
     * Prevents the enter key from submitting forms unless inside a textarea.
     */
    document.addEventListener("keydown", (event) => {
        if (event.target.tagName !== "TEXTAREA" && event.key === "Enter") {
            event.preventDefault();
        }
    });

    // Attach event listeners
    document.querySelector("#verify").addEventListener("change", runSendCheck);
    document.querySelectorAll("input").forEach(input => 
        input.addEventListener("change", runSendCheck)
    );

    // Initialize datetime pickers
    $("#dt_start").DateTimePicker();
    $("#dt_end").DateTimePicker();

    /**
     * Enables or disables the submit button based on verification status and platform selection.
     */
    function runSendCheck() {
        const btn = document.querySelector("#submit_btn");
        if (document.querySelector("#verify").checked && isPlatformSelected()) {
            btn.classList.remove("disabled");
            btn.disabled = false;
        } else {
            btn.classList.add("disabled");
            btn.disabled = true;
        }
    }

    /**
     * Checks if at least one platform checkbox is selected.
     * @returns {boolean} True if a platform is selected, otherwise false.
     */
    function isPlatformSelected() {
        return ["#platform_discord", "#platform_telegram", "#platform_email", "#platform_blankoweb"]
            .some(id => document.querySelector(id).checked);
    }

    /**
     * Generates the email header preview with dynamic reply-to field.
     * @returns {string} The formatted email header.
     */
    function emailHeaderPreview() {
        const replyToField = document.querySelector("#reply-to").value;
        const replyTo = replyToField.length !== 0 ? replyToField : "hallitus@blanko.fi";
        
        return `From: Blankon tiedotus <tiedotus-noreply@blanko.fi>\n`
            + `To: blanko-fuksit@blanko.fi, blanko-wanhat@blanko.fi\n`
            + `Reply-To: ${replyTo}`;
    }

    /**
     * Updates the previews and character count based on the form inputs.
     */
    function updatePreview() {
        const title = document.querySelector("#title").value;
        const tag = $('input[name="tag"]:checked').val();
        const titleTag = `[${tag}]`;
        const description = document.querySelector("#description").value;
        const signature = document.querySelector("#signature").value;
        const messageLen = description.length + signature.length;

		// Update title preview for each platform
        document.querySelectorAll("#nav-discord .wrapper h3, #nav-telegram .wrapper h3, #nav-email .wrapper h3")
            .forEach(el => el.textContent = `${titleTag} ${title}`);
        
		// Discord preview
        document.querySelector("#nav-discord .wrapper .description").textContent = description;
        document.querySelector("#nav-discord .wrapper .signature").textContent = signature;
		// Telegram preview
        document.querySelector("#nav-telegram .wrapper .description").textContent = description;
        document.querySelector("#nav-telegram .wrapper .signature").textContent = signature;
		// Email preview
        document.querySelector("#nav-email .wrapper .header").textContent = emailHeaderPreview();
        document.querySelector("#nav-email .wrapper .description").textContent = description;
        document.querySelector("#nav-email .wrapper .signature").textContent = signature;

		// Update message character count
        const charCountEl = document.querySelector(".char_count");
        charCountEl.textContent = `${messageLen}/2000`;
        charCountEl.classList.toggle("alert", messageLen > 2000);
        charCountEl.classList.toggle("alert-danger", messageLen > 2000);
    }

    // Attach event listeners for live preview updates
    document.querySelectorAll("input, textarea").forEach(el => 
        el.addEventListener("keyup", updatePreview)
    );
    document.querySelectorAll("input[name='tag']").forEach(el => 
        el.addEventListener("change", updatePreview)
    );
});
